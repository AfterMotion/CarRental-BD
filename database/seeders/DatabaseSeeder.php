<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Admin',
            'email' => 'admin@rental.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'phone' => '01700000000',
            'address' => 'Dhaka, Bangladesh',
        ]);

        // Create a sample customer
        User::create([
            'name' => 'John Doe',
            'email' => 'customer@rental.com',
            'password' => Hash::make('password'),
            'role' => 'customer',
            'phone' => '01800000000',
            'address' => 'Chittagong, Bangladesh',
        ]);

        // Create sample cars
        $cars = [
            ['name' => 'Toyota Corolla', 'brand' => 'Toyota', 'model' => 'Corolla', 'year' => 2022, 'car_type' => 'Sedan', 'daily_rent_price' => 5000, 'availability' => true],
            ['name' => 'Honda CR-V', 'brand' => 'Honda', 'model' => 'CR-V', 'year' => 2023, 'car_type' => 'SUV', 'daily_rent_price' => 7500, 'availability' => true],
            ['name' => 'Toyota Hilux', 'brand' => 'Toyota', 'model' => 'Hilux', 'year' => 2021, 'car_type' => 'Pickup', 'daily_rent_price' => 8000, 'availability' => true],
            ['name' => 'Mitsubishi Pajero', 'brand' => 'Mitsubishi', 'model' => 'Pajero', 'year' => 2020, 'car_type' => 'SUV', 'daily_rent_price' => 9000, 'availability' => true],
            ['name' => 'BMW 3 Series', 'brand' => 'BMW', 'model' => '3 Series', 'year' => 2023, 'car_type' => 'Sedan', 'daily_rent_price' => 15000, 'availability' => true],
            ['name' => 'Nissan X-Trail', 'brand' => 'Nissan', 'model' => 'X-Trail', 'year' => 2022, 'car_type' => 'SUV', 'daily_rent_price' => 6500, 'availability' => false],
        ];

        foreach ($cars as $car) {
            Car::create($car);
        }
    }
}
