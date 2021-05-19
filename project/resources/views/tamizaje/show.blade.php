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

  
  <h1 id="TamizajeTitulo" class="text-center bluenefro"><i class="bi bi-person-lines-fill"></i> Tamizaje de {{$tamizaje->beneficiario->nombreBeneficiario}}</h1>
  <div class="row">
    <div class="col">
      <a href="{{ url('/beneficiario/'.$tamizaje->beneficiario->id) }}" class="btn btn-primary"><i class="bi bi-arrow-left"></i> Regresar </a>
    </div>
    <div class="col">
    </div>
  </div>
  <br><br>
  <div class="card">
    <div class="card-body">
      <div class= "row">
          <div class="col"></div>
          <div class= "col text-center align-bottom">
                <h2 class="card-title "><i class="bi bi-journal-medical"></i> Tamizaje</h2>
          </div>
          <div class="col text-right">
                <a href="{{url('/tamizaje/'.$tamizaje->id.'/edit')}}" class="btn btn-outline-secondary"><i class="bi bi-pencil-fill"></i> Editar </a>
                <form action="{{url('/tamizaje/'.$tamizaje->id)}}" class="d-inline" method="post">
                    @csrf
                    {{ @method_field('DELETE') }}
                    <input type="hidden" id="id_beneficiario" name="id_beneficiario" value="{{ $tamizaje->beneficiario->id }}">
                    <button type="submit" onclick="return confirm('¿Quieres borrar los antecedentes? Esta acción no puede deshacerse.')"  class="btn btn-outline-danger"><i class="bi bi-trash-fill"></i> Borrar</button>
                </form>
          </div>
        </div>
        <div class= "row">
          <div class= "col text-right align-bottom">
                <h5 class="card-title ">Presión arterial:</h5>
            </div>
            <div class= "col text-left align-bottom">
                @if($tamizaje->sistolica == NULL)
                <p class="font-weight-light" >No registrado / No aplica</p>
                @else
                <p class="font-weight-light" >{{ $tamizaje->sistolica }} / {{ $tamizaje->diastolica }}</p>
                @endif
            </div>
        </div>
        <div class= "row">
          <div class= "col text-right align-bottom">
                <h5 class="card-title ">Glucosa capilar:</h5>
            </div>
            <div class= "col text-left align-bottom">
                @if($tamizaje->glucosaCapilar == NULL)
                <p class="font-weight-light" >No registrado / No aplica</p>
                @else
                <p class="font-weight-light" >{{ $tamizaje->glucosaCapilar }} mg/dL</p>
                @endif
            </div>
        </div>
        <div class= "row">
          <div class= "col text-right align-bottom">
                <h5 class="card-title ">Circunferencia en cintura:</h5>
            </div>
            <div class= "col text-left align-bottom">
                @if($tamizaje->circunferenciaCintura == NULL)
                <p class="font-weight-light" >No registrado / No aplica</p>
                @else
                <p class="font-weight-light" >{{ $tamizaje->circunferenciaCintura }} cm</p>
                @endif
            </div>
        </div>
        <div class= "row">
          <div class= "col text-right align-bottom">
                <h5 class="card-title ">Circunferncia en cadera:</h5>
            </div>
            <div class= "col text-left align-bottom">
                @if($tamizaje->circunferenciaCadera == NULL)
                <p class="font-weight-light" >No registrado / No aplica</p>
                @else
                <p class="font-weight-light" >{{ $tamizaje->circunferenciaCadera }} cm</p>
                @endif
            </div>
        </div>
        <div class= "row">
          <div class= "col text-right align-bottom">
                <h5 class="card-title ">Índice cintura-cadera:</h5>
            </div>
            <div class= "col text-left align-bottom">
                @if($tamizaje->indiceCinturaCadera == NULL)
                <p class="font-weight-light" >No registrado / No aplica</p>
                @else
                <p class="font-weight-light" >{{ $tamizaje->indiceCinturaCadera }}</p>
                @endif
            </div>
        </div>
        <div class= "row">
          <div class= "col text-right align-bottom">
                <h5 class="card-title ">Peso:</h5>
            </div>
            <div class= "col text-left align-bottom">
                @if($tamizaje->peso == NULL)
                <p class="font-weight-light" >No registrado / No aplica</p>
                @else
                <p class="font-weight-light" >{{ $tamizaje->peso }} kg</p>
                @endif
            </div>
        </div>
        <div class= "row">
          <div class= "col text-right align-bottom">
                <h5 class="card-title ">Talla:</h5>
            </div>
            <div class= "col text-left align-bottom">
                @if($tamizaje->talla == NULL)
                <p class="font-weight-light" >No registrado / No aplica</p>
                @else
                <p class="font-weight-light" >{{ $tamizaje->talla }}</p>
                @endif
            </div>
        </div>
        <div class= "row">
          <div class= "col text-right align-bottom">
                <h5 class="card-title ">Comentarios:</h5>
            </div>
            <div class= "col text-left align-bottom">
                @if($tamizaje->comentario == NULL)
                <p class="font-weight-light" >No registrado / No aplica</p>
                @else
                <p class="font-weight-light" >{{ $tamizaje->comentario }}</p>
                @endif
            </div>
        </div>
        

        
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