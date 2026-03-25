@extends('layouts.app')
@section('title', $car->name)
@section('content')
<div class="container py-5">
    <a href="{{ route('cars.index') }}" class="btn btn-outline-secondary btn-sm mb-4"><i class="bi bi-arrow-left me-1"></i>Back to Cars</a>
    <div class="row g-5">
        <div class="col-md-6">
            @if($car->image)
                <img src="{{ asset('storage/' . $car->image) }}" class="img-fluid rounded-4 shadow" alt="{{ $car->name }}" style="width:100%;height:380px;object-fit:cover;">
            @else
                <div class="d-flex align-items-center justify-content-center bg-light rounded-4" style="height:380px;">
                    <i class="bi bi-car-front text-secondary" style="font-size:6rem;"></i>
                </div>
            @endif
        </div>
        <div class="col-md-6">
            <div class="d-flex align-items-center gap-3 mb-2">
                <h2 class="fw-bold mb-0">{{ $car->name }}</h2>
                @if($car->availability)
                    <span class="badge-available"><i class="bi bi-check-circle me-1"></i>Available</span>
                @else
                    <span class="badge-unavailable"><i class="bi bi-x-circle me-1"></i>Not Available</span>
                @endif
            </div>
            <p class="text-muted mb-4">{{ $car->brand }} &bull; {{ $car->model }} &bull; {{ $car->year }}</p>
            <div class="row g-3 mb-4">
                @php $specs = [
                    ['label'=>'Brand','value'=>$car->brand,'icon'=>'bi-tag'],
                    ['label'=>'Model','value'=>$car->model,'icon'=>'bi-card-text'],
                    ['label'=>'Year','value'=>$car->year,'icon'=>'bi-calendar3'],
                    ['label'=>'Car Type','value'=>$car->car_type,'icon'=>'bi-car-front'],
                ]; @endphp
                @foreach($specs as $s)
                <div class="col-6">
                    <div class="card p-3">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi {{ $s['icon'] }} text-danger"></i>
                            <div>
                                <div class="text-muted" style="font-size:0.72rem;text-transform:uppercase;letter-spacing:1px;">{{ $s['label'] }}</div>
                                <div class="fw-semibold">{{ $s['value'] }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="card p-4 mb-4" style="background:linear-gradient(135deg,#fff5f5,#fff);">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-muted small">Daily Rental Price</div>
                        <div class="text-danger fw-bold" style="font-size:2rem;">৳{{ number_format($car->daily_rent_price, 0) }}</div>
                        <div class="text-muted small">Payment: Cash on Delivery</div>
                    </div>
                    <i class="bi bi-cash-coin text-danger opacity-25" style="font-size:4rem;"></i>
                </div>
            </div>
            @if($car->availability)
                @auth
                    <a href="{{ route('rentals.create', $car) }}" class="btn btn-primary btn-lg w-100 fw-semibold">
                        <i class="bi bi-calendar-plus me-2"></i>Book This Car
                    </a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary btn-lg w-100 fw-semibold">
                        <i class="bi bi-box-arrow-in-right me-2"></i>Login to Book
                    </a>
                @endauth
            @else
                <button class="btn btn-secondary btn-lg w-100" disabled>Currently Not Available</button>
            @endif
        </div>
    </div>
</div>
@endsection
