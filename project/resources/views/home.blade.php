@extends('layouts.app')

@section('content')

@include('sidebar.home')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <h1 id="JornadaTitulo" class="bluenefro"><i class="bi bi-house-door-fill"></i> Inicio</h1>
        <br>
            <div class="card">

                <div class="card-body">
                    <div class="col text-center">
                    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <a href="jornada">
                        <img src="/img/jornada1.svg" class="w-50 bluenefro" alt="...">
                    </a>
                    <div class="carousel-caption d-none d-md-block">
                        <h1 class="whitenefro font-weight-bold">Jornadas</h1>
                        
                    </div>
                    </div>
                    <div class="carousel-item">
                    <a href="beneficiario">
                        <img src="/img/beneficiario.svg" class="w-50" alt="...">
                    </a>
                    <div class="carousel-caption d-none d-md-block">
                        <h1 class="whitenefro font-weight-bold">Beneficiarios</h1>
                        
                    </div>
                    </div>
                    <div class="carousel-item">
                    <img src="/img/lekfox.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                    </div>
                    </div>
                </div>
                <a class="carousel-control-prev bg-secondary" href="#carouselExampleCaptions" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next bg-secondary" href="#carouselExampleCaptions" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
                </div>
                    </div>
                </div>

            </div>
           
        </div>
    </div>
</div>
@endsection
