@extends('layouts.app')
@section('title', 'Create Account')
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg" style="border-radius:20px;">
                <div class="card-body p-5">
                    <div class="text-center mb-4">
                        <i class="bi bi-person-plus-fill text-danger" style="font-size:2.5rem;"></i>
                        <h3 class="fw-bold mt-2">Create Account</h3>
                        <p class="text-muted small">Join CarRental BD and start driving</p>
                    </div>
                    @if($errors->any())
                        <div class="alert alert-danger"><i class="bi bi-exclamation-triangle me-2"></i>{{ $errors->first() }}</div>
                    @endif
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label fw-semibold">Full Name</label>
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="John Doe" value="{{ old('name') }}" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold">Email Address</label>
                                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="you@example.com" value="{{ old('email') }}" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Min. 6 characters" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Confirm Password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Repeat password" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Phone <span class="text-muted fw-normal">(optional)</span></label>
                                <input type="text" name="phone" id="phone" class="form-control" placeholder="01700000000" value="{{ old('phone') }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Address <span class="text-muted fw-normal">(optional)</span></label>
                                <input type="text" name="address" id="address" class="form-control" placeholder="Your city" value="{{ old('address') }}">
                            </div>
                            <div class="col-12 mt-2">
                                <button type="submit" class="btn btn-primary w-100 py-2 fw-semibold">
                                    <i class="bi bi-person-plus me-2"></i>Create Account
                                </button>
                            </div>
                        </div>
                    </form>
                    <p class="text-center mt-4 mb-0 small">Already have an account? <a href="{{ route('login') }}" class="text-danger fw-semibold">Sign in</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
