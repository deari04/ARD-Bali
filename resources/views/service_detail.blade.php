@extends('layouts.app')

@section('content')

<style>
    .img-fixed {
        width: 100%;
        height: 250px;
        object-fit: cover;
        border-top-left-radius: 0.375rem;
        border-top-right-radius: 0.375rem;
    }
</style>

<!-- Hero Section -->
<div class="bg-dark text-white text-center py-5" style="background: url('/images/adventure-bg.jpg') center/cover no-repeat;">
    <div class="container">
        <h1 class="display-4 fw-bold">{{ strtoupper($category->name) }}</h1>
        <p class="lead">{{ $category->description ?? 'Berbagai Pilihan ' . $category->name . ' untuk Anda.' }}</p>
    </div>
</div>

<!-- Services Cards -->
<div class="container py-5">
    <div class="row">
        @if(isset($services) && $services->count() > 0)
            @foreach ($services as $service)
                @php
                    $noWa = $whatsappNumber ?? '628'; // fallback nomor WA
                    $pesan = $service->whatsapp_message ?: "Halo, saya tertarik dengan layanan {$service->name}";
                @endphp

                <div class="col-md-4 mb-4">
                    <a href="#"
                       class="wa-link text-decoration-none text-dark"
                       data-phone="{{ $noWa }}"
                       data-text="{{ $pesan }}">
                        <div class="card shadow-sm border-0 h-100">
                            <div class="position-relative">
                                @if($service->image_path)
                                    <img src="{{ asset('storage/' . $service->image_path) }}"
                                         onerror="this.onerror=null; this.src='{{ asset('assets/images/default.jpg') }}';"
                                         class="card-img-top img-fixed"
                                         alt="{{ $service->name }}">
                                @else
                                    <img src="{{ asset('assets/images/default.jpg') }}"
                                         class="card-img-top img-fixed"
                                         alt="{{ $service->name }}">
                                @endif

                                <div class="position-absolute top-0 start-0 bg-danger text-white px-2 py-1 fw-bold small">
                                    {{ strtoupper($category->name) }}
                                </div>
                                <div class="position-absolute top-0 end-0 bg-white text-danger px-2 py-1 fw-bold small">
                                    GROUP EVENT
                                </div>
                            </div>
                            <div class="card-body text-center">
                                <h5 class="card-title fw-bold text-danger">{{ strtoupper($service->name) }}</h5>
                                @if($service->description)
                                    <p class="card-text text-muted small">{{ Str::limit($service->description, 100) }}</p>
                                @endif
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        @else
            <!-- Empty State -->
            <div class="col-12">
                <div class="text-center py-5">
                    <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                    <h5 class="text-muted">Belum ada layanan tersedia</h5>
                    <p class="text-muted">Layanan untuk kategori {{ $category->name }} sedang dalam proses.</p>
                </div>
            </div>
        @endif
    </div>
</div>

<!-- WhatsApp Script -->
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
