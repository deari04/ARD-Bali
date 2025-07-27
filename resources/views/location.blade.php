@extends('layouts.app')

@section('content')
@php
  use App\Models\Location;
  $lokasi = Location::latest()->first(); // Mengambil data lokasi terbaru
@endphp

<style>
  .section-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: #2c3e50;
  }

  .section-subtitle {
    font-size: 1.1rem;
    color: #7f8c8d;
  }

  .contact-info li {
    font-size: 1rem;
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
    <h1 class="section-title">{{ $lokasi->title ?? 'Lokasi ARD Bali' }}</h1>
    <p class="section-subtitle text-dark">{{ $lokasi->description ?? 'Temukan lokasi kami dan hubungi kami untuk informasi lebih lanjut' }}</p>
  </div>

  <div class="row g-4 align-items-start">
    {{-- Peta --}}
    <div class="col-md-6">
      <div class="card-map mb-4">
        <div class="ratio ratio-16x9">
          @if($lokasi && $lokasi->maps_embed_url)
            {!! $lokasi->maps_embed_url !!}
          @else
            <div class="d-flex align-items-center justify-content-center bg-light h-100">
              <p class="text-muted">Maps belum tersedia</p>
            </div>
          @endif
        </div>
      </div>

      @if($lokasi->address)
        <h5 class="fw-semibold text-primary mb-2">Alamat:</h5>
        <p class="text-dark fs-5 lh-lg" style="font-weight: 500;">
        {{ $lokasi->address }}
        </p>
      @endif
    </div>

    {{-- Kontak --}}
    <div class="col-md-6">
      <div class="contact-box">
        <h4 class="mb-4 text-primary fw-semibold">Contact Us</h4>
        <ul class="list-unstyled contact-info">
          @if($lokasi->email)
            <li>
              <i class="bi bi-envelope-fill text-danger me-2"></i>
              <strong>Email:</strong> 
              <a href="mailto:{{ $lokasi->email }}">{{ $lokasi->email }}</a>
            </li>
          @endif

          @if($lokasi->phone)
            <li>
              <i class="bi bi-telephone-fill text-info me-2"></i>
              <strong>Telepon:</strong> 
              <a href="tel:{{ $lokasi->phone }}">{{ $lokasi->phone }}</a>
            </li>
          @endif

          @if($lokasi->whatsapp)
            <li>
              <i class="bi bi-whatsapp text-success me-2"></i>
              <strong>WhatsApp:</strong> 
              <a href="https://wa.me/{{ $lokasi->whatsapp }}" target="_blank">{{ $lokasi->whatsapp }}</a>
            </li>
          @endif
        </ul>
      </div>
    </div>
  </div>
</div>
@endsection
