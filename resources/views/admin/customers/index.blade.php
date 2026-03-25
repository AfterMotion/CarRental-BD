@extends('layouts.admin')
@section('title','Manage Customers')
@section('page-title','Manage Customers')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <p class="text-muted mb-0">Total: {{ $customers->total() }} customers</p>
</div>
<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr><th>#</th><th>Name</th><th>Email</th><th>Phone</th><th>Address</th><th>Rentals</th><th>Actions</th></tr>
                </thead>
                <tbody>
                    @forelse($customers as $c)
                    <tr>
                        <td class="text-muted small">{{ $c->id }}</td>
                        <td class="fw-semibold">{{ $c->name }}</td>
                        <td>{{ $c->email }}</td>
                        <td>{{ $c->phone ?? '-' }}</td>
                        <td>{{ $c->address ?? '-' }}</td>
                        <td><span class="badge bg-primary">{{ $c->rentals_count ?? 0 }}</span></td>
                        <td>
                            <div class="d-flex gap-1">
                                <a href="{{ route('admin.customers.show', $c) }}" class="btn btn-sm btn-outline-info"><i class="bi bi-eye"></i></a>
                                <a href="{{ route('admin.customers.edit', $c) }}" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></a>
                                <form method="POST" action="{{ route('admin.customers.destroy', $c) }}" onsubmit="return confirm('Delete this customer?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="7" class="text-center text-muted py-5">No customers yet.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="mt-3">{{ $customers->links() }}</div>
@endsection
