@extends('layouts.admin')
<!-- Main Sidebar Container -->
@include('admin.sidebar')

@section('content')

    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">

            <!-- Preloader -->
            <div class="preloader flex-column justify-content-center align-items-center">
                <img src="https://i.gifer.com/ZZ5H.gif" alt="Loading..." height="60" width="60">
            </div>

            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                                class="fas fa-bars"></i></a>
                    </li>
                </ul>
            </nav>
            <!-- /.navbar -->

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0">Dashboard</h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Dashboard</li>
                                </ol>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <!-- Stats Row -->
                        <div class="row mb-4">
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3>{{ $totalServiceAktif }}</h3>
                                        <p>Service Aktif</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-briefcase"></i>
                                    </div>
                                    <a href="{{ route('admin.services.index') }}" class="small-box-footer">
                                        Lihat Semua <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h3>{{ $totalGaleri ?? 0 }}</h3>
                                        <p>Galeri/Portfolio</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-images"></i>
                                    </div>
                                    <a href="{{ route('admin.gallery.index') }}" class="small-box-footer">
                                        Lihat Semua <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-danger">
                                    <div class="inner">
                                        <h3>5</h3>
                                        <p>Kategori Service</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-th"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">
                                        Lihat Semua <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->

                        <!-- Service Paling Sering Diakses -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header border-0">
                                        <h3 class="card-title">Service Paling Populer</h3>
                                        <div class="card-tools">
                                            <a href="{{ route('admin.services.index') }}" class="btn btn-tool btn-sm">
                                                <i class="fas fa-external-link-alt"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-striped table-valign-middle">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Service</th>
                                                    <th>Kategori</th>
                                                    <th>Status</th>
                                                    <th>Views</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($servicePopuler as $index => $service)
                                                    <tr>
                                                        <td>{{ $index + 1 }}</td>
                                                        <td>
                                                            <strong>{{ $service->name }}</strong>
                                                        </td>
                                                        <td>{{ $service->category->name ?? '-' }}</td>
                                                        <td>
                                                            @if ($service->status == 'aktif')
                                                                <span class="badge badge-success">Aktif</span>
                                                            @else
                                                                <span class="badge badge-secondary">Nonaktif</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <span
                                                                class="badge badge-primary">{{ $service->view_count ?? 0 }}
                                                                views</span>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="5" class="text-center text-muted">
                                                            <i class="fas fa-info-circle"></i> Belum ada data service
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- /.content -->
            </div>
        </div>
        <!-- ./wrapper -->
    </body>
@endsection
