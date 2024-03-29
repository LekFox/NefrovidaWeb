@extends('layouts.app')

@section('content')

@include('sidebar.beneficiario')

<div class="container"><form action="{{url('/notaspsic/'.$notas->id)}}" method="post" enctype="multipart/form-data">
  @csrf
  {{ method_field('PATCH') }}

  {{-- @include('notas.form',['modo'=>'Registrar'],['id'=>'2']) --}}

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
  
  <h1 id="JornadaTitulo" class="bluenefro"><i class="bi bi-journal"></i> Editar Nota de Psicología</h1>
  <a href="{{url('/beneficiario/'.$notas->beneficiario_id)}}" class="btn btn-primary"><i class="bi bi-arrow-left"></i> Regresar </a>

  <div class="form-group">
      {{-- {{$notas}} --}}
    <input class="form-control"  type="hidden" name="beneficiario_id" value="{{ isset($notas->beneficiario_id)?$notas->beneficiario_id:old('beneficiario_id') }}" id="beneficiario_id">    
  </div>


  <div class="form-group">
  <div class="row">
    <div class="col 1">
     
        <label for="Fecha">Fecha</label>
        <input class="date form-control" type="date" name="fecha" value="{{ isset($notas->fecha)?$notas->fecha:old('fecha') }}" id="fecha">    
    </div>
    <div class="col 12">

    </div>
    </div>
   
  </div>
  
  

  <div class="form-group">
      <label for="comentario">Comentario</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" name="comentario" value="{{ isset($notas->comentario)?$notas->comentario:old('comentario') }}" id="comentario" rows="6">{{ isset($notas->comentario)?$notas->comentario:old('comentario') }}</textarea>
     
  </div>

  <div class="form-row">
    <div class="col-4">
      <label for="archivo">Subir Nuevo Archivo (Opcional)</label>
        <input type="file" name="file" value="{{ isset($notas->file)?$notas->file:old('file') }}" id="file" class="btn btn-primary">
    </div>
</div>
  
  <div class = "col"></div>
  <div class = "col text-center">
    <button class="btn btn-success" type="submit"><i class="bi bi-pencil-square"></i> Guardar</button>
  </div>
  <div class = "col"></div>

  
  {{-- <script type="text/javascript">
      $('.date').datepicker({  
         format: 'yyyy-mm-dd'
       });  
  </script>  --}}

</form>
</div>
@endsection