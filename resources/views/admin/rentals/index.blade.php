@extends('layouts.admin')
@section('title','Manage Rentals')
@section('page-title','Manage Rentals')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <p class="text-muted mb-0">Total: {{ $rentals->total() }} rentals</p>
    <a href="{{ route('admin.rentals.create') }}" class="btn btn-danger fw-semibold"><i class="bi bi-plus-circle me-2"></i>New Rental</a>
</div>
<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr><th>#</th><th>Customer</th><th>Car</th><th>Start</th><th>End</th><th>Total</th><th>Status</th><th>Actions</th></tr>
                </thead>
                <tbody>
                    @forelse($rentals as $r)
                    <tr>
                        <td class="text-muted small">#{{ $r->id }}</td>
                        <td class="fw-semibold">{{ $r->user->name ?? 'N/A' }}<br><span class="text-muted small">{{ $r->user->email ?? '' }}</span></td>
                        <td>{{ $r->car->name ?? 'N/A' }}<br><span class="text-muted small">{{ $r->car->brand ?? '' }}</span></td>
                        <td class="small">{{ \Carbon\Carbon::parse($r->start_date)->format('d M Y') }}</td>
                        <td class="small">{{ \Carbon\Carbon::parse($r->end_date)->format('d M Y') }}</td>
                        <td class="fw-semibold">৳{{ number_format($r->total_cost,0) }}</td>
                        <td>
                            @php $c=['ongoing'=>'warning','completed'=>'success','canceled'=>'secondary'][$r->status]??'dark'; @endphp
                            <span class="badge bg-{{ $c }} text-capitalize">{{ $r->status }}</span>
                        </td>
                        <td>
                            <div class="d-flex gap-1">
                                <a href="{{ route('admin.rentals.show', $r) }}" class="btn btn-sm btn-outline-info"><i class="bi bi-eye"></i></a>
                                <a href="{{ route('admin.rentals.edit', $r) }}" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></a>
                                <form method="POST" action="{{ route('admin.rentals.destroy', $r) }}" onsubmit="return confirm('Delete this rental?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="8" class="text-center text-muted py-5">No rentals found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="mt-3">{{ $rentals->links() }}</div>
@endsection
