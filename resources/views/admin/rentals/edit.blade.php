@extends('layouts.admin')
@section('title','Edit Rental')
@section('page-title','Edit Rental')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="card p-4">
            <a href="{{ route('admin.rentals.index') }}" class="btn btn-outline-secondary btn-sm mb-4 align-self-start" style="width:fit-content"><i class="bi bi-arrow-left me-1"></i>Back</a>
            <div class="mb-4 p-3 bg-light rounded-3">
                <div class="text-muted small">Rental #{{ $rental->id }}</div>
                <div class="fw-semibold">{{ $rental->user->name ?? 'N/A' }} &rarr; {{ $rental->car->name ?? 'N/A' }}</div>
                <div class="text-muted small">{{ $rental->start_date->format('d M Y') }} - {{ $rental->end_date->format('d M Y') }} &bull; ৳{{ number_format($rental->total_cost,0) }}</div>
            </div>
            <form method="POST" action="{{ route('admin.rentals.update', $rental) }}">
                @csrf @method('PUT')
                <div class="mb-3">
                    <label class="form-label fw-semibold">Update Status</label>
                    <select name="status" id="status" class="form-select form-select-lg" required>
                        <option value="ongoing" {{ $rental->status=='ongoing'?'selected':'' }}>🟡 Ongoing</option>
                        <option value="completed" {{ $rental->status=='completed'?'selected':'' }}>🟢 Completed</option>
                        <option value="canceled" {{ $rental->status=='canceled'?'selected':'' }}>⚪ Canceled</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary px-5 fw-semibold"><i class="bi bi-save me-2"></i>Update Status</button>
            </form>
        </div>
    </div>
</div>
@endsection
