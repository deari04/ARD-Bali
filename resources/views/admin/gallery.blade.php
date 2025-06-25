@extends('layouts.app')

@section('content')
<!-- Chart.js CDN -->
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

    .gallery-container {
        margin-left: 220px;
        padding: 30px;
        font-family: Arial, sans-serif;
    }

    .gallery-header {
        text-align: center;
        margin-bottom: 20px;
    }

    .btn-upload {
        margin-bottom: 15px;
    }

    table {
        width: 280%;
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

    .chart-card {
        background-color: #fff;
        padding: 20px;
        margin-bottom: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    .chart-card h5 {
        margin-bottom: 15px;
    }
</style>

<div class="d-flex">
    <!-- Sidebar -->
    <div class="sidebar">
        <h5>LOGO ARD BALI</h5>
        <ul>
            <li><a href="/dashboard">Dashboard</a></li>
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

    <!-- Main Content -->
    <div class="gallery-container">
        <h2 class="gallery-header">Kelola Gallery</h2>


        <!-- Tombol Upload -->
        <button class="btn btn-primary btn-upload">UPLOAD</button>

        <!-- Tabel Galeri -->
        <table>
            <thead>
                <tr>
                    <th>NO</th>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <!-- Contoh statis -->
                <tr>
                    <td>1</td>
                    <td>G001</td>
                    <td>Outbound Seru</td>
                    <td><img src="https://via.placeholder.com/80" alt="Foto" width="80"></td>
                    <td class="aksi-icons">
                        <i class="bi bi-plus-circle"></i>
                        <i class="bi bi-pencil-square"></i>
                        <i class="bi bi-trash"></i>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>G002</td>
                    <td>Team Building</td>
                    <td><img src="https://via.placeholder.com/80" alt="Foto" width="80"></td>
                    <td class="aksi-icons">
                        <i class="bi bi-plus-circle"></i>
                        <i class="bi bi-pencil-square"></i>
                        <i class="bi bi-trash"></i>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Script: Toggle submenu + Chart -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggle = document.getElementById('menu-toggle');
        const submenu = document.getElementById('menu-submenu');

        toggle.addEventListener('click', function () {
            submenu.style.display = (submenu.style.display === 'block') ? 'none' : 'block';
        });

        
    });
</script>
@endsection
