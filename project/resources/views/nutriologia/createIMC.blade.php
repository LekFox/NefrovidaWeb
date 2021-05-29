@extends('layouts.app')

@section('content')

@include('sidebar.beneficiario')

<div class="container"><form action="{{url('/beneficiario/'.$beneficiario->id.'/nutricion')}}" method="post">
   
    @csrf
    @if (count($errors)>0)
    
    <div class="alert alert-danger" role="alert">
        <ul>
        @foreach($errors->all() as $error)
           <li> {{$error}} </li>
        @endforeach 
        </ul>
    </div>   
    @endif

    
    <h1 id="AntecedentesTitulo" class="text-center bluenefro"><i class="bi bi-basket"></i> Registrar Consulta</h1>
  <a href="{{url('/beneficiario/'.$beneficiario->id)}}" class="btn btn-primary"><i class="bi bi-arrow-left"></i> Regresar </a>
  <br><br>

    <h3 class="text-center"><i class="bi bi-clipboard"></i> Datos Antropométricos</h3>
    <br>

    <input type="hidden" id="beneficiario_id" name="beneficiario_id" value="{{ $beneficiario->id }}">

<div class="row">
    <div class="col-1"></div>
    <div class="col-5">
        <div class="form-group">
            <label for="peso">Peso (kg)</label>
            <input type="number" placeholder="50.00" step="0.01" min="0.00" class="form-control" name="peso" value="{{ isset($consulta->peso)?$consulta->peso:old('peso') }}" id="peso" rows="6">
        </div>
    </div>

    <div class="col-5">
        <div class="form-group">
            <label for="estatura">Estatura (cm)</label>
            <input type="number" placeholder="170.00" step="0.01" min="0.00" class="form-control" name="estatura" value="{{ isset($consulta->estatura)?$consulta->estatura:old('estatura') }}" id="estatura" rows="6">
        </div>
    </div>
    <div class="col-1"></div>

</div>

<br><br>

    <div class="col text-center">
        <button class="btn btn-primary nextBtn btn-lg pull-right" type="submit">Siguiente <i class="bi bi-chevron-right"></i></button>
    </div>
</form>
</div>
@endsection