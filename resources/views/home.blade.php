@extends('layouts.app')

@section('content')
<style>

   html {
    scroll-behavior: smooth;
  }

  .link-highlight {
    color: rgb(0, 30, 255);
    text-decoration: none;
  }

  .link-highlight:hover,
  .link-highlight:visited {
    color: rgb(0, 0, 0);
  }
  /* body {
    background-image: url('https://images.pexels.com/photos/3183197/pexels-photo-3183197.jpeg?auto=compress&cs=tinysrgb&w=1600');
    background-size: cover;
    background-attachment: fixed;
    background-repeat: no-repeat;
    background-position: center;
  } */

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

   .layanan-card-img {
    height: 220px;
    object-fit: cover;
  }

  .layanan-card-body {
    min-height: 250px;
    display: flex;
    flex-direction: column;
  }

</style>

{{-- Carousel Fullscreen dengan Tagline di Bagian Bawah --}}
<div id="carouselExample" class="carousel slide position-relative" data-bs-ride="carousel" data-bs-interval="5000" style="height: 103vh; overflow: hidden;">

  {{-- Isi slide --}}
  <div class="carousel-inner w-100 h-100">
    <div class="carousel-item active h-100">
      <img src="{{ asset('assets/images/Outbond.jpg') }}" class="d-block w-100 h-100 object-fit-cover" alt="slide">
    </div>
    <div class="carousel-item h-100">
      <img src="{{ asset('assets/images/slide-2.jpg') }}" class="d-block w-100 h-100 object-fit-cover" alt="slide">
    </div>
    <div class="carousel-item h-100">
      <img src="https://images.pexels.com/photos/464321/pexels-photo-464321.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2"
           class="d-block w-100 h-100 object-fit-cover" alt="slide">
    </div>
  </div>

  {{-- Tagline di bagian bawah carousel --}}
  <div class="position-absolute bottom-0 start-0 w-100 text-center mb-4 px-3">
    <div class="bg-dark bg-opacity-45 p-3 rounded mx-auto d-inline-block">
      <h5 class="fw-bold text-white mb-2">
        <a href="/layanan/outbond" class="text-warning text-decoration-none">OUTBOUND BALI</a>
        |
        <a href="/layanan/tour" class="text-warning text-decoration-none">TOUR BALI</a>
        |
        <a href="#tentang-kami" class="text-warning text-decoration-none">EVENT ORGANIZER BALI</a>
      </h5>

      <p class="text-white mb-0">
        OUTBOUND BALI | TOUR & TRAVEL | GATHERING | MICE | SHOW MANAGEMENT | PRIVATE TOUR | ARTIST MANAGEMENT |
        ENTERTAINMENT | EVENT EQUIPMENT | MULTIMEDIA
      </p>
    </div>
  </div>

</div>



{{-- Container About --}}
<div class="container content-overlay my-5" id="tentang-kami">
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


<div class="container content-overlay my-5" id="why-ard-bali">
  <div class="row align-items-center">
    <div class="col-12 text-center mb-4">
      <h2 class="fw-bold">Why ARD Bali</h2>
    </div>
    <div class="col-12">
        <ul class="list-unstyled p-4">
          <li class="mb-3">
            <h5 class="fw-semibold mb-1">Penyedia Jasa Event Terbaik</h5>
            <p class="text-muted mb-0">Momentum kami ciptakan agar waktu yang telah kalian luangkan menjadi sangat berkesan. Totalitas pelayanan dan event yang menyenangkan adalah prioritas kami.</p>
          </li>
          <li class="mb-3">
            <h5 class="fw-semibold mb-1">Creative Thinking</h5>
            <p class="text-muted mb-0">Berpikir kreatif adalah kunci utama tim kami untuk menciptakan karya yang unik dan menarik.</p>
          </li>
          <li class="mb-3">
            <h5 class="fw-semibold mb-1">Solid TeamWork</h5>
            <p class="text-muted mb-0">Tim yang kompak dan berpengalaman siap membantu kelancaran acara dari awal sampai akhir dengan dedikasi tinggi.</p>
          </li>
          <li class="mb-3">
            <h5 class="fw-semibold mb-1">Fun</h5>
            <p class="text-muted mb-0">Kami menghadirkan rangkaian acara yang menyenangkan agar momen Anda penuh kesan positif.</p>
          </li>
          <li class="mb-3">
            <h5 class="fw-semibold mb-1">Reliable</h5>
            <p class="text-muted mb-0">Kami adalah partner terpercaya yang selalu hadir dengan solusi tepat dan komitmen penuh.</p>
          </li>
        </ul>
    </div>
  </div>
</div>




<div class="container content-overlay mb-5">
  <h2 class="mb-5 text-center fw-bold">Layanan Kami</h2>

  {{-- Tampilan GRID untuk desktop dan tablet --}}
  <div class="row g-4 d-none d-md-flex">
    @foreach ([
      ['title' => 'Outbond Bali', 'img' => 'Outbond.jpg', 'url' => 'outbond', 'desc' => 'Kami menyediakan layanan Outbond Bali yang menyenangkan dan penuh petualangan.'],
      ['title' => 'Tour Bali', 'img' => 'Tour.jpeg', 'url' => 'tour', 'desc' => 'Nikmati tour terbaik di Bali dengan layanan dan destinasi pilihan kami.'],
      ['title' => 'Gathering Bali', 'img' => 'Gathering.jpg', 'url' => 'gathering', 'desc' => 'Layanan gathering perusahaan dan komunitas yang seru dan berkesan di Bali.'],
      ['title' => 'Gala Dinner Bali', 'img' => 'Gathering.jpg', 'url' => 'GalaDinner', 'desc' => 'Layanan Gala Dinner perusahaan dan komunitas yang seru dan berkesan di Bali.'],
      ['title' => 'Mice Bali', 'img' => 'Gathering.jpg', 'url' => 'mice', 'desc' => 'Layanan Mice perusahaan dan komunitas yang seru dan berkesan di Bali.'],
      ['title' => 'Show Management Bali', 'img' => 'Gathering.jpg', 'url' => 'showmanagement', 'desc' => 'Layanan Show management perusahaan dan komunitas yang seru dan berkesan di Bali.']
    ] as $item)
    <div class="col-md-4">
  <div class="card h-100 shadow-sm border-0 rounded-4 hover-shadow">
    <a href="{{ url('/layanan/' . $item['url']) }}">
      <img src="{{ asset('assets/images/' . $item['img']) }}" class="card-img-top rounded-top-4 layanan-card-img" alt="{{ $item['title'] }}">
    </a>
    <div class="card-body layanan-card-body">
      <h5 class="card-title text-uppercase">{{ $item['title'] }}</h5>
      <p class="card-text flex-grow-1">{{ $item['desc'] }}</p>
      <a href="https://wa.me/6281234567890?text=Halo,%20saya%20tertarik%20dengan%20layanan%20{{ urlencode($item['title']) }}" target="_blank" class="btn btn-outline-success mt-auto rounded-pill">Pesan Sekarang</a>
    </div>
  </div>
</div>

    @endforeach
  </div>

  {{-- Tampilan SLIDE untuk HP --}}
  <div id="layananCarousel" class="carousel slide d-block d-md-none" data-bs-ride="carousel">
    <div class="carousel-inner">
      @foreach ([
        ['title' => 'Outbond Bali', 'img' => 'Outbond.jpg', 'url' => 'outbond', 'desc' => 'Kami menyediakan layanan Outbond Bali yang menyenangkan dan penuh petualangan.'],
        ['title' => 'Tour Bali', 'img' => 'Tour.jpeg', 'url' => 'tour', 'desc' => 'Nikmati tour terbaik di Bali dengan layanan dan destinasi pilihan kami.'],
        ['title' => 'Gathering Bali', 'img' => 'Gathering.jpg', 'url' => 'gathering', 'desc' => 'Layanan gathering perusahaan dan komunitas yang seru dan berkesan di Bali.'],
        ['title' => 'Gala Dinner Bali', 'img' => 'Gathering.jpg', 'url' => 'GalaDinner', 'desc' => 'Layanan Gala Dinner perusahaan dan komunitas yang seru dan berkesan di Bali.'],
        ['title' => 'Mice Bali', 'img' => 'Gathering.jpg', 'url' => 'mice', 'desc' => 'Layanan Mice perusahaan dan komunitas yang seru dan berkesan di Bali.'],
        ['title' => 'Show Management Bali', 'img' => 'Gathering.jpg', 'url' => 'showmanagement', 'desc' => 'Layanan Show management perusahaan dan komunitas yang seru dan berkesan di Bali.']
      ] as $index => $item)
      <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
  <div class="card mx-3 shadow-sm border-0 rounded-4 hover-shadow h-100">
    <a href="{{ url('/layanan/' . $item['url']) }}">
      <img src="{{ asset('assets/images/' . $item['img']) }}" class="card-img-top rounded-top-4 layanan-card-img" alt="{{ $item['title'] }}">
    </a>
    <div class="card-body layanan-card-body">
      <h5 class="card-title text-uppercase">{{ $item['title'] }}</h5>
      <p class="card-text flex-grow-1">{{ $item['desc'] }}</p>
      <a href="https://wa.me/6281234567890?text=Halo,%20saya%20tertarik%20dengan%20layanan%20{{ urlencode($item['title']) }}" target="_blank" class="btn btn-outline-success mt-auto rounded-pill">Pesan Sekarang</a>
    </div>
  </div>
</div>

      @endforeach
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#layananCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon bg-dark rounded-circle" aria-hidden="true"></span>
      <span class="visually-hidden">Sebelumnya</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#layananCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon bg-dark rounded-circle" aria-hidden="true"></span>
      <span class="visually-hidden">Berikutnya</span>
    </button>
  </div>

  {{-- Layanan Tambahan (tidak slide) --}}
  <div class="my-5 text-center">
    @php
      $services = [
        ['name' => 'Adventure', 'url' => '/layanan/adventure'],
        ['name' => 'Event Production', 'url' => '/layanan/eventproduction'],
        ['name' => 'Music Event', 'url' => '/layanan/music'],
        ['name' => 'Multimedia', 'url' => '/layanan/multimedia'],
        ['name' => 'Artis Management', 'url' => '/layanan/artismanagement'],
        ['name' => 'Transportasi', 'url' => '/layanan/transportasi'],
        ['name' => 'Tour Guide', 'url' => '/layanan/tourguide'],
        ['name' => 'Launching Produk', 'url' => '/layanan/launchingproduk'],
        ['name' => 'Rekomendasi Resto', 'url' => '/layanan/resto'],
        ['name' => 'Rekomendasi Hotel', 'url' => '/layanan/hotel'],
      ];
    @endphp

    <div class="d-flex flex-wrap justify-content-center align-items-center gap-2">
      @foreach ($services as $index => $service)
        <a href="{{ url($service['url']) }}" class="text-decoration-none text-primary fw-semibold px-2">
          {{ $service['name'] }}
        </a>
        @if ($index !== count($services) - 1)
          <span class="text-muted">|</span>
        @endif
      @endforeach
    </div>
  </div>
</div>

{{-- Container Video YouTube --}}
<div class="container content-overlay mb-5">
  <h2 class="text-center fw-bold mb-4">Youtube</h2>
  <div class="row justify-content-center g-4">
    @foreach ($youtubeLinks as $link)
      @if ($link->youtube_id)
      <div class="col-md-6">
        <div class="ratio ratio-16x9 rounded-4 shadow-sm">
          <iframe 
            src="https://www.youtube.com/embed/{{ $link->youtube_id }}" 
            title="{{ $link->title }}" 
            allowfullscreen>
          </iframe>
        </div>
      </div>
      @endif
    @endforeach
  </div>
</div>


<div class="d-flex justify-content-center mt-n4">
  <!-- Lingkaran luar putih -->
  <div class="rounded-circle bg-white shadow d-flex justify-content-center align-items-center"
       style="width: 180px; height: 180px; margin-top: 10px; margin-bottom: 30px;">
       
    <!-- Lingkaran dalam hitam -->
    <a href="https://www.instagram.com/stories/highlights/18007382972709905/" 
       target="_blank" class="text-decoration-none">
      <div class="rounded-circle bg-dark d-flex justify-content-center align-items-center"
           style="width: 170px; height: 170px;">
        <span class="text-primary fw-bold" style="font-size: 1.8rem;">TESTIMONI</span>
      </div>
    </a>
    
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

@php
  use App\Models\Location;
  $lokasi = Location::latest()->first(); // atau where('id', 1)
@endphp

<section class="py-5">
  <div class="container content-overlay">
    <div class="shadow-sm rounded-4 overflow-hidden">
      
        {{-- Judul --}}
        <h2 class="card-title text-center fw-bold mb-5">
          {{ $lokasi->title ?? 'Lokasi ARD Bali' }}
        </h2>

        <div class="row g-4">
          {{-- Google Maps --}}
          <div class="col-md-6">
            <div class="ratio ratio-16x9 rounded-4 border">
              <iframe
                src="{{ $lokasi->maps_embed_url }}"
                allowfullscreen
                loading="lazy"
                class="w-100 h-100 border-0">
              </iframe>
            </div>
          </div>

          {{-- Kontak --}}
          <div class="col-md-6 d-flex flex-column justify-content-center">
            <h5 class="fw-semibold mb-4">Kunjungi Kami</h5>
            <ul class="list-unstyled">
              @if($lokasi->address)
                <li class="mb-3">
                  <i class="bi bi-geo-alt-fill text-primary me-2"></i>
                  <strong>Alamat:</strong> {{ $lokasi->address }}
                </li>
              @endif

              @if($lokasi->whatsapp)
                <li class="mb-3">
                  <i class="bi bi-whatsapp text-success me-2"></i>
                  <strong>WhatsApp:</strong>
                  <a href="https://wa.me/{{ $lokasi->whatsapp }}" target="_blank">
                    {{ $lokasi->whatsapp }}
                  </a>
                </li>
              @endif

              @if($lokasi->phone)
                <li class="mb-3">
                  <i class="bi bi-telephone-fill text-info me-2"></i>
                  <strong>Telepon:</strong>
                  <a href="tel:{{ $lokasi->phone }}">
                    {{ $lokasi->phone }}
                  </a>
                </li>
              @endif

              @if($lokasi->email)
                <li class="mb-0">
                  <i class="bi bi-envelope-fill text-danger me-2"></i>
                  <strong>Email:</strong>
                  <a href="mailto:{{ $lokasi->email }}">
                    {{ $lokasi->email }}
                  </a>
                </li>
              @endif
            </ul>
          </div>
        </div>
      
    </div>
  </div>
</section>



@endsection
