@extends('layouts.admin')
@include('admin.sidebar')

@section('content')
<div class="content-wrapper">

    {{-- Breadcrumb --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-6">
                    <h3 class="m-0">Tambah Kategori Layanan</h3>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.service-categories.index') }}">Kategori Layanan</a>
                        </li>
                        <li class="breadcrumb-item active">
                            Tambah
                        </li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    {{-- Main Content --}}
    <section class="content">
        <div class="container-fluid">

            {{-- Error Message --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card shadow-sm">
                <div class="card-header">
                    <h5 class="mb-0">Form Tambah Kategori</h5>
                </div>

                <div class="card-body">

                    <form action="{{ route('admin.service-categories.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        {{-- Nama Kategori --}}
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Kategori</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                        </div>

                        {{-- Deskripsi --}}
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
                        </div>

                        {{-- Icon Hidden --}}
                        <div class="mb-3" style="display: none;">
                            <label for="icon_class" class="form-label">Icon Bootstrap</label>
                            <input type="text" name="icon_class" class="form-control" value="{{ old('icon_class', 'bi bi-briefcase') }}">
                        </div>

                        {{-- Urutan --}}
                        <div class="mb-3">
                            <label for="order_position" class="form-label">Urutan</label>
                            <input type="number" name="order_position" class="form-control" value="{{ old('order_position', 1) }}" min="1" required>
                        </div>

                        {{-- Status --}}
                        <div class="form-check mb-3">
                            <input type="checkbox" name="is_active" class="form-check-input" id="is_active" value="1" 
                                   {{ old('is_active', true) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">Aktif</label>
                        </div>

                        {{-- Tombol --}}
                        <div class="d-flex">
                            <button type="submit" class="btn btn-primary me-2">Simpan</button>
                            <a href="{{ route('admin.service-categories.index') }}" class="btn btn-secondary">Batal</a>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </section>

</div>
@endsection
