@extends('layouts.login')

@section('content')
<!-- Include Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style>
    .sidebar {
        height: 100vh;
        width: 220px;
        background-color: #f8f9fa;
        border-right: 1px solid #dee2e6;
        padding-top: 20px;
        position: fixed;
        overflow-y: auto;
    }
    .sidebar h5 {
        text-align: center;
        margin-bottom: 30px;
        font-weight: bold;
    }
    .sidebar ul {
        list-style: none;
        padding: 0 20px;
    }
    .sidebar ul li {
        margin: 10px 0;
    }
    .sidebar ul li a {
        text-decoration: none;
        color: #000;
        font-weight: 500;
        display: block;
        cursor: pointer;
    }
    .submenu {
        margin-left: 15px;
        margin-top: 5px;
        display: none;
    }
    .submenu li {
        margin: 5px 0;
    }
    
    .konten-container {
        margin-left: 220px; /* Sesuaikan jika kamu pakai sidebar */
        padding: 30px;
        font-family: Arial, sans-serif;
    }

    .konten-header {
        text-align: center;
        margin-bottom: 20px;
    }

    .btn-upload {
        margin-bottom: 15px;
    }

    table {
        width: 180%;
        border-collapse: collapse;
        background-color: #ddd;
    }

    th, td {
        border: 1px solid #999;
        padding: 10px;
        text-align: center;
        vertical-align: middle;
    }

    th {
        background-color: #eee;
    }

    .aksi-icons i {
        margin: 0 5px;
        cursor: pointer;
    }

    .aksi-icons i:hover {
        color: #0d6efd;
    }
</style>

<div class="d-flex">
    <div class="sidebar">
        <h5>LOGO ARD BALI</h5>
        <ul>
            <li><a href="dashboard">Dashboard</a></li>
            <li>
                <a id="menu-toggle">Menu &#9662;</a>
                <ul class="submenu" id="menu-submenu">
                    <li><a href="{{ route('konten.index') }}">Konten dan Layanan</a></li>
                    <li><a href="{{ route('gallery.index') }}">Gallery</a></li>
                </ul>
            </li>
        </ul>

        <form action="{{ route('admin.logout') }}" method="POST" class="mt-4 px-3">
            @csrf
            <button type="submit" class="btn btn-danger w-100">
                <i class="bi bi-box-arrow-right"></i> Logout
            </button>
        </form>
    </div>

<div class="konten-container">
    <h2 class="konten-header">Kelola Konten dan Layanan</h2>

    <button class="btn btn-primary btn-upload">UPLOAD</button>

    <table>
        <thead>
            <tr>
                <th>NO</th>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Kategori</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            {{-- Contoh data sementara --}}
            <tr>
                <td>1</td>
                <td>Outbound Bali</td>
                <td>Paket Outbound Seru di Pantai</td>
                <td>Wisata</td>
                <td><img src="{{ asset('storage/uploads/outbound.jpg') }}" alt="Foto" width="80"></td>
                <td class="aksi-icons">
                    <i class="bi bi-plus-circle"></i>
                    <i class="bi bi-pencil-square"></i>
                    <i class="bi bi-trash"></i>
                    <i class="bi bi-share"></i>
                </td>
            </tr>
            {{-- Tambah data lainnya sesuai kebutuhan --}}
        </tbody>
    </table>
</div>
<script>
    // Toggle submenu
    document.addEventListener('DOMContentLoaded', function () {
        const toggle = document.getElementById('menu-toggle');
        const submenu = document.getElementById('menu-submenu');

        toggle.addEventListener('click', function () {
            submenu.style.display = (submenu.style.display === 'block') ? 'none' : 'block';
        });

    });
</script>
@endsection
