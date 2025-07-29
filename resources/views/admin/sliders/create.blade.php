@extends('layouts.admin')
@include('admin.sidebar')

@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Tambah Slider Baru</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.sliders.index') }}">Slider</a></li>
            <li class="breadcrumb-item active">Tambah</li>
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
            <h3 class="card-title">Form Tambah Slider</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.sliders.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="headline_text" class="form-label">Headline Text <span class="text-danger">*</span></label>
                            <input type="text" name="headline_text" id="headline_text" 
                                   class="form-control @error('headline_text') is-invalid @enderror" 
                                   value="{{ old('headline_text') }}" required
                                   placeholder="Masukkan headline slider">
                            @error('headline_text')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="order_position" class="form-label">Posisi Urutan</label>
                            <input type="number" name="order_position" id="order_position" 
                                   class="form-control @error('order_position') is-invalid @enderror" 
                                   value="{{ old('order_position', 0) }}" min="0"
                                   placeholder="0">
                            @error('order_position')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">Angka kecil tampil lebih awal</small>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="subheadline_text" class="form-label">Subheadline Text</label>
                    <textarea name="subheadline_text" id="subheadline_text" 
                              class="form-control @error('subheadline_text') is-invalid @enderror" 
                              rows="3"
                              placeholder="Masukkan subheadline (opsional)">{{ old('subheadline_text') }}</textarea>
                    @error('subheadline_text')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Gambar Slider</label>
                    
                    {{-- Tab Navigation --}}
                    <ul class="nav nav-tabs mb-3" id="imageTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="upload-tab" data-bs-toggle="tab" data-bs-target="#upload" type="button" role="tab">
                                <i class="fas fa-upload"></i> Upload File
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="url-tab" data-bs-toggle="tab" data-bs-target="#url" type="button" role="tab">
                                <i class="fas fa-link"></i> URL Gambar
                            </button>
                        </li>
                    </ul>

                    {{-- Tab Content --}}
                    <div class="tab-content" id="imageTabContent">
                        <div class="tab-pane fade show active" id="upload" role="tabpanel">
                            <input type="file" 
                                   class="form-control @error('image') is-invalid @enderror" 
                                   id="image" 
                                   name="image" 
                                   accept="image/*"
                                   onchange="previewImage(this)">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">Format: JPG, PNG, GIF. Maksimal 2MB</small>
                        </div>
                        <div class="tab-pane fade" id="url" role="tabpanel">
                            <input type="url" 
                                   class="form-control @error('image_url') is-invalid @enderror" 
                                   id="image_url" 
                                   name="image_url" 
                                   value="{{ old('image_url') }}" 
                                   placeholder="https://example.com/image.jpg"
                                   onchange="previewImageUrl(this)">
                            @error('image_url')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">Masukkan URL gambar dari internet</small>
                        </div>
                    </div>

                    {{-- Image Preview --}}
                    <div id="imagePreview" class="mt-3" style="display: none;">
                        <div class="card">
                            <div class="card-body text-center">
                                <img id="preview" src="" alt="Preview" class="img-thumbnail" style="max-width: 300px; max-height: 200px;">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" 
                               type="checkbox" 
                               id="is_active" 
                               name="is_active" 
                               value="1" 
                               {{ old('is_active', true) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">
                            <strong>Aktifkan Slider</strong>
                        </label>
                    </div>
                    <small class="form-text text-muted">Centang untuk menampilkan slider di website</small>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                    <a href="{{ route('admin.sliders.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>

    </div>
  </section>
</div>

@push('scripts')
<script>
    function previewImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('preview').src = e.target.result;
                document.getElementById('imagePreview').style.display = 'block';
            }
            reader.readAsDataURL(input.files[0]);
        } else {
            document.getElementById('imagePreview').style.display = 'none';
        }
    }

    function previewImageUrl(input) {
        if (input.value) {
            document.getElementById('preview').src = input.value;
            document.getElementById('imagePreview').style.display = 'block';
            
            // Handle error loading image
            document.getElementById('preview').onerror = function() {
                document.getElementById('imagePreview').style.display = 'none';
                alert('Gagal memuat gambar dari URL tersebut');
            }
        } else {
            document.getElementById('imagePreview').style.display = 'none';
        }
    }

    // Clear preview when switching tabs
    document.querySelectorAll('#imageTab button').forEach(button => {
        button.addEventListener('click', function() {
            document.getElementById('imagePreview').style.display = 'none';
            // Clear inputs from inactive tab
            if (this.id === 'upload-tab') {
                document.getElementById('image_url').value = '';
            } else {
                document.getElementById('image').value = '';
            }
        });
    });
</script>
@endpush
@endsection