@extends('layouts.admin')
@include('admin.sidebar')

@section('content')
<div class="content-wrapper p-4">
    <h4>Tambah Link Instagram Story</h4>

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
            <input type="url" name="story_url" id="story_url" class="form-control" placeholder="https://instagram.com/stories/..." required>
        </div>

        <div class="mb-3">
            <label>Status Aktif</label>
            <select name="is_active" class="form-control">
                <option value="1">Aktif</option>
                <option value="0">Tidak Aktif</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.instagram.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
