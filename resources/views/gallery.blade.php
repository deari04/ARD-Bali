@extends('layouts.app')

@section('content')
<style>
    .main-container {
        margin-top: 90px; /* agar tidak tertutup navbar fixed-top */
    }

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
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .gallery-card:hover {
        transform: translateY(-5px);
    }

    .gallery-img {
        width: 100%;
        height: 220px;
        object-fit: cover;
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

    .modal-backdrop-blur {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.4);
        backdrop-filter: blur(6px);
        z-index: 1040;
        display: none;
    }

    .upload-modal {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%) scale(0.9);
        transition: all 0.3s ease;
        opacity: 0;
        z-index: 1050;
        max-width: 600px;
        width: 90%;
    }

    .upload-modal.show {
        opacity: 1;
        transform: translate(-50%, -50%) scale(1);
    }

    .upload-form {
        background: white;
        padding: 30px;
        border-radius: 20px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }
</style>

<!-- Judul -->
<div class="container py-5 main-container">
    <div class="text-center mb-5 bg-white bg-opacity-75 p-3 rounded">
        <h1 class="gallery-title">Galeri Publik</h1>
        <p class="text-dark gallery-description">Lihat dan unggah momen terbaikmu. Semua orang bisa berpartisipasi!</p>
    </div>

    <!-- Grid Galeri -->
    <div class="d-flex justify-content-center">
        <div class="gallery-grid mb-5" style="max-width: 1100px; width: 100%;">
            @foreach ($galeri as $item)
                <div class="gallery-card">
                    <img 
                        src="{{ asset('storage/' . $item->image_path) }}" 
                        alt="{{ $item->title }}" 
                        class="img-fluid rounded shadow-sm mb-2 gallery-img"
                    >
                    <div class="gallery-comment">
                        <div><strong>{{ $item->visitor_name }}</strong></div>
                        <div>Komentar: {{ $item->description }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Tombol Unggah Foto -->
<div class="text-center my-4">
    <button class="btn btn-primary rounded-pill px-4 py-2" type="button" id="showUploadForm">
        <i class="fas fa-upload me-2"></i>Unggah Foto
    </button>
</div>

<!-- Backdrop Blur -->
<div id="uploadBackdrop" class="modal-backdrop-blur d-none"></div>

<!-- Modal Form Upload -->
<div id="uploadModal" class="upload-modal d-none">
    <div class="upload-form">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="fw-bold text-primary mb-0"><i class="fas fa-upload me-2"></i>Unggah Foto Kamu</h4>
            <button type="button" class="btn-close" id="closeUploadForm"></button>
        </div>
        
        <form action="{{ route('galeri.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label fw-semibold"><i class="fas fa-user me-1"></i>Nama</label>
                <input type="text" class="form-control shadow-sm" id="name" name="visitor_name" required>
            </div>
            <div class="mb-3">
                <label for="photo" class="form-label fw-semibold"><i class="fas fa-image me-1"></i>Pilih Foto</label>
                <input type="file" class="form-control shadow-sm" id="photo" name="image" required>
            </div>
            <div class="mb-3">
                <label for="comment" class="form-label fw-semibold"><i class="fas fa-comment me-1"></i>Komentar</label>
                <textarea class="form-control shadow-sm" id="comment" name="description" rows="3" required></textarea>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary px-5 py-2 rounded-pill">
                    <i class="fas fa-paper-plane me-2"></i>Unggah
                </button>
            </div>
        </form>
    </div>
</div>

<!-- JS Interaksi Modal -->
<script>
    const openBtn = document.getElementById('showUploadForm');
    const closeBtn = document.getElementById('closeUploadForm');
    const modal = document.getElementById('uploadModal');
    const backdrop = document.getElementById('uploadBackdrop');

    openBtn.addEventListener('click', () => {
        modal.classList.remove('d-none');
        backdrop.classList.remove('d-none');
    });

    closeBtn.addEventListener('click', () => {
        modal.classList.add('d-none');
        backdrop.classList.add('d-none');
    });

    backdrop.addEventListener('click', () => {
        modal.classList.add('d-none');
        backdrop.classList.add('d-none');
    });
</script>
@endsection
