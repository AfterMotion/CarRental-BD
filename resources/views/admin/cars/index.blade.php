@extends('layouts.admin')
@section('title','Manage Cars')
@section('page-title','Manage Cars')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <p class="text-muted mb-0">Total: {{ $cars->total() }} cars</p>
    </div>
    <a href="{{ route('admin.cars.create') }}" class="btn btn-danger fw-semibold"><i class="bi bi-plus-circle me-2"></i>Add New Car</a>
</div>
<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>#</th><th>Image</th><th>Name</th><th>Brand</th><th>Type</th><th>Year</th><th>Price/Day</th><th>Status</th><th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($cars as $car)
                    <tr>
                        <td class="text-muted small">{{ $car->id }}</td>
                        <td>
                            @if($car->image)
                                <img src="{{ asset('storage/'.$car->image) }}" style="width:50px;height:40px;object-fit:cover;border-radius:8px;">
                            @else
                                <div class="bg-light d-flex align-items-center justify-content-center" style="width:50px;height:40px;border-radius:8px;"><i class="bi bi-car-front text-muted"></i></div>
                            @endif
                        </td>
                        <td class="fw-semibold">{{ $car->name }}</td>
                        <td>{{ $car->brand }}</td>
                        <td><span class="badge bg-light text-dark">{{ $car->car_type }}</span></td>
                        <td>{{ $car->year }}</td>
                        <td class="fw-semibold">৳{{ number_format($car->daily_rent_price,0) }}</td>
                        <td>
                            @if($car->availability)
                                <span class="badge bg-success">Available</span>
                            @else
                                <span class="badge bg-danger">Unavailable</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex gap-1">
                                <a href="{{ route('admin.cars.edit', $car) }}" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></a>
                                <form method="POST" action="{{ route('admin.cars.destroy', $car) }}" onsubmit="return confirm('Delete this car?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="9" class="text-center text-muted py-5">No cars found. <a href="{{ route('admin.cars.create') }}">Add one!</a></td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="mt-3">{{ $cars->links() }}</div>
@endsection
