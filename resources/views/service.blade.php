@extends('layouts.app')
@section('content')
<div class="container py-5">
    <div class="row text-center">
    <h1>Our Service</h1>
      @php
        $layanan = [
            'OUTBOUND BALI',
            'GATHERING BALI',
            'ADVENTURE BALI',
            'TOUR BALI',
            'GALA DINNER BALI',
            'EVENT PRODUCTION BALI',
            'MICE BALI',
            'MUSIC EVENT',
            'MULTIMEDIA BALI',
            'ARTIS MANAGEMENT',
            'SHOW MANAGEMENT BALI',
            'SEWA TRANSPORTASI BALI',
            'TOUR GUIDE BALI',
            'LAUNCHING PRODUK BALI'
        ];
      @endphp

      @foreach ($layanan as $nama)
        <div class="col-md-4 mb-4 mt-4">
          <div class="d-flex flex-column align-items-center">
            <div class="rounded-circle bg-secondary" style="width: 100px; height: 100px;"></div>
            <p class="mt-3">{{ $nama }}</p>
          </div>
        </div>
      @endforeach

    </div>
</div>
@endsection
