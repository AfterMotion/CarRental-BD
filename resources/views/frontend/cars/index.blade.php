@extends('layouts.app')
@section('title', 'Browse Cars')
@section('content')
<div class="container py-5">
    <h2 class="section-title mb-1">Available Cars</h2>
    <p class="text-muted mb-4">Find the perfect car for your journey</p>

    {{-- Filters --}}
    <div class="card p-4 mb-4">
        <form method="GET" action="{{ route('cars.index') }}">
            <div class="row g-3 align-items-end">
                <div class="col-md-3">
                    <label class="form-label fw-semibold small">Car Type</label>
                    <select name="car_type" id="car_type" class="form-select">
                        <option value="">All Types</option>
                        @foreach($carTypes as $type)
                            <option value="{{ $type }}" {{ request('car_type') == $type ? 'selected' : '' }}>{{ $type }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-semibold small">Brand</label>
                    <select name="brand" id="brand" class="form-select">
                        <option value="">All Brands</option>
                        @foreach($brands as $brand)
                            <option value="{{ $brand }}" {{ request('brand') == $brand ? 'selected' : '' }}>{{ $brand }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label fw-semibold small">Min Price (৳/day)</label>
                    <input type="number" name="min_price" id="min_price" class="form-control" placeholder="0" value="{{ request('min_price') }}">
                </div>
                <div class="col-md-2">
                    <label class="form-label fw-semibold small">Max Price (৳/day)</label>
                    <input type="number" name="max_price" id="max_price" class="form-control" placeholder="Any" value="{{ request('max_price') }}">
                </div>
                <div class="col-md-2 d-flex gap-2">
                    <button type="submit" class="btn btn-primary flex-fill fw-semibold"><i class="bi bi-funnel"></i> Filter</button>
                    <a href="{{ route('cars.index') }}" class="btn btn-outline-secondary"><i class="bi bi-x"></i></a>
                </div>
            </div>
        </form>
    </div>

    @if($cars->isEmpty())
        <div class="text-center py-5">
            <i class="bi bi-car-front text-muted" style="font-size:4rem;"></i>
            <h5 class="text-muted mt-3">No cars found matching your filters.</h5>
            <a href="{{ route('cars.index') }}" class="btn btn-primary mt-3">Clear Filters</a>
        </div>
    @else
        <div class="row g-4">
            @foreach($cars as $car)
            <div class="col-md-4">
                <div class="card h-100">
                    @if($car->image)
                        <img src="{{ asset('storage/' . $car->image) }}" class="card-img-top" style="height:200px;object-fit:cover;border-radius:16px 16px 0 0;" alt="{{ $car->name }}">
                    @else
                        <div class="d-flex align-items-center justify-content-center bg-light" style="height:200px;border-radius:16px 16px 0 0;">
                            <i class="bi bi-car-front text-secondary" style="font-size:4rem;"></i>
                        </div>
                    @endif
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h5 class="fw-bold mb-0">{{ $car->name }}</h5>
                            @if($car->availability)
                                <span class="badge-available small"><i class="bi bi-check-circle me-1"></i>Available</span>
                            @else
                                <span class="badge-unavailable small"><i class="bi bi-x-circle me-1"></i>Booked</span>
                            @endif
                        </div>
                        <div class="d-flex gap-2 flex-wrap mb-3">
                            <span class="badge bg-light text-dark">{{ $car->brand }}</span>
                            <span class="badge bg-light text-dark">{{ $car->car_type }}</span>
                            <span class="badge bg-light text-dark">{{ $car->year }}</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span class="text-danger fw-bold fs-5">৳{{ number_format($car->daily_rent_price, 0) }}</span>
                                <span class="text-muted small">/day</span>
                            </div>
                            <div class="d-flex gap-2">
                                <a href="{{ route('cars.show', $car) }}" class="btn btn-outline-secondary btn-sm">Details</a>
                                @if($car->availability)
                                    @auth
                                        <a href="{{ route('rentals.create', $car) }}" class="btn btn-primary btn-sm">Book Now</a>
                                    @else
                                        <a href="{{ route('login') }}" class="btn btn-primary btn-sm">Book Now</a>
                                    @endauth
                                @else
                                    <button class="btn btn-secondary btn-sm" disabled>Unavailable</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="mt-4">{{ $cars->links() }}</div>
    @endif
</div>
@endsection
