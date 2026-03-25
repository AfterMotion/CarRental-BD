@extends('layouts.admin')
@section('title','Dashboard')
@section('page-title','Dashboard Overview')
@section('content')
<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="stat-card" style="background:linear-gradient(135deg,#e63946,#c1121f);">
            <div class="small opacity-75 mb-1">Total Cars</div>
            <div class="display-6 fw-bold">{{ $totalCars }}</div>
            <i class="bi bi-car-front position-absolute" style="right:1rem;bottom:1rem;font-size:2.5rem;opacity:0.3;"></i>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card" style="background:linear-gradient(135deg,#2ec4b6,#17a89a);">
            <div class="small opacity-75 mb-1">Available Cars</div>
            <div class="display-6 fw-bold">{{ $availableCars }}</div>
            <i class="bi bi-check-circle position-absolute" style="right:1rem;bottom:1rem;font-size:2.5rem;opacity:0.3;"></i>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card" style="background:linear-gradient(135deg,#ff9f1c,#e07b00);">
            <div class="small opacity-75 mb-1">Total Rentals</div>
            <div class="display-6 fw-bold">{{ $totalRentals }}</div>
            <i class="bi bi-calendar-week position-absolute" style="right:1rem;bottom:1rem;font-size:2.5rem;opacity:0.3;"></i>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card" style="background:linear-gradient(135deg,#6c63ff,#4b44cc);">
            <div class="small opacity-75 mb-1">Total Earnings</div>
            <div class="display-6 fw-bold">৳{{ number_format($totalEarnings, 0) }}</div>
            <i class="bi bi-cash-stack position-absolute" style="right:1rem;bottom:1rem;font-size:2.5rem;opacity:0.3;"></i>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6 class="fw-bold mb-0">Recent Rentals</h6>
                    <a href="{{ route('admin.rentals.index') }}" class="btn btn-sm btn-outline-primary">View All</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr><th>#</th><th>Customer</th><th>Car</th><th>Start</th><th>End</th><th>Total</th><th>Status</th></tr>
                        </thead>
                        <tbody>
                            @forelse($recentRentals as $r)
                            <tr>
                                <td class="text-muted small">#{{ $r->id }}</td>
                                <td class="fw-semibold">{{ $r->user->name ?? 'N/A' }}</td>
                                <td>{{ $r->car->name ?? 'N/A' }}</td>
                                <td class="small">{{ \Carbon\Carbon::parse($r->start_date)->format('d M') }}</td>
                                <td class="small">{{ \Carbon\Carbon::parse($r->end_date)->format('d M') }}</td>
                                <td class="fw-semibold">৳{{ number_format($r->total_cost,0) }}</td>
                                <td>
                                    @php $c=['ongoing'=>'warning','completed'=>'success','canceled'=>'secondary'][$r->status]??'dark'; @endphp
                                    <span class="badge bg-{{ $c }} text-capitalize">{{ $r->status }}</span>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="7" class="text-center text-muted py-4">No rentals yet</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h6 class="fw-bold mb-3">Quick Actions</h6>
                <div class="d-flex flex-column gap-2">
                    <a href="{{ route('admin.cars.create') }}" class="btn btn-danger fw-semibold"><i class="bi bi-plus-circle me-2"></i>Add New Car</a>
                    <a href="{{ route('admin.rentals.create') }}" class="btn btn-outline-warning fw-semibold"><i class="bi bi-calendar-plus me-2"></i>Create Rental</a>
                    <a href="{{ route('admin.customers.index') }}" class="btn btn-outline-secondary fw-semibold"><i class="bi bi-people me-2"></i>View Customers</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
