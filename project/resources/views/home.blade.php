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
                    <!-- 
                        ********** MENÚ CARRUSEL RETIRADO POR PETICIÓN DE LA ORGANIZACIÓN *************
                         <div class="col text-center">
                    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
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
                -->
                <div class= "row">
                <div class= "col text-center align-bottom">
                <a href="{{ url('/jornada') }}" class="btn btn-outline-secondary"><i class="bi bi-calendar3"></i> Jornadas</a>
                </div>
                </div>
                <br>
                <div class= "row">
                <div class= "col text-center align-bottom">
                        <a href="{{ url('/beneficiario') }}" class="btn btn-outline-secondary"><i class="bi bi-people-fill"></i> Beneficiarios</a>
                </div>
                </div>
                <br>
                <div class= "row">
                <div class= "col text-center align-bottom">
                        <a href="#" class="btn btn-outline-secondary"><i class="bi bi-arrow-left-right"></i> Comparar Jornadas</a>
                </div>
                </div>
                <br>
                <div class= "row">
                <div class= "col text-center align-bottom">
                        <a href="#" class="btn btn-outline-secondary"><i class="bi bi-bar-chart-line-fill"></i> Reportes</a>
                </div>
                </div>
                
                
                </div>

            </div>
           
        </div>
    </div>
    <br>
    <br>
    <div class="row justify-content-center">
        <div class="col text-center">
            <img src="/img/lekfox.png" class="" width="200" alt="..." style="opacity:0.5;">
        </div>
    </div>
    
</div>
@endsection
