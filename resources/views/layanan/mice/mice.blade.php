@extends('layouts.app')

@section('content')

<style>
    .img-fixed {
        width: 100%;
        height: 250px;
        object-fit: cover;
        border-top-left-radius: 0.375rem; /* mengikuti Bootstrap rounded img */
        border-top-right-radius: 0.375rem;
    }
</style>
<!-- Hero Section -->
<div class="bg-dark text-white text-center py-5" style="background: url('/images/adventure-bg.jpg') center/cover no-repeat;">
    <div class="container">
        <h1 class="display-4 fw-bold">EVENT MICE BALI</h1>
        <p class="lead">Berbagai Pilihan MICE untuk Anda.</p>
    </div>
</div>

<!-- Layanan Cards -->
<div class="container py-5">
    <div class="row">
        @php
            $layanan = [
                'MICE MEETING BALI',
                'MICE EXHIBITION',
                'MICE CONVENTION',

            ];
         $noWa = '6287824565254'; // Ganti dengan nomor WhatsApp kamu
        @endphp

        @foreach ($layanan as $nama)
            @php
                $pesan = "Halo, saya tertarik dengan layanan $nama";
            @endphp

            <div class="col-md-4 mb-4">
                <a href="#"
                   class="wa-link text-decoration-none text-dark"
                   data-phone="{{ $noWa }}"
                   data-text="{{ $pesan }}">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="position-relative">
                            <img src="https://picsum.photos/seed/{{ urlencode($nama) }}/600/400" class="card-img-top" alt="{{ $nama }}">
                            <div class="position-absolute top-0 start-0 bg-danger text-white px-2 py-1 fw-bold small">
                                OUTBOND
                            </div>
                            <div class="position-absolute top-0 end-0 bg-white text-danger px-2 py-1 fw-bold small">
                                GROUP EVENT
                            </div>
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title fw-bold text-danger">{{ $nama }}</h5>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>

<!-- Script Deteksi Mobile/Desktop untuk WhatsApp -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const links = document.querySelectorAll('.wa-link');
        const isMobile = /iPhone|Android|iPad/i.test(navigator.userAgent);

        links.forEach(link => {
            const phone = link.dataset.phone;
            const text = encodeURIComponent(link.dataset.text);
            const waLink = isMobile
                ? `https://wa.me/${phone}?text=${text}`
                : `https://web.whatsapp.com/send?phone=${phone}&text=${text}`;

            link.setAttribute('href', waLink);
            link.setAttribute('target', '_blank');
        });
    });
</script>

@endsection
