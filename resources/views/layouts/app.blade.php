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

    <a href="https://wa.me/6281234567890?text=Halo,%20saya%20ingin%20menghubungi%20ARD%20Bali"
    class="whatsapp-float" target="_blank" title="Hubungi ARD Bali">
    <i class="bi bi-whatsapp"></i>
    </a>



    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>