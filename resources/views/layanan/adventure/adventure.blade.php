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
        <h1 class="display-4 fw-bold">PAKET ADVENTURE BALI</h1>
        <p class="lead">Berbagai Pilihan Paket Adventure untuk Anda.</p>
    </div>
</div>

<div class="row">
   @php
    $layanan = [
        'RAFTING BALI' => 'rafting',
        'ATV BALI' => 'atv',
        'PAINTBALL BALI' => 'paintball',
        'WATERSPORT TANJUNG BENOA BALI' => 'watersport',
        'VW SAFARI BALI' => 'vw',
        'JEEP TOUR KINTAMANI' => 'jeep',
        'OFFROAD BALI' => 'offroad',
        'RIVER TUBING BALI' => 'river',
        'BUGGY RIDE BALI' => 'buggy',
        'PARAGLIDING' => 'paragliding',
        'MOTOCROSS BALI' => 'motocross',
        'CYCLING BALI' => 'cycling',
        'AMAZING RACE' => 'race',
        'TREASUR HUNT BALI' => 'treasur',
        'STAND UP PADDLE' => 'standup'
    ];

            $gambar = [
                'RAFTING BALI' => 'rafting.jpg',
                'ATV BALI' => 'atv.jpg',
                'PAINTBALL BALI' => 'paintball.JPG',
                'WATERSPORT TANJUNG BENOA BALI' => 'watersport.JPG',
                'VW SAFARI BALI' => 'vw.jpg',
                'JEEP TOUR KINTAMANI' => 'jeep-kintamani.jpg',
                'OFFROAD BALI' => 'offroad.jpg',
                'RIVER TUBING BALI' => 'river.jpg',
                'BUGGY RIDE BALI' => 'buggy.jpg',
                'PARAGLIDING' => 'paragliding.jpg',
                'MOTOCROSS BALI' => 'motocross.jpg',
                'CYCLING BALI' => 'cycling.jpg',
                'AMAZING RACE' => 'race.jpg',
                'TREASUR HUNT BALI' => 'treasur.jpg',
                'STAND UP PADDLE' => 'standup.jpg'
            ];

    $layanan_aktif = ['rafting', 'atv', 'paintball', 'watersport', 'vw'];
    $layanan_wa = ['jeep', 'offroad', 'river', 'buggy', 'paragliding', 'motocross', 'cycling', 'race', 'treasur', 'standup'];
    $noWa = '6287824565254';
@endphp

<div class="row">
    @foreach ($layanan as $nama => $slug)
        @php
            $isAktif = in_array($slug, $layanan_aktif);
            $isWa = in_array($slug, $layanan_wa);
            $pesan = "Halo, saya tertarik dengan layanan $nama";
            $fileGambar = $gambar[$nama] ?? 'default.jpg';
        @endphp

        <div class="col-md-4 mb-4">
            @if ($isAktif)
                <a href="{{ url('/layanan/adventure/' . $slug) }}" class="text-decoration-none text-dark">
            @elseif ($isWa)
                <a href="#" class="wa-link text-decoration-none text-dark" data-phone="{{ $noWa }}" data-text="{{ $pesan }}">
            @endif

            <div class="card shadow-sm border-0 h-100 {{ !$isAktif && !$isWa ? 'opacity-75' : '' }}">
                <div class="position-relative">
                            <img src="{{ asset('assets/images/' . $fileGambar) }}"
                     onerror="this.onerror=null; this.src='{{ asset('assets/images/default.jpg') }}';"
                     class="card-img-top img-fixed"
                     alt="{{ $nama }}">
                    <div class="position-absolute top-0 start-0 bg-danger text-white px-2 py-1 fw-bold small">
                        ADVENTURE
                    </div>
                    <div class="position-absolute top-0 end-0 bg-white text-danger px-2 py-1 fw-bold small">
                        GROUP EVENT
                    </div>
                </div>
                <div class="card-body text-center">
                    <h5 class="card-title fw-bold text-danger">{{ $nama }}</h5>
                </div>
            </div>

            @if ($isAktif || $isWa)
                </a>
            @endif
        </div>
    @endforeach
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
