@extends('layouts.app')
@section('title', 'About Us')
@section('content')
    <div class="py-5"
        style="background:linear-gradient(135deg,#1d1d1d,#e63946);color:white;text-align:center;padding:80px 0 !important;">
        <div class="container">
            <h1 class="fw-bold display-5">About CarRental BD</h1>
            <p class="lead opacity-75">Bangladesh's most trusted car rental service since 2020</p>
        </div>
    </div>
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-md-6">
                <h2 class="section-title">Our Story</h2>
                <p class="text-muted">CarRental BD was founded with a simple mission - make car renting easy, transparent,
                    and affordable for everyone in Bangladesh. We believe everyone deserves access to quality vehicles
                    without the hassle of ownership.</p>
                <p class="text-muted">We operate across Dhaka, Chittagong, Sylhet, and Rajshahi, offering a diverse fleet of
                    vehicles ranging from compact Sedans to spacious SUVs.</p>
                <div class="row g-3 mt-2">
                    <div class="col-6">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-check-circle-fill text-danger fs-5"></i>
                            <span class="fw-semibold">No Hidden Fees</span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-check-circle-fill text-danger fs-5"></i>
                            <span class="fw-semibold">Cash Payment</span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-check-circle-fill text-danger fs-5"></i>
                            <span class="fw-semibold">Fully Insured</span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-check-circle-fill text-danger fs-5"></i>
                            <span class="fw-semibold">24/7 Support</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row g-3">
                    <div class="col-6">
                        <div class="card p-4 text-center">
                            <div class="fw-bold text-danger" style="font-size:2rem;">500+</div>
                            <div class="text-muted small">Happy Customers</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card p-4 text-center">
                            <div class="fw-bold text-danger" style="font-size:2rem;">50+</div>
                            <div class="text-muted small">Fleet Size</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card p-4 text-center">
                            <div class="fw-bold text-danger" style="font-size:2rem;">5+</div>
                            <div class="text-muted small">Years of Service</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card p-4 text-center">
                            <div class="fw-bold text-danger" style="font-size:2rem;">4</div>
                            <div class="text-muted small">Cities Covered</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
