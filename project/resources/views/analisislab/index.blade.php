@extends('layouts.app')

@section('content')

@include('sidebar.beneficiario')

@cannot('nutriologo', App\Models\User::class)

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
    <h1 id="AnalisisLabTitulo" class="text-center bluenefro"><i class="bi bi-eyedropper"></i> Análisis de Laboratorio para {{$beneficiario->nombreBeneficiario}}</h1>
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
                <h5 class="card-title ">Seleccione el Análisis de Laboratorio que Desea Registrar:</h5>
          </div>
        </div>
        <br>
        <div class= "row">
          <div class= "col text-center align-bottom">
                <a href="{{ url('/beneficiario/'.$beneficiario->id.'/examenorina/create') }}" class="btn btn-outline-primary">General de Orina</a>
          </div>
        </div>
        <br>
        <div class= "row">
          <div class= "col text-center align-bottom">
                <a href="{{ url('/beneficiario/'.$beneficiario->id.'/depuracioncreatinina/create') }}" class="btn btn-outline-primary">Depuración de Creatinina en Orina de 24 h</a>
          </div>
        </div>
        <br>
        <div class= "row">
          <div class= "col text-center align-bottom">
                <a href="{{ url('/beneficiario/'.$beneficiario->id.'/quimicasanguinea/create') }}" class="btn btn-outline-primary">Química Sanguínea</a>
          </div>
        </div>
        <br>
        <div class= "row">
          <div class= "col text-center align-bottom">
                <a href="{{ url('/beneficiario/'.$beneficiario->id.'/micro/create') }}" class="btn btn-outline-primary">Microalbuminuria</a>
          </div>
        </div>
        <br>
    </div>
</div>

</div>
@else

<div class="container">
<br><br><br><br><br><br>
    <h2 class="text-center">ERROR: El personal de nutriología no puede registrar análisis de laboratorio, contacte al administrador.</h2>
</div>
@endif


@endsection