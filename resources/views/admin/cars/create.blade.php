@extends('layouts.admin')
@section('title','Add Car')
@section('page-title','Add New Car')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card p-4">
            <a href="{{ route('admin.cars.index') }}" class="btn btn-outline-secondary btn-sm mb-4 align-self-start" style="width:fit-content"><i class="bi bi-arrow-left me-1"></i>Back</a>
            @if($errors->any())
                <div class="alert alert-danger"><i class="bi bi-exclamation-triangle me-2"></i>{{ $errors->first() }}</div>
            @endif
            <form method="POST" action="{{ route('admin.cars.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Car Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="e.g. Toyota Corolla" value="{{ old('name') }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Brand <span class="text-danger">*</span></label>
                        <input type="text" name="brand" id="brand" class="form-control" placeholder="e.g. Toyota" value="{{ old('brand') }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Model <span class="text-danger">*</span></label>
                        <input type="text" name="model" id="model" class="form-control" placeholder="e.g. Corolla" value="{{ old('model') }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Year <span class="text-danger">*</span></label>
                        <input type="number" name="year" id="year" class="form-control" min="1990" max="2030" value="{{ old('year', date('Y')) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Car Type <span class="text-danger">*</span></label>
                        <select name="car_type" id="car_type" class="form-select" required>
                            <option value="">Select Type</option>
                            @foreach(['Sedan','SUV','Pickup','Hatchback','Van','Minibus','Luxury','Convertible'] as $type)
                                <option value="{{ $type }}" {{ old('car_type')==$type?'selected':'' }}>{{ $type }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Daily Rent Price (৳) <span class="text-danger">*</span></label>
                        <input type="number" name="daily_rent_price" id="daily_rent_price" class="form-control" min="0" step="0.01" placeholder="e.g. 5000" value="{{ old('daily_rent_price') }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Availability <span class="text-danger">*</span></label>
                        <select name="availability" id="availability" class="form-select" required>
                            <option value="1" {{ old('availability',1)==1?'selected':'' }}>Available</option>
                            <option value="0" {{ old('availability')==0?'selected':'' }}>Not Available</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Car Image</label>
                        <input type="file" name="image" id="image" class="form-control" accept="image/*">
                        <div class="form-text">Max 2MB. JPG, PNG, GIF accepted.</div>
                    </div>
                    <div class="col-12 mt-2">
                        <button type="submit" class="btn btn-danger px-5 fw-semibold"><i class="bi bi-plus-circle me-2"></i>Add Car</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
