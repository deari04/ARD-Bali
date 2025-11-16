@extends('layouts.admin')
@include('admin.sidebar')

@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">

            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="mb-0">Edit Kategori Layanan</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.service-categories.index') }}">Kategori Layanan</a>
                        </li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
            </div>

        </div>
    </div>

    <section class="content">
        <div class="container-fluid">

            <div class="card shadow-sm">
                <div class="card-body">

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

                        <div class="mb-3" style="display: none;">
                            <label for="icon_class" class="form-label">Icon Bootstrap</label>
                            <input type="text" name="icon_class" class="form-control" value="{{ old('icon_class', 'bi bi-briefcase') }}">
                        </div>

                        <div class="mb-3">
                            <label for="order_position" class="form-label">Urutan</label>
                            <input type="number" name="order_position" class="form-control" value="{{ old('order_position', $service_category->order_position) }}" required>
                        </div>

                        <div class="mb-3 form-check">
                            <input type="hidden" name="is_active" value="0">
                            <input type="checkbox" name="is_active" class="form-check-input" id="is_active" value="1"
                                   {{ old('is_active', $service_category->is_active) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">Aktif</label>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('admin.service-categories.index') }}" class="btn btn-secondary">Batal</a>

                    </form>

                </div>
            </div>

        </div>
    </section>

</div>
@endsection
