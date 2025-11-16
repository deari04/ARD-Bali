@extends('layouts.admin')
@include('admin.sidebar')

@section('content')
<div class="content-wrapper">

    {{-- Breadcrumb --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-6">
                    <h3 class="m-0">Tambah Video YouTube</h3>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.youtube.index') }}">Video YouTube</a>
                        </li>
                        <li class="breadcrumb-item active">Tambah</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    {{-- Main Content --}}
    <section class="content pt-2">
        <div class="container-fluid">

            <div class="card shadow-sm">

                <div class="card-header">
                    <h5 class="mb-0">Form Tambah Video</h5>
                </div>

                <div class="card-body">

                    {{-- Error --}}
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $err)
                                    <li>{{ $err }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.youtube.store') }}" method="POST">
                        @csrf

                        {{-- Judul --}}
                        <div class="mb-3">
                            <label for="title" class="form-label">Judul Video</label>
                            <input type="text" name="title" class="form-control"
                                   placeholder="Masukkan judul video"
                                   value="{{ old('title') }}" required>
                        </div>

                        {{-- URL --}}
                        <div class="mb-3">
                            <label for="youtube_url" class="form-label">Link YouTube</label>
                            <input type="url" name="youtube_url" class="form-control"
                                   placeholder="https://youtu.be/..."
                                   value="{{ old('youtube_url') }}" required>
                        </div>

                        {{-- Deskripsi --}}
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea name="description" class="form-control" rows="3"
                                      placeholder="Masukkan deskripsi video">{{ old('description') }}</textarea>
                        </div>

                        {{-- Urutan --}}
                        <div class="mb-3">
                            <label for="order_position" class="form-label">Urutan Tampil</label>
                            <input type="number" name="order_position" class="form-control"
                                   placeholder="Misal: 1" value="{{ old('order_position', 1) }}">
                        </div>

                        {{-- Status --}}
                        <input type="hidden" name="is_active" value="0">
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox"
                                   name="is_active" id="is_active" value="1"
                                   {{ old('is_active', true) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">
                                Tampilkan di Homepage
                            </label>
                        </div>

                        {{-- Buttons --}}
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <a href="{{ route('admin.youtube.index') }}" class="btn btn-secondary">Kembali</a>

                    </form>

                </div>

            </div>

        </div>
    </section>

</div>
@endsection
