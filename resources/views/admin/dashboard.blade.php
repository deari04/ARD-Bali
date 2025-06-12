@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Halo Admin {{ Auth::guard('admin')->user()->name }}</h1>
    <p>Ini adalah halaman dashboard admin.</p>

    <form action="{{ route('admin.logout') }}" method="POST" class="mt-3">
        @csrf
        <button type="submit" class="btn btn-danger">
            <i class="bi bi-box-arrow-right"></i> Logout
        </button>
    </form>
</div>
@endsection
