<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ARD Bali</title>

    {{-- Bootstrap CSS (5.3) --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    


</head>
<body>

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand ms-5" href="#">ARD Bali</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto me-5">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Service
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">OUTBOUND BALI</a></li>
                  <li><a class="dropdown-item" href="#">GHATERING BALI</a></li>
                  <li><a class="dropdown-item" href="#">ADVANTURE BALI</a></li>
                  <li><a class="dropdown-item" href="#">TOUR BALI</a></li>
                  <li><a class="dropdown-item" href="#">GALA DINNER BALI</a></li>
                  <li><a class="dropdown-item" href="#">EVENT PRODUCTION BALI</a></li>
                  <li><a class="dropdown-item" href="#">MICE BALI</a></li>
                  <li><a class="dropdown-item" href="#">MUSIC EVENT</a></li>
                  <li><a class="dropdown-item" href="#">MULTIMEDIA BALI</a></li>
                  <li><a class="dropdown-item" href="#">ARTIS MANAGEMENT</a></li>
                  <li><a class="dropdown-item" href="#">SHOW MANAGEMENT BALI</a></li>
                  <li><a class="dropdown-item" href="#">SEWA TRANSPORTASI BALI</a></li>
                  <li><a class="dropdown-item" href="#">TOUR GUIDE BALI</a></li>
                  <li><a class="dropdown-item" href="#">LAUNCHING PRODUK BALI</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Location</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Contact Us</a>
              </li>
            </ul>
          </div>
        </div>
    </nav>

    <br>

    {{-- Carousel --}}
    <div class="container">
      <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner" style="height: 400px">
          <div class="carousel-item active">
            <img src="https://images.pexels.com/photos/235829/pexels-photo-235829.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" class="d-block w-100 h-100 object-fit-cover" alt="slide">
          </div>
          <div class="carousel-item">
            <img src="https://images.pexels.com/photos/388415/pexels-photo-388415.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" class="d-block w-100 h-100 object-fit-cover" alt="slide">
          </div>
          <div class="carousel-item">
            <img src="https://images.pexels.com/photos/464321/pexels-photo-464321.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" class="d-block w-100 h-100 object-fit-cover" alt="slide">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>

    <br>

    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-5">
          <img src="https://images.pexels.com/photos/31829947/pexels-photo-31829947/free-photo-of-close-up-of-monstera-leaves-with-dew-drops.jpeg?auto=compress&cs=tinysrgb&w=600&lazy=load" class="img-fluid rounded" style="height: 350px; width: 505px; object-fit: cover;" alt="About Image">
        </div>
        <div class="col-md-7">
          <h1>About Us</h1>
          <p>ARD ORGANIZER BALI Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit doloribus eaque, assumenda nam quibusdam ratione autem quos dolor reprehenderit alias accusamus doloremque fugit neque quis. Vitae porro sit animi explicabo.</p>
        </div>
      </div>
    </div>
    

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>