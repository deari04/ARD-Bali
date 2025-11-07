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

        // Custom css lokasi
        .contact-item {
            transition: all 0.3s ease;
        }

        .contact-item:hover {
            background-color: #fff !important;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transform: translateY(-2px);
        }

        .icon-wrapper {
            width: 45px;
            height: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15) !important;
        }

        .divider {
            border-radius: 2px;
        }

        /* Smooth hover untuk links */
        a:not(.btn) {
            transition: all 0.3s ease;
        }

        a:not(.btn):hover {
            opacity: 0.8;
        }

        /* Responsive */
        @media (max-width: 991px) {

            .col-lg-7,
            .col-lg-5 {
                min-height: 400px;
            }
        }
    </style>


    {{-- <div id="carouselExample" class="carousel slide position-relative" data-bs-ride="carousel" data-bs-interval="5000" style="height: 103vh; overflow: hidden;">


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

</div> --}}


    @php
        use App\Models\Slider;
        $sliders = Slider::active()->ordered()->get();
    @endphp

    @if ($sliders->count() > 0)
        <div id="carouselExample" class="carousel slide position-relative" data-bs-ride="carousel" data-bs-interval="5000"
            style="height: 103vh; overflow: hidden;">

            <div class="carousel-inner w-100 h-100">
                @foreach ($sliders as $slider)
                    @foreach ($slider->image_path ?? [] as $index => $img)
                        <div class="carousel-item {{ $loop->parent->first && $loop->first ? 'active' : '' }} h-100">
                            <img src="{{ asset($img) }}" class="d-block w-100 h-100 object-fit-cover" alt="slide">
                        </div>
                    @endforeach
                @endforeach
            </div>

            {{-- TEXT HANYA SEKALI UNTUK SEMUA FOTO --}}
            <div class="position-absolute bottom-0 start-0 w-100 text-center mb-4 px-3">
                <div class="bg-dark bg-opacity-45 p-3 rounded mx-auto d-inline-block">
                    <h5 class="fw-bold text-white mb-2">
                        {{ $sliders->first()->headline_text }}
                    </h5>
                    @if ($sliders->first()->subheadline_text)
                        <p class="text-white mb-0">
                            {{ $sliders->first()->subheadline_text }}
                        </p>
                    @endif
                </div>
            </div>

        </div>
    @else
        <div class="text-center py-5">
            <p>Belum ada slider yang ditampilkan.</p>
        </div>
    @endif



    {{-- Container About --}}
    <div class="container content-overlay my-5" id="tentang-kami">
        <div class="row align-items-center">
            {{-- Kolom gambar --}}
            <div class="col-md-5 mb-4 mb-md-0">
                <img src="{{ asset('assets/images/team.jpeg') }}" class="img-fluid rounded-4 shadow"
                    style="height: 350px; object-fit: cover; width: 100%;" alt="our Team">
            </div>

            {{-- Kolom teks --}}
            <div class="col-md-7">
                <h2 class="fw-bold">Tentang Kami</h2>
                <p class="text-dark">
                    ARD ORGANIZER BALI adalah perusahaan yang bergerak melayani penyelenggaraan Event atau penyedia jasa
                    event dalam sekala besar maupun kecil. <br>
                    Dengan pelayanan yang mengutamakan kenyamanan dan menjadi sarana konsultasi bagi klien untuk berbagi
                    ide-ide kreatif, konsep inovatif, dan bekerja profesional memfasilitasi kebutuhan serta kepuasan klien
                    sebagai mitra bisnis.
                </p>
            </div>
        </div>
    </div>

    {{-- Layanan Kami --}}
    <div class="container content-overlay mb-5">
        <h2 class="mb-5 text-center fw-bold">Layanan Kami</h2>

        <div class="row g-4">
            @foreach ($mainServiceCategories as $category)
                @php
                    $service = $category->services->first();
                    $images = $service && $service->images->count() > 0 ? $service->images : collect([$service]);
                @endphp
                @if ($service)
                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm border-0 rounded-4 hover-shadow">

                            {{-- Carousel jika foto lebih dari 1 --}}
                            @if ($images->count() > 1)
                                <div id="carouselService{{ $loop->index }}" class="carousel slide" data-bs-ride="carousel"
                                    data-bs-interval="3000">
                                    <div class="carousel-inner rounded-top-4">
                                        @foreach ($images as $imgIndex => $image)
                                            <div class="carousel-item {{ $imgIndex === 0 ? 'active' : '' }}">
                                                <img src="{{ asset('storage/' . $image->image_path) }}"
                                                    class="d-block w-100 layanan-card-img" alt="...">
                                            </div>
                                        @endforeach
                                    </div>
                                    <button class="carousel-control-prev" type="button"
                                        data-bs-target="#carouselService{{ $loop->index }}" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon bg-dark rounded-circle"
                                            aria-hidden="true"></span>
                                        <span class="visually-hidden">Sebelumnya</span>
                                    </button>
                                    <button class="carousel-control-next" type="button"
                                        data-bs-target="#carouselService{{ $loop->index }}" data-bs-slide="next">
                                        <span class="carousel-control-next-icon bg-dark rounded-circle"
                                            aria-hidden="true"></span>
                                        <span class="visually-hidden">Berikutnya</span>
                                    </button>
                                </div>

                                {{-- Jika hanya 1 gambar --}}
                            @else
                                <a href="{{ route('layanan.show', $category->slug) }}">
                                    <img src="{{ asset('storage/' . $service->image_path) }}"
                                        class="card-img-top rounded-top-4 layanan-card-img" alt="{{ $category->name }}">
                                </a>
                            @endif

                            <div class="card-body layanan-card-body d-flex flex-column">
                                <h5 class="card-title text-uppercase text-center fw-bold mb-3">{{ $category->name }}</h5>
                                <p class="card-text flex-grow-1">{{ $category->description }}</p>
                                <a href="https://wa.me/6281214251202?text=Halo,%20saya%20tertarik%20dengan%20layanan%20{{ urlencode($category->name) }}"
                                    target="_blank" class="btn btn-outline-success mt-auto rounded-pill">Pesan Sekarang</a>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>



        {{-- Bagian Layanan Tambahan --}}
        <div class="my-5 text-center">
            {{-- <h4 class="mb-3 fw-bold">Layanan Tambahan</h4> --}}
            <div class="d-flex flex-wrap justify-content-center align-items-center gap-2">
                @foreach ($additionalServiceCategories as $category)
                    <a href="{{ route('layanan.show', $category->slug) }}"
                        class="text-decoration-none text-primary fw-semibold px-2">
                        {{ $category->name }}
                    </a>
                    @if (!$loop->last)
                        <span class="text-muted">|</span>
                    @endif
                @endforeach
            </div>
        </div>


    </div>


    {{-- Container Video YouTube --}}
    <div class="container content-overlay mb-5">
        <h2 class="text-center fw-bold mb-4">Youtube</h2>

        {{-- YouTube Videos --}}
        <div class="row justify-content-center g-4 mb-4">
            @foreach ($youtubeLinks as $link)
                @if ($link->youtube_id)
                    <div class="col-md-6">
                        <div class="ratio ratio-16x9 rounded-4 shadow-sm">
                            <iframe src="https://www.youtube.com/embed/{{ $link->youtube_id }}"
                                title="{{ $link->title }}" allowfullscreen>
                            </iframe>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        {{-- SECTION TESTIMONI INSTAGRAM STORY --}}
        @if ($instagramStory && $instagramStory->is_active)
            <div class="d-flex justify-content-center">
                <a href="{{ $instagramStory->story_url }}" target="_blank" class="text-decoration-none">
                    <div class="rounded-circle bg-white shadow d-flex justify-content-center align-items-center"
                        style="width: 180px; height: 180px; margin-bottom: 30px; transition: 0.3s;">

                        <div class="rounded-circle bg-dark d-flex justify-content-center align-items-center"
                            style="width: 170px; height: 170px;">
                            <span class="text-primary fw-bold" style="font-size: 1.8rem;">TESTIMONI</span>
                        </div>
                    </div>
                </a>
            </div>
        @endif
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
        $lokasi = Location::latest()->first();
    @endphp


    <section class="py-5">
        <div class="container content-overlay">
            {{-- Judul Section --}}
            <div class="text-center mb-5">
                <h2 class="fw-bold display-6 mb-2">
                    {{ $lokasi->title ?? 'Lokasi Kami' }}
                </h2>
                <div class="divider mx-auto"
                    style="width: 80px; height: 4px; background: linear-gradient(to right, #0d6efd, #0dcaf0);"></div>
            </div>

            <div class="row g-4 align-items-stretch">
                {{-- Google Maps --}}
                <div class="col-lg-7">
                    <div class="card border-0 shadow-sm h-100 rounded-4 overflow-hidden">
                        <div class="card-body p-0">
                            <div class="ratio ratio-16x9">
                                @if (!empty($lokasi->maps_embed_url))
                                    {!! $lokasi->maps_embed_url !!}
                                @else
                                    <div class="d-flex align-items-center justify-content-center bg-light">
                                        <div class="text-center">
                                            <i class="bi bi-geo-alt fs-1 text-muted mb-2"></i>
                                            <p class="text-muted m-0">Maps belum tersedia</p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Informasi Kontak --}}
                <div class="col-lg-5">
                    <div class="card border-0 shadow-sm h-100 rounded-4">
                        <div class="card-body p-4">
                            <h4 class="fw-bold mb-4 pb-3 border-bottom">
                                <i class="bi bi-compass me-2 text-primary"></i>
                                Kunjungi Kami
                            </h4>

                            <div class="contact-info">
                                @if (!empty($lokasi->address))
                                    <div class="contact-item mb-4 p-3 rounded-3 bg-light">
                                        <div class="d-flex align-items-start">
                                            <div class="icon-wrapper me-3">
                                                <i class="bi bi-geo-alt-fill text-primary fs-4"></i>
                                            </div>
                                            <div class="flex-grow-1">
                                                <p class="text-muted small mb-1 fw-semibold">Alamat</p>
                                                <p class="mb-0 text-dark">{{ $lokasi->address }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if (!empty($lokasi->whatsapp))
                                    <div class="contact-item mb-4 p-3 rounded-3 bg-light">
                                        <div class="d-flex align-items-start">
                                            <div class="icon-wrapper me-3">
                                                <i class="bi bi-whatsapp text-success fs-4"></i>
                                            </div>
                                            <div class="flex-grow-1">
                                                <p class="text-muted small mb-1 fw-semibold">WhatsApp</p>
                                                <a href="https://wa.me/{{ $lokasi->whatsapp }}" target="_blank"
                                                    class="text-decoration-none text-success fw-semibold d-inline-flex align-items-center">
                                                    {{ $lokasi->whatsapp }}
                                                    <i class="bi bi-box-arrow-up-right ms-2 small"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if (!empty($lokasi->phone))
                                    <div class="contact-item mb-4 p-3 rounded-3 bg-light">
                                        <div class="d-flex align-items-start">
                                            <div class="icon-wrapper me-3">
                                                <i class="bi bi-telephone-fill text-info fs-4"></i>
                                            </div>
                                            <div class="flex-grow-1">
                                                <p class="text-muted small mb-1 fw-semibold">Telepon</p>
                                                <a href="tel:{{ $lokasi->phone }}"
                                                    class="text-decoration-none text-info fw-semibold d-inline-flex align-items-center">
                                                    {{ $lokasi->phone }}
                                                    <i class="bi bi-telephone-outbound ms-2 small"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                {{-- CTA Button (Optional) --}}
                                @if (!empty($lokasi->maps_link))
                                    <div class="d-grid mt-4 pt-3 border-top">
                                        <a href="{{ $lokasi->maps_link }}" target="_blank"
                                            class="btn btn-outline-primary">
                                            <i class="bi bi-map me-2"></i>
                                            Buka di Google Maps
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
