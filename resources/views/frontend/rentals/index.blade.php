@extends('layouts.app')
@section('title', 'My Bookings')
@section('content')
<div class="container py-5">
    <h2 class="section-title mb-1">My Bookings</h2>
    <p class="text-muted mb-4">View and manage your car rentals</p>

    @if($rentals->isEmpty())
        <div class="text-center py-5">
            <i class="bi bi-calendar-x text-muted" style="font-size:4rem;"></i>
            <h5 class="text-muted mt-3">No bookings yet!</h5>
            <a href="{{ route('cars.index') }}" class="btn btn-primary mt-3">Browse Cars</a>
        </div>
    @else
        <div class="row g-4">
            @foreach($rentals as $rental)
            <div class="col-md-6">
                <div class="card p-4">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div>
                            <h6 class="fw-bold mb-1">{{ $rental->car->name ?? 'Car Deleted' }}</h6>
                            <span class="text-muted small">{{ $rental->car->brand ?? '' }} &bull; {{ $rental->car->car_type ?? '' }}</span>
                        </div>
                        @php
                            $badgeColor = ['ongoing'=>'warning','completed'=>'success','canceled'=>'secondary'][$rental->status] ?? 'dark';
                        @endphp
                        <span class="badge bg-{{ $badgeColor }} text-capitalize">{{ $rental->status }}</span>
                    </div>
                    <div class="row g-2 mb-3">
                        <div class="col-6">
                            <div class="bg-light rounded-3 p-2 text-center">
                                <div class="text-muted small">Start Date</div>
                                <div class="fw-semibold">{{ $rental->start_date->format('d M, Y') }}</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="bg-light rounded-3 p-2 text-center">
                                <div class="text-muted small">End Date</div>
                                <div class="fw-semibold">{{ $rental->end_date->format('d M, Y') }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <span class="text-muted small">Total Cost: </span>
                            <span class="text-danger fw-bold">৳{{ number_format($rental->total_cost, 0) }}</span>
                        </div>
                        @if($rental->status === 'ongoing' && !\Carbon\Carbon::parse($rental->start_date)->isPast())
                            <form method="POST" action="{{ route('rentals.cancel', $rental) }}" onsubmit="return confirm('Cancel this booking?')">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger btn-sm">
                                    <i class="bi bi-x-circle me-1"></i>Cancel
                                </button>
                            </form>
                        @elseif($rental->status === 'ongoing')
                            <span class="badge bg-info">In Progress</span>
                        @endif
                    </div>
                    <div class="text-muted small mt-2">Booking ID: #{{ $rental->id }}</div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="mt-4">{{ $rentals->links() }}</div>
    @endif
</div>
@endsection
