@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h3>Edit Link YouTube</h3>

    {{-- Tampilkan error jika ada --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.youtube.update', $video->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Judul Video --}}
        <div class="mb-3">
            <label for="title" class="form-label">Judul Video</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $video->title) }}" required>
        </div>

        {{-- URL YouTube --}}
        <div class="mb-3">
            <label for="youtube_url" class="form-label">Link YouTube</label>
            <input type="url" name="youtube_url" class="form-control" placeholder="https://youtu.be/..." value="{{ old('youtube_url', $video->youtube_url) }}" required>
        </div>

        {{-- Deskripsi --}}
        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea name="description" class="form-control" rows="3" placeholder="Masukkan deskripsi">{{ old('description', $video->description) }}</textarea>
        </div>

        {{-- Urutan --}}
        <div class="mb-3">
            <label for="order_position" class="form-label">Urutan Tampil</label>
            <input type="number" name="order_position" class="form-control" placeholder="Misal: 1" value="{{ old('order_position', $video->order_position) }}">
        </div>

        {{-- Checkbox Tampilkan --}}
        <div class="form-check mb-3">
            <input type="hidden" name="is_active" value="0">
            <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $video->is_active) ? 'checked' : '' }}>
            <label class="form-check-label" for="is_active">
                Tampilkan di Homepage
            </label>
        </div>

        {{-- Tombol --}}
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.youtube.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
