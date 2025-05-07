@extends('layouts.app') <!-- jika pakai layout -->
@section('content')
<div class="container py-5">
    <div class="row text-center">
      @for ($i = 0; $i < 6; $i++)
        <div class="col-md-4 mb-4">
          <div class="d-flex justify-content-center">
            <div class="rounded-circle bg-secondary" style="width: 250px; height: 250px;"></div>
            <p class="mt-3">Nama Layanan {{ $i + 1 }}</p>
          </div>
        </div>
      @endfor
    </div>
  </div>
@endsection
