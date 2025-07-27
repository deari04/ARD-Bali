@extends('layouts.admin')
@include('admin.sidebar')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <h3 class="mb-4">Tambah Kategori Layanan</h3>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">

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
                <div class="card-body">
                    <form action="{{ route('admin.service-categories.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Kategori</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="icon_class" class="form-label">Icon Bootstrap (contoh: <code>bi bi-briefcase</code>)</label>
                            <input type="text" name="icon_class" class="form-control" value="{{ old('icon_class', 'bi bi-briefcase') }}">
                        </div>

                        {{-- Uncomment jika ingin upload gambar --}}
                        {{-- 
                        <div class="mb-3">
                            <label for="image_path" class="form-label">Gambar</label>
                            <input type="file" name="image_path" class="form-control">
                        </div> 
                        --}}

                        <div class="mb-3">
                            <label for="slug" class="form-label">Urutan</label>
                            <input type="text" name="slug" class="form-control" value="{{ old('slug') }}" required>
                        </div>



                        <div class="form-check mb-3">
                            <input type="checkbox" name="is_active" class="form-check-input" id="is_active" checked>
                            <label class="form-check-label" for="is_active">Aktif</label>
                        </div>

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
