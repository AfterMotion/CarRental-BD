@extends('layouts.app')
@section('title', 'Book ' . $car->name)
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <a href="{{ route('cars.show', $car) }}" class="btn btn-outline-secondary btn-sm mb-4"><i class="bi bi-arrow-left me-1"></i>Back</a>
            <div class="row g-4">
                <div class="col-md-5">
                    <div class="card p-4 h-100">
                        <h6 class="fw-bold text-muted text-uppercase small mb-3">Booking Summary</h6>
                        @if($car->image)
                            <img src="{{ asset('storage/' . $car->image) }}" class="img-fluid rounded-3 mb-3" style="height:150px;object-fit:cover;">
                        @endif
                        <h5 class="fw-bold mb-1">{{ $car->name }}</h5>
                        <div class="text-muted small mb-3">{{ $car->brand }} &bull; {{ $car->car_type }} &bull; {{ $car->year }}</div>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <span class="text-muted small">Daily Rate</span>
                            <span class="fw-semibold">৳{{ number_format($car->daily_rent_price, 0) }}</span>
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <span class="text-muted small">Payment Mode</span>
                            <span class="fw-semibold text-success">Cash on Delivery</span>
                        </div>
                        <div class="mt-3 p-3 bg-light rounded-3">
                            <div class="text-muted small mb-1">Estimated Total</div>
                            <div class="text-danger fw-bold fs-4" id="totalCost">৳0</div>
                            <div class="text-muted small" id="daysCount">Select dates to calculate</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="card p-4">
                        <h5 class="fw-bold mb-4"><i class="bi bi-calendar-plus text-danger me-2"></i>Book This Car</h5>
                        @if($errors->any())
                            <div class="alert alert-danger"><i class="bi bi-exclamation-triangle me-2"></i>{{ $errors->first() }}</div>
                        @endif
                        <form method="POST" action="{{ route('rentals.store', $car) }}" id="bookingForm">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Customer Name</label>
                                <input type="text" class="form-control bg-light" value="{{ auth()->user()->name }}" disabled>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Start Date <span class="text-danger">*</span></label>
                                <input type="date" name="start_date" id="start_date" class="form-control @error('start_date') is-invalid @enderror"
                                    min="{{ date('Y-m-d') }}" value="{{ old('start_date') }}" required>
                            </div>
                            <div class="mb-4">
                                <label class="form-label fw-semibold">End Date <span class="text-danger">*</span></label>
                                <input type="date" name="end_date" id="end_date" class="form-control @error('end_date') is-invalid @enderror"
                                    min="{{ date('Y-m-d', strtotime('+1 day')) }}" value="{{ old('end_date') }}" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100 py-2 fw-semibold btn-lg">
                                <i class="bi bi-check-circle me-2"></i>Confirm Booking
                            </button>
                            <p class="text-center text-muted small mt-3 mb-0"><i class="bi bi-info-circle me-1"></i>A confirmation email will be sent to {{ auth()->user()->email }}</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
const dailyRate = {{ $car->daily_rent_price }};
function calcCost() {
    const start = document.getElementById('start_date').value;
    const end = document.getElementById('end_date').value;
    if (start && end) {
        const diff = (new Date(end) - new Date(start)) / (1000*60*60*24);
        if (diff > 0) {
            document.getElementById('totalCost').textContent = '৳' + (diff * dailyRate).toLocaleString('en-IN');
            document.getElementById('daysCount').textContent = diff + ' day(s) × ৳' + dailyRate.toLocaleString('en-IN');
            document.getElementById('end_date').min = new Date(new Date(start).getTime() + 86400000).toISOString().split('T')[0];
        }
    }
}
document.getElementById('start_date').addEventListener('change', calcCost);
document.getElementById('end_date').addEventListener('change', calcCost);
</script>
@endpush
@endsection
