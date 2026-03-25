<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index(Request $request)
    {
        $query = Car::query();

        if ($request->filled('car_type')) {
            $query->where('car_type', $request->car_type);
        }
        if ($request->filled('brand')) {
            $query->where('brand', $request->brand);
        }
        if ($request->filled('min_price')) {
            $query->where('daily_rent_price', '>=', $request->min_price);
        }
        if ($request->filled('max_price')) {
            $query->where('daily_rent_price', '<=', $request->max_price);
        }

        $cars = $query->paginate(9)->withQueryString();
        $carTypes = Car::distinct()->pluck('car_type');
        $brands = Car::distinct()->pluck('brand');

        return view('frontend.cars.index', compact('cars', 'carTypes', 'brands'));
    }

    public function show(Car $car)
    {
        return view('frontend.cars.show', compact('car'));
    }
}
