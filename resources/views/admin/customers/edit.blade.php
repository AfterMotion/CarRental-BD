@extends('layouts.admin')
@section('title','Edit Customer')
@section('page-title','Edit Customer')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="card p-4">
            <a href="{{ route('admin.customers.index') }}" class="btn btn-outline-secondary btn-sm mb-4 align-self-start" style="width:fit-content"><i class="bi bi-arrow-left me-1"></i>Back</a>
            @if($errors->any())
                <div class="alert alert-danger"><i class="bi bi-exclamation-triangle me-2"></i>{{ $errors->first() }}</div>
            @endif
            <form method="POST" action="{{ route('admin.customers.update', $customer) }}">
                @csrf @method('PUT')
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name',$customer->name) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email',$customer->email) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Phone</label>
                        <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone',$customer->phone) }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Address</label>
                        <input type="text" name="address" id="address" class="form-control" value="{{ old('address',$customer->address) }}">
                    </div>
                    <div class="col-12 mt-2">
                        <button type="submit" class="btn btn-primary px-5 fw-semibold"><i class="bi bi-save me-2"></i>Update Customer</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
