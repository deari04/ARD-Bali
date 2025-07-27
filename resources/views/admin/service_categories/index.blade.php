@extends('layouts.admin')
@include('admin.sidebar')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <h3 class="mb-4">Kelola Kategori Layanan</h3>
            <a href="{{ route('admin.service-categories.create') }}" class="btn btn-primary mb-3">+ Tambah Kategori</a>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="card shadow-sm">
                <div class="card-body">
                    <table class="table table-bordered table-hover mb-0">
                        <thead class="bg-dark text-white">
                           <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Slug</th>
                                <th>Icon</th>
                                <th>Urutan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>

                        </thead>
                        <tbody>
                            @foreach($categories as $index => $cat)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $cat->name }}</td>
                                    <td>{{ $cat->slug }}</td>
                                    <td><i class="{{ $cat->icon_class }}"></i></td>
                                    <td>{{ $cat->order_position }}</td>
                                    <td>
                                        @if($cat->is_active)
                                            <span class="badge bg-success">Aktif</span>
                                        @else
                                            <span class="badge bg-secondary">Tidak</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.service-categories.edit', $cat->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('admin.service-categories.destroy', $cat->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus kategori ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                            @if($categories->isEmpty())
                                <tr>
                                    <td colspan="6" class="text-center">Tidak ada kategori layanan.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
