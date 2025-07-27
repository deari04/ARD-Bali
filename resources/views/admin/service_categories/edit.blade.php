@extends('layouts.admin')
@include('admin.sidebar')

@section('content')
<div class="container">
    <h1>Edit Kategori Layanan</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.service-categories.update', $service_category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nama Kategori</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $service_category->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea name="description" class="form-control" rows="3">{{ old('description', $service_category->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="icon_class" class="form-label">Icon Bootstrap</label>
            <input type="text" name="icon_class" class="form-control" value="{{ old('icon_class', $service_category->icon_class) }}">
        </div>

        {{-- <div class="mb-3">
            <label for="image_path" class="form-label">Gambar</label>
            @if ($service_category->image_path)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $service_category->image_path) }}" alt="Gambar" width="150">
                </div>
            @endif
            <input type="file" name="image_path" class="form-control">
        </div> --}}

        <div class="mb-3 form-check">
            <input type="checkbox" name="is_active" class="form-check-input" id="is_active" {{ $service_category->is_active ? 'checked' : '' }}>
            <label class="form-check-label" for="is_active">Aktif</label>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.service-categories.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
