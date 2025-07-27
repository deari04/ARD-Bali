@extends('layouts.admin')
@include('admin.sidebar')

@section('content')
<div class="container">
    <h1>Tambah Kategori Layanan</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

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

        {{-- <div class="mb-3">
            <label for="image_path" class="form-label">Gambar</label>
            <input type="file" name="image_path" class="form-control">
        </div> --}}

        <div class="mb-3 form-check">
            <input type="checkbox" name="is_active" class="form-check-input" id="is_active" checked>
            <label class="form-check-label" for="is_active">Aktif</label>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.service-categories.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
