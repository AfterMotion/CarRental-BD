@extends('layouts.admin')
@section('title','Edit Car')
@section('page-title','Edit Car')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card p-4">
            <a href="{{ route('admin.cars.index') }}" class="btn btn-outline-secondary btn-sm mb-4 align-self-start" style="width:fit-content"><i class="bi bi-arrow-left me-1"></i>Back</a>
            @if($errors->any())
                <div class="alert alert-danger"><i class="bi bi-exclamation-triangle me-2"></i>{{ $errors->first() }}</div>
            @endif
            <form method="POST" action="{{ route('admin.cars.update', $car) }}" enctype="multipart/form-data">
                @csrf @method('PUT')
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Car Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name',$car->name) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Brand <span class="text-danger">*</span></label>
                        <input type="text" name="brand" id="brand" class="form-control" value="{{ old('brand',$car->brand) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Model <span class="text-danger">*</span></label>
                        <input type="text" name="model" id="model" class="form-control" value="{{ old('model',$car->model) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Year <span class="text-danger">*</span></label>
                        <input type="number" name="year" id="year" class="form-control" min="1990" max="2030" value="{{ old('year',$car->year) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Car Type <span class="text-danger">*</span></label>
                        <select name="car_type" id="car_type" class="form-select" required>
                            @foreach(['Sedan','SUV','Pickup','Hatchback','Van','Minibus','Luxury','Convertible'] as $type)
                                <option value="{{ $type }}" {{ old('car_type',$car->car_type)==$type?'selected':'' }}>{{ $type }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Daily Rent Price (৳) <span class="text-danger">*</span></label>
                        <input type="number" name="daily_rent_price" id="daily_rent_price" class="form-control" min="0" step="0.01" value="{{ old('daily_rent_price',$car->daily_rent_price) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Availability <span class="text-danger">*</span></label>
                        <select name="availability" id="availability" class="form-select" required>
                            <option value="1" {{ old('availability',$car->availability?1:0)==1?'selected':'' }}>Available</option>
                            <option value="0" {{ old('availability',$car->availability?1:0)==0?'selected':'' }}>Not Available</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Car Image</label>
                        @if($car->image)
                            <div class="mb-2"><img src="{{ asset('storage/'.$car->image) }}" style="height:60px;border-radius:8px;"></div>
                        @endif
                        <input type="file" name="image" id="image" class="form-control" accept="image/*">
                        <div class="form-text">Leave empty to keep current image.</div>
                    </div>
                    <div class="col-12 mt-2">
                        <button type="submit" class="btn btn-primary px-5 fw-semibold"><i class="bi bi-save me-2"></i>Update Car</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
