@extends('layouts.admin')
@include('admin.sidebar')

@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edit Lokasi</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.location') }}">Lokasi</a></li>
            <li class="breadcrumb-item active">Edit</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">
    
    {{-- Display validation errors --}}
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show">
            <h5><i class="icon fas fa-ban"></i> Error!</h5>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Form Edit Lokasi: {{ $location->title }}</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.location.update', $location->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="title" class="form-label">Judul Lokasi <span class="text-danger">*</span></label>
                            <input type="text" name="title" id="title" 
                                   class="form-control @error('title') is-invalid @enderror" 
                                   value="{{ old('title', $location->title) }}" required
                                   placeholder="Masukkan judul lokasi">
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="phone" class="form-label">No. Telepon</label>
                            <input type="text" name="phone" id="phone" 
                                   class="form-control @error('phone') is-invalid @enderror" 
                                   value="{{ old('phone', $location->phone) }}"
                                   placeholder="Contoh: 021-12345678">
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Alamat Lengkap <span class="text-danger">*</span></label>
                    <textarea name="address" id="address" 
                              class="form-control @error('address') is-invalid @enderror" 
                              rows="3" required
                              placeholder="Masukkan alamat lengkap">{{ old('address', $location->address) }}</textarea>
                    @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="whatsapp" class="form-label">WhatsApp</label>
                            <input type="text" name="whatsapp" id="whatsapp" 
                                   class="form-control @error('whatsapp') is-invalid @enderror" 
                                   value="{{ old('whatsapp', $location->whatsapp) }}"
                                   placeholder="Contoh: 081234567890">
                            @error('whatsapp')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" 
                                   class="form-control @error('email') is-invalid @enderror" 
                                   value="{{ old('email', $location->email) }}"
                                   placeholder="Contoh: lokasi@example.com">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="maps_embed_url" class="form-label">Embed Google Maps</label>
                    <textarea name="maps_embed_url" id="maps_embed_url" 
                              class="form-control @error('maps_embed_url') is-invalid @enderror" 
                              rows="4" 
                              placeholder="Paste embed code dari Google Maps di sini">{{ old('maps_embed_url', $location->maps_embed_url) }}</textarea>
                    @error('maps_embed_url')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="form-text text-muted">
                        <i class="fas fa-info-circle"></i> 
                        Buka Google Maps → Pilih lokasi → Share → Embed a map → Copy HTML
                    </small>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Update
                    </button>
                    <a href="{{ route('admin.location') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>

    </div>
  </section>
</div>
@endsection