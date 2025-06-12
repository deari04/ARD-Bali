@php
    use Illuminate\Support\Facades\Auth;
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ARD Bali</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- ✅ Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Optional: CSS kamu -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand ms-5 text-warning" href="{{ route('home') }}">ARD Bali</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto me-5">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active text-warning' : '' }}" href="{{ route('home') }}">
                            Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('service') ? 'active text-warning' : '' }}" href="{{ route('service') }}">
                            Service
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('gallery') ? 'active text-warning' : '' }}" href="{{ route('gallery') }}">
                            Gallery
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('location') ? 'active text-warning' : '' }}" href="{{ route('location') }}">
                            Location
                        </a>
                    </li>

                    <li class="nav-item">
    @if(Auth::guard('admin')->check())
        <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active text-warning' : '' }}" href="{{ route('admin.dashboard') }}" title="Admin Panel">
            <i class="bi bi-person-circle fs-5 text-white"></i>
        </a>
    @else
        <a class="nav-link" href="{{ route('admin.login') }}" title="Login Admin">
            <i class="bi bi-box-arrow-in-right fs-5 text-white"></i>
        </a>
    @endif
</li>
                </ul>
            </div>
        </div>
    </nav>

</body>
</html>
