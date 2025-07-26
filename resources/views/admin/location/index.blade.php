@extends('layouts.admin')
@include('admin.sidebar')

@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Kelola Lokasi</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Lokasi</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">
      
      {{-- Alert Messages --}}
      @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
      @endif

      @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{ session('error') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
      @endif

      <div class="mb-3">
        <a href="{{ route('admin.location.create') }}" class="btn btn-primary">
          <i class="fas fa-plus"></i> Tambah Lokasi
        </a>
      </div>

      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Daftar Lokasi</h3>
        </div>
        <div class="card-body table-responsive">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th width="5%">No</th>
                <th width="20%">Judul</th>
                <th width="25%">Alamat</th>
                <th width="12%">Phone</th>
                <th width="12%">WhatsApp</th>
                <th width="15%">Email</th>
                <th width="11%">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($locations as $index => $loc)
              <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $loc->title }}</td>
                <td>{{ Str::limit($loc->address, 60) }}</td>
                <td>{{ $loc->phone ?? '-' }}</td>
                <td>{{ $loc->whatsapp ?? '-' }}</td>
                <td>{{ $loc->email ?? '-' }}</td>
                <td>
                  <div class="btn-group" role="group">
                    <a href="{{ route('admin.location.edit', $loc->id) }}" 
                       class="btn btn-warning btn-sm" title="Edit">
                      <i class="fas fa-edit"></i>
                    </a>

                    <form method="POST" action="{{ route('admin.location.destroy', $loc->id) }}" 
                          class="d-inline" onsubmit="return confirm('Yakin ingin menghapus lokasi ini?')">
                      @csrf 
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                        <i class="fas fa-trash"></i>
                      </button>
                    </form>
                  </div>
                </td>
              </tr>
              @empty
              <tr>
                <td colspan="7" class="text-center text-muted">
                  <i class="fas fa-info-circle"></i> Tidak ada data lokasi
                </td>
              </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>

    </div>
  </section>
</div>
@endsection