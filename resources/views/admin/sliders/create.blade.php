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

                <div class="mb-3">
                    <label for="headline_text" class="form-label">Headline</label>
                    <input type="text" name="headline_text" id="headline_text" 
                        class="form-control" value="{{ old('headline_text') }}" required>
                </div>

                <div class="mb-3">
                    <label for="subheadline_text" class="form-label">Subheadline</label>
                    <textarea name="subheadline_text" id="subheadline_text" class="form-control" rows="3">{{ old('subheadline_text') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="order_position" class="form-label">Posisi Urutan</label>
                    <input type="number" name="order_position" id="order_position" class="form-control" value="{{ old('order_position', 0) }}">
                </div>

                {{-- <div class="mb-3">
                    <label class="form-label">Upload Foto Slider (Max 10)</label>
                    <input type="file" name="images[]" id="images" class="form-control" accept="image/*" multiple onchange="previewMultipleImages(this)">
                    <small class="text-muted">Format: JPG, PNG, GIF. Maks 2MB per file</small>

                    <div id="imagePreview" class="mt-3 d-flex flex-wrap gap-2"></div>
                </div> --}}
                <div class="mb-3">
                    <label class="form-label">Upload Foto Slider (Max 10)</label>
                    <input type="file" name="images[]" id="images" class="form-control" 
                        accept="image/jpeg,image/png,image/gif,image/webp" multiple 
                        onchange="previewMultipleImages(this)">
                    <small class="text-muted">Format: JPG, PNG, GIF, WebP. Maks 2MB per file</small>

                    <div id="imagePreview" class="mt-3 d-flex flex-wrap gap-2"></div>
                </div>
                <div class="mb-3">
                    <input type="checkbox" id="is_active" name="is_active" value="1" checked>
                    <label for="is_active">Aktifkan Slider</label>
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
function previewMultipleImages(input) {
    let preview = document.getElementById('imagePreview');
    preview.innerHTML = "";
    if (input.files) {
        Array.from(input.files).forEach(file => {
            let reader = new FileReader();
            reader.onload = e => {
                let img = document.createElement('img');
                img.src = e.target.result;
                img.classList.add('img-thumbnail');
                img.style.width = "120px";
                img.style.height = "80px";
                img.style.objectFit = "cover";
                preview.appendChild(img);
            }
            reader.readAsDataURL(file);
        });
    }
}
</script>
@endpush
@endsection
