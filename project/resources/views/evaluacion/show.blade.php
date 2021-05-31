@extends('layouts.app')

@section('content')

@include('sidebar.beneficiario')

<div class="container">
@csrf
    <div class="text-center">
      <h1>Evaluación Inicial de {{$beneficiario->nombreBeneficiario}}</h1>
    </div>
    <br><br>
    <a href="{{ url()->previous() }}" class="btn btn-primary"><i class="bi bi-arrow-left"></i> Regresar</a>
    
    <form action="{{url('/evaluacionInicial/'.$beneficiario->id)}}" class="d-inline" method="post">
    @csrf
    {{ @method_field('DELETE') }}
    <input type="hidden" id="id_beneficiario" name="id_beneficiario" value="{{ $beneficiario->id }}">
    <button type="submit" onclick="return confirm('¿Quieres borrar la Evaluación Inicial de {{$beneficiario->nombreBeneficiario}}? Esta acción no puede deshacerse.')" class="btn btn-outline-danger float-right"><i class="bi bi-trash-fill"></i> Eliminar Evaluación Inicial</button>
    </form>
    
    
    <br><br><br><br>
    <div class="text-left"> 
      <h4>
        Sexo: {{$evaluacionInicial[1]->sexo}}, &nbsp;&nbsp;Edad: {{$evaluacionInicial[1]->edad}}, &nbsp;&nbsp;Grado: {{$evaluacionInicial[1]->grado}}, &nbsp;&nbsp;Grupo: {{$evaluacionInicial[1]->grupo}}
      </h4>

      <br>
      
    <div class="form-group">
      <br>
      <h2>ÁREA MÉDICA</h2>
      <br>
      <h4>¿Diabetes e Hipertensión, ¿Qué son y cómo prevenirlas?</h4>
      <br><br>
      <h5>1.- ¿La diabetes es el aumento de glucosa (azúcar) presente en la sangre?</h5>
      @if($evaluacionInicial[0]->respuesta == 1)
      <h5><b>Respuesta: Si</b> </h5>
      @endif
      @if($evaluacionInicial[0]->respuesta ==0)
      <h5><b>Respuesta: No</b> </h5>
      @endif

      <br>
      
      <h5>2.- ¿La presión aumenta cuando se consumen alimentos salados y grasos?</h5>
      @if($evaluacionInicial[1]->respuesta == 1)
      <h5><b>Respuesta: Si </b></h5>
      @endif
      @if($evaluacionInicial[1]->respuesta == 0)
      <h5> <b>Respuesta: No</b>  </h5>
      @endif

      <br>

      <h5>3.- ¿La enfermedad renal es la perdida de las funciones del riñón?</h5>
      @if($evaluacionInicial[2]->respuesta == 1)
      <h5> <b>Respuesta: Si</b> </h5>
      @endif
      @if($evaluacionInicial[2]->respuesta == 0)
      <h5> <b>Respuesta: No</b> </h5>
      @endif
      <br>

      <br>
      <h2>ÁREA DE NUTRICIÓN</h2>
      <br>
      <h4>¿Qué es y para que prevenir la obesidad?</h4>
      <br><br>
      <h5>1.- ¿La obesidad es la acumulación anormal o excesiva de grasa en el cuerpo, dañina para la salud?</h5>
      @if($evaluacionInicial[3]->respuesta == 1)
      <h5><b>Respuesta: Si</b> </h5>
      @endif
      @if($evaluacionInicial[3]->respuesta ==0)
      <h5><b>Respuesta: No</b> </h5>
      @endif

      <br>
      
      <h5>2.- El IMC es un indicador simple en el que se necesita conocer el peso y talla para identificar si se padece sobrepeso y obesidad?</h5>
      @if($evaluacionInicial[4]->respuesta == 1)
      <h5><b>Respuesta: Si </b></h5>
      @endif
      @if($evaluacionInicial[4]->respuesta == 0)
      <h5> <b>Respuesta: No</b>  </h5>
      @endif

      <br>

      <h5>3.- ¿La obesidad o sobrepeso puede ser una causa para desarrollar diabetes e hipertensión arterial?</h5>
      @if($evaluacionInicial[5]->respuesta == 1)
      <h5> <b>Respuesta: Si</b> </h5>
      @endif
      @if($evaluacionInicial[5]->respuesta == 0)
      <h5> <b>Respuesta: No</b> </h5>
      @endif

      <br>
      <br>

      <h2>ÁREA DE PSICOLOGÍA</h2>
      <br>
      <h4>ESTRÉS Y ERC ¿Qué son y cómo prevenirlas?</h4>
      <br><br>
      <h5>1.- ¿Conoces el significado de las siglas ERC?</h5>
      @if($evaluacionInicial[6]->respuesta == 1)
      <h5><b>Respuesta: Si</b> </h5>
      @endif
      @if($evaluacionInicial[6]->respuesta ==0)
      <h5><b>Respuesta: No</b> </h5>
      @endif

      <br>
      
      <h5>2.- ¿Es verdad que el estrés puede ocasionarme una enfermedad crónica?</h5>
      @if($evaluacionInicial[7]->respuesta == 1)
      <h5><b>Respuesta: Si </b></h5>
      @endif
      @if($evaluacionInicial[7]->respuesta == 0)
      <h5> <b>Respuesta: No</b>  </h5>
      @endif

      <br>

      <h5>3.- ¿Tengo alguna idea de cómo detectar que estoy estresado(a)?</h5>
      @if($evaluacionInicial[8]->respuesta == 1)
      <h5> <b>Respuesta: Si</b> </h5>
      @endif
      @if($evaluacionInicial[8]->respuesta == 0)
      <h5> <b>Respuesta: No</b> </h5>
      @endif
      <br>
      
      
      
    </div>


    </div>
</div>

@endsection