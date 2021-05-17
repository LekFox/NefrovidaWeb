@extends('layouts.app')

@section('content')

@include('sidebar.beneficiario')

<div class="container"><form action="{{url('/consulta/'.$consulta->id)}}" method="post">
  @csrf
  {{ method_field('PATCH') }}

  {{-- @include('consulta.form',['modo'=>'Registrar'],['id'=>'2']) --}}

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
  
  <h1 id="JornadaTitulo" class="bluenefro"><i class="bi bi-journal"></i> Editar Consulta</h1>
  <a href="{{url('/beneficiario/'.$consulta->beneficiario_id)}}" class="btn btn-primary"><i class="bi bi-arrow-left"></i> Regresar </a>

  <br>
  <br>


  <div class="form-group"> 
    <label for="beneficiario_id">Beneficiario</label>
      <select class="form-select" aria-label="Default select example" id="beneficiario_id"  name="beneficiario_id">
        <option selected>Selecciona al beneficiario </option>
        @foreach ($Beneficiario as $Beneficiario)
        <option value={{$Beneficiario->id}} id="beneficiario_id"  name="beneficiario_id"> {{$Beneficiario->nombreBeneficiario}}</option>
        @endforeach
        
      </select>
  </div>

  <div class="form-group">
      <label for="Fecha">Fecha</label>
      <input class="date form-control" type="date" name="fecha" value="{{ isset($consulta->fecha)?$consulta->fecha:old('fecha') }}" id="fecha">    
  </div>
  
  <div class="form-group">
      <label for="padecimiento">Padecimiento</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" name="padecimiento" value="{{ isset($consulta->localidad)?$consulta->padecimiento:old('padecimiento') }}" id="padecimiento" rows="4"></textarea>
  </div>

  <div class="form-group">
    <label for="TAbrazoDerecho">T.A. Brazo Derecho</label>
    <input class="form-control" type="text" name="TAbrazoDerecho" value="{{ isset($consulta->TAbrazoDerecho)?$consulta->TAbrazoDerecho:old('TAbrazoDerecho') }}" id="TAbrazoDerecho">
  </div>

  <div class="form-group">
    <label for="TAbrazoIzquierdo">T.A. Brazo Izquierdo</label>
    <input class="form-control" type="text" name="TAbrazoIzquierdo" value="{{ isset($consulta->TAbrazoIzquierdo)?$consulta->TAbrazoIzquierdo:old('TAbrazoIzquierdo') }}" id="TAbrazoIzquierdo">
  </div>

  <div class="form-group">
    <label for="frecuenciaCardiaca">Frecuencia Cardiaca</label>
    <input class="form-control" type="text" name="frecuenciaCardiaca" value="{{ isset($consulta->frecuenciaCardiaca)?$consulta->frecuenciaCardiaca:old('frecuenciaCardiaca') }}" id="frecuenciaCardiaca">
  </div>

  <div class="form-group">
    <label for="frecuenciaRespiratoria">Frecuencia Respiratoria</label>
    <input class="form-control" type="text" name="frecuenciaRespiratoria" value="{{ isset($consulta->frecuenciaRespiratoria)?$consulta->frecuenciaRespiratoria:old('frecuenciaRespiratoria') }}" id="frecuenciaRespiratoria">
  </div>

  <div class="form-group">
    <label for="temperatura">Temperatura</label>
    <input class="form-control" type="text" name="temperatura" value="{{ isset($consulta->temperatura)?$consulta->temperatura:old('temperatura') }}" id="temperatura">
  </div>

  <div class="form-group">
    <label for="inputpeso">Peso</label>
    <input type="peso" class="form-control" id="peso" placeholder="Peso">
  </div>
  
  <div class="form-group">
    <label for="talla">Talla</label>
    <input class="form-control" type="text" name="talla" value="{{ isset($consulta->talla)?$consulta->talla:old('talla') }}" id="talla">
  </div>

  <div class="form-group">
    <label for="cabezaCuello">Cabeza y Cuello</label>
    <input class="form-control" type="text" name="cabezaCuello" value="{{ isset($consulta->cabezaCuello)?$consulta->cabezaCuello:old('cabezaCuello') }}" id="cabezaCuello">
  </div>
  
  <div class="form-group">
    <label for="torax">Torax</label>
    <input class="form-control" type="text" name="torax" value="{{ isset($consulta->torax)?$consulta->torax:old('torax') }}" id="torax">
  </div>

  <div class="form-group">
    <label for="abdomen">Abdomen</label>
    <input class="form-control" type="text" name="abdomen" value="{{ isset($consulta->abdomen)?$consulta->abdomen:old('abdomen') }}" id="abdomen">
  </div>
  
  <div class="form-group">
    <label for="extremidades">Extremidades</label>
    <input class="form-control" type="text" name="extremidades" value="{{ isset($consulta->extremidades)?$consulta->extremidades:old('extremidades') }}" id="extremidades">
  </div>

  <div class="form-group">
      <label for="estadoMentalNeurologico">Estado Mental y Neurológico</label>
      <textarea class="form-control" id="estadoMentalNeurologico" name="estadoMentalNeurologico" value="{{ isset($consulta->localidad)?$consulta->estadoMentalNeurologico:old('estadoMentalNeurologico') }}" id="estadoMentalNeurologico" rows="4"></textarea>
  </div>

  <div class="form-group">
      <label for="observaciones">Observaciones</label>
      <textarea class="form-control" id="observaciones" name="observaciones" value="{{ isset($consulta->localidad)?$consulta->observaciones:old('observaciones') }}" id="observaciones" rows="4"></textarea>
  </div>

  <div class="form-group">
      <label for="diagnostico">Diagnóstico</label>
      <textarea class="form-control" id="diagnostico" name="diagnostico" value="{{ isset($consulta->localidad)?$consulta->diagnostico:old('diagnostico') }}" id="diagnostico" rows="4"></textarea>
  </div>

  <div class="form-group">
      <label for="tratamiento">Plan de Tratamiento</label>
      <textarea class="form-control" id="tratamiento" name="tratamiento" value="{{ isset($consulta->localidad)?$consulta->tratamiento:old('tratamiento') }}" id="tratamiento" rows="4"></textarea>
  </div>

  <div class = "col"></div>
  <div class = "col text-center">
      <button class="btn btn-success" type="submit"><i class="bi bi-pencil-square"></i>Guardar</button>
  </div>
  <div class = "col"></div>

  <script type="text/javascript">
      $('.date').datepicker({  
         format: 'yyyy-mm-dd'
       });  
  </script> 

</form>
</div>
@endsection