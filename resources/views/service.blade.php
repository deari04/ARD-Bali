@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="fw-bold">OUR SERVICE</h1>
        <p class="text-muted">Berbagai layanan profesional untuk kebutuhan acara Anda</p>
    </div>

    <div class="row">
        @php
            $layanan = [
                'OUTBOUND BALI' => 'outbond',
                'GATHERING BALI' => 'gathering',
                'ADVENTURE BALI' => 'adventure',
                'TOUR BALI' => 'tour',
                'GALA DINNER BALI' => 'gala-dinner',
                'EVENT PRODUCTION BALI' => 'event-production',
                'MICE BALI' => 'mice',
                'MUSIC EVENT' => 'music-event',
                'MULTIMEDIA BALI' => 'multimedia',
                'ARTIS MANAGEMENT' => 'artis-management',
                'SHOW MANAGEMENT BALI' => 'show-management',
                'SEWA TRANSPORTASI BALI' => 'sewa-transportasi',
                'TOUR GUIDE BALI' => 'tour-guide',
                'LAUNCHING PRODUK BALI' => 'launching-produk'
            ];
        @endphp

        @foreach ($layanan as $nama => $slug)
            <div class="col-lg-4 col-md-6 mb-4">
                <a href="{{ route('layanan.show', $slug) }}" class="text-decoration-none text-dark">
                    <div class="card h-100 shadow-sm border-0 hover-shadow">
                        <div class="card-body text-center">
                            <div class="mx-auto mb-3 rounded-circle bg-danger text-white d-flex justify-content-center align-items-center" style="width: 100px; height: 100px; font-size: 1.5rem;">
                                <i class="bi bi-briefcase"></i> {{-- Optional icon if Bootstrap Icons used --}}
                            </div>
                            <h5 class="card-title fw-bold">{{ $nama }}</h5>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection
