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
  <br><br>
  <a href="{{ url()->previous() }}" class="btn btn-primary"><i class="bi bi-arrow-left"></i> Regresar</a>

  <form action="{{url('/evaluacion/storeFinal')}}" method="post" id="evaluacionFinal">
    @csrf
    <div class="form-group">
      <br><br><br><br>
      @foreach($preguntas as $pregunta)
        <h4>{{$pregunta->descripcion}}</h4>
        <h5>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="inlineRadioOptions{{$pregunta->id}}" id="preguntaUnoInicialSi" value="1" style="width:20px; height:20px;" required>
          <label class="form-check-label" for="preguntaUnoInicialSi">Si</label>
        </div>
        <div class="form-check form-check-inline pl-5">
          <input class="form-check-input" type="radio" name="inlineRadioOptions{{$pregunta->id}}" id="preguntaUnoInicialNo" value="0" style="width:20px; height:20px;" required>
          <label class="form-check-label" for="preguntaUnoInicialSi">No</label>
        </div>
      </h5>
      <br><br>
      @endforeach
      <br>
      
      
    <button type="submit" class="btn btn-success" style="width:220px; height:50px;">Registrar Evaluación Final</button>
  </form>
  
</div>


@endsection