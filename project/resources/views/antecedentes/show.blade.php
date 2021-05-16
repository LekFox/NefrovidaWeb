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

  
  <h1 id="AntecedentesTitulo" class="text-center">Antecedentes de {{$antecedentes->beneficiario->nombreBeneficiario}}</h1>
  <div class="row">
    <div class="col">
      <a href="{{ url('/beneficiario/'.$antecedentes->beneficiario->id) }}" class="btn btn-primary"> Regresar </a>
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
                <h2 class="card-title ">Vivienda</h2>
          </div>
          <div class="col text-right">
                <a href="{{url('/antecedentes/'.$antecedentes->id.'/edit')}}" class="btn btn-primary"> Editar </a>
                <form action="{{url('/antecedentes/'.$antecedentes->id)}}" class="d-inline" method="post">
                    @csrf
                    {{ @method_field('DELETE') }}
                    <input type="hidden" id="id_beneficiario" name="id_beneficiario" value="{{ $antecedentes->beneficiario->id }}">
                    <input type="submit" onclick="return confirm('¿Quieres borrar los antecedentes? Esta acción no puede deshacerse.')"  class="btn btn-danger" value="Eliminar">
                </form>
          </div>
        </div>
        <div class= "row">
          <div class= "col text-right align-bottom">
                <h5 class="card-title ">Casa:</h5>
            </div>
            <div class= "col text-left align-bottom">
                <p class="font-weight-light" >{{ $antecedentes->casa }}</p>
            </div>
        </div>
        <div class= "row">
          <div class= "col text-right align-bottom">
                <h5 class="card-title ">Servicios básicos:</h5>
            </div>
            <div class= "col text-left align-bottom">
                @if($antecedentes->serviciosBasicos == 0)
                <p class="font-weight-light" >No</p>
                @else
                <p class="font-weight-light" >Sí</p>
                @endif
            </div>
        </div>
        <br>
        <div class= "row">
          <div class= "col text-center align-bottom">
                <h2 class="card-title ">Antecedentes Personales</h2>
          </div>
        </div>
        <div class= "row">
          <div class= "col text-right align-bottom">
                <h5 class="card-title ">Patológicos:</h5>
            </div>
            <div class= "col text-left align-bottom">
                @if($antecedentes->personalesPatologicos == NULL)
                <p class="font-weight-light" >No registrado / No aplica</p>
                @else
                <p class="font-weight-light" >{{ $antecedentes->personalesPatologicos }}</p>
                @endif
            </div>
        </div>
        <div class= "row">
          <div class= "col text-right align-bottom">
                <h5 class="card-title ">No patológicos:</h5>
            </div>
            <div class= "col text-left align-bottom">
                @if($antecedentes->personalesNoPatologicos == NULL)
                <p class="font-weight-light" >No registrado / No aplica</p>
                @else
                <p class="font-weight-light" >{{ $antecedentes->personalesNoPatologicos }}</p>
                @endif
            </div>
        </div>
        <br>
        <div class= "row">
          <div class= "col text-center align-bottom">
                <h2 class="card-title ">Antecedentes Familiares</h2>
          </div>
        </div>
        <div class= "row">
          <div class= "col text-right align-bottom">
                <h5 class="card-title ">Padre vivo:</h5>
            </div>
            <div class= "col text-left align-bottom">
                @if($antecedentes->padreVivo == 0)
                <p class="font-weight-light" >No</p>
                @else
                <p class="font-weight-light" >Sí</p>
                @endif
            </div>
        </div>
        <div class= "row">
          <div class= "col text-right align-bottom">
                <h5 class="card-title ">Enfermedades del padre:</h5>
            </div>
            <div class= "col text-left align-bottom">
                @if($antecedentes->enfermedadesPadre == NULL)
                <p class="font-weight-light" >No registrado / No aplica</p>
                @else
                <p class="font-weight-light" >{{ $antecedentes->enfermedadesPadre }}</p>
                @endif
            </div>
        </div>
        <div class= "row">
          <div class= "col text-right align-bottom">
                <h5 class="card-title ">Madre viva:</h5>
            </div>
            <div class= "col text-left align-bottom">
                @if($antecedentes->madreVivo == 0)
                <p class="font-weight-light" >No</p>
                @else
                <p class="font-weight-light" >Sí</p>
                @endif
            </div>
        </div>
        <div class= "row">
          <div class= "col text-right align-bottom">
                <h5 class="card-title ">Enfermedades de la madre:</h5>
            </div>
            <div class= "col text-left align-bottom">
                @if($antecedentes->enfermedadesMadre == NULL)
                <p class="font-weight-light" >No registrado / No aplica</p>
                @else
                <p class="font-weight-light" >{{ $antecedentes->enfermedadesMadre }}</p>
                @endif
            </div>
        </div>
        <div class= "row">
          <div class= "col text-right align-bottom">
                <h5 class="card-title ">Número de hermanos:</h5>
            </div>
            <div class= "col text-left align-bottom">
                @if($antecedentes->numHermanos == NULL)
                <p class="font-weight-light" >No registrado / No aplica</p>
                @else
                <p class="font-weight-light" >{{ $antecedentes->numHermanos }}</p>
                @endif
            </div>
        </div>
        <div class= "row">
          <div class= "col text-right align-bottom">
                <h5 class="card-title ">Número de hermanos vivos:</h5>
            </div>
            <div class= "col text-left align-bottom">
                @if($antecedentes->numHermanosVivos == NULL)
                <p class="font-weight-light" >No registrado / No aplica</p>
                @else
                <p class="font-weight-light" >{{ $antecedentes->numHermanosVivos }}</p>
                @endif
            </div>
        </div>
        <div class= "row">
          <div class= "col text-right align-bottom">
                <h5 class="card-title ">Enfermedades de los hermanos:</h5>
            </div>
            <div class= "col text-left align-bottom">
                @if($antecedentes->enfermedadesHermanos == NULL)
                <p class="font-weight-light" >No registrado / No aplica</p>
                @else
                <p class="font-weight-light" >{{ $antecedentes->enfermedadesHermanos }}</p>
                @endif
            </div>
        </div>
        <div class= "row">
          <div class= "col text-right align-bottom">
                <h5 class="card-title ">Otros datos de los hermanos:</h5>
            </div>
            <div class= "col text-left align-bottom">
                @if($antecedentes->otrosHermanos == NULL)
                <p class="font-weight-light" >No registrado / No aplica</p>
                @else
                <p class="font-weight-light" >{{ $antecedentes->otrosHermanos }}</p>
                @endif
            </div>
        </div>
        <br>
        <div class= "row">
          <div class= "col text-center align-bottom">
                <h2 class="card-title ">Antecedentes Gineco-obstétricos</h2>
          </div>
        </div>
        <div class= "row">
          <div class= "col text-right align-bottom">
                <h5 class="card-title ">Menarquia:</h5>
            </div>
            <div class= "col text-left align-bottom">
                @if($antecedentes->menarquia == NULL)
                <p class="font-weight-light" >No registrado / No aplica</p>
                @else
                <p class="font-weight-light" >{{ $antecedentes->menarquia }}</p>
                @endif
            </div>
        </div>
        <div class= "row">
          <div class= "col text-right align-bottom">
                <h5 class="card-title ">Ritmo:</h5>
            </div>
            <div class= "col text-left align-bottom">
                @if($antecedentes->ritmo == NULL)
                <p class="font-weight-light" >No registrado / No aplica</p>
                @else
                <p class="font-weight-light" >{{ $antecedentes->ritmo }}</p>
                @endif
            </div>
        </div>
        <div class= "row">
          <div class= "col text-right align-bottom">
                <h5 class="card-title ">F.U.M.:</h5>
            </div>
            <div class= "col text-left align-bottom">
                @if($antecedentes->fum == NULL)
                <p class="font-weight-light" >No registrado / No aplica</p>
                @else
                <p class="font-weight-light" >{{ $antecedentes->fum }}</p>
                @endif
            </div>
        </div>
        <div class= "row">
          <div class= "col text-right align-bottom">
                <h5 class="card-title ">Gestaciones:</h5>
            </div>
            <div class= "col text-left align-bottom">
                @if($antecedentes->gestaciones == NULL)
                <p class="font-weight-light" >No registrado / No aplica</p>
                @else
                <p class="font-weight-light" >{{ $antecedentes->gestaciones }}</p>
                @endif
            </div>
        </div>
        <div class= "row">
          <div class= "col text-right align-bottom">
                <h5 class="card-title ">Partos:</h5>
            </div>
            <div class= "col text-left align-bottom">
                @if($antecedentes->partos == NULL)
                <p class="font-weight-light" >No registrado / No aplica</p>
                @else
                <p class="font-weight-light" >{{ $antecedentes->partos }}</p>
                @endif
            </div>
        </div>
        <div class= "row">
          <div class= "col text-right align-bottom">
                <h5 class="card-title ">Abortos:</h5>
            </div>
            <div class= "col text-left align-bottom">
                @if($antecedentes->abortos == NULL)
                <p class="font-weight-light" >No registrado / No aplica</p>
                @else
                <p class="font-weight-light" >{{ $antecedentes->abortos }}</p>
                @endif
            </div>
        </div>
        <div class= "row">
          <div class= "col text-right align-bottom">
                <h5 class="card-title ">Cesáreas:</h5>
            </div>
            <div class= "col text-left align-bottom">
                @if($antecedentes->cesareas == NULL)
                <p class="font-weight-light" >No registrado / No aplica</p>
                @else
                <p class="font-weight-light" >{{ $antecedentes->cesareas }}</p>
                @endif
            </div>
        </div>
        <div class= "row">
          <div class= "col text-right align-bottom">
                <h5 class="card-title ">I.V.S.A.:</h5>
            </div>
            <div class= "col text-left align-bottom">
                @if($antecedentes->ivsa == NULL)
                <p class="font-weight-light" >No registrado / No aplica</p>
                @else
                <p class="font-weight-light" >{{ $antecedentes->ivsa }}</p>
                @endif
            </div>
        </div>
        <div class= "row">
          <div class= "col text-right align-bottom">
                <h5 class="card-title ">Métodos anticonceptivos:</h5>
            </div>
            <div class= "col text-left align-bottom">
                @if($antecedentes->metodosAnticonceptivos == NULL)
                <p class="font-weight-light" >No registrado / No aplica</p>
                @else
                <p class="font-weight-light" >{{ $antecedentes->metodosAnticonceptivos }}</p>
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