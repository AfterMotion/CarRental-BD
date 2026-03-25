<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') | CarRental Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root { --sidebar-width: 260px; --primary: #e63946; }
        body { font-family: 'Inter', sans-serif; background: #f0f2f5; }
        .sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            position: fixed;
            top: 0; left: 0;
            background: linear-gradient(180deg, #1d1d1d 0%, #2d2d2d 100%);
            z-index: 1000;
            display: flex;
            flex-direction: column;
            overflow-y: auto;
        }
        .sidebar-brand {
            padding: 1.5rem;
            font-size: 1.3rem;
            font-weight: 800;
            color: var(--primary);
            border-bottom: 1px solid rgba(255,255,255,0.08);
            text-decoration: none;
        }
        .sidebar-brand span { color: #fff; }
        .sidebar-nav { padding: 1rem 0; flex: 1; }
        .nav-section-title { color: rgba(255,255,255,0.4); font-size: 0.7rem; font-weight: 700; text-transform: uppercase; letter-spacing: 1.5px; padding: 0.75rem 1.5rem 0.25rem; }
        .sidebar .nav-link {
            color: rgba(255,255,255,0.75);
            padding: 0.65rem 1.5rem;
            border-radius: 0;
            font-weight: 500;
            font-size: 0.9rem;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            gap: 0.6rem;
        }
        .sidebar .nav-link:hover, .sidebar .nav-link.active {
            color: #fff;
            background: rgba(230, 57, 70, 0.2);
            border-left: 3px solid var(--primary);
        }
        .sidebar .nav-link i { font-size: 1rem; width: 20px; }
        .main-content { margin-left: var(--sidebar-width); min-height: 100vh; }
        .topbar {
            background: #fff;
            padding: 0.85rem 1.5rem;
            box-shadow: 0 1px 8px rgba(0,0,0,0.06);
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 100;
        }
        .page-content { padding: 1.5rem; }
        .card { border: none; border-radius: 16px; box-shadow: 0 2px 16px rgba(0,0,0,0.06); }
        .table thead th { background: #f8f9fb; font-weight: 600; font-size: 0.82rem; text-transform: uppercase; letter-spacing: 0.5px; color: #666; border-bottom: 2px solid #eee; }
        .btn-sm { font-size: 0.8rem; }
        .stat-card { border-radius: 16px; padding: 1.5rem; color: white; position: relative; overflow: hidden; }
        .stat-card::after { content: ''; position: absolute; right: -20px; top: -20px; width: 100px; height: 100px; border-radius: 50%; background: rgba(255,255,255,0.1); }
        .badge { font-size: 0.75rem; }
    </style>
</head>
<body>
<div class="sidebar">
    <a class="sidebar-brand" href="{{ route('admin.dashboard') }}">
        <i class="bi bi-car-front-fill"></i> Car<span>Rental</span>
    </a>
    <nav class="sidebar-nav">
        <div class="nav-section-title">Overview</div>
        <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="bi bi-speedometer2"></i> Dashboard
        </a>

        <div class="nav-section-title mt-2">Management</div>
        <a href="{{ route('admin.cars.index') }}" class="nav-link {{ request()->routeIs('admin.cars*') ? 'active' : '' }}">
            <i class="bi bi-car-front"></i> Cars
        </a>
        <a href="{{ route('admin.rentals.index') }}" class="nav-link {{ request()->routeIs('admin.rentals*') ? 'active' : '' }}">
            <i class="bi bi-calendar-week"></i> Rentals
        </a>
        <a href="{{ route('admin.customers.index') }}" class="nav-link {{ request()->routeIs('admin.customers*') ? 'active' : '' }}">
            <i class="bi bi-people"></i> Customers
        </a>

        <div class="nav-section-title mt-2">Site</div>
        <a href="{{ route('home') }}" class="nav-link" target="_blank">
            <i class="bi bi-globe"></i> View Site
        </a>
    </nav>
    <div class="p-3 border-top" style="border-color: rgba(255,255,255,0.08) !important;">
        <div class="d-flex align-items-center gap-2 mb-2">
            <div class="rounded-circle bg-danger d-flex align-items-center justify-content-center" style="width:36px;height:36px;">
                <i class="bi bi-person-fill text-white"></i>
            </div>
            <div>
                <div class="text-white fw-semibold" style="font-size:0.85rem;">{{ auth()->user()->name }}</div>
                <div style="color:rgba(255,255,255,0.5);font-size:0.72rem;">Administrator</div>
            </div>
        </div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn btn-outline-danger btn-sm w-100"><i class="bi bi-box-arrow-right me-1"></i>Logout</button>
        </form>
    </div>
</div>

<div class="main-content">
    <div class="topbar">
        <h6 class="mb-0 fw-bold">@yield('page-title', 'Dashboard')</h6>
        <div class="d-flex align-items-center gap-2">
            <span class="badge bg-danger">Admin</span>
            <span class="text-muted small">{{ auth()->user()->email }}</span>
        </div>
    </div>
    <div class="page-content">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm">
                <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>{{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        @yield('content')
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>
