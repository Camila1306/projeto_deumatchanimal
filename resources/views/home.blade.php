@extends('layouts.app')

@section('content')
<div class="container">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="./img/home/primeira.png" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="./img/home/segunda.png" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="./img/home/terceiro.png" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="./img/home/quarta.png" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="./img/home/quinta.png" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="./img/home/sexta.png" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="./img/home/setima.png" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="./img/home/oitava.png" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="./img/home/nono.png" class="d-block w-100" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
</div>
@endsection