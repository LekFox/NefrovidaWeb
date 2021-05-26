@extends('layouts.app')

@section('content')

@include('sidebar.beneficiario')

<div class="container"><form action="{{url('/tamizaje/'.$tamizaje->id)}}" method="post">
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

  
  <h1 id="AntecedentesTitulo" class="text-center bluenefro"><i class="bi bi-droplet"></i> Editar Tamizaje de {{ $tamizaje->beneficiario->nombreBeneficiario }}</h1>
  <a href="{{ url('/tamizaje/'.$tamizaje->id) }}" class="btn btn-primary"><i class="bi bi-arrow-left"></i> Regresar </a>
  <br>
  <br>

<div>

  <div class="form-row">
    <div class="col-4">
      <label for="nombre">Presión arterial</label>
    </div>
    <div class="col-2">
      </div>
    <div class="col-4">
      <label for="nombre">Glucosa capilar</label>
    </div>
  </div>
  <div class="form-row">
      <div class="col-2">
        <input type="hidden" id="id" name="id" value="{{ $tamizaje->id }}">
        <input type="number" class="form-control" placeholder="Sistólica" id="sistolica" name="sistolica" value="{{ isset($tamizaje->sistolica)?$tamizaje->sistolica:old('sistolica') }}">
      </div> /
      <div class="col-2">
        <input type="number" class="form-control" placeholder="Diastólica" id="diastolica" name="diastolica" value="{{ isset($tamizaje->diastolica)?$tamizaje->diastolica:old('diastolica') }}">
      </div>
      <div class="col-2">
      </div>
      <div class="col-4">
        <input type="number" class="form-control" placeholder="Glucosa capilar" id="glucosaCapilar" name="glucosaCapilar" value="{{ isset($tamizaje->glucosaCapilar)?$tamizaje->glucosaCapilar:old('glucosaCapilar') }}">
        <small id="cinturaHelp" class="form-text text-muted">mg/dL</small>
      </div>
    </div>
    <br>
    <div class="form-row">
    <div class="col-4">
      <label for="nombre">Circunferencia en cintura</label>
    </div>
    <div class="col-2">
      </div>
    <div class="col-4">
      <label for="nombre">Circunferencia en cadera</label>
    </div>
  </div>
  <div class="form-row">
      <div class="col-4">
        <input type="number" class="form-control" placeholder="Circunferencia en cintura" id="circunferenciaCintura" name="circunferenciaCintura" value="{{ isset($tamizaje->circunferenciaCintura)?$tamizaje->circunferenciaCintura:old('circunferenciaCintura') }}">
        <small id="cinturaHelp" class="form-text text-muted">En centímetros.</small>
      </div>
      <div class="col-2">
      </div>
      <div class="col-4">
        <input type="number" class="form-control" placeholder="Circunferencia en cadera" id="circunferenciaCadera" name="circunferenciaCadera" value="{{ isset($tamizaje->circunferenciaCadera)?$tamizaje->circunferenciaCadera:old('circunferenciaCadera') }}">
        <small id="caderaHelp" class="form-text text-muted">En centímetros.</small>
      </div>
    </div>
    <br>
    <div class="form-row">
    <div class="col-4">
      <label for="nombre">Peso</label>
    </div>
    <div class="col-2">
      </div>
    <div class="col-4">
      <label for="nombre">Talla</label>
    </div>
  </div>
  <div class="form-row">
      <div class="col-4">
        <input type="number" step=0.01 class="form-control" placeholder="Peso" id="peso" name="peso" value="{{ isset($tamizaje->peso)?$tamizaje->peso:old('peso') }}">
        <small id="cinturaHelp" class="form-text text-muted">kg</small>
      </div>
      <div class="col-2">
      </div>
      <div class="col-4">
        <input type="number" class="form-control" placeholder="Talla" id="talla" name="talla" value="{{ isset($tamizaje->talla)?$tamizaje->talla:old('talla') }}">
        <small id="tallaHelp" class="form-text text-muted">cm</small>
      </div>
    </div>
    <br>
      <label for="dx">DX</label>
      <div class="form-group">
      <textarea class="form-control" id="dx" name="dx" maxlength="200" rows="1">{{ isset($tamizaje->dx)?$tamizaje->dx:old('dx') }}</textarea>
      </div>
      <label for="comentario">Comentarios</label>
      <div class="form-group">
      <textarea class="form-control" id="comentario" name="comentario" maxlength="200" rows="2">{{ isset($tamizaje->comentario)?$tamizaje->comentario:old('comentario') }}</textarea>
      </div>
    <div class="col text-center">
        <button class="btn btn-success" type="submit"><i class="bi bi-pencil-square"></i> Guardar</button>
    </div>
</div>



  <br>

  
  <script type="text/javascript">
      $('.date').datepicker({  
         format: 'yyyy-mm-dd'
       });  
  </script>

</form>
</div>
@endsection