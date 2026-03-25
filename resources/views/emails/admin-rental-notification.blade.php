<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><style>
body{font-family:Arial,sans-serif;background:#f5f5f5;margin:0;padding:20px;}
.container{max-width:600px;margin:0 auto;background:#fff;border-radius:12px;overflow:hidden;box-shadow:0 4px 16px rgba(0,0,0,0.1);}
.header{background:linear-gradient(135deg,#1d1d1d,#e63946);color:white;padding:32px;text-align:center;}
.header h1{margin:0;font-size:1.6rem;}
.body{padding:32px;}
.detail-row{display:flex;justify-content:space-between;padding:12px 0;border-bottom:1px solid #f0f0f0;}
.detail-label{color:#666;font-size:0.9rem;}
.detail-value{font-weight:600;}
.alert-box{background:#fff3cd;border:1px solid #ffc107;border-radius:8px;padding:16px;margin-bottom:20px;}
.footer{background:#f8f8f8;padding:20px;text-align:center;color:#999;font-size:0.85rem;}
</style></head>
<body>
<div class="container">
    <div class="header">
        <h1>🔔 New Rental Alert!</h1>
        <p style="margin:8px 0 0;opacity:0.9;">A car has been rented on CarRental BD</p>
    </div>
    <div class="body">
        <div class="alert-box">
            <strong>Admin Notice:</strong> A new car rental booking has been created.
        </div>

        <h5 style="color:#333;margin-bottom:16px;">Customer Details</h5>
        <div class="detail-row"><span class="detail-label">Customer Name</span><span class="detail-value">{{ $rental->user->name }}</span></div>
        <div class="detail-row"><span class="detail-label">Email</span><span class="detail-value">{{ $rental->user->email }}</span></div>
        <div class="detail-row"><span class="detail-label">Phone</span><span class="detail-value">{{ $rental->user->phone ?? 'N/A' }}</span></div>
        <div class="detail-row"><span class="detail-label">Address</span><span class="detail-value">{{ $rental->user->address ?? 'N/A' }}</span></div>

        <h5 style="color:#333;margin:20px 0 16px;">Rental Details</h5>
        <div class="detail-row"><span class="detail-label">Booking ID</span><span class="detail-value">#{{ $rental->id }}</span></div>
        <div class="detail-row"><span class="detail-label">Car</span><span class="detail-value">{{ $rental->car->name }} ({{ $rental->car->brand }})</span></div>
        <div class="detail-row"><span class="detail-label">Start Date</span><span class="detail-value">{{ $rental->start_date->format('d M Y') }}</span></div>
        <div class="detail-row"><span class="detail-label">End Date</span><span class="detail-value">{{ $rental->end_date->format('d M Y') }}</span></div>
        <div class="detail-row"><span class="detail-label">Duration</span><span class="detail-value">{{ $rental->start_date->diffInDays($rental->end_date) }} day(s)</span></div>
        <div class="detail-row"><span class="detail-label">Total Cost</span><span class="detail-value" style="color:#e63946;">৳{{ number_format($rental->total_cost, 0) }}</span></div>
    </div>
    <div class="footer">
        &copy; {{ date('Y') }} CarRental BD Admin System
    </div>
</div>
</body>
</html>
