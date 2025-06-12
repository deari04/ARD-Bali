{{-- Navbar --}}
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand ms-5 text-orange" href="{{ route('home') }}">ARD Bali</a>
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
                {{-- <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('contact') ? 'active text-warning' : '' }}" href="{{ route('contact') }}">
                        Contact Us
                    </a>
                </li> --}}
                {{-- <li class="nav-item">
                    <a class="nav-link" href="#">Location</a>
                  </li> --}}
                  <li class="nav-item">
                    <a class="nav-link" href="#">Contact Us</a>
                  </li>
            </ul>
        </div>
    </div>
</nav>
