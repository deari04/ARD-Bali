@extends('layouts.login')

@section('content')
<style>
  body {
    background-image: url('{{ asset('assets/images/background.png') }}');
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: center;
  }

  .content-overlay {
    background-color: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(4px);
    border-radius: 15px;
    padding: 40px;
    max-width: 420px;
    margin: 80px auto;
    box-shadow: 0 0 25px rgba(0, 0, 0, 0.2);
  }

  .login-logo a {
    font-size: 2rem;
    font-weight: bold;
    color: #000;
  }

  .btn-primary {
    background-color: #007bff;
    border: none;
  }

  .btn-primary:hover {
    background-color: #0056b3;
  }

  .form-control:focus {
    box-shadow: 0 0 5px rgba(0,123,255,.5);
  }
</style>

<div class="content-overlay">
  <div class="text-center mb-4 login-logo">
    <a><b>ARD</b> Bali</a>
    <p class="text-muted mb-0">Selamat Datang</p>
  </div>

  {{-- Menampilkan pesan error --}}
  @if(session('error'))
    <div class="alert alert-danger">
      {{ session('error') }}
    </div>
  @endif

  <form method="POST" action="{{ route('admin.login') }}">
    @csrf

    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <div class="input-group">
        <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan email" value="{{ old('email') }}" required autofocus>
        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
      </div>
      @error('email')
        <span class="text-danger small d-block mt-1">{{ $message }}</span>
      @enderror
    </div>

    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <div class="input-group">
        <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan password" required>
        <span class="input-group-text"><i class="fas fa-lock"></i></span>
      </div>
      @error('password')
        <span class="text-danger small d-block mt-1">{{ $message }}</span>
      @enderror
    </div>

    <div class="mb-3 form-check">
      <input type="checkbox" class="form-check-input" id="remember" name="remember">
      <label class="form-check-label" for="remember">Remember Me</label>
    </div>

    <div class="d-grid">
      <button type="submit" class="btn btn-primary">Login</button>
    </div>
  </form>
</div>
@endsection
