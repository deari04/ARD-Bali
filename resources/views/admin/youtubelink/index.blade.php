@extends('layouts.admin')
@include('admin.sidebar')

@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">

            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Kelola Video YouTube</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Video YouTube</li>
                    </ol>
                </div>
            </div>

        </div>
    </div>

    <section class="content">
        <div class="container-fluid">

            <div class="card shadow-sm">

                <div class="card-header d-flex justify-content-between align-items-center">
                    <a href="{{ route('admin.youtube.create') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i> Tambah Video
                    </a>
                </div>

                <div class="card-body">

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Judul</th>
                                    <th>Deskripsi</th>
                                    <th>Link</th>
                                    <th>Urutan</th>
                                    <th>Status</th>
                                    <th width="140px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($videos as $index => $video)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $video->title }}</td>
                                        <td>{{ Str::limit($video->description, 50) }}</td>
                                        <td>
                                            <a href="{{ $video->youtube_url }}" target="_blank">
                                                {{ Str::limit($video->youtube_url, 30) }}
                                            </a>
                                        </td>
                                        <td>{{ $video->order_position }}</td>
                                        <td>
                                            <span class="badge {{ $video->is_active ? 'bg-success' : 'bg-secondary' }}">
                                                {{ $video->is_active ? 'Aktif' : 'Nonaktif' }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.youtube.edit', $video->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                            <form action="{{ route('admin.youtube.destroy', $video->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus video ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center text-muted">Belum ada video.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div><!-- /.card-body -->
            </div><!-- /.card -->

        </div>
    </section>

</div>
@endsection
