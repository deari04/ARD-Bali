@extends('layouts.app')

@section('content')

<!-- Hero Section -->
<div class="bg-dark text-white text-center py-5" style="background: url('/images/adventure-bg.jpg') center/cover no-repeat;">
    <div class="container">
        <h1 class="display-4 fw-bold">PAKET GATHERING BALI</h1>
        <p class="lead">Berbagai Pilihan Paket Gathering untuk Anda.</p>
    </div>
</div>

<!-- Layanan Cards -->
<div class="container py-5">
    <div class="row">
        @php
            $layanan = [
                'PAKET FAMILY GATHERING DI BALI',
                'PAKET GATHERING DI BALI',
                'PAKET GATHERING CORPORATE DI BALI',
                'PAKET GATHERING GOVERMENT DI BALI',
                'PAKET GATHERING MAHASISWA DI BALI',
                'PAKET GATHERING KOMUNITAS DI BALI'
            ];

            // Mapping gambar sesuai layanan
            $gambar = [
                'PAKET FAMILY GATHERING DI BALI' => 'family.jpg',
                'PAKET GATHERING DI BALI' => 'gathering-bali.jpg',
                'PAKET GATHERING CORPORATE DI BALI' => 'corporate.jpg',
                'PAKET GATHERING GOVERMENT DI BALI' => 'goverment.jpg',
                'PAKET GATHERING MAHASISWA DI BALI' => 'mahasiswa.JPG',
                'PAKET GATHERING KOMUNITAS DI BALI' => 'komunitas.JPG'
            ];

            $noWa = '6287824565254';
        @endphp

        @foreach ($layanan as $nama)
            @php
                $pesan = "Halo, saya tertarik dengan layanan $nama";
                $fileGambar = $gambar[$nama] ?? 'default.jpg'; // fallback jika gambar tidak ditemukan
            @endphp

            <div class="col-md-4 mb-4">
                <a href="#"
                   class="wa-link text-decoration-none text-dark"
                   data-phone="{{ $noWa }}"
                   data-text="{{ $pesan }}">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="position-relative">
                            <img src="{{ asset('assets/images/' . $fileGambar) }}"
                                 onerror="this.onerror=null; this.src='{{ asset('assets/images/default.jpg') }}';"
                                 class="card-img-top"
                                 alt="{{ $nama }}">

                            <div class="position-absolute top-0 start-0 bg-danger text-white px-2 py-1 fw-bold small">
                                GATHERING
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
