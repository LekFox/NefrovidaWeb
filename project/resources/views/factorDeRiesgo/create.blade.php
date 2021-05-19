@extends('layouts.app')

@section('content')

@include('sidebar.beneficiario')

<div class="container"><form action="{{url('/riesgos')}}" method="post">
  @csrf
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  
  <h1 id="JornadaTitulo" class="bluenefro"><i class="bi bi-journal"></i> Registrar Factores de Riesgo</h1>
  <a href="{{ url()->previous() }}" class="btn btn-primary"><i class="bi bi-arrow-left"></i> Regresar</a>
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
    <br><br>
    <h4>1.- ¿Padece Diabetes Mellitus?</h4>
    <br>
    <h5>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="inlineRadioOptions1" id="preguntaUnoSi" value="1" style="width:20px; height:20px;" required>
      <label class="form-check-label" for="preguntaUnoSi">Si</label>
    </div>
    <div class="form-check form-check-inline pl-5">
      <input class="form-check-input" type="radio" name="inlineRadioOptions1" id="preguntaUnoNo" value="0" style="width:20px; height:20px;" required>
      <label class="form-check-label" for="preguntaUnoNo">No</label>
    </div>
    <div class="form-check form-check-inline pl-5">
      <input class="form-check-input" type="radio" name="inlineRadioOptions1" id="preguntaUno" value="2" style="width:20px; height:20px;" required>
      <label class="form-check-label" for="preguntaUno">Lo desconoce</label>
    </div>
    </h5>
  </div>

  <div class="form-group">
    <br><br>
    <h4>2.- ¿Sus padres padecen alguna enfermedad crónica? ¿Cuál?</h4>
    <br>
    <h5>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="inlineRadioOptions2" id="preguntaDosSi" value="1" style="width:20px; height:20px;" onclick="document.getElementById('enfermedad').disabled = false;" required>
      <label class="form-check-label" for="preguntaUDosSi">Si</label>
    </div>
    <div class="form-check form-check-inline pl-5">
      <input class="form-check-input" type="radio" name="inlineRadioOptions2" id="preguntaDosNo" value="0" style="width:20px; height:20px;" onclick="document.getElementById('enfermedad').disabled = true;" required>
      <label class="form-check-label" for="preguntaDosNo">No</label>
    </div>
    <div class="form-check form-check-inline pl-5">
      <input class="form-check-input" type="radio" name="inlineRadioOptions2" id="preguntaDos" value="2" style="width:20px; height:20px;" onclick="document.getElementById('enfermedad').disabled = true;" required>
      <label class="form-check-label" for="preguntaDos">Lo desconoce</label>
    </div>
    </h5>
    <br>
    <input class="form-control" id="enfermedad" name="enfermedad" placeholder="Especifique Enfermedad...">
  </div>

  <div class="form-group">
    <br><br>
    <h4>3.- ¿Ha sido o actualmente está siendo tratado por presión arterial Alta (Hipertensión)?</h4>
    <br>
    <h5>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="inlineRadioOptions3" id="preguntaTresSi" value="1" style="width:20px; height:20px;" required>
      <label class="form-check-label" for="preguntaTresSi">Si</label>
    </div>
    <div class="form-check form-check-inline pl-5">
      <input class="form-check-input" type="radio" name="inlineRadioOptions3" id="preguntaTresNo" value="0" style="width:20px; height:20px;" required>
      <label class="form-check-label" for="preguntaTresNo">No</label>
    </div>
    <div class="form-check form-check-inline pl-5">
      <input class="form-check-input" type="radio" name="inlineRadioOptions3" id="preguntaTres" value="2" style="width:20px; height:20px;" required>
      <label class="form-check-label" for="preguntaUno">Lo desconoce</label>
    </div>
    </h5>
  </div>

  <div class="form-group">
    <br><br>
    <h4>4.- ¿Tiene algún familiar que padezca enfermedad renal crónica (Es decir con tratamiento de diálisis peritoneal o hemodiálisis)?</h4>
    <br>
    <h5>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="inlineRadioOptions4" id="preguntaCuatroSi" value="1" style="width:20px; height:20px;" required>
      <label class="form-check-label" for="preguntaCuatroSi">Si</label>
    </div>
    <div class="form-check form-check-inline pl-5">
      <input class="form-check-input" type="radio" name="inlineRadioOptions4" id="preguntaCuatroNo" value="0" style="width:20px; height:20px;" required>
      <label class="form-check-label" for="preguntaCuatroNo">No</label>
    </div>
    <div class="form-check form-check-inline pl-5">
      <input class="form-check-input" type="radio" name="inlineRadioOptions4" id="preguntaCuatro" value="2" style="width:20px; height:20px;" required>
      <label class="form-check-label" for="preguntaUno">Lo desconoce</label>
    </div>
    </h5>
  </div>

  <div class="form-group">
    <br><br>
    <h4>5.- ¿Regularmente se auto medica con analgésicos de venta libre (Como ibuprofeno o naproxeno)?</h4>
    <br>
    <h5>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="inlineRadioOptions5" id="preguntaCincoSi" value="1" style="width:20px; height:20px;" required>
      <label class="form-check-label" for="preguntaCincoSi">Si</label>
    </div>
    <div class="form-check form-check-inline pl-5">
      <input class="form-check-input" type="radio" name="inlineRadioOptions5" id="preguntaCincoNo" value="0" style="width:20px; height:20px;" required>
      <label class="form-check-label" for="preguntaCincoNo">No</label>
    </div>
    <div class="form-check form-check-inline pl-5">
      <input class="form-check-input" type="radio" name="inlineRadioOptions5" id="preguntaCinco" value="2" style="width:20px; height:20px;" required>
      <label class="form-check-label" for="preguntaUno">Lo desconoce</label>
    </div>
    </h5>
  </div>

  <div class="form-group">
    <br><br>
    <h4>6.- ¿Se le ha diagnosticado VIH/SIDA, lupus o Hepatitis C?</h4>
    <br>
    <h5>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="inlineRadioOptions6" id="preguntaSeisSi" value="1" style="width:20px; height:20px;" required>
      <label class="form-check-label" for="preguntaSeisSi">Si</label>
    </div>
    <div class="form-check form-check-inline pl-5">
      <input class="form-check-input" type="radio" name="inlineRadioOptions6" id="preguntaSeisNo" value="0" style="width:20px; height:20px;" required>
      <label class="form-check-label" for="preguntaSeisNo">No</label>
    </div>
    <div class="form-check form-check-inline pl-5">
      <input class="form-check-input" type="radio" name="inlineRadioOptions6" id="preguntaSeis" value="2" style="width:20px; height:20px;" required>
      <label class="form-check-label" for="preguntaUno">Lo desconoce</label>
    </div>
    </h5>
  </div>

  <div class="form-group">
    <br><br>
    <h4>7.- ¿Padece frecuentemente infecciones urinarias?</h4>
    <br>
    <h5>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="inlineRadioOptions7" id="preguntaSieteSi" value="1" style="width:20px; height:20px;" required>
      <label class="form-check-label" for="preguntaSieteSi">Si</label>
    </div>
    <div class="form-check form-check-inline pl-5">
      <input class="form-check-input" type="radio" name="inlineRadioOptions7" id="preguntaSieteNo" value="0" style="width:20px; height:20px;" required>
      <label class="form-check-label" for="preguntaSieteNo">No</label>
    </div>
    <div class="form-check form-check-inline pl-5">
      <input class="form-check-input" type="radio" name="inlineRadioOptions7" id="preguntaSiete" value="2" style="width:20px; height:20px;" required>
      <label class="form-check-label" for="preguntaUno">Lo desconoce</label>
    </div>
    </h5>
  </div>

  <div class="form-group">
    <br><br>
    <h4>8.- ¿Tiene sobrepeso u obesidad?</h4>
    <br>
    <h5>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="inlineRadioOptions8" id="preguntaOchoSi" value="1" style="width:20px; height:20px;" required>
      <label class="form-check-label" for="preguntaOchoSi">Si</label>
    </div>
    <div class="form-check form-check-inline pl-5">
      <input class="form-check-input" type="radio" name="inlineRadioOptions8" id="preguntaOchoNo" value="0" style="width:20px; height:20px;" required>
      <label class="form-check-label" for="preguntaOchoNo">No</label>
    </div>
    <div class="form-check form-check-inline pl-5">
      <input class="form-check-input" type="radio" name="inlineRadioOptions8" id="preguntaOcho" value="2" style="width:20px; height:20px;" required>
      <label class="form-check-label" for="preguntaUno">Lo desconoce</label>
    </div>
    </h5>
  </div>

  <div class="form-group">
    <br><br>
    <h4>9.- ¿Actualmente fuma o ha fumado en el pasado por más de 10 años?</h4>
    <br>
    <h5>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="inlineRadioOptions9" id="preguntaNueveSi" value="1" style="width:20px; height:20px;" required>
      <label class="form-check-label" for="preguntaNueveSi">Si</label>
    </div>
    <div class="form-check form-check-inline pl-5">
      <input class="form-check-input" type="radio" name="inlineRadioOptions9" id="preguntaNueveNo" value="0" style="width:20px; height:20px;" required>
      <label class="form-check-label" for="preguntaNueveNo">No</label>
    </div>
    <div class="form-check form-check-inline pl-5">
      <input class="form-check-input" type="radio" name="inlineRadioOptions9" id="preguntaNueve" value="2" style="width:20px; height:20px;" required>
      <label class="form-check-label" for="preguntaUno">Lo desconoce</label>
    </div>
    </h5>
  </div>

  <div class="form-group">
    <br><br>
    <h4>10.- ¿Ingiere frecuentemente bebidas alcohólicas (Una vez a la semana)?</h4>
    <br>
    <h5>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="inlineRadioOptions10" id="preguntaDiezSi" value="1" style="width:20px; height:20px;" required>
      <label class="form-check-label" for="preguntaDiezSi">Si</label>
    </div>
    <div class="form-check form-check-inline pl-5">
      <input class="form-check-input" type="radio" name="inlineRadioOptions10" id="preguntaDiezNo" value="0" style="width:20px; height:20px;" required>
      <label class="form-check-label" for="preguntaDiezNo">No</label>
    </div>
    <div class="form-check form-check-inline pl-5">
      <input class="form-check-input" type="radio" name="inlineRadioOptions10" id="preguntaDiez" value="2" style="width:20px; height:20px;" required>
      <label class="form-check-label" for="preguntaUno">Lo desconoce</label>
    </div>
    </h5>
  </div>

  <div class="form-group">
    <br><br>
    <h4>11.- ¿Consume o ingiere drogas?</h4>
    <br>
    <h5>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="inlineRadioOptions11" id="preguntaOnceSi" value="1" style="width:20px; height:20px;" required>
      <label class="form-check-label" for="preguntaOnceSi">Si</label>
    </div>
    <div class="form-check form-check-inline pl-5">
      <input class="form-check-input" type="radio" name="inlineRadioOptions11" id="preguntaOnceNo" value="0" style="width:20px; height:20px;" required>
      <label class="form-check-label" for="preguntaOnceNo">No</label>
    </div>
    <div class="form-check form-check-inline pl-5">
      <input class="form-check-input" type="radio" name="inlineRadioOptions11" id="preguntaOnce" value="2" style="width:20px; height:20px;" required>
      <label class="form-check-label" for="preguntaUno">Lo desconoce</label>
    </div>
    </h5>
  </div>

  <div class="form-group">
    <br><br>
    <h4>12.- ¿Nació con bajo peso al nacer o fue prematuro?</h4>
    <br>
    <h5>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="inlineRadioOptions12" id="preguntaDoceSi" value="1" style="width:20px; height:20px;" required>
      <label class="form-check-label" for="preguntaDoceSi">Si</label>
    </div>
    <div class="form-check form-check-inline pl-5">
      <input class="form-check-input" type="radio" name="inlineRadioOptions12" id="preguntaDoceNo" value="0" style="width:20px; height:20px;" required>
      <label class="form-check-label" for="preguntaDoceNo">No</label>
    </div>
    <div class="form-check form-check-inline pl-5">
      <input class="form-check-input" type="radio" name="inlineRadioOptions12" id="preguntaDoce" value="2" style="width:20px; height:20px;" required>
      <label class="form-check-label" for="preguntaUno">Lo desconoce</label>
    </div>
    </h5>
  </div>

  <div class = "col text-center">
      <br><br>
      <button class="btn btn-success btn-lg" type="submit"><i class="bi bi-pencil-square"></i> Registrar Factores de Riesgo</button>
  </div>
  <div class = "col"></div>

</form>
</div>
@endsection