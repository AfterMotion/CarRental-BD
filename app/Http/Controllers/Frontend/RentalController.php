<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\AdminRentalNotificationMail;
use App\Mail\RentalConfirmedMail;
use App\Models\Car;
use App\Models\Rental;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RentalController extends Controller
{
    public function create(Car $car)
    {
        if (!$car->availability) {
            return redirect()->route('cars.index')->with('error', 'This car is not available for booking.');
        }
        return view('frontend.rentals.create', compact('car'));
    }

    public function store(Request $request, Car $car)
    {
        $request->validate([
            'start_date' => 'required|date|after_or_equal:today',
            'end_date'   => 'required|date|after:start_date',
        ]);

        if (!$car->availability) {
            return back()->with('error', 'This car is not available for the selected period.');
        }

        // Check for conflicting bookings
        $conflict = Rental::where('car_id', $car->id)
            ->where('status', 'ongoing')
            ->where(function ($q) use ($request) {
                $q->whereBetween('start_date', [$request->start_date, $request->end_date])
                  ->orWhereBetween('end_date', [$request->start_date, $request->end_date])
                  ->orWhere(function ($q2) use ($request) {
                      $q2->where('start_date', '<=', $request->start_date)
                         ->where('end_date', '>=', $request->end_date);
                  });
            })->exists();

        if ($conflict) {
            return back()->with('error', 'This car is already booked for the selected dates.');
        }

        $days = Carbon::parse($request->start_date)->diffInDays(Carbon::parse($request->end_date));
        $totalCost = $days * $car->daily_rent_price;

        $rental = Rental::create([
            'user_id'    => auth()->id(),
            'car_id'     => $car->id,
            'start_date' => $request->start_date,
            'end_date'   => $request->end_date,
            'total_cost' => $totalCost,
            'status'     => 'ongoing',
        ]);

        $car->update(['availability' => false]);

        // Send emails
        try {
            Mail::to(auth()->user()->email)->send(new RentalConfirmedMail($rental));
            $adminEmail = \App\Models\User::where('role', 'admin')->first()?->email;
            if ($adminEmail) {
                Mail::to($adminEmail)->send(new AdminRentalNotificationMail($rental));
            }
        } catch (\Exception $e) {
            // Log but don't block
        }

        return redirect()->route('rentals.index')->with('success', 'Car booked successfully! A confirmation has been sent to your email.');
    }

    public function index()
    {
        $rentals = auth()->user()->rentals()->with('car')->latest()->paginate(10);
        return view('frontend.rentals.index', compact('rentals'));
    }

    public function cancel(Rental $rental)
    {
        if ($rental->user_id !== auth()->id()) {
            abort(403);
        }

        if ($rental->status !== 'ongoing' || Carbon::parse($rental->start_date)->isPast()) {
            return back()->with('error', 'This booking cannot be cancelled.');
        }

        $rental->update(['status' => 'canceled']);
        $rental->car->update(['availability' => true]);

        return redirect()->route('rentals.index')->with('success', 'Booking cancelled successfully.');
    }
}
