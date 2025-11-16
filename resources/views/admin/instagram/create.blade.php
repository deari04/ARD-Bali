@extends('layouts.admin')
@include('admin.sidebar')

@section('content')
<div class="content-wrapper">

    <!-- Breadcrumb -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-6">
                    <h3 class="m-0">Tambah Instagram Story</h3>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.instagram.index') }}">Instagram Story</a>
                        </li>
                        <li class="breadcrumb-item active">Tambah</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">

            <div class="card shadow-sm">
                <div class="card-header">
                    <h5 class="mb-0">Form Tambah Link Story</h5>
                </div>

                <div class="card-body">

                    {{-- Error Handling --}}
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $err)
                                    <li>{{ $err }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.instagram.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="story_url" class="form-label">Link Story Instagram</label>
                            <input 
                                type="url" 
                                name="story_url" 
                                id="story_url" 
                                class="form-control"
                                placeholder="https://instagram.com/stories/..."
                                required>
                        </div>

                        <div class="mb-3">
                            <label for="is_active">Status</label>
                            <select name="is_active" id="is_active" class="form-control">
                                <option value="1">Aktif</option>
                                <option value="0">Tidak Aktif</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('admin.instagram.index') }}" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>

        </div>
    </section>
</div>
@endsection
