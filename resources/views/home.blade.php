@extends('layouts.app')

@section('content')
<style>
  body {
    background-image: url('https://images.pexels.com/photos/3183197/pexels-photo-3183197.jpeg?auto=compress&cs=tinysrgb&w=1600');
    background-size: cover;
    background-attachment: fixed;
    background-repeat: no-repeat;
    background-position: center;
  }

  .content-overlay {
    background-color: rgba(255, 255, 255, 0.9);
    padding: 50px 20px;
    border-radius: 15px;
    backdrop-filter: blur(3px);
  }

  .hover-shadow:hover {
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    transform: translateY(-5px);
    transition: all 0.3s ease-in-out;
  }
</style>

{{-- Wrapper utama --}}
<div class="container content-overlay mt-4 mb-4">

  {{-- Carousel --}}
  <div id="carouselExample" class="carousel slide mb-5" data-bs-ride="carousel" data-bs-interval="5000">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>

    <div class="carousel-inner rounded-4 overflow-hidden" style="height: 400px;">
      <div class="carousel-item active">
        <img src="https://images.pexels.com/photos/235829/pexels-photo-235829.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" class="d-block w-100 h-100 object-fit-cover" alt="slide">
      </div>
      <div class="carousel-item">
        <img src="https://images.pexels.com/photos/388415/pexels-photo-388415.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" class="d-block w-100 h-100 object-fit-cover" alt="slide">
      </div>
      <div class="carousel-item">
        <img src="https://images.pexels.com/photos/464321/pexels-photo-464321.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" class="d-block w-100 h-100 object-fit-cover" alt="slide">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  {{-- Tagline Section --}}
<div class="container text-center my-4 tagline-section">
  <h5 class="fw-bold text-dark">OUTBOUND BALI | TOUR BALI | EVENT ORGANIZER BALI</h5>
  <p class="text-muted mb-0">OUTBOUND BALI | TOUR & TRAVEL | GATHERING | MICE | SHOW MANAGEMENT | PRIVATE TOUR | ARTIST MANAGEMENT | ENTERTAINMENT | EVENT EQUIPMENT | MULTIMEDIA</p>
</div>

</div> {{-- End wrapper carousel --}}

{{-- Container About --}}
<div class="container content-overlay mb-5">
  <div class="row align-items-center">
    {{-- Kolom gambar --}}
    <div class="col-md-5 mb-4 mb-md-0">
      <img src="{{ asset('assets/images/team.jpeg') }}" class="img-fluid rounded-4 shadow" style="height: 350px; object-fit: cover; width: 100%;" alt="our Team">
    </div>
    
    {{-- Kolom teks --}}
    <div class="col-md-7">
      <h2 class="fw-bold">Tentang Kami</h2>
      <p class="text-muted">
        ARD ORGANIZER BALI adalah perusahaan yang bergerak melayani penyelenggaraan Event atau penyedia jasa event dalam sekala besar maupun kecil. <br>
        Dengan pelayanan yang mengutamakan kenyamanan dan menjadi sarana konsultasi bagi klien untuk berbagi ide-ide kreatif, konsep inovatif, dan bekerja profesional memfasilitasi kebutuhan serta kepuasan klien sebagai mitra bisnis.
      </p>
    </div>
  </div>
</div>


{{-- Container Services --}}
<div class="container content-overlay mb-5">
  <h2 class="mb-5 text-center fw-bold">Layanan Kami</h2>
  <div class="row g-4">
    {{-- Outbond --}}
    <div class="col-md-4">
      <div class="card h-100 shadow-sm border-0 rounded-4 hover-shadow">
        <img src="{{ asset('assets/images/Outbond.jpg') }}" class="card-img-top rounded-top-4" style="height: 220px; object-fit: cover;" alt="Outbond Bali">
        <div class="card-body d-flex flex-column">
          <h5 class="card-title text-uppercase">Outbond Bali</h5>
          <p class="card-text flex-grow-1">Kami menyediakan layanan Outbond Bali yang menyenangkan dan penuh petualangan.</p>
          {{-- <a href="{{ url('/layanan/outbond') }}" class="btn btn-outline-success mt-auto rounded-pill">Pesan Sekarang</a> --}}
          <a href="https://wa.me/6281234567890?text=Halo,%20saya%20tertarik%20dengan%20layanan%20Tour%20Bali" target="_blank" class="btn btn-outline-success mt-auto rounded-pill">
            Pesan Sekarang
          </a>

        </div>
      </div>
    </div>

    {{-- Tour --}}
    <div class="col-md-4">
      <div class="card h-100 shadow-sm border-0 rounded-4 hover-shadow">
        <img src="{{ asset('assets/images/Tour.jpeg') }}" class="card-img-top rounded-top-4" style="height: 220px; object-fit: cover;" alt="Tour Bali">
        <div class="card-body d-flex flex-column">
          <h5 class="card-title text-uppercase">Tour Bali</h5>
          <p class="card-text flex-grow-1">Nikmati tour terbaik di Bali dengan layanan dan destinasi pilihan kami.</p>
          {{-- <a href="{{ url('/layanan/tour') }}" class="btn btn-outline-success mt-auto rounded-pill">Pesan Sekarang</a> --}}
          <a href="https://wa.me/6281234567890?text=Halo,%20saya%20tertarik%20dengan%20layanan%20Tour%20Bali" target="_blank" class="btn btn-outline-success mt-auto rounded-pill">
            Pesan Sekarang
          </a>

        </div>
      </div>
    </div>

    {{-- Gathering --}}
    <div class="col-md-4">
      <div class="card h-100 shadow-sm border-0 rounded-4 hover-shadow">
        <img src="{{ asset('assets/images/Gathering.jpg') }}" class="card-img-top rounded-top-4" style="height: 220px; object-fit: cover;" alt="Gathering Bali">
        <div class="card-body d-flex flex-column">
          <h5 class="card-title text-uppercase">Gathering Bali</h5>
          <p class="card-text flex-grow-1">Layanan gathering perusahaan dan komunitas yang seru dan berkesan di Bali.</p>
          {{-- <a href="{{ url('/layanan/gathering') }}" class="btn btn-outline-success mt-auto rounded-pill">Pesan Sekarang</a> --}}
          <a href="https://wa.me/6281234567890?text=Halo,%20saya%20tertarik%20dengan%20layanan%20Gathering%20Bali" target="_blank" class="btn btn-outline-success mt-auto rounded-pill">
            Pesan Sekarang
          </a>
        </div>
      </div>
    </div>
  </div>

  {{-- Tombol Selengkapnya --}}
  <div class="row mt-5">
    <div class="col-12">
      <a href="{{ url('/service') }}" class="d-block text-center w-100 py-3 rounded-pill bg-light text-primary fw-bold text-decoration-none shadow-sm">
        Selengkapnya
      </a>
    </div>
  </div>

{{-- Daftar Layanan ARD Bali (Grid Box Style) --}}
<div class="container my-5">
  <h4 class="text-center fw-bold mb-4">Layanan Lainnya dari ARD Bali</h4>
  <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-3">
  @php
    $services = [
      ['name' => 'Adventure', 'url' => '/layanan/adventure'],
      ['name' => 'Gala Dinner', 'url' => '/layanan/GalaDinner'],
      ['name' => 'Event Production', 'url' => '/layanan/eventproduction'],
      ['name' => 'MICE', 'url' => '/layanan/mice'],
      ['name' => 'Music Event', 'url' => '/layanan/music'],
      ['name' => 'Multimedia', 'url' => '/layanan/multimedia'],
      ['name' => 'Artis Management', 'url' => '/layanan/artismanagement'],
      ['name' => 'Show Management', 'url' => '/layanan/showmanagement'],
      ['name' => 'Transportasi', 'url' => '/layanan/transportasi'],
      ['name' => 'Tour Guide', 'url' => '/layanan/tourguide'],
      ['name' => 'Launching Produk', 'url' => '/layanan/launchingproduk'],
    ];
  @endphp

    @foreach ($services as $service)
    <div class="col">
      <a href="{{ url($service['url']) }}" class="text-decoration-none">
        <div class="service-box shadow-sm rounded-4 text-center py-4 px-2 h-100 bg-white border border-light hover-shadow">
          <span class="fw-semibold text-primary">{{ $service['name'] }}</span>
        </div>
      </a>
    </div>
    @endforeach
  </div>
</div>

</div>


{{-- Container Video YouTube --}}
<div class="container content-overlay mb-5">
  <h2 class="text-center fw-bold mb-4">Youtube</h2>
  <div class="row justify-content-center g-4">
    <div class="col-md-6">
      <div class="ratio ratio-16x9 rounded-4 shadow-sm">
        <iframe src="https://www.youtube.com/embed/VIDEO_ID_1" title="YouTube video 1" allowfullscreen></iframe>
      </div>
    </div>
    <div class="col-md-6">
      <div class="ratio ratio-16x9 rounded-4 shadow-sm">
        <iframe src="https://www.youtube.com/embed/VIDEO_ID_2" title="YouTube video 2" allowfullscreen></iframe>
      </div>
    </div>
  </div>
</div>


{{-- Container Our Client --}}
<div class="container content-overlay mb-5">
  <div class="row align-items-center">
    <h2 class="fw-bold align-items-center text-center mb-4">Klien Kami</h2>
    <img src="{{ asset('assets/images/Client.jpg') }}" alt="Our Client">
  </div>
</div>


{{-- Container Lokasi --}}

<div class="container content-overlay mb-5">
  <h2 class="fw-bold text-center mb-4">Lokasi ARD Bali</h2>
  <div class="row align-items-center">
    {{-- Kolom Map --}}
    <div class="col-md-6 mb-4 mb-md-0">
      <div class="ratio ratio-16x9 rounded-4 shadow-sm">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3944.0777215352646!2d115.20674247456853!3d-8.684159188435641!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xa417a19b66a03f5f%3A0x8b2d6f754ae8dc8!2sARD%20BALI%20(TOUR%20BALI%2CGATHERING%2COUTBOUND%2CMICE%2CWISATA%20BALI)!5e0!3m2!1sid!2sid!4v1749626881485!5m2!1sid!2sid"
          width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy">
        </iframe>
      </div>
    </div>

    {{-- Kolom Tulisan --}}
    <div class="col-md-6">
      <h5 class="fw-semibold mb-4">Kunjungi Kami</h5>
      {{-- <p class="text-muted">
        (Tulisan ini bisa diisi dengan kata-kata sambutan, penjelasan lokasi, atau info tambahan).
      </p> --}}

      <ul class="list-unstyled">
        <li><strong>Alamat:</strong> Jl. Pulau Saelus Gg. IV No.8 Br. Pande Kelurahan. Pedungan Kecamatan Denpasar Selatan. Denpasar - Bali</li>
        <li><strong>Telepon:</strong> +62 82120233079</li>
        <li><strong>Email:</strong> infoarindra@gmail.com</li>
      </ul>
    </div>

  </div>
</div>

@endsection
