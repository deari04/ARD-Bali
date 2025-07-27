@extends('layouts.admin')
@include('admin.sidebar')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Daftar Layanan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Services</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Manajemen Layanan</h3>
                            <div class="card-tools">
                                <a href="{{ route('admin.services.create') }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-plus"></i> Tambah Layanan
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if($services->count() > 0)
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th width="5%">No</th>
                                                <th>Nama</th>
                                                <th>Kategori</th>
                                                <th>Gambar</th>
                                                <th>Status</th>
                                                <th width="15%">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($services as $index => $service)
                                                <tr>
                                                    <td>{{ $services->firstItem() + $index }}</td>
                                                    <td>
                                                        <strong>{{ $service->name }}</strong>
                                                        @if($service->description)
                                                            <br><small class="text-muted">{{ Str::limit($service->description, 50) }}</small>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <span class="badge badge-info">{{ $service->category->name ?? '-' }}</span>
                                                    </td>
                                                    <td>
                                                        @if($service->image_path)
                                                            <img src="{{ asset('storage/' . $service->image_path) }}" 
                                                                 alt="{{ $service->name }}" width="50" height="50" 
                                                                 class="img-thumbnail">
                                                        @else
                                                            <span class="text-muted">Tidak ada gambar</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($service->is_active)
                                                            <span class="badge badge-success">Aktif</span>
                                                        @else
                                                            <span class="badge badge-secondary">Tidak Aktif</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="btn-group" role="group">
                                                            <a href="{{ route('admin.services.edit', $service->id) }}" 
                                                               class="btn btn-warning btn-sm" title="Edit">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                            <form action="{{ route('admin.services.destroy', $service->id) }}" 
                                                                  method="POST" class="d-inline" 
                                                                  onsubmit="return confirm('Yakin ingin menghapus layanan {{ $service->name }}?')">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                                                                    <i class="fas fa-trash"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <div class="d-flex justify-content-center">
                                    {{ $services->links() }}
                                </div>
                            @else
                                <div class="text-center py-4">
                                    <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                                    <h5 class="text-muted">Belum ada layanan</h5>
                                    <p class="text-muted">Mulai dengan menambahkan layanan pertama Anda.</p>
                                    <a href="{{ route('admin.services.create') }}" class="btn btn-primary">
                                        <i class="fas fa-plus"></i> Tambah Layanan
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection