@extends('layouts.app')

@section('content')

@include('sidebar.beneficiario')

<div class="container"><form action="{{url('/evaluacionFinal')}}" method="post">
  @csrf
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/10.5.0/css/bootstrap.min.css"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  
  <h1 id="JornadaTitulo" class="bluenefro"><i class="bi bi-journal"></i> Registrar Evaluación Final</h1>
  <a href="{{ url()->previous() }}" class="btn btn-primary"><i class="bi bi-arrow-left"></i> Regresar</a>
  <br>
  <br>


  <div class="form-group"> 
    <label for="beneficiario_id">Beneficiario</label>
      <select  class="form-select" aria-label="Default select example" id="beneficiario_id"  name="beneficiario_id" required>
        <option value="">Selecciona al beneficiario </option>
        @foreach ($Beneficiario as $Beneficiario)
        <option value={{$Beneficiario->id}}> {{$Beneficiario->nombreBeneficiario}}</option >
        @endforeach
        
      </select>
  </div>
  

  <div class="form-group">
    <br><br>
    <h4>Sexo</h4>
    <br>
    
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="sexo" id="sexo" value="H" style="width:20px; height:20px;" required>
      <label class="form-check-label">H</label>
    </div>
    <div class="form-check form-check-inline pl-5">
      <input class="form-check-input" type="radio" name="sexo" id="sexo" value="M" style="width:20px; height:20px;" required>
      <label class="form-check-label" >M</label>
    </div>
    
  </div>

  <div class="form-group">
    <br>
    <h4>Edad</h4>
    <br>
    <h5>
    <input class="form-control" id="edad" name="edad" placeholder="Escriba su edad..." style="width:250px;">    
    
  </div>


  <div class="form-group">
    <br>
    <h4>Grado</h4>
    <br>
    <h5>
    <input class="form-control" id="grado" name="grado" placeholder="Escriba su grado..." style="width:250px;">    
    </h5>
  </div>

  <div class="form-group">
    <br>
    <h4>Grupo</h4>
    <br>
    <h5>
    <input class="form-control" id="grupo" name="grupo" placeholder="Escriba su grupo..." style="width:250px;">    
    </h5>
  </div>
  <br><br>
  <h4>Contesta las siguientes preguntas.</h4>
  <br><br>
  <div class="text-center">
  
  
  <div class="form-group">
    <h2>ÁREA MÉDICA</h2>
    <br><br>
    <h4>Diabetes e Hipertensión, ¿Qué son y cómo prevenirlas?</h4>
    <br><br><br>
    <h5>1.- ¿La diabetes es el aumento de glucosa (azúcar) presente en la sangre?</h5>
    <br>
    <h5>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="inlineRadioOptions1" id="1" value="1_1" style="width:20px; height:20px;" required>
      <label class="form-check-label" for="preguntaTresSi">Si</label>
    </div>
    <div class="form-check form-check-inline pl-5">
      <input class="form-check-input" type="radio" name="inlineRadioOptions1" id="1" value="0_1" style="width:20px; height:20px;" required>
      <label class="form-check-label" for="preguntaTresNo">No</label>
    </div>
    </h5>
  </div>

  <div class="form-group">
    <br><br>
    <h5>2.- ¿La presión aumenta cuando se consumen alimentos salados y grasos?</h5>
    <br>
    <h5>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="inlineRadioOptions2" id="2" value="1_2" style="width:20px; height:20px;" required>
      <label class="form-check-label" for="preguntaCuatroSi">Si</label>
    </div>
    <div class="form-check form-check-inline pl-5">
      <input class="form-check-input" type="radio" name="inlineRadioOptions2" id="2" value="0_2" style="width:20px; height:20px;" required>
      <label class="form-check-label" for="preguntaCuatroNo">No</label>
    </div>
    </h5>
  </div>

  <div class="form-group">
    <br><br>
    <h5>3.- ¿La enfermedad renal es la perdida de las funciones del riñón?</h5>
    <br>
    <h5>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="inlineRadioOptions3" id="3" value="1_3" style="width:20px; height:20px;" required>
      <label class="form-check-label" for="preguntaCuatroSi">Si</label>
    </div>
    <div class="form-check form-check-inline pl-5">
      <input class="form-check-input" type="radio" name="inlineRadioOptions3" id="3" value="0_3" style="width:20px; height:20px;" required>
      <label class="form-check-label" for="preguntaCuatroNo">No</label>
    </div>
    </h5>
  </div>

  <br><br><br>

  <div class="form-group text-center">
    <h2>ÁREA DE NUTRICIÓN</h2>
    <br><br>
    <h4>¿Qué es y para que prevenir la obesidad?</h4>
    <br><br><br>
    <h5>1.- ¿La obesidad es la acumulación anormal o excesiva de grasa en el cuerpo, dañina para la salud?</h5>
    <br>
    <h5>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="inlineRadioOptions4" id="4" value="1_4" style="width:20px; height:20px;" required>
      <label class="form-check-label" for="preguntaTresSi">Si</label>
    </div>
    <div class="form-check form-check-inline pl-5">
      <input class="form-check-input" type="radio" name="inlineRadioOptions4" id="4" value="0_4" style="width:20px; height:20px;" required>
      <label class="form-check-label" for="preguntaTresNo">No</label>
    </div>
    </h5>
  </div>

  <div class="form-group">
    <br><br>
    <h5>2.- El IMC es un indicador simple en el que se necesita conocer el peso y talla para identificar si se padece sobrepeso y obesidad?</h5>
    <br>
    <h5>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="inlineRadioOptions5" id="5" value="1_5" style="width:20px; height:20px;" required>
      <label class="form-check-label" for="preguntaCuatroSi">Si</label>
    </div>
    <div class="form-check form-check-inline pl-5">
      <input class="form-check-input" type="radio" name="inlineRadioOptions5" id="5" value="0_5" style="width:20px; height:20px;" required>
      <label class="form-check-label" for="preguntaCuatroNo">No</label>
    </div>
    </h5>
  </div>

  <div class="form-group">
    <br><br>
    <h5>3.- ¿La obesidad o sobrepeso puede ser una causa para desarrollar diabetes e hipertensión arterial?</h5>
    <br>
    <h5>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="inlineRadioOptions6" id="6" value="1_6" style="width:20px; height:20px;" required>
      <label class="form-check-label" for="preguntaCuatroSi">Si</label>
    </div>
    <div class="form-check form-check-inline pl-5">
      <input class="form-check-input" type="radio" name="inlineRadioOptions6" id="6" value="0_6" style="width:20px; height:20px;" required>
      <label class="form-check-label" for="preguntaCuatroNo">No</label>
    </div>
    </h5>
  </div>

  <br><br><br>

  
  <div class="form-group text-center">
    <h2>ÁREA DE PSICOLOGÍA</h2>
    <br><br>
    <h4>ESTRÉS Y ERC ¿Qué son y cómo prevenirlas?</h4>
    <br><br><br>
    <h5>1.- ¿Conoces el significado de las siglas ERC?</h5>
    <br>
    <h5>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="inlineRadioOptions7" id="7" value="1_7" style="width:20px; height:20px;" required>
      <label class="form-check-label" for="preguntaTresSi">Si</label>
    </div>
    <div class="form-check form-check-inline pl-5">
      <input class="form-check-input" type="radio" name="inlineRadioOptions7" id="7" value="0_7" style="width:20px; height:20px;" required>
      <label class="form-check-label" for="preguntaTresNo">No</label>
    </div>
    </h5>
  </div>

  <div class="form-group text-center">
    <br><br>
    <h5>2.- ¿Es verdad que el estrés puede ocasionarme una enfermedad crónica?</h5>
    <br>
    <h5>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="inlineRadioOptions8" id="8" value="1_8" style="width:20px; height:20px;" required>
      <label class="form-check-label" for="preguntaCuatroSi">Si</label>
    </div>
    <div class="form-check form-check-inline pl-5">
      <input class="form-check-input" type="radio" name="inlineRadioOptions8" id="8" value="0_8" style="width:20px; height:20px;" required>
      <label class="form-check-label" for="preguntaCuatroNo">No</label>
    </div>
    </h5>
  </div>

  <div class="form-group text-center">
    <br><br>
    <h5>3.- ¿Tengo alguna idea de cómo detectar que estoy estresado(a)?</h5>
    <br>
    <h5>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="inlineRadioOptions9" id="9" value="1_9" style="width:20px; height:20px;" required>
      <label class="form-check-label" for="preguntaCuatroSi">Si</label>
    </div>
    <div class="form-check form-check-inline pl-5">
      <input class="form-check-input" type="radio" name="inlineRadioOptions9" id="9" value="0_9" style="width:20px; height:20px;" required>
      <label class="form-check-label" for="preguntaCuatroNo">No</label>
    </div>
    </h5>
  </div>
  </div>

  

  <div class = "col text-center">
      <br><br>
      <button class="btn btn-success btn-lg" type="submit"><i class="bi bi-pencil-square"></i> Registrar Cuestionario Final</button>
  </div>
  <div class = "col"></div>

</form>
</div>
@endsection