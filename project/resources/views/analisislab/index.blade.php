@extends('layouts.app')

@section('content')

@include('sidebar.beneficiario')

<div class="container">
@if (Session::has('eliminado'))
    <div class="alert alert-success" role="alert"> {{Session::get('eliminado')}} </div>      
@endif

@if (Session::has('nuevo'))
    <div class="alert alert-success" role="alert"> {{Session::get('nuevo')}} </div>       
@endif

@if (Session::has('editado'))
    <div class="alert alert-success" role="alert"> {{Session::get('editado')}} </div>    
  
@endif
    @csrf
    {{ method_field('PATCH') }}
    <h1 id="AnalisisLabTitulo" class="text-center bluenefro"><i class="bi bi-eyedropper"></i> Análisis de laboratorio para {{$beneficiario->nombreBeneficiario}}</h1>
  <div class="row">
    <div class="col">
      <a href="{{ url('/beneficiario/'.$beneficiario->id) }}" class="btn btn-primary"><i class="bi bi-arrow-left"></i> Regresar </a>
    </div>
    <div class="col">
    </div>
  </div>
  <br><br>
  <div class="card">
    <div class="card-body">
      <div class= "row">
          <div class= "col text-center align-bottom">
                <h5 class="card-title ">Selecciona el análisis de laboratorio que deseas registrar:</h5>
          </div>
        </div>
        <br>
        <div class= "row">
          <div class= "col text-center align-bottom">
                <a href="{{ url('/beneficiario/'.$beneficiario->id.'/analisislab') }}" class="btn btn-outline-primary">Examen general de orina</a>
          </div>
        </div>
        <br>
        <div class= "row">
          <div class= "col text-center align-bottom">
                <a href="{{ url('/beneficiario/'.$beneficiario->id.'/analisislab') }}" class="btn btn-outline-primary">Depuración de creatinina en orina de 24 h</a>
          </div>
        </div>
        <br>
        <div class= "row">
          <div class= "col text-center align-bottom">
                <a href="{{ url('/beneficiario/'.$beneficiario->id.'/analisislab') }}" class="btn btn-outline-primary">Química sanguínea</a>
          </div>
        </div>
        <br>
        <div class= "row">
          <div class= "col text-center align-bottom">
                <a href="{{ url('/beneficiario/'.$beneficiario->id.'/analisislab') }}" class="btn btn-outline-primary">Microalbuminuría</a>
          </div>
        </div>
        <br>
    </div>
</div>

</div>

@endsection