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
.total-box{background:#fff5f5;border-radius:8px;padding:16px;margin-top:20px;text-align:center;}
.total-box .amount{color:#e63946;font-size:2rem;font-weight:800;}
.footer{background:#f8f8f8;padding:20px;text-align:center;color:#999;font-size:0.85rem;}
</style></head>
<body>
<div class="container">
    <div class="header">
        <h1>🚗 Booking Confirmed!</h1>
        <p style="margin:8px 0 0;opacity:0.9;">Thank you for choosing CarRental BD</p>
    </div>
    <div class="body">
        <p>Hi <strong>{{ $rental->user->name }}</strong>,</p>
        <p>Your car rental booking has been <strong>confirmed</strong>. Here are the details:</p>

        <div class="detail-row"><span class="detail-label">Booking ID</span><span class="detail-value">#{{ $rental->id }}</span></div>
        <div class="detail-row"><span class="detail-label">Car</span><span class="detail-value">{{ $rental->car->name }} ({{ $rental->car->brand }})</span></div>
        <div class="detail-row"><span class="detail-label">Car Type</span><span class="detail-value">{{ $rental->car->car_type }}</span></div>
        <div class="detail-row"><span class="detail-label">Start Date</span><span class="detail-value">{{ $rental->start_date->format('d M Y') }}</span></div>
        <div class="detail-row"><span class="detail-label">End Date</span><span class="detail-value">{{ $rental->end_date->format('d M Y') }}</span></div>
        <div class="detail-row"><span class="detail-label">Duration</span><span class="detail-value">{{ $rental->start_date->diffInDays($rental->end_date) }} day(s)</span></div>
        <div class="detail-row"><span class="detail-label">Daily Rate</span><span class="detail-value">৳{{ number_format($rental->car->daily_rent_price, 0) }}/day</span></div>
        <div class="detail-row"><span class="detail-label">Payment Mode</span><span class="detail-value" style="color:green;">Cash on Delivery</span></div>

        <div class="total-box">
            <div style="color:#666;margin-bottom:4px;font-size:0.9rem;">Total Amount Due</div>
            <div class="amount">৳{{ number_format($rental->total_cost, 0) }}</div>
            <div style="color:#999;font-size:0.8rem;">To be paid in cash upon delivery</div>
        </div>

        <p style="margin-top:24px;color:#666;font-size:0.9rem;">If you have any questions, please contact us at <a href="mailto:info@carrental.bd">info@carrental.bd</a> or call +880 1700-000000.</p>
    </div>
    <div class="footer">
        &copy; {{ date('Y') }} CarRental BD. All rights reserved.
    </div>
</div>
</body>
</html>
