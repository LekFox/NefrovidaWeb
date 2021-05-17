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

  {{-- <div class="form-group"> 
    <label for="tipoNota_id">Beneficiario</label>
      <select class="form-select" aria-label="Default select example" id="tipoNota_id"  name="tipoNota_id">
        <option selected>Selecciona al beneficiario </option>
        @foreach ($TipoNota as $TipoNota)
        <option value={{$TipoNota->id}} id="tipoNota_id"  name="tipoNota_id"> {{$TipoNota->nombre}}</option>
        @endforeach
        
      </select>
  </div> --}}

  <div class="form-group">
      <label for="Fecha">Fecha</label>
      <input class="date form-control" type="date" name="fecha" value="{{ isset($notas->fecha)?$notas->fecha:old('fecha') }}" id="fecha">    
  </div>
  


  <div class="form-group">
      <label for="padecimiento">Padecimiento</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" name="padecimiento" value="{{ isset($notas->localidad)?$notas->padecimiento:old('padecimiento') }}" id="padecimiento" rows="4"></textarea>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputTAbrazoDerecho">T.A. Brazo Derecho</label>
      <input type="TAbrazoDerecho" class="form-control" id="TAbrazoDerecho" placeholder="T.A. Brazo Derecho">
    </div>
    <div class="form-group col-md-6">
      <label for="inputTAbrazoIzquierdo">T.A. Brazo Izquierdo</label>
      <input type="TAbrazoIzquierdo" class="form-control" id="TAbrazoIzquierdo" placeholder="T.A. Brazo Izquierdo">
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputfrecuenciaCardiaca">Frecuencia Cardiaca</label>
      <input type="frecuenciaCardiaca" class="form-control" id="frecuenciaCardiaca" placeholder="Frecuencia Cardiaca">
    </div>
    <div class="form-group col-md-6">
      <label for="inputfrecuenciaRespiratoria">Frecuencia Respiratoria</label>
      <input type="frecuenciaRespiratoria" class="form-control" id="frecuenciaRespiratoria" placeholder="Frecuencia Respiratoria">
    </div>
  </div>
  <div class="form-group">
    <label for="temperatura">Temperatura</label>
    <input type="text" class="form-control" id="temperatura" placeholder="Temperatura">
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputpeso">Peso</label>
      <input type="peso" class="form-control" id="peso" placeholder="Peso">
    </div>
    <div class="form-group col-md-6">
      <label for="inputtalla">Talla</label>
      <input type="text" class="form-control" id="talla" placeholder="Talla">
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="cabezaCuello">Cabeza y Cuello</label>
      <input type="text" class="form-control" id="cabezaCuello" placeholder="Cabeza y Cuello">
    </div>
    <div class="form-group col-md-6">
      <label for="torax">Torax</label>
      <input type="text" class="form-control" id="torax" placeholder="Torax">
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="abdomen">Abdomen</label>
      <input type="text" class="form-control" id="abdomen" placeholder="Abdomen">
    </div>
    <div class="form-group col-md-6">
      <label for="extremidades">Extremidades</label>
      <input type="text" class="form-control" id="extremidades" placeholder="Extremidades">
    </div>
  </div>

  <div class="form-group">
      <label for="estadoMentalNeurologico">Estado Mental y Neurológico</label>
      <textarea class="form-control" id="estadoMentalNeurologico" name="estadoMentalNeurologico" value="{{ isset($notas->localidad)?$notas->estadoMentalNeurologico:old('estadoMentalNeurologico') }}" id="estadoMentalNeurologico" rows="4"></textarea>
  </div>

  <div class="form-group">
      <label for="estadoMentalNeurologico">Observaciones</label>
      <textarea class="form-control" id="observacion" name="estadoMentalNeurologico" value="{{ isset($notas->localidad)?$notas->estadoMentalNeurologico:old('estadoMentalNeurologico') }}" id="estadoMentalNeurologico" rows="4"></textarea>
  </div>

  <div class="form-group">
      <label for="diagnostico">Diagnóstico</label>
      <textarea class="form-control" id="diagnostico" name="diagnostico" value="{{ isset($notas->localidad)?$notas->estadoMentalNeurologico:old('estadoMentalNeurologico') }}" id="estadoMentalNeurologico" rows="4"></textarea>
  </div>

  <div class="form-group">
      <label for="tratamiento">Plan de Tratamiento</label>
      <textarea class="form-control" id="tratamiento" name="tratamiento" value="{{ isset($notas->localidad)?$notas->estadoMentalNeurologico:old('estadoMentalNeurologico') }}" id="estadoMentalNeurologico" rows="4"></textarea>
  </div>

  
  <div class = "col"></div>
  <div class = "col text-center">
      <button class="btn btn-success" type="submit"><i class="bi bi-pencil-square"></i>Guardar Consulta</button>
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