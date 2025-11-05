<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ route('admin.dashboard') }}" class="brand-link">
    <h2 class="brand-text font-weight-light text-center">ARD Bali</h2>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        
        <!-- DASHBOARD (Optional) -->
        <li class="nav-item">
          <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>

        <!-- SLIDER MANAGEMENT -->
        <li class="nav-item">
          <a href="{{ route('admin.sliders.index') }}" class="nav-link {{ request()->routeIs('admin.sliders.*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-images"></i>
            <p>Kelola Slider</p>
          </a>
        </li>

        <!-- SERVICE -->
        <li class="nav-item has-treeview {{ request()->is('admin/service-categories*') || request()->is('admin/services*') ? 'menu-open' : '' }}">
          <a href="#" class="nav-link {{ request()->is('admin/service-categories*') || request()->is('admin/services*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-concierge-bell"></i>
            <p>
              Service
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('admin.service-categories.index') }}" class="nav-link {{ request()->is('admin/service-categories*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Service Category</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.services.index') }}" class="nav-link {{ request()->is('admin/services*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Services</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- GALLERY -->
        <li class="nav-item">
          <a href="{{ route('admin.gallery.index') }}" class="nav-link {{ request()->is('admin/gallery*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-image"></i>
            <p>Gallery</p>
          </a>
        </li>

        <!-- YOUTUBE -->
        <li class="nav-item">
          <a href="{{ route('admin.youtube.index') }}" class="nav-link {{ request()->is('admin/youtube*') ? 'active' : '' }}">
            <i class="nav-icon fab fa-youtube"></i>
            <p>Youtube</p>
          </a>
        </li>

        <!-- INSTAGRAM STORY -->
        <li class="nav-item">
          <a href="{{ route('admin.instagram.index') }}" class="nav-link {{ request()->routeIs('admin.instagram.*') ? 'active' : '' }}">
            <i class="nav-icon fab fa-instagram"></i>
            <p>Instagram Story</p>
          </a>
        </li>

        <!-- LOCATION -->
        <li class="nav-item">
          <a href="{{ route('admin.location') }}" class="nav-link {{ request()->is('admin/location*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-map-marker-alt"></i>
            <p>Location</p>
          </a>
        </li>

        <!-- DIVIDER -->
        <li class="nav-header">SYSTEM</li>

        <!-- LOGOUT -->
        <li class="nav-item">
          <a href="{{ route('admin.logout') }}" class="nav-link" 
             onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="nav-icon fas fa-sign-out-alt text-danger"></i>
            <p class="text-danger">Logout</p>
          </a>
        </li>

      </ul>
    </nav>
  </div>
</aside>

<!-- Form Logout (Hidden) -->
<form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
  @csrf
</form>