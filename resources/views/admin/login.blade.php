@extends('layouts.app')

@section('content')
<style>
    body {
        background: #f5f7fa;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }
    .login-container {
        max-width: 450px;
        margin: auto;
        padding-top: 50px;
        padding-bottom: 80px; /* beri ruang untuk footer */
    }
    .card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }
    .card-header {
        background-color: #007bff;
        color: white;
        border-radius: 15px 15px 0 0;
        text-align: center;
    }
    .btn-primary {
        width: 100%;
        border-radius: 10px;
    }
</style>

<div class="login-container">
    <div class="card">
        <div class="card-header py-4">
            <h4 class="mb-0">Login Admin</h4>
        </div>
        <div class="card-body">
            {{-- Tampilkan pesan error umum --}}
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <form method="POST" action="{{ route('admin.login') }}">
                @csrf
                {{-- Email --}}
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input
                        type="email"
                        name="email"
                        id="email"
                        class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email') }}"
                        required
                    >
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input
                        type="password"
                        name="password"
                        id="password"
                        class="form-control @error('password') is-invalid @enderror"
                        required
                    >
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button class="btn btn-primary" type="submit">Login</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('footer')
<footer class="footer bg-light fixed-bottom py-3 shadow-sm">
    <div class="container text-center">
        <small class="text-muted">&copy; {{ date('Y') }} ARD Bali. All rights reserved.</small>
    </div>
</footer>
@endsection
