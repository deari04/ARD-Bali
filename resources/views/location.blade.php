@extends('layouts.app')

@section('content')
<style>
    /* Custom styling untuk tampilan lebih elegan */
    .section-title {
        font-size: 2.5rem;
        font-weight: 700;
        letter-spacing: 1px;
        color: #2c3e50;
    }

    .section-subtitle {
        font-size: 1.1rem;
        color: #7f8c8d;
    }

    .contact-info li {
        font-size: 1.05rem;
        margin-bottom: 15px;
    }

    .contact-info li strong {
        color: #34495e;
    }

    .contact-info a {
        color: #2980b9;
        text-decoration: none;
    }
    .contact-info a:hover {
        text-decoration: underline;
    }

    .card-map {
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 8px 20px rgba(0,0,0,0.12);
        transition: box-shadow 0.3s ease;
    }
    .card-map:hover {
        box-shadow: 0 12px 30px rgba(0,0,0,0.18);
    }

    .contact-box {
        background: #f8f9fa;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        transition: box-shadow 0.3s ease;
    }
    .contact-box:hover {
        box-shadow: 0 12px 30px rgba(0,0,0,0.15);
    }
</style>

<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="section-title">LOKASI KAMI & CONTACT US</h1>
        <p class="section-subtitle">Temukan lokasi kami dan hubungi kami untuk informasi lebih lanjut</p>
    </div>

    <div class="row g-4 align-items-center">
        <!-- Peta di kiri -->
        <div class="col-md-6">
            <h4 class="mb-3 text-primary fw-semibold">Alamat:</h4>
            <p class="mb-4 text-secondary">Jalan Sunset Road No.88, Kuta, Bali, Indonesia</p>

            <div class="card-map">
                <div class="ratio ratio-16x9">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3944.9878123456!2d115.163456!3d-8.721234!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd2471234567890%3A0x1234567890abcdef!2sJalan%20Sunset%20Road%2088%2C%20Kuta!5e0!3m2!1sen!2sid!4v1234567890"
                        width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>

        <!-- Contact Us di kanan -->
        <div class="col-md-6">
            <div class="contact-box">
                <h4 class="mb-4 text-primary fw-semibold">CONTACT US</h4>
                <ul class="list-unstyled contact-info">
                    <li><strong>Email:</strong> <a href="mailto:info@yourcompany.com">info@yourcompany.com</a></li>
                    <li><strong>Telepon:</strong> <a href="tel:+6281234567890">+62 812 3456 7890</a></li>
                    <li><strong>Whatsapp:</strong> <a href="https://wa.me/6281234567890" target="_blank" rel="noopener">Chat via WhatsApp</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
