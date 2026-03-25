<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="CarRental BD - Rent Your Dream Car Today">
    <title>@yield('title', 'CarRental BD')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #e63946;
            --primary-dark: #c1121f;
            --dark: #1d1d1d;
            --card-shadow: 0 4px 24px rgba(0,0,0,0.08);
        }
        body { font-family: 'Inter', sans-serif; background: #f8f9fb; color: #333; }
        .navbar { background: linear-gradient(135deg, #1d1d1d 0%, #2d2d2d 100%); box-shadow: 0 2px 20px rgba(0,0,0,0.3); }
        .navbar-brand { font-weight: 800; font-size: 1.5rem; color: var(--primary) !important; letter-spacing: -0.5px; }
        .navbar-brand span { color: #fff; }
        .nav-link { color: rgba(255,255,255,0.85) !important; font-weight: 500; transition: color 0.2s; }
        .nav-link:hover, .nav-link.active { color: var(--primary) !important; }
        .btn-primary { background: var(--primary); border-color: var(--primary); font-weight: 600; }
        .btn-primary:hover { background: var(--primary-dark); border-color: var(--primary-dark); }
        .btn-outline-primary { color: var(--primary); border-color: var(--primary); font-weight: 600; }
        .btn-outline-primary:hover { background: var(--primary); border-color: var(--primary); color: #fff; }
        .card { border: none; border-radius: 16px; box-shadow: var(--card-shadow); transition: transform 0.2s, box-shadow 0.2s; }
        .card:hover { transform: translateY(-4px); box-shadow: 0 8px 32px rgba(0,0,0,0.12); }
        .badge-available { background: #d4edda; color: #155724; font-weight: 600; padding: 0.4em 0.8em; border-radius: 20px; }
        .badge-unavailable { background: #f8d7da; color: #721c24; font-weight: 600; padding: 0.4em 0.8em; border-radius: 20px; }
        footer { background: linear-gradient(135deg, #1d1d1d 0%, #2d2d2d 100%); color: rgba(255,255,255,0.7); }
        .section-title { font-weight: 800; font-size: 2rem; }
        .hero-section { background: linear-gradient(135deg, #1d1d1d 0%, #e63946 100%); color: white; padding: 100px 0; }
        .alert { border-radius: 12px; border: none; }
    </style>
    @stack('styles')
</head>
<body>
<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <i class="bi bi-car-front-fill"></i> Car<span>Rental</span>
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <i class="bi bi-list text-white fs-3"></i>
        </button>
        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav me-auto ms-4 gap-1">
                <li class="nav-item"><a class="nav-link" href="{{ route('home') }}"><i class="bi bi-house"></i> Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('cars.index') }}"><i class="bi bi-car-front"></i> Cars</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('about') }}"><i class="bi bi-info-circle"></i> About</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}"><i class="bi bi-envelope"></i> Contact</a></li>
            </ul>
            <ul class="navbar-nav ms-auto gap-2 align-items-center">
                @auth
                    <li class="nav-item"><a class="nav-link" href="{{ route('rentals.index') }}"><i class="bi bi-calendar-check"></i> My Bookings</a></li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger btn-sm px-3">
                                <i class="bi bi-box-arrow-right"></i> Logout
                            </button>
                        </form>
                    </li>
                @else
                    <li class="nav-item"><a class="btn btn-outline-light btn-sm px-3" href="{{ route('login') }}">Login</a></li>
                    <li class="nav-item"><a class="btn btn-primary btn-sm px-3" href="{{ route('register') }}">Sign Up</a></li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<main>
    @if(session('success'))
        <div class="container mt-3">
            <div class="alert alert-success alert-dismissible fade show">
                <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        </div>
    @endif
    @if(session('error'))
        <div class="container mt-3">
            <div class="alert alert-danger alert-dismissible fade show">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>{{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        </div>
    @endif
    @yield('content')
</main>

<footer class="py-5 mt-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4">
                <h5 class="fw-bold text-white"><i class="bi bi-car-front-fill text-danger"></i> CarRental BD</h5>
                <p class="small">Your trusted partner for car rentals in Bangladesh. Quality cars, affordable prices.</p>
            </div>
            <div class="col-md-4">
                <h6 class="fw-bold text-white">Quick Links</h6>
                <ul class="list-unstyled small">
                    <li><a href="{{ route('home') }}" class="text-decoration-none" style="color:rgba(255,255,255,0.7)">Home</a></li>
                    <li><a href="{{ route('cars.index') }}" class="text-decoration-none" style="color:rgba(255,255,255,0.7)">Browse Cars</a></li>
                    <li><a href="{{ route('about') }}" class="text-decoration-none" style="color:rgba(255,255,255,0.7)">About Us</a></li>
                    <li><a href="{{ route('contact') }}" class="text-decoration-none" style="color:rgba(255,255,255,0.7)">Contact</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h6 class="fw-bold text-white">Contact Info</h6>
                <ul class="list-unstyled small">
                    <li><i class="bi bi-telephone-fill me-2 text-danger"></i> +880 1700-000000</li>
                    <li><i class="bi bi-envelope-fill me-2 text-danger"></i> info@carrental.bd</li>
                    <li><i class="bi bi-geo-alt-fill me-2 text-danger"></i> Dhaka, Bangladesh</li>
                </ul>
            </div>
        </div>
        <hr class="border-secondary mt-4">
        <p class="text-center small mb-0">&copy; {{ date('Y') }} CarRental BD. All rights reserved.</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>
