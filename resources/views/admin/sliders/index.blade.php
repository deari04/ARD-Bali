@extends('layouts.admin')
@include('admin.sidebar')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Kelola Slider</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Slider</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">{{ session('success') }}</div>
            @endif

            <div class="mb-3">
                <a href="{{ route('admin.sliders.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Tambah Slider
                </a>
            </div>

            <div class="card">
                <div class="card-header"><h3 class="card-title">Daftar Slider</h3></div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Preview</th>
                                <th>Headline</th>
                                <th>Posisi</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($sliders as $index => $slider)
                                <tr>
                                    <td>{{ $index+1 }}</td>
                                    <td class="text-center">
                                        @if(!empty($slider->image_path) && is_array($slider->image_path))
                                            <img src="{{ $slider->image_path[0] }}" class="img-thumbnail" style="width:80px;height:50px;object-fit:cover;">
                                        @endif
                                    </td>
                                    <td>{{ $slider->headline_text }}</td>
                                    <td class="text-center"><span class="badge bg-info">{{ $slider->order_position }}</span></td>
                                    <td class="text-center">
                                        <span class="badge {{ $slider->is_active ? 'bg-success':'bg-secondary' }}">{{ $slider->is_active?'Aktif':'Nonaktif' }}</span>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.sliders.edit',$slider->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                        <form action="{{ route('admin.sliders.destroy',$slider->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus?')">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="6" class="text-center text-muted">Tidak ada data slider</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </section>
</div>
@endsection
