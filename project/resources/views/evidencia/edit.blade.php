@extends('layouts.app')

@section('content')

@include('sidebar.beneficiario')

<div class="container"><form action="{{url('/evidencia/'.$evidencia->id)}}" method="post">
  @csrf
  {{ method_field('PATCH') }}

  
  @if (count($errors)>0)
      
      <div class="alert alert-danger" role="alert">
          <ul>
          @foreach($errors->all() as $error)
             <li> {{$error}} </li>
          @endforeach 
          </ul>
      </div>
      
  @endif
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

  
  
  <h1 id="consultaTitulo" class="text-center bluenefro"><i class="bi bi-person-lines-fill"></i> Editar Evidencia de {{$evidencia->beneficiario->nombreBeneficiario}}</h1>
  <div class="row">
    <div class="col">
      <a href="{{ url('/beneficiario/'.$evidencia->beneficiario->id) }}" class="btn btn-primary"><i class="bi bi-arrow-left"></i> Regresar </a>
    </div>
    <div class="col">
    </div>
  </div>
  <br><br>
  
<div class= "row">
      <div class = "col-1">
      </div>
      <div class = "col">
        <h3 class="text-center">Evidencia</h3>
      </div>
      <div class = "col-3">
      </div>
</div>

<br>

<div class="form-row">
    <div class="col-4">
        <label for="nombre">Nombre Archivo</label>
    </div>
    <div class="col-2">
    </div>
    <div class="col-4">
        <label for="nombre">Descripción Archivo</label>
    </div>
</div>

<div class="form-row">
    <div class="col-4">
        <input class="form-control" name="nombre" value="{{ isset($evidencia->nombre)?$evidencia->nombre:old('nombre') }}" id="nombre" rows="1">
    </div>
    <div class="col-2">
    <div class="text-center">
            <br>
            <br>
            <button class="btn btn-success btn-lg pull-right" type="submit"><i class="bi bi-pencil-square"></i> Guardar</button>
        </div>
    </div>
    <div class="col-4">
        <input class="form-control" name="descripcion" value="{{ isset($evidencia->descripcion)?$evidencia->descripcion:old('descripcion') }}" id="descripcion" rows="1">
        <input type="hidden" id="beneficiario_id" name="beneficiario_id" value="{{ $evidencia->beneficiario_id }}">
        </div>
    </div>
</div>

<br>
<br>



<br>

  
  <script type="text/javascript">
      $('.date').datepicker({  
         format: 'yyyy-mm-dd'
       });  
  </script>

</form>
</div>
@endsection
       

