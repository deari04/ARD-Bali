@extends('layouts.app')

@section('content')
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
    

@endsection