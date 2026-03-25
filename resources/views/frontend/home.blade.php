@extends('layouts.app')
@section('title', 'Home - CarRental BD')
@section('content')

{{-- Hero --}}
<section class="hero-section">
    <div class="container text-center">
        <span class="badge bg-danger bg-opacity-75 px-3 py-2 mb-3 rounded-pill">🚗 Bangladesh's #1 Car Rental</span>
        <h1 class="display-4 fw-bold mb-3">Rent Your Dream Car<br>Instantly</h1>
        <p class="lead mb-4 opacity-75">Browse hundreds of cars. Simple booking. Transparent pricing. No hidden fees.</p>
        <div class="d-flex gap-3 justify-content-center">
            <a href="{{ route('cars.index') }}" class="btn btn-danger btn-lg px-5 fw-semibold">
                <i class="bi bi-search me-2"></i>Browse Cars
            </a>
            @guest
            <a href="{{ route('register') }}" class="btn btn-outline-light btn-lg px-5 fw-semibold">Get Started</a>
            @endguest
        </div>
    </div>
</section>

{{-- Stats --}}
<section class="py-5 bg-white">
    <div class="container">
        <div class="row g-4 text-center">
            <div class="col-6 col-md-3">
                <div class="p-4">
                    <div class="text-danger fw-bold" style="font-size:2.2rem;">500+</div>
                    <div class="text-muted fw-semibold">Happy Customers</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="p-4">
                    <div class="text-danger fw-bold" style="font-size:2.2rem;">50+</div>
                    <div class="text-muted fw-semibold">Premium Cars</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="p-4">
                    <div class="text-danger fw-bold" style="font-size:2.2rem;">24/7</div>
                    <div class="text-muted fw-semibold">Customer Support</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="p-4">
                    <div class="text-danger fw-bold" style="font-size:2.2rem;">5★</div>
                    <div class="text-muted fw-semibold">Avg Rating</div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- How it works --}}
<section class="py-5">
    <div class="container">
        <h2 class="section-title text-center mb-2">How It Works</h2>
        <p class="text-center text-muted mb-5">Rent a car in just 3 simple steps</p>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 text-center p-4">
                    <div class="rounded-circle bg-danger bg-opacity-10 d-inline-flex align-items-center justify-content-center mx-auto mb-3" style="width:64px;height:64px;">
                        <i class="bi bi-car-front text-danger" style="font-size:1.6rem;"></i>
                    </div>
                    <h5 class="fw-bold">1. Browse Cars</h5>
                    <p class="text-muted small">Filter by type, brand, and budget to find your perfect car.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 text-center p-4">
                    <div class="rounded-circle bg-danger bg-opacity-10 d-inline-flex align-items-center justify-content-center mx-auto mb-3" style="width:64px;height:64px;">
                        <i class="bi bi-calendar-check text-danger" style="font-size:1.6rem;"></i>
                    </div>
                    <h5 class="fw-bold">2. Book & Confirm</h5>
                    <p class="text-muted small">Select your dates, confirm the booking, and receive an email confirmation.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 text-center p-4">
                    <div class="rounded-circle bg-danger bg-opacity-10 d-inline-flex align-items-center justify-content-center mx-auto mb-3" style="width:64px;height:64px;">
                        <i class="bi bi-key text-danger" style="font-size:1.6rem;"></i>
                    </div>
                    <h5 class="fw-bold">3. Drive Away</h5>
                    <p class="text-muted small">Pick up your car and enjoy the journey. Pay in cash on delivery.</p>
                </div>
            </div>
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('cars.index') }}" class="btn btn-primary btn-lg px-5">View All Cars <i class="bi bi-arrow-right ms-2"></i></a>
        </div>
    </div>
</section>

{{-- Why Choose Us --}}
<section class="py-5 bg-white">
    <div class="container">
        <h2 class="section-title text-center mb-5">Why Choose CarRental BD?</h2>
        <div class="row g-4">
            @php
                $features = [
                    ['icon'=>'bi-shield-check','title'=>'Fully Insured','desc'=>'All cars are fully insured for your peace of mind.'],
                    ['icon'=>'bi-cash-coin','title'=>'Cash on Delivery','desc'=>'Pay in cash when you pick up your car. No online payment needed.'],
                    ['icon'=>'bi-headset','title'=>'24/7 Support','desc'=>'Our team is always available to help you.'],
                    ['icon'=>'bi-geo-alt','title'=>'Wide Coverage','desc'=>'Available across major cities in Bangladesh.'],
                ];
            @endphp
            @foreach($features as $f)
            <div class="col-md-3 col-6">
                <div class="text-center p-3">
                    <i class="bi {{ $f['icon'] }} text-danger" style="font-size:2rem;"></i>
                    <h6 class="fw-bold mt-2 mb-1">{{ $f['title'] }}</h6>
                    <p class="text-muted small mb-0">{{ $f['desc'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
