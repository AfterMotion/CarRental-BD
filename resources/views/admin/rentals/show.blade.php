@extends('layouts.admin')
@section('title','Rental Detail')
@section('page-title','Rental Detail')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="card p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="fw-bold mb-0">Rental #{{ $rental->id }}</h5>
                @php $c=['ongoing'=>'warning','completed'=>'success','canceled'=>'secondary'][$rental->status]??'dark'; @endphp
                <span class="badge bg-{{ $c }} text-capitalize fs-6">{{ $rental->status }}</span>
            </div>
            <div class="row g-3 mb-4">
                <div class="col-6">
                    <div class="p-3 bg-light rounded-3">
                        <div class="text-muted small mb-1">Customer Name</div>
                        <div class="fw-semibold">{{ $rental->user->name ?? 'N/A' }}</div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="p-3 bg-light rounded-3">
                        <div class="text-muted small mb-1">Customer Email</div>
                        <div class="fw-semibold">{{ $rental->user->email ?? 'N/A' }}</div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="p-3 bg-light rounded-3">
                        <div class="text-muted small mb-1">Car Name</div>
                        <div class="fw-semibold">{{ $rental->car->name ?? 'N/A' }}</div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="p-3 bg-light rounded-3">
                        <div class="text-muted small mb-1">Brand</div>
                        <div class="fw-semibold">{{ $rental->car->brand ?? 'N/A' }}</div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="p-3 bg-light rounded-3">
                        <div class="text-muted small mb-1">Start Date</div>
                        <div class="fw-semibold">{{ $rental->start_date->format('d M Y') }}</div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="p-3 bg-light rounded-3">
                        <div class="text-muted small mb-1">End Date</div>
                        <div class="fw-semibold">{{ $rental->end_date->format('d M Y') }}</div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="p-3 rounded-3" style="background:linear-gradient(135deg,#fff5f5,#fff);border:1px solid #fecdd3;">
                        <div class="text-muted small mb-1">Total Cost</div>
                        <div class="text-danger fw-bold fs-4">৳{{ number_format($rental->total_cost, 0) }}</div>
                    </div>
                </div>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('admin.rentals.edit', $rental) }}" class="btn btn-primary fw-semibold"><i class="bi bi-pencil me-2"></i>Edit Status</a>
                <a href="{{ route('admin.rentals.index') }}" class="btn btn-outline-secondary">Back to List</a>
            </div>
        </div>
    </div>
</div>
@endsection
