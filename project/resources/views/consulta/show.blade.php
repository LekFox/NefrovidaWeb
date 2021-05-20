@extends('layouts.app')

@section('content')

@include('sidebar.beneficiario')

<div class="container">
  @csrf
  
  {{-- @include('notas.form',['modo'=>'Crear'],['id'=>'2']) --}}

  @if (count($errors)>0)
      
      <div class="alert alert-danger" role="alert">
          <ul>
          @foreach($errors->all() as $error)
             <li> {{$error}} </li>
          @endforeach 
          </ul>
      </div>
      
  @endif
  @if (Session::has('eliminado'))
    <div class="alert alert-success" role="alert"> {{Session::get('eliminado')}} </div>      
  @endif

  @if (Session::has('nuevo'))
    <div class="alert alert-success" role="alert"> {{Session::get('nuevo')}} </div>       
  @endif

  @if (Session::has('editado'))
    <div class="alert alert-success" role="alert"> {{Session::get('editado')}} </div>    
  
  @endif
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

  
  <h1 id="consultaTitulo" class="text-center bluenefro"><i class="bi bi-person-lines-fill"></i> >Consulta de {{$consulta->beneficiario->nombreBeneficiario}}</h1>
  <div class="row">
    <div class="col">
      <a href="{{ url('/beneficiario/'.$consulta->beneficiario->id) }}" class="btn btn-primary"><i class="bi bi-arrow-left"></i> Regresar </a>
    </div>
    <div class="col">
    </div>
  </div>
  <br><br>
  <div class="card">
    <div class="card-body">
        <div class= "row">
          <div class= "col text-center align-bottom">
                <h2 class="card-title "><i class="bi bi-person-square"></i> Padecimiento</h2>
          </div>
        </div>
        <div class= "row">
          <div class= "col text-right align-bottom">
                <h5 class="card-title ">Padecimiento:</h5>
            </div>
            <div class= "col text-left align-bottom">
                @if($consulta->padecimiento == NULL)
                <p class="font-weight-light" >No registrado / No aplica</p>
                @else
                <p class="font-weight-light" >{{ $consulta->padecimimetno }}</p>
                @endif
            </div>
        </div>
        <br>
        <div class= "row">
          <div class= "col text-center align-bottom">
                <h2 class="card-title "><i class="bi bi-person-square"></i> Exploración Física</h2>
          </div>
        </div>
        <div class= "row">
          <div class= "col text-right align-bottom">
                <h5 class="card-title ">T.A. Brazo Derecho:</h5>
            </div>
            <div class= "col text-left align-bottom">
                @if($consulta->brazoD == NULL)
                <p class="font-weight-light" >No registrado / No aplica</p>
                @else
                <p class="font-weight-light" >{{ $consulta->brazoD }}</p>
                @endif
            </div>
        </div>
        <div class= "row">
          <div class= "col text-right align-bottom">
                <h5 class="card-title ">T.A. Brazo Izquierdo:</h5>
            </div>
            <div class= "col text-left align-bottom">
                @if($consulta->brazoI == NULL)
                <p class="font-weight-light" >No registrado / No aplica</p>
                @else
                <p class="font-weight-light" >{{ $consulta->brazoI }}</p>
                @endif
            </div>
        </div>
        <div class= "row">
          <div class= "col text-right align-bottom">
                <h5 class="card-title ">Frecuencia Cardiaca:</h5>
            </div>
            <div class= "col text-left align-bottom">
                @if($consulta->fCardiaca == NULL)
                <p class="font-weight-light" >No registrado / No aplica</p>
                @else
                <p class="font-weight-light" >{{ $consulta->fCardiaca }}</p>
                @endif
            </div>
        </div>
        <div class= "row">
          <div class= "col text-right align-bottom">
                <h5 class="card-title ">Frecuencia Respiratoria:</h5>
            </div>
            <div class= "col text-left align-bottom">
                @if($consulta->fRespiratoria == NULL)
                <p class="font-weight-light" >No registrado / No aplica</p>
                @else
                <p class="font-weight-light" >{{ $consulta->fRespiratoria }}</p>
                @endif
            </div>
        </div>
        <div class= "row">
          <div class= "col text-right align-bottom">
                <h5 class="card-title ">Temperatura:</h5>
            </div>
            <div class= "col text-left align-bottom">
                @if($consulta->temperatura == NULL)
                <p class="font-weight-light" >No registrado / No aplica</p>
                @else
                <p class="font-weight-light" >{{ $consulta->temperatura }}</p>
                @endif
            </div>
        </div>
        <div class= "row">
          <div class= "col text-right align-bottom">
                <h5 class="card-title ">Peso:</h5>
            </div>
            <div class= "col text-left align-bottom">
                @if($consulta->peso == NULL)
                <p class="font-weight-light" >No registrado / No aplica</p>
                @else
                <p class="font-weight-light" >{{ $consulta->peso }}</p>
                @endif
            </div>
        </div>
        <div class= "row">
          <div class= "col text-right align-bottom">
                <h5 class="card-title ">Talla:</h5>
            </div>
            <div class= "col text-left align-bottom">
                @if($consulta->talla == NULL)
                <p class="font-weight-light" >No registrado / No aplica</p>
                @else
                <p class="font-weight-light" >{{ $consulta->talla }}</p>
                @endif
            </div>
        </div>
        <div class= "row">
          <div class= "col text-right align-bottom">
                <h5 class="card-title ">Cabeza y Cuello:</h5>
            </div>
            <div class= "col text-left align-bottom">
                @if($consulta->cabezaCuello == NULL)
                <p class="font-weight-light" >No registrado / No aplica</p>
                @else
                <p class="font-weight-light" >{{ $consulta->cabezaCuello }}</p>
                @endif
            </div>
        </div>
        <div class= "row">
          <div class= "col text-right align-bottom">
                <h5 class="card-title ">Torax:</h5>
            </div>
            <div class= "col text-left align-bottom">
                @if($consulta->torax == NULL)
                <p class="font-weight-light" >No registrado / No aplica</p>
                @else
                <p class="font-weight-light" >{{ $consulta->torax }}</p>
                @endif
            </div>
        </div>
        <div class= "row">
          <div class= "col text-right align-bottom">
                <h5 class="card-title ">Abdomen:</h5>
            </div>
            <div class= "col text-left align-bottom">
                @if($consulta->abdomen == NULL)
                <p class="font-weight-light" >No registrado / No aplica</p>
                @else
                <p class="font-weight-light" >{{ $consulta->abdomen }}</p>
                @endif
            </div>
        </div>
        <div class= "row">
          <div class= "col text-right align-bottom">
                <h5 class="card-title ">Extremidades:</h5>
            </div>
            <div class= "col text-left align-bottom">
                @if($consulta->extremidades == NULL)
                <p class="font-weight-light" >No registrado / No aplica</p>
                @else
                <p class="font-weight-light" >{{ $consulta->extremidades }}</p>
                @endif
            </div>
        </div>
        <br>
        <div class= "row">
          <div class= "col text-center align-bottom">
                <h2 class="card-title "><i class="bi bi-person-square"></i> Estádo Neurológico y Mental</h2>
          </div>
        </div>
        <div class= "row">
          <div class= "col text-right align-bottom">
                <h5 class="card-title ">Estado Neurológico y Mental:</h5>
            </div>
            <div class= "col text-left align-bottom">
                @if($consulta->mental == NULL)
                <p class="font-weight-light" >No registrado / No aplica</p>
                @else
                <p class="font-weight-light" >{{ $consulta->mental }}</p>
                @endif
            </div>
        </div>
        <br>
        <div class= "row">
          <div class= "col text-center align-bottom">
                <h2 class="card-title "><i class="bi bi-person-square"></i> Otros</h2>
          </div>
        </div>
        <div class= "row">
          <div class= "col text-right align-bottom">
                <h5 class="card-title "> Observaciones:</h5>
            </div>
            <div class= "col text-left align-bottom">
                @if($consulta->observaciones == NULL)
                <p class="font-weight-light" >No registrado / No aplica</p>
                @else
                <p class="font-weight-light" >{{ $consulta->observaciones }}</p>
                @endif
            </div>
        </div>
        <br>
        <div class= "row">
          <div class= "col text-center align-bottom">
                <h2 class="card-title "><i class="bi bi-person-square"></i> Diagnóstico y Tratamiento</h2>
          </div>
        </div>
        <div class= "row">
          <div class= "col text-right align-bottom">
                <h5 class="card-title "> Diagnóstico:</h5>
            </div>
            <div class= "col text-left align-bottom">
                @if($consulta->diagnostico == NULL)
                <p class="font-weight-light" >No registrado / No aplica</p>
                @else
                <p class="font-weight-light" >{{ $consulta->diagnostico }}</p>
                @endif
            </div>
        </div>
        <div class= "row">
          <div class= "col text-right align-bottom">
                <h5 class="card-title "> Tratamiento:</h5>
            </div>
            <div class= "col text-left align-bottom">
                @if($consulta->tratamiento == NULL)
                <p class="font-weight-light" >No registrado / No aplica</p>
                @else
                <p class="font-weight-light" >{{ $consulta->tratamiento }}</p>
                @endif
            </div>
        </div>
        <br>
    </div>
</div>
  <br>

  
  <script type="text/javascript">
      $('.date').datepicker({  
         format: 'yyyy-mm-dd'
       });  
  </script>
  

</div>
@endsection