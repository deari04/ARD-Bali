@extends('layouts.app')

@section('content')
<!-- Include Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
    body {
        margin: 0;
        font-family: Arial, sans-serif;
    }
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
    .main-content {
        margin-left: 220px;
        padding: 30px;
    }
    .welcome-text {
        border-bottom: 1px solid #ccc;
        padding-bottom: 10px;
        margin-bottom: 20px;
    }
    .card {
        background-color: #fff;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }
</style>

<div class="d-flex">
    <div class="sidebar">
        <h5>LOGO ARD BALI</h5>
        <ul>
            <li><a href="#">Dashboard</a></li>
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

    <div class="main-content">
        <div class="welcome-text">
            <h2>Selamat Datang</h2>
        </div>

        <!-- Grafik Kunjungan -->
        <div class="card">
            <h5>Grafik Kunjungan Bulan Ini</h5>
            <canvas id="visitChart" height="100"></canvas>
        </div>
    </div>
</div>

<script>
    // Toggle submenu
    document.addEventListener('DOMContentLoaded', function () {
        const toggle = document.getElementById('menu-toggle');
        const submenu = document.getElementById('menu-submenu');

        toggle.addEventListener('click', function () {
            submenu.style.display = (submenu.style.display === 'block') ? 'none' : 'block';
        });

        // Chart.js script
        const ctx = document.getElementById('visitChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Minggu 1', 'Minggu 2', 'Minggu 3', 'Minggu 4'],
                datasets: [{
                    label: 'Jumlah Kunjungan',
                    data: [120, 150, 180, 130],
                    backgroundColor: '#0d6efd'
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>
@endsection
