@extends('layouts.app')

@section('content')
<style>
    .gallery-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 10px;
    }

    .gallery-description {
        font-size: 1.1rem;
        color: #7f8c8d;
        margin-bottom: 30px;
    }

    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 20px;
    }

    .gallery-card {
        background: #fff;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
    }

    .gallery-card img {
    width: 100%;
    height: 220px;
    object-fit: cover;
    }


    .gallery-card:hover {
        transform: translateY(-5px);
    }

    .gallery-comment {
        padding: 15px;
        font-size: 0.95rem;
        color: #555;
        background: #fafafa;
        border-top: 1px solid #eee;
    }

    .gallery-comment strong {
        color: #2c3e50;
    }

    .gallery-comment small {
        color: #7f8c8d;
    }

    .upload-form {
        margin-top: 40px;
        background: #f9f9f9;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    }

    .upload-form h4 {
        margin-bottom: 20px;
        color: #2c3e50;
    }
</style>

<div class="container py-5">
    <div class="text-center">
        <h1 class="gallery-title">Galeri Publik</h1>
        <p class="gallery-description">Lihat dan unggah momen terbaikmu. Semua orang bisa berpartisipasi!</p>
    </div>

    <!-- Grid Galeri -->
    {{-- data dummy sementara --}}
    @php
        $galeri = [
            ['nama' => 'pemandangan', 'komentar' => 'Pemandangan yang luar biasa!', 'user' => 'Dewi', 'email' => 'dewi@example.com'],
            ['nama' => 'pantai', 'komentar' => 'Senja di pantai memang selalu indah.', 'user' => 'Budi', 'email' => 'budi@gmail.com'],
            ['nama' => 'gunung', 'komentar' => 'Gunungnya bikin tenang banget!', 'user' => 'Sari', 'email' => 'sari@domain.com'],
            ['nama' => 'taman', 'komentar' => 'Taman yang asri dan hijau.', 'user' => 'Eka', 'email' => 'eka@domain.com'],
        ];
    @endphp

    <div class="d-flex justify-content-center">
        <div class="gallery-grid mb-5" style="max-width: 1100px; width: 100%;">
            @foreach ($galeri as $item)
                <div class="gallery-card">
                    <img src="https://picsum.photos/seed/{{ urlencode($item['nama']) }}/600/400" alt="{{ $item['nama'] }}">
                    <div class="gallery-comment">
                        <div><strong>{{ $item['user'] }}</strong> <small>({{ $item['email'] }})</small></div>
                        <div>Komentar: {{ $item['komentar'] }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


    <!-- Form Upload -->
    <div class="upload-form mx-auto" style="max-width: 600px;">
        <h4 class="text-center">Unggah Foto Kamu</h4>
        <form>
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control" id="name" placeholder="Masukkan nama kamu">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email (opsional)</label>
                <input type="email" class="form-control" id="email" placeholder="contoh@email.com">
            </div>
            <div class="mb-3">
                <label for="photo" class="form-label">Pilih Foto</label>
                <input type="file" class="form-control" id="photo">
            </div>
            <div class="mb-3">
                <label for="comment" class="form-label">Komentar</label>
                <textarea class="form-control" id="comment" rows="3" placeholder="Tulis komentarmu..."></textarea>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary px-4">Unggah</button>
            </div>
        </form>
    </div>

</div>
@endsection
