@extends('layouts.app')

@section('content')
@php
  use App\Models\Location;
  $lokasi = Location::latest()->first(); // Mengambil data lokasi terbaru
@endphp

<style>
  .main-container {
    margin-top: 25px;
    margin-bottom: 100px; /* Tambahkan ini untuk memberikan ruang pada footer */
    padding: 25px 20px 40px 20px !important;
  }

  .section-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 0.5rem;
  }

  .section-subtitle {
    font-size: 1.1rem;
    color: #6c757d;
    margin-bottom: 0;
  }

  .card-map {
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
    margin-bottom: 1.5rem;
  }

  .card-map:hover {
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
    transform: translateY(-2px);
  }

  .address-section {
    background: #f8f9fa;
    padding: 20px;
    border-radius: 12px;
    border-left: 4px solid #2980b9;
  }

  .address-section h5 {
    color: #2c3e50;
    font-weight: 600;
    margin-bottom: 12px;
    font-size: 1.1rem;
  }

  .address-section p {
    color: #495057;
    font-size: 1rem;
    line-height: 1.6;
    margin: 0;
  }

  .contact-box {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    padding: 35px;
    border-radius: 15px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
    height: 100%;
    min-height: 280px;
  }

  .contact-box:hover {
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
    transform: translateY(-2px);
  }

  .contact-box h4 {
    color: #2c3e50;
    font-weight: 600;
    margin-bottom: 25px;
    padding-bottom: 15px;
    border-bottom: 2px solid #dee2e6;
  }

  .contact-info li {
    font-size: 1rem;
    margin-bottom: 20px;
    padding: 10px;
    background: white;
    border-radius: 8px;
    transition: all 0.2s ease;
  }

  .contact-info li:hover {
    background: #fff;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
    transform: translateX(5px);
  }

  .contact-info li strong {
    color: #34495e;
    display: inline-block;
    min-width: 90px;
  }

  .contact-info li i {
    font-size: 1.2rem;
    width: 30px;
    text-align: center;
  }

  .contact-info a {
    color: #2980b9;
    text-decoration: none;
    transition: color 0.2s ease;
  }

  .contact-info a:hover {
    color: #3498db;
    text-decoration: underline;
  }

  .no-data-alert {
    background: #fff3cd;
    border-left: 4px solid #ffc107;
    padding: 20px;
    border-radius: 8px;
    margin: 20px 0;
  }

  @media (max-width: 768px) {
    .section-title {
      font-size: 2rem;
    }
    
    .main-container {
      margin-top: 15px;
      margin-bottom: 120px; /* Lebih besar untuk mobile karena footer biasanya lebih tinggi */
      padding: 20px 15px !important;
    }
    
    .contact-box {
      margin-top: 20px;
      min-height: auto;
    }
  }
</style>


<div class="container main-container mb-5 bg-white rounded shadow-sm">
  <div class="text-center mb-5">
    <h1 class="section-title">{{ $lokasi->title ?? 'Lokasi ARD Bali' }}</h1>
    <p class="section-subtitle">{{ $lokasi->description ?? 'Temukan lokasi kami dan hubungi kami untuk informasi lebih lanjut' }}</p>
  </div>

  @if(!$lokasi)
    <div class="no-data-alert">
      <h5 class="mb-2"><i class="bi bi-exclamation-triangle-fill text-warning me-2"></i>Data Lokasi Belum Tersedia</h5>
      <p class="mb-0">Silakan tambahkan data lokasi melalui halaman admin terlebih dahulu.</p>
    </div>
  @else
    <div class="row g-4">
      {{-- Peta & Alamat --}}
      <div class="col-lg-6">
        <div class="card-map">
          <div class="ratio ratio-16x9">
            @if($lokasi->maps_embed_url)
              {!! $lokasi->maps_embed_url !!}
            @else
              <div class="d-flex align-items-center justify-content-center bg-light h-100">
                <p class="text-muted">Maps belum tersedia</p>
              </div>
            @endif
          </div>
        </div>

        @if($lokasi->address)
          <div class="address-section">
            <h5><i class="bi bi-geo-alt-fill me-2"></i>Alamat</h5>
            <p>{{ $lokasi->address }}</p>
          </div>
        @endif
      </div>

      {{-- Kontak --}}
      <div class="col-lg-6">
        <div class="contact-box">
          <h4><i class="bi bi-headset me-2"></i>Contact Us</h4>
          <ul class="list-unstyled contact-info">
            @if($lokasi->email)
              <li>
                <i class="bi bi-envelope-fill text-danger"></i>
                <strong>Email:</strong> 
                <a href="mailto:{{ $lokasi->email }}">{{ $lokasi->email }}</a>
              </li>
            @endif

            @if($lokasi->phone)
              <li>
                <i class="bi bi-telephone-fill text-info"></i>
                <strong>Telepon:</strong> 
                <a href="tel:{{ $lokasi->phone }}">{{ $lokasi->phone }}</a>
              </li>
            @endif

            @if($lokasi->whatsapp)
              <li>
                <i class="bi bi-whatsapp text-success"></i>
                <strong>WhatsApp:</strong> 
                <a href="https://wa.me/{{ $lokasi->whatsapp }}" target="_blank">{{ $lokasi->whatsapp }}</a>
              </li>
            @endif

            @if(!$lokasi->email && !$lokasi->phone && !$lokasi->whatsapp)
              <li class="text-muted">
                <i class="bi bi-info-circle me-2"></i>
                Informasi kontak belum tersedia
              </li>
            @endif
          </ul>
        </div>
      </div>
    </div>
  @endif
</div>
@endsection