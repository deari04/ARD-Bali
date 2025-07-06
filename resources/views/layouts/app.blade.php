<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ARD Bali</title>
    
    {{-- Bootstrap CSS (5.3) --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">


    {{-- Custom CSS --}}
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>
<body>
    <div id="app">
        <div class="main-wrapper">
            @include('layouts.navbar')
            <div class="main-container">
                @yield('content')
            </div>
            @include('layouts.footer')
        </div>
        
    </div>

    {{-- <a href="https://wa.me/6281234567890?text=Halo,%20saya%20ingin%20menghubungi%20ARD%20Bali"
    class="whatsapp-float" target="_blank" title="Hubungi ARD Bali">
    <i class="bi bi-whatsapp"></i>
    </a> --}}

    <!-- Floating WhatsApp Chat -->
    <div class="wa-container" onmouseenter="showWAChat()" onmouseleave="hideWAChat()">
        <a href="#" class="whatsapp-float">
            <i class="bi bi-whatsapp"></i>
        </a>
        <div class="wa-chat-box" id="waChatBox">
            <div class="wa-chat-header d-flex justify-content-between align-items-center px-3 py-2 bg-success text-white rounded-top">
                <span>Silahkan, Kami Siap Melayani Anda.</span>
            </div>
            <div class="wa-chat-body px-3 py-2 bg-light">
                <p>Bagaimana Rencana Kegiatannya, mari diskusikan bersama ARD ORGANIZER</p>
                <input type="text" id="waInputText" class="form-control mb-2" placeholder="Ketik Disini">
                <button class="btn btn-success w-100" onclick="sendWA()">Kirim <i class="bi bi-whatsapp ms-1"></i></button>
            </div>
        </div>
    </div>


    <script>
    function showWAChat() {
        document.getElementById('waChatBox').style.display = 'block';
    }

    function hideWAChat() {
        document.getElementById('waChatBox').style.display = 'none';
    }

    function sendWA() {
        const text = document.getElementById('waInputText').value;
        const encodedText = encodeURIComponent(text);
        const phoneNumber = '6281234567890'; // Ganti dengan nomor WA kamu
        const url = `https://wa.me/${phoneNumber}?text=${encodedText}`;
        window.open(url, '_blank');
    }
    </script>


    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>