@extends('layouts.app')
@section('title', 'Contact Us')
@section('content')
<div class="py-5" style="background:linear-gradient(135deg,#1d1d1d,#e63946);color:white;text-align:center;padding:80px 0 !important;">
    <div class="container">
        <h1 class="fw-bold display-5">Contact Us</h1>
        <p class="lead opacity-75">We'd love to hear from you</p>
    </div>
</div>
<div class="container py-5">
    <div class="row g-5">
        <div class="col-md-5">
            <h4 class="fw-bold mb-4">Get in Touch</h4>
            <div class="d-flex flex-column gap-4">
                <div class="d-flex gap-3 align-items-start">
                    <div class="rounded-circle bg-danger bg-opacity-10 d-flex align-items-center justify-content-center flex-shrink-0" style="width:48px;height:48px;">
                        <i class="bi bi-telephone-fill text-danger"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold mb-1">Phone</h6>
                        <p class="text-muted mb-0">+880 1700-000000</p>
                        <p class="text-muted mb-0">+880 1800-000000</p>
                    </div>
                </div>
                <div class="d-flex gap-3 align-items-start">
                    <div class="rounded-circle bg-danger bg-opacity-10 d-flex align-items-center justify-content-center flex-shrink-0" style="width:48px;height:48px;">
                        <i class="bi bi-envelope-fill text-danger"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold mb-1">Email</h6>
                        <p class="text-muted mb-0">info@carrental.bd</p>
                        <p class="text-muted mb-0">support@carrental.bd</p>
                    </div>
                </div>
                <div class="d-flex gap-3 align-items-start">
                    <div class="rounded-circle bg-danger bg-opacity-10 d-flex align-items-center justify-content-center flex-shrink-0" style="width:48px;height:48px;">
                        <i class="bi bi-geo-alt-fill text-danger"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold mb-1">Address</h6>
                        <p class="text-muted mb-0">123 Gulshan Avenue, Dhaka 1212, Bangladesh</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card p-4">
                <h5 class="fw-bold mb-4">Send a Message</h5>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Name</label>
                        <input type="text" class="form-control" placeholder="Your name">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Email</label>
                        <input type="email" class="form-control" placeholder="you@example.com">
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-semibold">Subject</label>
                        <input type="text" class="form-control" placeholder="How can we help?">
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-semibold">Message</label>
                        <textarea class="form-control" rows="4" placeholder="Your message..."></textarea>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary px-4 py-2 fw-semibold">
                            <i class="bi bi-send me-2"></i>Send Message
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
