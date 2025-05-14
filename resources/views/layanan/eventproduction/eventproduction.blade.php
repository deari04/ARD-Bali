@extends('layouts.app')

@section('content')

<!-- Hero Section -->
<div class="bg-dark text-white text-center py-5" style="background: url('/images/adventure-bg.jpg') center/cover no-repeat;">
    <div class="container">
        <h1 class="display-4 fw-bold">EVENT PRODUCTION BALI </h1>
        <p class="lead">Berbagai Pilihan Event Production untuk Anda.</p>
    </div>
</div>

<!-- Layanan Cards -->
<div class="container py-5">
    <div class="row">
        @php
            $layanan = [
                'SEWA LED SCREEN BALI',
                'SEWA SOUND SYSTEM BALI',
                'SEWA LIGHTING BALI',
                'SEWA PANGGUNG BALI',
                'SEWA RIGGING BALI',
                'SEWA TENDA BALI',
                'SEWA MINI GARDEN BALI',
                'SEWA DEKORASI BALI',
                'SEWA LIVE CAM BALI',
                'SEWA HANDY TALKY BALI',
                'SEWA GENSET BALI',
                'SEWA SARNAVIL BALI',
                'SEWA PARTISI BALI',
                'SEWA BACKDROP BALI',
                'SEWA MEJA BALI',
                'SEWA KURSI BALI',
                'SEWA WELCOME GATE BALI',
                'SEWA BARIKADE BALI',
                'SEWA QLINE BALI',
                'SEWA AC PORTABLE BALI',
                'SEWA MISTY FAN BALI',
                'SEWA EARCOM BALI',
                'SEWA SPECIAL EFFECT BALI',


            ];
        @endphp

        @foreach ($layanan as $nama)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm border-0 h-100">
                    <div class="position-relative">
                        <img src="https://picsum.photos/seed/{{ urlencode($nama) }}/600/400" class="card-img-top" alt="{{ $nama }}">
                        <div class="position-absolute top-0 start-0 bg-danger text-white px-2 py-1 fw-bold small">
                            EVENT PRODUCTION
                        </div>
                        <div class="position-absolute top-0 end-0 bg-white text-danger px-2 py-1 fw-bold small">
                            GROUP EVENT
                        </div>
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold text-danger">{{ $nama }}</h5>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
