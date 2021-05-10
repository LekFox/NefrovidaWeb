@extends('layouts.app')

@section('content')

@include('sidebar.beneficiario')

<div class="container">
  <h1 class="container text-center">Evaluación Final</h1>
  <style>
        .form-check-input:hover{
          background-color:'#000';
          opacity:.4;
          border-radius:40px;
          transition:.25s ease-in-out;
        }
  </style>

  <form action="{{url('/evaluacionInicial')}}" method="post">
    <div class="form-group">
      <br><br><br><br>
      <h3>- Área Médica -</h3>
      <h5>1.- ¿La diabetes es el aumento de glucosa (azúcar) presente en la sangre?</h5>
      <br>
      <h5>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="preguntaUnoInicialSi" value="si" style="width:20px; height:20px;">
          <label class="form-check-label" for="preguntaUnoInicialSi">Si</label>
        </div>
        <div class="form-check form-check-inline pl-5">
          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="preguntaUnoInicialNo" value="no" style="width:20px; height:20px;">
          <label class="form-check-label" for="preguntaUnoInicialSi">No</label>
        </div>
      </h5>
      <br><br>
      <h5>2.- ¿La presión aumenta cuando se consumen alimentos salados y grasos?</h5>
      <br>
      <h5>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="preguntaDosInicialSi" value="si" style="width:20px; height:20px;">
          <label class="form-check-label" for="preguntaUnoInicialSi">Si</label>
        </div>
        <div class="form-check form-check-inline pl-5">
          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="preguntaDosInicialNo" value="no" style="width:20px; height:20px;">
          <label class="form-check-label" for="preguntaUnoInicialSi">No</label>
        </div>
      </h5>
      <br><br>
      <h5>3.- ¿La enfermedad renal es la pérdida de las funciones del riñón?</h5>
      <br>
      <h5>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="preguntaTresInicialSi" value="si" style="width:20px; height:20px;">
          <label class="form-check-label" for="preguntaUnoInicialSi">Si</label>
        </div>
        <div class="form-check form-check-inline pl-5">
          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="preguntaTresInicialNo" value="no" style="width:20px; height:20px;">
          <label class="form-check-label" for="preguntaUnoInicialSi">No</label>
        </div>
      </h5>
      <br><br>
      <h3>- Área de Nutriología -</h3>
      <h5>4.- ¿La obesidad es la acumulación anormal o excesiva de grasa en el cuerpo, dañina para la salud?</h5>
      <br>
      <h5>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="preguntaCuatroInicialSi" value="si" style="width:20px; height:20px;">
          <label class="form-check-label" for="preguntaUnoInicialSi">Si</label>
        </div>
        <div class="form-check form-check-inline pl-5">
          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="preguntaCuatroInicialNo" value="no" style="width:20px; height:20px;">
          <label class="form-check-label" for="preguntaUnoInicialSi">No</label>
        </div>
      </h5>
      <br><br>
      <h5>5.- ¿El IMC es un indicador simple en el que se necesita conocer el peso y talla para identificar si se padece sobrepeso y obesidad?</h5>
      <br>
      <h5>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="preguntaCincoInicialSi" value="si" style="width:20px; height:20px;">
          <label class="form-check-label" for="preguntaUnoInicialSi">Si</label>
        </div>
        <div class="form-check form-check-inline pl-5">
          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="preguntaCincoInicialNo" value="no" style="width:20px; height:20px;">
          <label class="form-check-label" for="preguntaUnoInicialSi">No</label>
        </div>
      </h5>
      <br><br>
      <h5>6.- ¿La obesidad o sobrepeso puede ser una causa para desarrolar diabetes e hipertensión arterial?</h5>
      <br>
      <h5>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="preguntaSeisInicialSi" value="si" style="width:20px; height:20px;">
          <label class="form-check-label" for="preguntaUnoInicialSi">Si</label>
        </div>
        <div class="form-check form-check-inline pl-5">
          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="preguntaSeisInicialNo" value="no" style="width:20px; height:20px;">
          <label class="form-check-label" for="preguntaUnoInicialSi">No</label>
        </div>
      </h5>
      <br><br>
      <h3>- Área de Psicología -</h3>
      <h5>7.- ¿Conoces el significado de las siglas ERC?</h5>
      <br>
      <h5>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="preguntaSieteInicialSi" value="si" style="width:20px; height:20px;">
          <label class="form-check-label" for="preguntaUnoInicialSi">Si</label>
        </div>
        <div class="form-check form-check-inline pl-5">
          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="preguntaSieteInicialNo" value="no" style="width:20px; height:20px;">
          <label class="form-check-label" for="preguntaUnoInicialSi">No</label>
        </div>
      </h5>
      <br><br>
      <h5>8.- ¿Es verdad que el estrés puede ocasionarme una enfermedad crónica?</h5>
      <br>
      <h5>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="preguntaOchoInicialSi" value="si" style="width:20px; height:20px;">
          <label class="form-check-label" for="preguntaUnoInicialSi">Si</label>
        </div>
        <div class="form-check form-check-inline pl-5">
          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="preguntaOchoInicialNo" value="no" style="width:20px; height:20px;">
          <label class="form-check-label" for="preguntaUnoInicialSi">No</label>
        </div>
      </h5>
      <br><br>
      <h5>9.- ¿Tengo alguna idea de cómo detectar que estoy estresado(a)?</h5>
      <br>
      <h5>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="preguntaNueveInicialSi" value="si" style="width:20px; height:20px;">
          <label class="form-check-label" for="preguntaUnoInicialSi">Si</label>
        </div>
        <div class="form-check form-check-inline pl-5">
          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="preguntaNueveInicialNo" value="no" style="width:20px; height:20px;">
          <label class="form-check-label" for="preguntaUnoInicialSi">No</label>
        </div>
      </h5>
    </div>
  </form>
</div>









@endsection
