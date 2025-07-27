@extends('layouts.admin')
@include('admin.sidebar')

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar Layanan</h1>
    
    <a href="{{ route('admin.services.create') }}" class="btn btn-primary mb-3">Tambah Layanan</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Kategori</th>
                <th>WhatsApp</th>
                <th>Aktif</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($services as $service)
                <tr>
                    <td>{{ $service->name }}</td>
                    <td>{{ $service->category->name ?? '-' }}</td>
                    <td>{{ $service->whatsapp_message }}</td>
                    <td>{{ $service->is_active ? 'Ya' : 'Tidak' }}</td>
                    <td>
                        <a href="{{ route('admin.services.edit', $service->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus layanan ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $services->links() }} {{-- Pagination --}}
</div>
@endsection
