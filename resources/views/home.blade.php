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
<div class="container content-overlay mt-4 mb-5">

  {{-- Carousel --}}
  <div id="carouselExample" class="carousel slide mb-5" data-bs-ride="carousel" data-bs-interval="3000">
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

</div> {{-- End wrapper carousel --}}

{{-- Container About --}}
<div class="container content-overlay mb-5">
  <div class="row align-items-center">
    <div class="col-md-5 mb-4 mb-md-0">
      <img src="https://images.pexels.com/photos/31829947/pexels-photo-31829947/free-photo-of-close-up-of-monstera-leaves-with-dew-drops.jpeg?auto=compress&cs=tinysrgb&w=600&lazy=load" class="img-fluid rounded-4 shadow" style="height: 350px; object-fit: cover; width: 100%;" alt="About Image">
    </div>
    <div class="col-md-7">
      <h2 class="fw-bold">Tentang Kami</h2>
      <p class="text-muted">ARD ORGANIZER BALI  adalah perusahaan yang bergerak melayani penyelenggaraan Event atau penyedia jasa event dalam sekala besar maupun kecil. <br>
        Dengan pelayanan yang mengutamakan kenyamanan dan menjadi sarana konsultasi bagi klien untuk berbagi ide-ide kreatif, konsep inovatif, dan bekerja professional memfasilitasi kebutuhan serta kepuasan klien sebagai mitra bisnis.</p>
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
        <img src="https://images.pexels.com/photos/3183197/pexels-photo-3183197.jpeg?auto=compress&cs=tinysrgb&w=600" class="card-img-top rounded-top-4" style="height: 220px; object-fit: cover;" alt="Outbond Bali">
        <div class="card-body d-flex flex-column">
          <h5 class="card-title text-uppercase">Outbond Bali</h5>
          <p class="card-text flex-grow-1">Kami menyediakan layanan Outbond Bali yang menyenangkan dan penuh petualangan.</p>
          <a href="{{ url('/layanan/outbond') }}" class="btn btn-outline-success mt-auto rounded-pill">Pesan Sekarang</a>
        </div>
      </div>
    </div>

    {{-- Tour --}}
    <div class="col-md-4">
      <div class="card h-100 shadow-sm border-0 rounded-4 hover-shadow">
        <img src="https://images.pexels.com/photos/3183197/pexels-photo-3183197.jpeg?auto=compress&cs=tinysrgb&w=600" class="card-img-top rounded-top-4" style="height: 220px; object-fit: cover;" alt="Tour Bali">
        <div class="card-body d-flex flex-column">
          <h5 class="card-title text-uppercase">Tour Bali</h5>
          <p class="card-text flex-grow-1">Nikmati tour terbaik di Bali dengan layanan dan destinasi pilihan kami.</p>
          <a href="{{ url('/layanan/tour') }}" class="btn btn-outline-success mt-auto rounded-pill">Pesan Sekarang</a>
        </div>
      </div>
    </div>

    {{-- Gathering --}}
    <div class="col-md-4">
      <div class="card h-100 shadow-sm border-0 rounded-4 hover-shadow">
        <img src="https://images.pexels.com/photos/3183197/pexels-photo-3183197.jpeg?auto=compress&cs=tinysrgb&w=600" class="card-img-top rounded-top-4" style="height: 220px; object-fit: cover;" alt="Gathering Bali">
        <div class="card-body d-flex flex-column">
          <h5 class="card-title text-uppercase">Gathering Bali</h5>
          <p class="card-text flex-grow-1">Layanan gathering perusahaan dan komunitas yang seru dan berkesan di Bali.</p>
          <a href="{{ url('/layanan/gathering') }}" class="btn btn-outline-success mt-auto rounded-pill">Pesan Sekarang</a>
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
</div>
@endsection
