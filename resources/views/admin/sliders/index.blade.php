@extends('layouts.admin')
@include('admin.sidebar')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Kelola Slider</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Slider</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">{{ session('success') }}</div>
            @endif

            <div class="mb-3">
                <a href="{{ route('admin.sliders.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Tambah Slider
                </a>
            </div>

      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Daftar Slider</h3>
        </div>
        <div class="card-body table-responsive">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th width="5%">No</th>
                <th width="15%">Preview</th>
                <th width="25%">Headline</th>
                <th width="20%">Subheadline</th>
                <th width="8%">Posisi</th>
                <th width="10%">Status</th>
                <th width="17%">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($sliders as $index => $slider)
              <tr>
                <td>{{ $index + 1 }}</td>
                <td class="text-center">
                  @if($slider->image_path)
                    <img src="{{ $slider->image_url }}" 
                         alt="Preview" 
                         class="img-thumbnail" 
                         style="width: 80px; height: 50px; object-fit: cover;">
                  @else
                    <div class="bg-light d-flex align-items-center justify-content-center border rounded" 
                         style="width: 80px; height: 50px;">
                      <small class="text-muted">
                        <i class="fas fa-image"></i>
                      </small>
                    </div>
                  @endif
                </td>
                <td>
                  <strong>{{ Str::limit($slider->headline_text, 40) }}</strong>
                  <br>
                  <small class="text-muted">
                    {{ $slider->created_at->format('d M Y H:i') }}
                  </small>
                </td>
                <td>
                  <small class="text-muted">
                    {{ Str::limit($slider->subheadline_text, 60) }}
                  </small>
                </td>
                <td class="text-center">
                  <span class="badge bg-info">{{ $slider->order_position }}</span>
                </td>
                <td class="text-center">
                  @if($slider->is_active)
                    <span class="badge bg-success">Aktif</span>
                  @else
                    <span class="badge bg-secondary">Nonaktif</span>
                  @endif
                </td>
                <td>
                  <div class="btn-group" role="group">
                    {{-- Toggle Status Button --}}
                    <form method="POST" action="{{ route('admin.sliders.toggle', $slider->id) }}" class="d-inline">
                      @csrf
                      @method('PATCH')
                      <button type="submit" 
                              class="btn btn-sm {{ $slider->is_active ? 'btn-warning' : 'btn-success' }}" 
                              title="{{ $slider->is_active ? 'Nonaktifkan' : 'Aktifkan' }}">
                        <i class="fas {{ $slider->is_active ? 'fa-eye-slash' : 'fa-eye' }}"></i>
                      </button>
                    </form>

                    {{-- Edit Button --}}
                    <a href="{{ route('admin.sliders.edit', $slider->id) }}" 
                       class="btn btn-warning btn-sm" title="Edit">
                      <i class="fas fa-edit"></i>
                    </a>

                    {{-- Delete Button --}}
                    <form method="POST" action="{{ route('admin.sliders.destroy', $slider->id) }}" 
                          class="d-inline" onsubmit="return confirm('Yakin ingin menghapus slider ini?')">
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
                  <i class="fas fa-info-circle"></i> Tidak ada data slider
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
