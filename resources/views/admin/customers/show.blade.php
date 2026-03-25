@extends('layouts.admin')
@section('title','Customer Profile')
@section('page-title','Customer Profile')
@section('content')
<div class="row g-4">
    <div class="col-md-4">
        <div class="card p-4 text-center">
            <div class="rounded-circle bg-danger bg-opacity-10 d-flex align-items-center justify-content-center mx-auto mb-3" style="width:72px;height:72px;">
                <i class="bi bi-person-fill text-danger" style="font-size:2rem;"></i>
            </div>
            <h5 class="fw-bold mb-1">{{ $customer->name }}</h5>
            <div class="text-muted small mb-3">{{ $customer->email }}</div>
            <div class="d-flex flex-column gap-2 text-start">
                <div><i class="bi bi-telephone me-2 text-danger"></i>{{ $customer->phone ?? 'N/A' }}</div>
                <div><i class="bi bi-geo-alt me-2 text-danger"></i>{{ $customer->address ?? 'N/A' }}</div>
                <div><i class="bi bi-calendar me-2 text-danger"></i>Joined {{ $customer->created_at->format('M Y') }}</div>
            </div>
            <hr>
            <a href="{{ route('admin.customers.edit', $customer) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil me-1"></i>Edit Profile</a>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <h6 class="fw-bold mb-3">Rental History</h6>
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead><tr><th>#</th><th>Car</th><th>Start</th><th>End</th><th>Total</th><th>Status</th></tr></thead>
                        <tbody>
                            @forelse($customer->rentals as $r)
                            <tr>
                                <td class="small text-muted">#{{ $r->id }}</td>
                                <td class="fw-semibold">{{ $r->car->name ?? 'Deleted' }}</td>
                                <td class="small">{{ $r->start_date->format('d M Y') }}</td>
                                <td class="small">{{ $r->end_date->format('d M Y') }}</td>
                                <td>৳{{ number_format($r->total_cost,0) }}</td>
                                <td>
                                    @php $c=['ongoing'=>'warning','completed'=>'success','canceled'=>'secondary'][$r->status]??'dark'; @endphp
                                    <span class="badge bg-{{ $c }} text-capitalize">{{ $r->status }}</span>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="6" class="text-center text-muted py-3">No rental history.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<a href="{{ route('admin.customers.index') }}" class="btn btn-outline-secondary mt-3"><i class="bi bi-arrow-left me-1"></i>Back</a>
@endsection
