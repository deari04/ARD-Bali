@extends('layouts.admin')
@include('admin.sidebar')

@section('content')
<div class="content-wrapper">

    <!-- Breadcrumb -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0">Edit Instagram Story</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.instagram.index') }}">Instagram Story</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Content -->
    <section class="content">
        <div class="container-fluid">

            <div class="card shadow-sm">
                <div class="card-header">
                    <h5 class="mb-0">Edit Instagram Story</h5>
                </div>

                <div class="card-body">

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $err)
                                    <li>{{ $err }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.instagram.update', $story->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="story_url" class="form-label">Link Story Instagram</label>
                            <input type="url" name="story_url" id="story_url" 
                                   class="form-control"
                                   value="{{ old('story_url', $story->story_url) }}" required>
                        </div>

                        <div class="mb-3">
                            <label>Status Aktif</label>
                            <select name="is_active" class="form-control">
                                <option value="1" {{ $story->is_active ? 'selected' : '' }}>Aktif</option>
                                <option value="0" {{ !$story->is_active ? 'selected' : '' }}>Tidak Aktif</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                        <a href="{{ route('admin.instagram.index') }}" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>

        </div>
    </section>
</div>
@endsection
