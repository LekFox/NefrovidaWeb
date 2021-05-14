@extends('layouts.app')

@section('content')

@include('sidebar.beneficiario')

<div class="container">
  <h1 class="container text-center">Evaluación Inicial</h1>
  <style>
        .form-check-input:hover{
          background-color:'#000';
          opacity:.4;
          border-radius:40px;
          transition:.25s ease-in-out;
        }
  </style>

  @foreach($preguntas as $pregunta)
        <h5>{{$pregunta->descripcion}}</h5>

  @endforeach

  <form action="{{url('/evaluacion')}}" method="post" id="evaluacionInicial">
    @csrf
    <div class="form-group">
      <br><br><br><br>
      <h3>- Área Médica -</h3>
      <h5>1.- ¿La diabetes es el aumento de glucosa (azúcar) presente en la sangre?</h5>
      <br>
      <h5>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="inlineRadioOptions1" id="preguntaUnoInicialSi" value="1" style="width:20px; height:20px;" required>
          <label class="form-check-label" for="preguntaUnoInicialSi">Si</label>
        </div>
        <div class="form-check form-check-inline pl-5">
          <input class="form-check-input" type="radio" name="inlineRadioOptions1" id="preguntaUnoInicialNo" value="0" style="width:20px; height:20px;" required>
          <label class="form-check-label" for="preguntaUnoInicialSi">No</label>
        </div>
      </h5>
      <br><br>
      <h5>2.- ¿La presión aumenta cuando se consumen alimentos salados y grasos?</h5>
      <br>
      <h5>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="inlineRadioOptions2" id="preguntaDosInicialSi" value="1" style="width:20px; height:20px;" required>
          <label class="form-check-label" for="preguntaUnoInicialSi">Si</label>
        </div>
        <div class="form-check form-check-inline pl-5">
          <input class="form-check-input" type="radio" name="inlineRadioOptions2" id="preguntaDosInicialNo" value="0" style="width:20px; height:20px;" required>
          <label class="form-check-label" for="preguntaUnoInicialSi">No</label>
        </div>
      </h5>
      <br><br>
      <h5>3.- ¿La enfermedad renal es la pérdida de las funciones del riñón?</h5>
      <br>
      <h5>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="inlineRadioOptions3" id="preguntaTresInicialSi" value="1" style="width:20px; height:20px;" required>
          <label class="form-check-label" for="preguntaUnoInicialSi">Si</label>
        </div>
        <div class="form-check form-check-inline pl-5">
          <input class="form-check-input" type="radio" name="inlineRadioOptions3" id="preguntaTresInicialNo" value="0" style="width:20px; height:20px;" required>
          <label class="form-check-label" for="preguntaUnoInicialSi">No</label>
        </div>
      </h5>
      <br><br>
      <h3>- Área de Nutriología -</h3>
      <h5>4.- ¿La obesidad es la acumulación anormal o excesiva de grasa en el cuerpo, dañina para la salud?</h5>
      <br>
      <h5>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="inlineRadioOptions4" id="preguntaCuatroInicialSi" value="1" style="width:20px; height:20px;" required>
          <label class="form-check-label" for="preguntaUnoInicialSi">Si</label>
        </div>
        <div class="form-check form-check-inline pl-5">
          <input class="form-check-input" type="radio" name="inlineRadioOptions4" id="preguntaCuatroInicialNo" value="0" style="width:20px; height:20px;" required>
          <label class="form-check-label" for="preguntaUnoInicialSi">No</label>
        </div>
      </h5>
      <br><br>
      <h5>5.- ¿El IMC es un indicador simple en el que se necesita conocer el peso y talla para identificar si se padece sobrepeso y obesidad?</h5>
      <br>
      <h5>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="inlineRadioOptions5" id="preguntaCincoInicialSi" value="1" style="width:20px; height:20px;" required>
          <label class="form-check-label" for="preguntaUnoInicialSi">Si</label>
        </div>
        <div class="form-check form-check-inline pl-5">
          <input class="form-check-input" type="radio" name="inlineRadioOptions5" id="preguntaCincoInicialNo" value="0" style="width:20px; height:20px;" required>
          <label class="form-check-label" for="preguntaUnoInicialSi">No</label>
        </div>
      </h5>
      <br><br>
      <h5>6.- ¿La obesidad o sobrepeso puede ser una causa para desarrolar diabetes e hipertensión arterial?</h5>
      <br>
      <h5>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="inlineRadioOptions6" id="preguntaSeisInicialSi" value="1" style="width:20px; height:20px;" required>
          <label class="form-check-label" for="preguntaUnoInicialSi">Si</label>
        </div>
        <div class="form-check form-check-inline pl-5">
          <input class="form-check-input" type="radio" name="inlineRadioOptions6" id="preguntaSeisInicialNo" value="0" style="width:20px; height:20px;" required>
          <label class="form-check-label" for="preguntaUnoInicialSi">No</label>
        </div>
      </h5>
      <br><br>
      <h3>- Área de Psicología -</h3>
      <h5>7.- ¿Conoces el significado de las siglas ERC?</h5>
      <br>
      <h5>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="inlineRadioOptions7" id="preguntaSieteInicialSi" value="1" style="width:20px; height:20px;" required>
          <label class="form-check-label" for="preguntaUnoInicialSi">Si</label>
        </div>
        <div class="form-check form-check-inline pl-5">
          <input class="form-check-input" type="radio" name="inlineRadioOptions7" id="preguntaSieteInicialNo" value="0" style="width:20px; height:20px;" required>
          <label class="form-check-label" for="preguntaUnoInicialSi">No</label>
        </div>
      </h5>
      <br><br>
      <h5>8.- ¿Es verdad que el estrés puede ocasionarme una enfermedad crónica?</h5>
      <br>
      <h5>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="inlineRadioOptions8" id="preguntaOchoInicialSi" value="1" style="width:20px; height:20px;" required>
          <label class="form-check-label" for="preguntaUnoInicialSi">Si</label>
        </div>
        <div class="form-check form-check-inline pl-5">
          <input class="form-check-input" type="radio" name="inlineRadioOptions8" id="preguntaOchoInicialNo" value="0" style="width:20px; height:20px;" required>
          <label class="form-check-label" for="preguntaUnoInicialSi">No</label>
        </div>
      </h5>
      <br><br>
      <h5>9.- ¿Tengo alguna idea de cómo detectar que estoy estresado(a)?</h5>
      <br>
      <h5>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="inlineRadioOptions9" id="preguntaNueveInicialSi" value="1" style="width:20px; height:20px;" required>
          <label class="form-check-label" for="preguntaUnoInicialSi">Si</label>
        </div>
        <div class="form-check form-check-inline pl-5">
          <input class="form-check-input" type="radio" name="inlineRadioOptions9" id="preguntaNueveInicialNo" value="0" style="width:20px; height:20px;" required>
          <label class="form-check-label" for="preguntaUnoInicialSi">No</label>
        </div>
      </h5>
    </div>
    <button type="submit" class="btn btn-success" style="width:200px; height:50px;">Registrar Evaluación</button>
  </form>
  
</div>


@endsection
