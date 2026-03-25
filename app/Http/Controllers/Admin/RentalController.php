<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Rental;
use App\Models\User;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    public function index()
    {
        $rentals = Rental::with(['car', 'user'])->latest()->paginate(10);
        return view('admin.rentals.index', compact('rentals'));
    }

    public function create()
    {
        $cars = Car::where('availability', true)->get();
        $customers = User::where('role', 'customer')->get();
        return view('admin.rentals.create', compact('cars', 'customers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id'    => 'required|exists:users,id',
            'car_id'     => 'required|exists:cars,id',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date'   => 'required|date|after:start_date',
            'status'     => 'required|in:ongoing,completed,canceled',
        ]);

        $car = Car::findOrFail($request->car_id);
        $days = \Carbon\Carbon::parse($request->start_date)->diffInDays(\Carbon\Carbon::parse($request->end_date));
        $totalCost = $days * $car->daily_rent_price;

        Rental::create([
            'user_id'    => $request->user_id,
            'car_id'     => $request->car_id,
            'start_date' => $request->start_date,
            'end_date'   => $request->end_date,
            'total_cost' => $totalCost,
            'status'     => $request->status,
        ]);

        if ($request->status === 'ongoing') {
            $car->update(['availability' => false]);
        }

        return redirect()->route('admin.rentals.index')->with('success', 'Rental created successfully!');
    }

    public function show(Rental $rental)
    {
        $rental->load(['car', 'user']);
        return view('admin.rentals.show', compact('rental'));
    }

    public function edit(Rental $rental)
    {
        $cars = Car::all();
        $customers = User::where('role', 'customer')->get();
        return view('admin.rentals.edit', compact('rental', 'cars', 'customers'));
    }

    public function update(Request $request, Rental $rental)
    {
        $request->validate([
            'status' => 'required|in:ongoing,completed,canceled',
        ]);

        $oldStatus = $rental->status;
        $rental->update(['status' => $request->status]);

        // Update car availability based on status change
        if ($request->status === 'completed' || $request->status === 'canceled') {
            $rental->car->update(['availability' => true]);
        } elseif ($request->status === 'ongoing' && $oldStatus !== 'ongoing') {
            $rental->car->update(['availability' => false]);
        }

        return redirect()->route('admin.rentals.index')->with('success', 'Rental updated successfully!');
    }

    public function destroy(Rental $rental)
    {
        // Restore car availability
        if ($rental->status === 'ongoing') {
            $rental->car->update(['availability' => true]);
        }
        $rental->delete();
        return redirect()->route('admin.rentals.index')->with('success', 'Rental deleted successfully!');
    }
}
