@extends('layouts.admin')
@include('admin.sidebar')

@section('content')

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <h1 class="m-0">Kelola Location</h1>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">

      {{-- Tombol Tambah --}}
      <div class="mb-3">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#locationModal" onclick="openAddModal()">
          Tambah Location
        </button>
      </div>

      {{-- Tabel Data Location --}}
      <div class="card">
        <div class="card-header">Daftar Location</div>
        <div class="card-body table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nama Lokasi</th>
                <th>Alamat</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              {{-- Contoh data dummy, nanti diganti dengan data dari controller --}}
              <tr>
                <td>1</td>
                <td>Pantai Kuta</td>
                <td>Jalan Pantai Kuta, Bali</td>
                <td>
                  <button class="btn btn-warning btn-sm" onclick="openEditModal(1, 'Pantai Kuta', 'Jalan Pantai Kuta, Bali')">Edit</button>
                  <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus lokasi ini?')">Hapus</button>
                </td>
              </tr>
              <tr>
                <td>2</td>
                <td>Ubud</td>
                <td>Jalan Ubud, Gianyar</td>
                <td>
                  <button class="btn btn-warning btn-sm" onclick="openEditModal(2, 'Ubud', 'Jalan Ubud, Gianyar')">Edit</button>
                  <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus lokasi ini?')">Hapus</button>
                </td>
              </tr>
              {{-- Tambahkan data lain di sini --}}
            </tbody>
          </table>
        </div>
      </div>

    </div>
  </section>
</div>

{{-- Modal Tambah / Edit --}}
<div class="modal fade" id="locationModal" tabindex="-1" aria-labelledby="locationModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form id="locationForm" method="POST">
      @csrf
      <input type="hidden" name="_method" id="formMethod" value="POST">

      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="locationModalLabel">Tambah Location</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
        </div>

        <div class="modal-body">
          <div class="form-group mb-2">
            <label>Nama Lokasi</label>
            <input type="text" name="nama_lokasi" class="form-control" id="inputNamaLokasi" required>
          </div>

          <div class="form-group mb-2">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control" id="inputAlamat" rows="3" required></textarea>
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

{{-- Script untuk modal --}}
<script>
  function openAddModal() {
    document.getElementById('locationModalLabel').innerText = 'Tambah Location';
    document.getElementById('locationForm').action = '{{ route("admin.location.store") }}'; // nanti route backendnya
    document.getElementById('formMethod').value = 'POST';
    document.getElementById('inputNamaLokasi').value = '';
    document.getElementById('inputAlamat').value = '';
  }

  function openEditModal(id, nama, alamat) {
    document.getElementById('locationModalLabel').innerText = 'Edit Location';
    document.getElementById('locationForm').action = '/admin/location/' + id; // nanti route update backend
    document.getElementById('formMethod').value = 'PUT';
    document.getElementById('inputNamaLokasi').value = nama;
    document.getElementById('inputAlamat').value = alamat;

    new bootstrap.Modal(document.getElementById('locationModal')).show();
  }
</script>
@endsection
