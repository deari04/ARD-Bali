@extends('layouts.admin')
@include('admin.sidebar')

@section('content')
<div class="container">
    <h1>Edit Layanan</h1>

    <form action="{{ route('admin.services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="category_id" class="form-label">Kategori</label>
            <select name="category_id" class="form-control" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $service->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Nama Layanan</label>
            <input type="text" name="name" class="form-control" required value="{{ old('name', $service->name) }}">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea name="description" class="form-control">{{ old('description', $service->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="whatsapp_message" class="form-label">Pesan WhatsApp</label>
            <input type="text" name="whatsapp_message" class="form-control" value="{{ old('whatsapp_message', $service->whatsapp_message) }}">
        </div>

        <div class="mb-3">
            <label for="image_path" class="form-label">Gambar (opsional)</label>
            @if ($service->image_path)
                <div><img src="{{ asset('storage/' . $service->image_path) }}" width="100"></div>
            @endif
            <input type="file" name="image_path" class="form-control mt-2">
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" name="is_active" class="form-check-input" id="activeCheck"
                   {{ $service->is_active ? 'checked' : '' }}>
            <label class="form-check-label" for="activeCheck">Aktif</label>
        </div>

        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
