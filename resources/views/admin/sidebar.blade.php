<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="" class="brand-link">
    <h2 class="brand-text font-weight-light text-center">ARD Bali</h2>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- HOME -->
        <li class="nav-item">
          <a href="{{ route('home') }}" class="nav-link {{ request()->is('home') ? 'active' : '' }}">
            <i class="nav-icon fas fa-home"></i>
            <p>Home</p>
          </a>
        </li>

        <!-- SERVICE -->
        <li class="nav-item has-treeview {{ request()->is('services*') ? 'menu-open' : '' }}">
          <a href="#" class="nav-link {{ request()->is('services*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-concierge-bell"></i>
            <p>
              Service
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              {{-- <a href="{{ route('services.web') }}" class="nav-link {{ request()->is('services/web') ? 'active' : '' }}"> --}}
                <i class="far fa-circle nav-icon"></i>
                <p>Web Service</p>
              </a>
            </li>
            <li class="nav-item">
              {{-- <a href="{{ route('services.design') }}" class="nav-link {{ request()->is('services/design') ? 'active' : '' }}"> --}}
                <i class="far fa-circle nav-icon"></i>
                <p>Design Service</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- GALLERY -->
      <li class="nav-item">
    <a href="{{ route('admin.gallery.index') }}" class="nav-link {{ request()->is('admin/gallery') ? 'active' : '' }}">
        <i class="nav-icon fas fa-image"></i>
        <p>Gallery</p>
    </a>
</li>



        <!-- LOCATION -->
        <li class="nav-item">
          <a href="{{ route('admin.location') }}" class="nav-link {{ request()->is('admin/location') ? 'active' : '' }}">
            <i class="nav-icon fas fa-map-marker-alt"></i>
            <p>Location</p>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</aside>
