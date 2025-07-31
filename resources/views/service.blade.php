@extends('layouts.app')

@section('content')
<style>
  .main-container {
    margin-top: 90px; /* Agar tidak tertutup navbar fixed-top */
  }
</style>

<div class="container py-5 main-container">
    <div class="text-center mb-5 bg-white bg-opacity-75 p-3 rounded">
        <h1 class="fw-bold">OUR SERVICE</h1>
        <p class="text-dark">Berbagai layanan profesional untuk kebutuhan acara Anda</p>
    </div>

    <div class="row">
        @foreach ($categories as $category)
            <div class="col-lg-4 col-md-6 mb-4">
                <a href="{{ route('layanan.show', $category->slug) }}" class="text-decoration-none text-dark">
                    <div class="card h-100 shadow-sm border-0 hover-shadow">
                        <div class="card-body text-center">
                            <div class="mx-auto mb-3 rounded-circle text-white d-flex justify-content-center align-items-center"
                                 style="width: 100px; height: 100px; font-size: 1.5rem; background: #333;">
                                <i class="{{ $category->icon_class }}"></i>
                            </div>
                            <h5 class="card-title fw-bold">{{ $category->name }}</h5>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection
