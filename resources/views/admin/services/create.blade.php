@extends('layouts.admin')
@include('admin.sidebar')

@section('content')
<div class="container">
    <h1>Tambah Layanan</h1>

    <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="category_id" class="form-label">Kategori</label>
            <select name="category_id" class="form-control" required>
                <option value="">Pilih Kategori</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Nama Layanan</label>
            <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea name="description" class="form-control">{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="whatsapp_message" class="form-label">Pesan WhatsApp</label>
            <input type="text" name="whatsapp_message" class="form-control" value="{{ old('whatsapp_message') }}">
        </div>

        <div class="mb-3">
            <label for="image_path" class="form-label">Gambar</label>
            <input type="file" name="image_path" class="form-control">
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" name="is_active" class="form-check-input" id="activeCheck" checked>
            <label class="form-check-label" for="activeCheck">Aktif</label>
        </div>

        <button class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
