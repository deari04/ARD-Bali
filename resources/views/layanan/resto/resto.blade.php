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
        <h1 class="display-4 fw-bold">Rekomendasi Resto di Bali</h1>
        <p class="lead">Berbagai Pilihan Resto untuk Anda.</p>
    </div>
</div>

<!-- Layanan Cards -->
<div class="container py-5">
    <div class="row">
        @php
            $layanan = [
                "AROMA RESTO",
                "NEW MOON RESTO",
                "WARUNG LIBERDADE",
                "CLIFF AT CANA RESTO",
                "ROOSTERFISH BEACH CLUB",
                "PANDAWA SEA VIEW",
                "LELANGON BEACH",
                "ATLAS BEACH RESTO",
                "JENDELA BALI RESTO",
                "BERANDA BALI RESTO",
                "AMANAIA RESTO",
                "GEMITIR BALI RESTO",
                "BALI SENTOSA RESTO",
                "AYAM TEMPONG INDRA RENON",
                "AYAM TEMPONG INDRA KUTA",
                "AYAM TEMPONG DEWI SRI",
                "MAGUS WARUNG",
                "MINOO BEACH CLUB",
                "KARMA KANDARA",
                "UMANA / COMMUNE",
                "WARUNG MAK JO",
                "WARUNG KITA BY SAKERA",
                "CATTAMARAN BEACH RESTO"

            ];

            $gambar = [
                // 'OUTBOUND BEDUGUL' => 'bedugul.jpg',
                // 'OUTBOUND UBUD' => 'ubud.jpg',
                // 'OUTBOUND KINTAMANI' => 'kintamani.jpg',
                // 'OUTBOUND DENPASAR' => 'denpasar.jpg',
                // 'OUTBOUND GIANYAR' => 'gianyar.jpg',
                // 'OUTBOUND KUTA' => 'kuta.jpg',
                // 'OUTBOUND NUSA PENIDA' => 'nusa-penida.jpg',
                // 'OUTBOUND TABANAN' => 'tabanan.jpg',
                // 'OUTBOUND GWK' => 'gwk.jpg',
                // 'OUTBOUND ULUWATU' => 'uluwatu.jpg',
                // 'OUTBOND INDOOR' => 'indoor.jpg',
                // 'OUTBOUND PANTAI PANDAWA' => 'pandawa.JPG',
                // 'OUTBOUND PANTAI KUTA' => 'kuta.jpg',
                // 'OUTBOUND PANTAI NUSA DUA' => 'nusa-dua.jpg',
                // 'OUTBOUND PANTAI JIMBARAN' => 'jimbaran.jpg',
                // 'OUTBOUND PANTAI JERMAN' => 'jerman.jpg',
                // 'OUTBOUND PANTAI ULUWATU' => 'uluwatu.JPG',
                // 'OUTBOUND PANTAI SANUR' => 'pantai-sanur.jpg',
                // 'OUTBOUND PANTAI PADANG PADANG' => 'padang-padang.JPG',
                // 'OUTBOUND PANTAI MENGIAT' => 'mengiat.JPG',
                // 'OUTBOUND PANTAI MELASTI' => 'melasti.jpg',
                // 'OUTBOUND PANTAI DREAMLAND' => 'dreamland.jpg',
                // 'OUTBOUND PANTAI LOVINA BULELENG' => 'lovina-buleleng.jpg'
            ];

            $noWa = '6287824565254'; // Ganti dengan nomor WhatsApp kamu
        @endphp

        @foreach ($layanan as $nama)
            @php
                $pesan = "Halo, saya tertarik dengan layanan $nama";
                $fileGambar = $gambar[$nama] ?? 'default.jpg';
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
