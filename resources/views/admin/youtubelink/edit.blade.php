@extends('layouts.admin')
@include('admin.sidebar')

@section('content')
<div class="content-wrapper">

    {{-- Breadcrumb & Header --}}
    <div class="content-header">
        <div class="container-fluid">

            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Video YouTube</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.youtube.index') }}">Video YouTube</a>
                        </li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
            </div>

        </div>
    </div>

    <section class="content pt-2">
        <div class="container-fluid">
            <div class="card shadow-sm">

                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Form Edit Video</h5>
                </div>

                <div class="card-body">

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
                            <input type="text" name="title" class="form-control"
                                   value="{{ old('title', $video->title) }}" required>
                        </div>

                        {{-- URL YouTube --}}
                        <div class="mb-3">
                            <label for="youtube_url" class="form-label">Link YouTube</label>
                            <input type="url" name="youtube_url" class="form-control"
                                   placeholder="https://youtu.be/..." value="{{ old('youtube_url', $video->youtube_url) }}" required>
                        </div>

                        {{-- Deskripsi --}}
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea name="description" class="form-control" rows="3">{{ old('description', $video->description) }}</textarea>
                        </div>

                        {{-- Urutan --}}
                        <div class="mb-3">
                            <label for="order_position" class="form-label">Urutan Tampil</label>
                            <input type="number" name="order_position" class="form-control"
                                   value="{{ old('order_position', $video->order_position) }}">
                        </div>

                        {{-- Checkbox Tampilkan --}}
                        <div class="form-check mb-3">
                            <input type="hidden" name="is_active" value="0">
                            <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1"
                                {{ old('is_active', $video->is_active) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">
                                Tampilkan di Homepage
                            </label>
                        </div>

                        {{-- Tombol --}}
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('admin.youtube.index') }}" class="btn btn-secondary">Batal</a>

                    </form>

                </div>
            </div>
        </div>
    </section>

</div>
@endsection
