@extends('layouts.app')

@section('content')
@include('sidebar.beneficiario')
<div class="container">

  <form action="/evaluacion/{{$evaluacion['id']}}" method="post" id="modificarEvaluacionInicial">
  @csrf
  {{ method_field('PATCH') }}

    <div class="container">
      <h1 class="container text-center">Modificar Preguntas Evaluación Beneficiario</h1>
        <br><br><br>
        @foreach($preguntas as $id=>$pregunta)
        <div class="form-group">
          <h3>Pregunta {{$pregunta['id']}}</h3>
          <label for="pregunta{{$pregunta['id']}}"></label>
          <input class="form-control form-control-lg" id="{{$pregunta['id']}}" name="pregunta{{$pregunta['id']}}" placeholder="Escribe la pregunta {{$pregunta['id']}}" value="{{$pregunta['descripcion']}}" required>
        </div>
        @endforeach
        <button type="submit" class="btn btn-success" style="width:200px; height:50px;">Actualizar Evaluación</button>
    </form>
    
  </div>
</div>



@endsection
