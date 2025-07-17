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

      {{-- Tombol Tambah --}}
      <div class="mb-3">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#galleryModal" onclick="openAddModal()">Tambah Foto</button>
      </div>

      {{-- Table --}}
      <div class="card">
        <div class="card-header">Daftar Foto</div>
        <div class="card-body table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Foto</th>
                <th>Nama</th>
                <th>Komentar</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($galleryItems as $item)
              <tr>
                <td><img src="{{ asset('storage/' . $item->foto) }}" width="100"></td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->komentar }}</td>
                <td>
                  <button 
                    class="btn btn-warning btn-sm" 
                    onclick="openEditModal({{ $item->id }}, '{{ $item->nama }}', '{{ $item->komentar }}', '{{ asset('storage/' . $item->foto) }}')"
                  >Edit</button>

                  <form action="{{ route('admin.gallery.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                    @csrf @method('DELETE')
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

{{-- MODAL TAMBAH / EDIT --}}
<div class="modal fade" id="galleryModal" tabindex="-1" aria-labelledby="galleryModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form id="galleryForm" method="POST" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="_method" id="formMethod" value="POST">

      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="galleryModalLabel">Tambah Foto</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
        </div>

        <div class="modal-body">
          <div class="form-group mb-2">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" id="inputNama" required>
          </div>

          <div class="form-group mb-2">
            <label>Komentar</label>
            <input type="text" name="komentar" class="form-control" id="inputKomentar">
          </div>

          <div class="form-group mb-2">
            <label>Foto</label>
            <input type="file" name="foto" class="form-control" id="inputFoto">
            <img id="previewFoto" src="" class="mt-2" width="150" style="display:none;">
          </div>
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Simpan</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        </div>
      </div>
    </form>
  </div>
</div>

{{-- SCRIPT --}}
<script>
  function openAddModal() {
    document.getElementById('galleryModalLabel').innerText = 'Tambah Foto';
    document.getElementById('galleryForm').action = '{{ route("admin.gallery.store") }}';
    document.getElementById('formMethod').value = 'POST';
    document.getElementById('inputNama').value = '';
    document.getElementById('inputKomentar').value = '';
    document.getElementById('inputFoto').required = true;
    document.getElementById('previewFoto').style.display = 'none';
  }

  function openEditModal(id, nama, komentar, fotoUrl) {
    document.getElementById('galleryModalLabel').innerText = 'Edit Foto';
    document.getElementById('galleryForm').action = '/admin/gallery/' + id;
    document.getElementById('formMethod').value = 'PUT';
    document.getElementById('inputNama').value = nama;
    document.getElementById('inputKomentar').value = komentar;
    document.getElementById('inputFoto').required = false;

    const preview = document.getElementById('previewFoto');
    preview.src = fotoUrl;
    preview.style.display = 'block';

    new bootstrap.Modal(document.getElementById('galleryModal')).show();
  }
</script>
@endsection
