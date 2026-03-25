@extends('layouts.admin')
@section('title','Create Rental')
@section('page-title','Create Rental')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="card p-4">
            <a href="{{ route('admin.rentals.index') }}" class="btn btn-outline-secondary btn-sm mb-4 align-self-start" style="width:fit-content"><i class="bi bi-arrow-left me-1"></i>Back</a>
            @if($errors->any())
                <div class="alert alert-danger"><i class="bi bi-exclamation-triangle me-2"></i>{{ $errors->first() }}</div>
            @endif
            <form method="POST" action="{{ route('admin.rentals.store') }}">
                @csrf
                <div class="row g-3">
                    <div class="col-12">
                        <label class="form-label fw-semibold">Customer <span class="text-danger">*</span></label>
                        <select name="user_id" id="user_id" class="form-select" required>
                            <option value="">Select Customer</option>
                            @foreach($customers as $c)
                                <option value="{{ $c->id }}" {{ old('user_id')==$c->id?'selected':'' }}>{{ $c->name }} ({{ $c->email }})</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-semibold">Car <span class="text-danger">*</span></label>
                        <select name="car_id" id="car_id" class="form-select" required>
                            <option value="">Select Car</option>
                            @foreach($cars as $car)
                                <option value="{{ $car->id }}" {{ old('car_id')==$car->id?'selected':'' }}>{{ $car->name }} - {{ $car->brand }} (৳{{ number_format($car->daily_rent_price,0) }}/day)</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Start Date <span class="text-danger">*</span></label>
                        <input type="date" name="start_date" id="start_date" class="form-control" value="{{ old('start_date') }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">End Date <span class="text-danger">*</span></label>
                        <input type="date" name="end_date" id="end_date" class="form-control" value="{{ old('end_date') }}" required>
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-semibold">Status</label>
                        <select name="status" id="status" class="form-select">
                            <option value="ongoing" {{ old('status','ongoing')=='ongoing'?'selected':'' }}>Ongoing</option>
                            <option value="completed" {{ old('status')=='completed'?'selected':'' }}>Completed</option>
                            <option value="canceled" {{ old('status')=='canceled'?'selected':'' }}>Canceled</option>
                        </select>
                    </div>
                    <div class="col-12 mt-2">
                        <button type="submit" class="btn btn-danger px-5 fw-semibold"><i class="bi bi-plus-circle me-2"></i>Create Rental</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
