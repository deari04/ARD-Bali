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

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        .navbar-transparent {
            background-color: transparent !important;
            transition: background-color 0.3s ease;
        }
    </style>
</head>
<body>

{{-- ✅ Navbar Transparan yang berubah saat scroll --}}
<nav id="mainNavbar" class="navbar navbar-expand-lg navbar-dark shadow fixed-top navbar-transparent">
  <div class="container-fluid position-relative">
    <div class="d-flex align-items-center">
      <a href="https://www.instagram.com/ardorganizer_bali?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" class="text-light me-3" target="_blank"><i class="bi bi-instagram fs-5"></i></a>
      <a href="https://www.tiktok.com/@ardorganizer_bali?is_from_webapp=1&sender_device=pc" class="text-light me-3" target="_blank"><i class="bi bi-tiktok fs-5"></i></a>
      <a href="https://www.facebook.com/" class="text-light me-3" target="_blank"><i class="bi bi-facebook fs-5"></i></a>
      <a href="https://x.com/" class="text-light me-3" target="_blank"><i class="bi bi-twitter fs-5"></i></a>
    </div>

    <div class="position-absolute top-50 start-50 translate-middle">
      <a class="navbar-brand text-warning fw-bold fs-4" href="{{ route('home') }}">
        <img src="{{ asset('assets/images/LogoARD.png') }}" alt="ard-bali-logo" style="height: 40px;">
      </a>
    </div>

    <div class="d-flex">
      <button class="navbar-toggler me-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link {{ request()->routeIs('home') ? 'active text-warning' : '' }}" href="{{ route('home') }}">Home</a></li>
          <li class="nav-item"><a class="nav-link {{ request()->routeIs('service') ? 'active text-warning' : '' }}" href="{{ route('service') }}">Service</a></li>
          <li class="nav-item"><a class="nav-link {{ request()->routeIs('gallery') ? 'active text-warning' : '' }}" href="{{ route('galeri.index') }}">Gallery</a></li>
          <li class="nav-item"><a class="nav-link {{ request()->routeIs('location') ? 'active text-warning' : '' }}" href="{{ route('location') }}">Location</a></li>
        </ul>
      </div>
    </div>
  </div>
</nav>



<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Script Ubah Navbar Transparan saat scroll -->
<script>
  const navbar = document.getElementById('mainNavbar');
  window.addEventListener('scroll', function () {
    if (window.scrollY > 100) {
      navbar.classList.remove('navbar-transparent');
      navbar.classList.add('bg-dark');
    } else {
      navbar.classList.add('navbar-transparent');
      navbar.classList.remove('bg-dark');
    }
  });
</script>
</body>
</html>
