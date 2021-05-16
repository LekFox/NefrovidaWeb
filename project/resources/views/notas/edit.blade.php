@extends('layouts.app')

@section('content')

@include('sidebar.beneficiario')

<div class="container"><form action="{{url('/notas/'.$notas->id)}}" method="post">
  @csrf
  {{ method_field('PATCH') }}

  {{-- @include('notas.form',['modo'=>'Crear'],['id'=>'2']) --}}

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
  
  <h1 id="JornadaTitulo">Editar Nota</h1>

  <div class="form-group">
      {{-- {{$notas}} --}}
    <input class="form-control"  type="hidden" name="beneficiario_id" value="{{ isset($notas->beneficiario_id)?$notas->beneficiario_id:old('beneficiario_id') }}" id="beneficiario_id">    
  </div>

  <div class="form-group">
    <label for="tiponota">Tipo de nota</label>
    <select class="form-select" aria-label="Default select example" name="tiponota" id="tiponota">
      <option selected value="{{ isset($notas->tiponota)?$notas->tiponota:old('tiponota') }}">{{ isset($notas->tiponota)?$notas->tiponota:old('tiponota') }}</option>
      <option value="General">General</option>
      <option value="Médica">Médica</option>
      <option value="Nutrición">Nutrición</option>
      <option value="Laboratorio">Laboratorio</option>
      <option value="Psicología">Psicología</option>
    </select>
    {{-- <input class="form-control" type="text" name="tiponota" value="{{ isset($notas->tiponota)?$notas->tiponota:old('tiponota') }}" id="tiponota">     --}}
  </div>

  <div class="form-group">
      <label for="Fecha">Fecha</label>
      <input class="date form-control" type="date" name="fecha" value="{{ isset($notas->fecha)?$notas->fecha:old('fecha') }}" id="fecha">    
  </div>
  

  <div class="form-group">
      <label for="comentario">Comentario</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" name="comentario" value="{{ isset($notas->comentario)?$notas->comentario:old('comentario') }}" id="comentario" rows="6">{{ isset($notas->comentario)?$notas->comentario:old('comentario') }}</textarea>
     
  </div>
  
  <input class="btn btn-success" type="submit" value="Editar Nota">

  
  <a href="{{url('/beneficiario/'.$notas->beneficiario_id)}}" class="btn btn-primary"> Regresar </a>
  
  <script type="text/javascript">
      $('.date').datepicker({  
         format: 'yyyy-mm-dd'
       });  
  </script> 

</form>
</div>
@endsection