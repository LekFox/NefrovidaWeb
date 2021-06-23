@extends('layouts.app')

@section('content')

@include('sidebar.beneficiario')

<div class="container"><form action="{{url('/beneficiario/'.$beneficiario->id.'/notas')}}" method="post">

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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  
  <h1 id="JornadaTitulo" class="bluenefro"><i class="bi bi-journal"></i> Nueva Nota</h1>
  <a href="{{url('/beneficiario/'.$beneficiario->id)}}" class="btn btn-primary"><i class="bi bi-arrow-left"></i> Regresar </a>

  <br>
  <br>
  
    <div class="row">
      <strong>Beneficiario: {{$beneficiario->nombreBeneficiario}}</strong>
     <input type="hidden" id="beneficiario_id" name="beneficiario_id" value="{{ $beneficiario->id }}">
    </div>
    <br>
  
  <div class="form-group">
    <label for="tiponota">Tipo de nota</label>
    <select class="form-select" aria-label="Default select example" name="tiponota" id="tiponota">
      <option selected value="{{ isset($notas->tiponota)?$notas->tiponota:old('tiponota') }}">Selecciona uno</option>
      
      <option value="General">General</option>

      @can('medica', App\Models\User::class)
      <option value="Médica">Médica</option>
      @endcan
      @can('admin', App\Models\User::class)
      <option value="Médica">Médica</option>
      @endcan
      @can('procuracion', App\Models\User::class)
      <option value="Médica">Médica</option>
      @endcan

      @can('nutricion', App\Models\User::class)
      <option value="Nutrición">Nutrición</option>
      @endcan
      @can('admin', App\Models\User::class)
      <option value="Nutrición">Nutrición</option>
      @endcan
      @can('procuracion', App\Models\User::class)
      <option value="Nutrición">Nutrición</option>
      @endcan

      @can('lab', App\Models\User::class)
      <option value="Laboratorio">Laboratorio</option>
      @endcan

      @can('admin', App\Models\User::class)
      <option value="Laboratorio">Laboratorio</option>
      @endcan

      @can('procuracion', App\Models\User::class)
      <option value="Laboratorio">Laboratorio</option>
      @endcan

      @can('psicologo', App\Models\User::class)
      <option value="Psicología">Psicología</option>
      @endcan

      @can('admin', App\Models\User::class)
      <option value="Psicología">Psicología</option>
      @endcan

      @can('procuracion', App\Models\User::class)
      <option value="Psicología">Psicología</option>
      @endcan
    </select>
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
      <textarea class="form-control" id="exampleFormControlTextarea1" name="comentario" value="{{ isset($notas->localidad)?$notas->comentario:old('comentario') }}" id="comentario" rows="6"></textarea>
     
  </div>
  
  <div class = "col"></div>
  <div class = "col text-center">
      <button class="btn btn-success" type="submit"><i class="bi bi-pencil-square"></i> Agregar</button>
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