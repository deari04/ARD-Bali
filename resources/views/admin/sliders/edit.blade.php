@extends('layouts.admin')
@include('admin.sidebar')

@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edit Slider</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.sliders.index') }}">Slider</a></li>
            <li class="breadcrumb-item active">Edit</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">

      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Form Edit Slider</h3>
        </div>
        <div class="card-body">
          <form action="{{ route('admin.sliders.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
              <label>Headline</label>
              <input type="text" name="headline_text" value="{{ $slider->headline_text }}" class="form-control" required>
            </div>

            <div class="mb-3">
              <label>Subheadline</label>
              <textarea name="subheadline_text" class="form-control" rows="3">{{ $slider->subheadline_text }}</textarea>
            </div>

            <div class="mb-3">
              <label>Posisi Urutan</label>
              <input type="number" name="order_position" value="{{ $slider->order_position }}" class="form-control">
            </div>

            <div class="mb-3">
              <label>Foto yang Ada:</label>
              <div class="d-flex flex-wrap gap-2">
                @foreach ($slider->image_path ?? [] as $index => $img)
                  <div class="position-relative">
                    <img src="{{ asset($img) }}" class="img-thumbnail" style="width: 120px; height: 80px; object-fit: cover;">
                    <div class="position-absolute top-0 end-0">
                      <input type="checkbox" name="remove_images[]" value="{{ $index }}"> Hapus
                    </div>
                  </div>
                @endforeach
              </div>
            </div>

            <div class="mb-3">
              <label>Tambah Foto Baru (Max 10)</label>
              <input type="file" name="images[]" class="form-control" multiple accept="image/*" onchange="previewMultipleImages(this)">
              <div id="imagePreview" class="mt-3 d-flex flex-wrap gap-2"></div>
            </div>

            <div class="mb-3">
              <input type="checkbox" name="is_active" value="1" {{ $slider->is_active ? 'checked' : '' }}>
              <label>Aktifkan Slider</label>
            </div>

            <div class="card-footer">
              <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Update</button>
              <a href="{{ route('admin.sliders.index') }}" class="btn btn-secondary">Kembali</a>
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
