<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::latest()->paginate(10);
        return view('admin.cars.index', compact('cars'));
    }

    public function create()
    {
        return view('admin.cars.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'             => 'required|string|max:255',
            'brand'            => 'required|string|max:255',
            'model'            => 'required|string|max:255',
            'year'             => 'required|integer|min:1990|max:2030',
            'car_type'         => 'required|string|max:100',
            'daily_rent_price' => 'required|numeric|min:0',
            'availability'     => 'required|boolean',
            'image'            => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('cars', 'public');
        }

        Car::create([
            'name'             => $request->name,
            'brand'            => $request->brand,
            'model'            => $request->model,
            'year'             => $request->year,
            'car_type'         => $request->car_type,
            'daily_rent_price' => $request->daily_rent_price,
            'availability'     => $request->availability,
            'image'            => $imagePath,
        ]);

        return redirect()->route('admin.cars.index')->with('success', 'Car added successfully!');
    }

    public function edit(Car $car)
    {
        return view('admin.cars.edit', compact('car'));
    }

    public function update(Request $request, Car $car)
    {
        $request->validate([
            'name'             => 'required|string|max:255',
            'brand'            => 'required|string|max:255',
            'model'            => 'required|string|max:255',
            'year'             => 'required|integer|min:1990|max:2030',
            'car_type'         => 'required|string|max:100',
            'daily_rent_price' => 'required|numeric|min:0',
            'availability'     => 'required|boolean',
            'image'            => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $car->image;
        if ($request->hasFile('image')) {
            if ($imagePath) {
                Storage::disk('public')->delete($imagePath);
            }
            $imagePath = $request->file('image')->store('cars', 'public');
        }

        $car->update([
            'name'             => $request->name,
            'brand'            => $request->brand,
            'model'            => $request->model,
            'year'             => $request->year,
            'car_type'         => $request->car_type,
            'daily_rent_price' => $request->daily_rent_price,
            'availability'     => $request->availability,
            'image'            => $imagePath,
        ]);

        return redirect()->route('admin.cars.index')->with('success', 'Car updated successfully!');
    }

    public function destroy(Car $car)
    {
        if ($car->image) {
            Storage::disk('public')->delete($car->image);
        }
        $car->delete();
        return redirect()->route('admin.cars.index')->with('success', 'Car deleted successfully!');
    }
}
