@extends('layouts.app')
@section('title', 'Login')
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-lg" style="border-radius:20px;">
                <div class="card-body p-5">
                    <div class="text-center mb-4">
                        <i class="bi bi-car-front-fill text-danger" style="font-size:2.5rem;"></i>
                        <h3 class="fw-bold mt-2">Welcome Back</h3>
                        <p class="text-muted small">Sign in to your CarRental account</p>
                    </div>
                    @if($errors->any())
                        <div class="alert alert-danger"><i class="bi bi-exclamation-triangle me-2"></i>{{ $errors->first() }}</div>
                    @endif
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Email Address</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"><i class="bi bi-envelope text-muted"></i></span>
                                <input type="email" name="email" id="email" class="form-control border-start-0 ps-0 @error('email') is-invalid @enderror" placeholder="you@example.com" value="{{ old('email') }}" required>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Password</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"><i class="bi bi-lock text-muted"></i></span>
                                <input type="password" name="password" id="password" class="form-control border-start-0 ps-0" placeholder="••••••••" required>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                <label class="form-check-label small" for="remember">Remember me</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 py-2 fw-semibold">
                            <i class="bi bi-box-arrow-in-right me-2"></i>Sign In
                        </button>
                    </form>
                    <p class="text-center mt-4 mb-0 small">Don't have an account? <a href="{{ route('register') }}" class="text-danger fw-semibold">Sign up free</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
