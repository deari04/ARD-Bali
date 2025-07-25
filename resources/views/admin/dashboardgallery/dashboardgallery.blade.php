@extends('layouts.admin')
@include('admin.sidebar')

@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <h1 class="m-0">Kelola Gallery</h1>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">

      {{-- Alert --}}
      @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
      @endif

      @if($errors->any())
        <div class="alert alert-danger">
          <ul class="mb-0">
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      

      {{-- Tabel --}}
      <div class="card">
        <div class="card-header">Daftar Foto</div>
        <div class="card-body table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Foto</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Nama Pengunjung</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($galleryItems as $item)
              <tr>
                <td><img src="{{ asset('storage/' . $item->image_path) }}" width="100"></td>
                <td>{{ $item->title }}</td>
                <td>{{ $item->description }}</td>
                <td>{{ $item->visitor_name ?? '-' }}</td>
                <td>
                  <form action="{{ route('admin.gallery.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Hapus foto ini?')" class="btn btn-danger btn-sm">Hapus</button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>

    </div>
  </section>
</div>

{{-- JS untuk Toggle Form --}}
<script>
  function toggleForm() {
    const form = document.getElementById('formContainer');
    form.style.display = (form.style.display === 'none') ? 'block' : 'none';
  }
</script>
@endsection
