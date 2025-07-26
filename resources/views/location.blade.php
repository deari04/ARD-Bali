@extends('layouts.app')

@section('content')

@php
  use App\Models\Location;
  $lokasi = Location::latest()->first(); // atau where('id', 1)
@endphp

<style>
    .section-title {
        font-size: 2.5rem;
        font-weight: 700;
        letter-spacing: 1px;
        color: #2c3e50;
    }

    .section-subtitle {
        font-size: 1.1rem;
        color: #7f8c8d;
    }

    .contact-info li {
        font-size: 1.05rem;
        margin-bottom: 15px;
    }

    .contact-info li strong {
        color: #34495e;
    }

    .contact-info a {
        color: #2980b9;
        text-decoration: none;
    }

    .contact-info a:hover {
        text-decoration: underline;
    }

    .card-map {
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
        transition: box-shadow 0.3s ease;
    }

    .card-map:hover {
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.18);
    }

    .contact-box {
        background: #f8f9fa;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        transition: box-shadow 0.3s ease;
    }

    .contact-box:hover {
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
    }
</style>

<div class="container mb-5 bg-white bg-opacity-75 p-3 rounded py-5">
    <div class="text-center mb-5">
        <h1 class="section-title">{{ $lokasi->title ?? 'LOKASI KAMI & CONTACT US' }}</h1>
        <p class="section-subtitle text-muted">{{ $lokasi->description ?? 'Temukan lokasi kami dan hubungi kami untuk informasi lebih lanjut' }}</p>
    </div>

    <div class="row g-4 align-items-center">
        <!-- Peta -->
        <div class="col-md-6">
            <h4 class="mb-3 text-primary fw-semibold">ALAMAT:</h4>
            <h6 class="mb-4 text-secondary text-muted">
                {{ $lokasi->address ?? 'Jl. Pulau Saelus Gg. IV No.8, Br. Pande, Kelurahan Pedungan, Kecamatan Denpasar Selatan, Denpasar - Bali' }}
            </h6>
            <div class="card-map">
                <div class="ratio ratio-16x9">
                    <iframe
                        src="{{ $lokasi->maps_embed_url ?? 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3944.0777215352646!2d115.20674247456853!3d-8.684159188435641!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xa417a19b66a03f5f%3A0x8b2d6f754ae8dc8!2sARD%20BALI%20(TOUR%20BALI%2CGATHERING%2COUTBOUND%2CMICE%2CWISATA%20BALI)!5e0!3m2!1sid!2sid!4v1749626881485!5m2!1sid!2sid' }}"
                        width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy">
                    </iframe>
                </div>
            </div>
        </div>

        <!-- Kontak -->
        <div class="col-md-6">
            <div class="contact-box">
                <h4 class="mb-4 text-primary fw-semibold">CONTACT US</h4>
                <ul class="list-unstyled contact-info">
                    @if($lokasi && $lokasi->email)
                        <li>
                            <i class="bi bi-envelope-fill text-danger me-2"></i>
                            <strong>Email:</strong> 
                            <a href="mailto:{{ $lokasi->email }}">{{ $lokasi->email }}</a>
                        </li>
                    @else
                        <li>
                            <i class="bi bi-envelope-fill text-danger me-2"></i>
                            <strong>Email:</strong> 
                            <a href="mailto:infoarindra@gmail.com">infoarindra@gmail.com</a>
                        </li>
                    @endif

                    @if($lokasi && $lokasi->phone)
                        <li>
                            <i class="bi bi-telephone-fill text-info me-2"></i>
                            <strong>Telepon:</strong> 
                            <a href="tel:{{ $lokasi->phone }}">{{ $lokasi->phone }}</a>
                        </li>
                    @else
                        <li>
                            <i class="bi bi-telephone-fill text-info me-2"></i>
                            <strong>Telepon:</strong> 
                            <a href="tel:+6289635043530">+62 896-3504-3530</a>
                        </li>
                    @endif

                    @if($lokasi && $lokasi->whatsapp)
                        <li>
                            <i class="bi bi-whatsapp text-success me-2"></i>
                            <strong>WhatsApp:</strong>
                            <a href="https://wa.me/{{ $lokasi->whatsapp }}" target="_blank" rel="noopener">
                                {{ $lokasi->whatsapp }}
                            </a>
                        </li>
                    @else
                        <li>
                            <i class="bi bi-whatsapp text-success me-2"></i>
                            <strong>WhatsApp:</strong>
                            <a href="https://wa.me/6281214251202" target="_blank" rel="noopener">
                                Chat via WhatsApp
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection