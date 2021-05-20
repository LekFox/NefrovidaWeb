@extends('layouts.app')

@section('content')

@include('sidebar.beneficiario')

<div class="container">
@csrf
  <form>
    <div class="text-center">
      <h1>Factores de Riesgo de {{$beneficiario->nombreBeneficiario}}</h1>
    </div>
    <br><br><br><br>
    <div class="text-left"> 
      <h4>
        1.- ¿Padece Diabetes Mellitus?
      </h4>
      <br>
      <div class="form-group">
        @if($riesgos[0]->respuesta == 1)
          <h5>Si, el paciente padece de Diabetes Mellitus.</h5>
        @endif

        @if($riesgos[0]->respuesta == 0)
          <h5>No, el paciente no padece de Diabetes Mellitus.</h5>
        @endif

        @if($riesgos[0]->respuesta == 2)
          <h5>Desconoce si padece de Diabetes Mellitus.</h5>
        @endif
      </div>

      <br><br>

      <h4>
        2.- ¿Sus padres padecen alguna enfermedad crónica? ¿Cuál?
      </h4>
      <br>
      <div class="form-group">
        @if($riesgos[1]->respuesta == 1)
          <h5>Si, padecen de {{$riesgos[1]->enfermedad}}.</h5>
        @endif

        @if($riesgos[1]->respuesta == 0)
          <h5>No, los padres no padecen de ninguna enfermedad crónica.</h5>
        @endif

        @if($riesgos[1]->respuesta == 2)
        <h5>Desconoce si padecen de alguna enfermedad crónica.</h5>
        @endif
      </div>

      <br><br>

      <h4>
        3.- ¿Ha sido o actualmente está siendo tratado por presión arterial Alta (Hipertensión)?
      </h4>
      <br>
      <div class="form-group">
        @if($riesgos[2]->respuesta == 1)
          <h5>Si, el paciente está siendo o ha sido tratado por presión arterial alta.</h5>
        @endif

        @if($riesgos[2]->respuesta == 0)
          <h5>No, el paciente no está siendo y no ha sido tratado por presión arterial alta.</h5>
        @endif

        @if($riesgos[2]->respuesta == 2)
          <h5>Desconoce si tiene presión arterial alta.</h5>
        @endif
      </div>

      <br><br>

      <h4>
        4.- ¿Tiene algún familiar que padezca enfermedad renal crónica (Es decir con tratamiento de diálisis peritoneal o hemodiálisis)?
      </h4>
      <br>
      <div class="form-group">
        @if($riesgos[3]->respuesta == 1)
          <h5>Si, el paciente tiene un familiar que padece de una enfermedad renal crónica.</h5>
        @endif

        @if($riesgos[3]->respuesta == 0)
          <h5>No, el paciente no tiene ningún familiar que padecezca de una enfermedad renal crónica.</h5>
        @endif

        @if($riesgos[3]->respuesta == 2)
          <h5>Desconoce si tiene algún familiar que padezca de una enfermedad renal crónica.</h5>
        @endif
      </div>

      <br><br>

      <h4>
        5.- ¿Regularmente se automedica con analgésicos de venta libre (Como ibuprofeno o naproxeno)?
      </h4>
      <br>
      <div class="form-group">
        @if($riesgos[4]->respuesta == 1)
          <h5>Si, el paciente se automedica.</h5>
        @endif

        @if($riesgos[4]->respuesta == 0)
          <h5>No, el paciente no se automedica.</h5>
        @endif

        @if($riesgos[4]->respuesta == 2)
          <h5>Desconoce si se automedica con analgésicos de venta libre.</h5>
        @endif
      </div>

      <br><br>

      <h4>
        6.- ¿Se le ha diagnosticado VIH/SIDA, lupus o Hepatitis C?
      </h4>
      <br>
      <div class="form-group">
        @if($riesgos[5]->respuesta == 1)
        <h5>Si, el paciente está diagnosticado con VIH/SIDA.</h5>
        @endif

        @if($riesgos[5]->respuesta == 0)
          <h5>No, el paciente no está diagnosticado con VIH/SIDA.</h5>
        @endif

        @if($riesgos[5]->respuesta == 2)
        <h5>Desconoce si padece de VIH/SIDA.</h5>
        @endif
      </div>

      <br><br>

      <h4>
        7.- ¿Padece frecuentemente infecciones urinarias?
      </h4>
      <br>
      <div class="form-group">
        @if($riesgos[6]->respuesta == 1)
        <h5>Si, el paciente padece de infecciones urinarias.</h5>
        @endif

        @if($riesgos[6]->respuesta == 0)
          <h5>No, el paciente no padece de infecciones urinarias.</h5>
        @endif

        @if($riesgos[6]->respuesta == 2)
        <h5>Desconoce si padece de infecciones urinarias.</h5>
        @endif
      </div>

      <br><br>

      <h4>
        8.- ¿Tiene sobrepeso u obesidad?
      </h4>
      <br>
      <div class="form-group">
        @if($riesgos[7]->respuesta == 1)
        <h5>Si, el paciente tiene sobrepeso u obesidad.</h5>
        @endif

        @if($riesgos[7]->respuesta == 0)
          <h5>No, el paciente no tiene sobrepeso u obesidad.</h5>
        @endif

        @if($riesgos[7]->respuesta == 2)
        <h5>Desconoce si tiene sobrepeso u obesidad.</h5>
        @endif
      </div>

      <br><br>

      <h4>
        9.- ¿Actualmente fuma o ha fumado en el pasado por más de 10 años?
      </h4>
      <br>
      <div class="form-group">
        @if($riesgos[8]->respuesta == 1)
        <h5>Si, el paciente fuma o ha fumado en el pasado por más de 10 años.</h5>
        @endif

        @if($riesgos[8]->respuesta == 0)
          <h5>No, el paciente no fuma o ha fumado en el pasado por más de 10 años.</h5>
        @endif

        @if($riesgos[8]->respuesta == 2)
        <h5>Desconoce si ha fumado en el pasado por más de 10 años.</h5>
        @endif
      </div>

      <br><br>

      <h4>
        10.- ¿Ingiere frecuentemente bebidas alcohólicas (Una vez a la semana)?
      </h4>
      <br>
      <div class="form-group">
        @if($riesgos[9]->respuesta == 1)
        <h5>Si, el paciente ingiere bebidas alcohólicas frecuentemente.</h5>
        @endif

        @if($riesgos[9]->respuesta == 0)
          <h5>No, el paciente no ingiere bebidas alcoholicas frecuentemente.</h5>
        @endif

        @if($riesgos[9]->respuesta == 2)
        <h5>Desconoce si ingiere bebidas alcohólicas frecuentemente.</h5>
        @endif
      </div>

      <br><br>

      <h4>
        11.- ¿Consume o ingiere drogas?
      </h4>
      <br>
      <div class="form-group">
        @if($riesgos[10]->respuesta == 1)
        <h5>Si, el paciente consume o ingiere drogas.</h5>
        @endif

        @if($riesgos[10]->respuesta == 0)
          <h5>No, el paciente no consume o ingiere drogas.</h5>
        @endif

        @if($riesgos[10]->respuesta == 2)
        <h5>Desconoce si consume o ingiere drogas.</h5>
        @endif
      </div>

      <br><br>

      <h4>
        12.- ¿Nació con bajo peso al nacer o fue prematuro?
      </h4>
      <br>
      <div class="form-group">
        @if($riesgos[11]->respuesta == 1)
        <h5>Si, el paciente nació con bajo peso o fue prematuro.</h5>
        @endif

        @if($riesgos[11]->respuesta == 0)
          <h5>No, el paciente no nació con bajo peso y no fue prematuro.</h5>
        @endif

        @if($riesgos[11]->respuesta == 2)
        <h5>Desconoce si nació con bajo peso o fue prematuro.</h5>
        @endif
      </div>

    </div>
  </form> 
</div>
@endsection