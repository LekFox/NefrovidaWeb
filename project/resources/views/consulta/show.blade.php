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

  
  <h1 id="consultaTitulo" class="text-center bluenefro"><i class="bi bi-person-lines-fill"></i> Consulta de {{$consulta->beneficiario->nombreBeneficiario}}</h1>
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
          <div class="col"></div>
          <div class= "col text-center align-bottom">
                <h2 class="card-title ">Consulta</h2>
          </div>
          <div class="col text-right">
                <a href="{{url('/consulta/'.$consulta->id.'/edit')}}" class="btn btn-outline-secondary"><i class="bi bi-pencil-fill"></i> Editar </a>
                <form action="{{url('/consulta/'.$consulta->id)}}" class="d-inline" method="post">
                    @csrf
                    {{ @method_field('DELETE') }}
                    <input type="hidden" id="id_beneficiario" name="id_beneficiario" value="{{ $consulta->beneficiario->id }}">
                    <button type="submit" onclick="return confirm('¿Quiere Borrar la Consulta?')"  class="btn btn-outline-danger"><i class="bi bi-trash-fill"></i> Borrar</button>
                </form>
          </div>
        </div>
        <div class="container">
            <table class="table table-sm table-responsive-sm">
                <thead>
                    <tr>
                        <th scope="col"><i class="bi bi-clipboard"></i>  Padecimiento</th>
                        <th scope="col"></th>
                      </tr>
                </thead>
                <tbody>
                  <tr>
                    <th>Padecimiento</th>
                    <td>{{ $consulta->padecimiento }}</td>
                  </tr>                
                </tbody>
              </table>
        </div>
       <br>
        <div class="container">
            <table class="table table-sm table-responsive-sm">
                <thead>
                    <tr>
                        <th scope="col"><i class="bi bi-clipboard"></i>  Exploración Física</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                      </tr>
                </thead>
                <tbody>
                  <tr>
                    <th>T.A. Brazo Derecho</th>
                    <td>{{ $consulta->brazoD }}</td>
                    <th>T.A. Brazo Izquierdo</th>
                    <td>{{ $consulta->brazoI }}</td>
                  </tr>
                  <tr>
                    <th>Frecuencia Cardíaca</th>
                    <td>{{ $consulta->fCardiaca }}</td>
                    <th>Frecuencia Respiratoria</th>
                    <td>{{ $consulta->fRespiratoria }}</td>
                  </tr>
                  <tr>
                    <th>Temperatura</th>
                    <td>{{ $consulta->temperatura }}</td>
                    <th>Peso</th>
                    <td>{{ $consulta->peso }}</td>
                  </tr>
                  <tr>
                    <th>Talla</th>
                    <td>{{ $consulta->talla }}</td>
                    <th>Cabeza y Cuello</th>
                    <td>{{ $consulta->cabeza }}</td>
                  </tr>
                  <tr>
                    <th>Torax</th>
                    <td>{{ $consulta->torax }}</td>
                    <th>Abdomen</th>
                    <td>{{ $consulta->abdomen }}</td>
                  </tr>
                  <tr>
                    <th>Extremidades</th>
                    <td>{{ $consulta->extremidades }}</td>                    
                  </tr>
                </tbody>
              </table>
        </div>
        <br>
        <div class="container">
            <table class="table table-sm table-responsive-sm">
                <thead>
                    <tr>
                        <th scope="col"><i class="bi bi-clipboard"></i>  Estado Neurológico y Mental</th>
                        <th scope="col"></th>
                      </tr>
                </thead>
                <tbody>
                  <tr>
                    <th>Estado Neurológico y Mental</th>
                    <td>{{ $consulta->mental }}</td>
                  </tr>                
                </tbody>
              </table>
        </div>
       <br>
       <div class="container">
            <table class="table table-sm table-responsive-sm">
                <thead>
                    <tr>
                        <th scope="col"><i class="bi bi-clipboard"></i>  Otros</th>
                        <th scope="col"></th>
                      </tr>
                </thead>
                <tbody>
                  <tr>
                    <th>Observaciones</th>
                    <td>{{ $consulta->observaciones }}</td>
                  </tr>                
                </tbody>
              </table>
        </div>
       <br>
       <div class="container">
            <table class="table table-sm table-responsive-sm">
                <thead>
                    <tr>
                        <th scope="col"><i class="bi bi-clipboard"></i>  Diagnóstico y Tratamiento</th>
                        <th scope="col"></th>
                      </tr>
                </thead>
                <tbody>
                  <tr>
                    <th>Diagnóstico</th>
                    <td>{{ $consulta->diagnostico }}</td>
                  </tr>
                  <tr>
                    <th>Tratamiento</th>
                    <td>{{ $consulta->tratamiento }}</td>
                  </tr>                
                </tbody>
              </table>
        </div>
       <br>
       
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