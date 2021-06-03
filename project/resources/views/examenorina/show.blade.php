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

  
  <h1 id="AntecedentesTitulo" class="text-center bluenefro"><i class="bi bi-eyedropper"></i> Examen General de Orina de {{$examenorina->beneficiario->nombreBeneficiario}}</h1>
  <div class="row">
    <div class="col">
      <a href="{{ url('/beneficiario/'.$examenorina->beneficiario->id) }}" class="btn btn-primary"><i class="bi bi-arrow-left"></i> Regresar </a>
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
                <h2 class="card-title "><i class="bi bi-clipboard"></i> E.G.O.</h2>
          </div>
          <div class="col text-right">
          @cannot('nutriologo', App\Models\User::class)
                <a href="{{url('/examenorina/'.$examenorina->id.'/edit')}}" class="btn btn-outline-secondary"><i class="bi bi-pencil-fill"></i> Editar </a>
                <form action="{{url('/examenorina/'.$examenorina->id)}}" class="d-inline" method="post">
                    @csrf
                    {{ @method_field('DELETE') }}
                    <input type="hidden" id="id_beneficiario" name="id_beneficiario" value="{{ $examenorina->beneficiario->id }}">
                    <button type="submit" onclick="return confirm('¿Quieres borrar el E.G.O.? Esta acción no puede deshacerse.')"  class="btn btn-outline-danger"><i class="bi bi-trash-fill"></i> Borrar</button>
                </form>
          @endcannot
          </div>
        </div>
        
        <div class="container">
            <table class="table table-sm table-responsive-sm">
                <thead>
                    <tr>
                        <th scope="col"><i class="bi bi-clipboard"></i>  Examen Macroscópico</th>
                        <th scope="col"></th>
                      </tr>
                </thead>
                <tbody>
                  <tr>
                    <th>Color</th>
                    <td> 
                        @if($examenorina->color == NULL)
                        <p class="font-weight-light" >No registrado</p>
                        @else
                        <p class="font-weight-light" >{{ $examenorina->color }}</p>
                        @endif
                    </td>
                  </tr>
                  <tr>
                    <th>Aspecto</th>
                    <td> 
                        @if($examenorina->aspecto == NULL)
                        <p class="font-weight-light" >No registrado</p>
                        @else
                        <p class="font-weight-light" >{{ $examenorina->aspecto }}</p>
                        @endif
                    </td>
                  </tr>
                </tbody>
              </table>
        </div>
       <br>


   <div class="container">
    <table class="table table-sm table-responsive-sm">
        <thead>
            <tr>
                <th scope="col"><i class="bi bi-clipboard"></i> Examen Químico</th>
                <th scope="col"></th>
              </tr>
        </thead>
        <tbody>
          <tr>
            <th>PH</th>
            <td> 
                @if($examenorina->ph == NULL)
                <p class="font-weight-light" >No registrado</p>
                @else
                <p class="font-weight-light" >{{ $examenorina->ph }}</p>
                @endif
            </td>
          </tr>
          <tr>
            <th>Densidad</th>
            <td> 
                @if($examenorina->densidad == NULL)
                <p class="font-weight-light" >No registrado</p>
                @else
                <p class="font-weight-light" >{{ $examenorina->densidad }}</p>
                @endif
            </td>
          </tr>
          <tr>
            <th>Nitritos</th>
            <td> 
                @if($examenorina->nitritos == NULL)
                <p class="font-weight-light" >Negativo</p>
                @else
                <p class="font-weight-light" >{{ $examenorina->nitritos }}</p>
                @endif
            </td>
          </tr>
          <tr>
            <th>Glucosa</th>
            <td> 
                @if($examenorina->glucosa == NULL)
                <p class="font-weight-light" >Negativo</p>
                @else
                <p class="font-weight-light" >{{ $examenorina->glucosa }}</p>
                @endif
            </td>
          </tr>
          <tr>
            <th>Proteínas</th>
            <td> 
                @if($examenorina->proteinas == NULL)
                <p class="font-weight-light" >Negativo</p>
                @else
                <p class="font-weight-light" >{{ $examenorina->proteinas }}</p>
                @endif
            </td>
          </tr>
          <tr>
            <th>Hemoglobina</th>
            <td> 
                @if($examenorina->hemoglobina == NULL)
                <p class="font-weight-light" >Negativo</p>
                @else
                <p class="font-weight-light" >{{ $examenorina->hemoglobina }}</p>
                @endif
            </td>
          </tr>
          <tr>
            <th>Cuerpos Cetónicos</th>
            <td> 
                @if($examenorina->cuerposCetonicos == NULL)
                <p class="font-weight-light" >Negativo</p>
                @else
                <p class="font-weight-light" >{{ $examenorina->cuerposCetonicos }}</p>
                @endif
            </td>
          </tr>
          <tr>
            <th>Bilirrubina</th>
            <td> 
                @if($examenorina->bilirribuna == NULL)
                <p class="font-weight-light" >Negativo</p>
                @else
                <p class="font-weight-light" >{{ $examenorina->bilirribuna }}</p>
                @endif
            </td>
          </tr>
          <tr>
            <th>Urobilinógeno</th>
            <td> 
                @if($examenorina->urobilinogeno == NULL)
                <p class="font-weight-light" >No registrado</p>
                @else
                <p class="font-weight-light" >{{ $examenorina->urobilinogeno }}</p>
                @endif
            </td>
          </tr>
          <tr>
            <th>Leucocitos</th>
            <td> 
                @if($examenorina->leucocitos == NULL)
                <p class="font-weight-light" >Negativo</p>
                @else
                <p class="font-weight-light" >{{ $examenorina->leucocitos }}</p>
                @endif
            </td>
          </tr>
        </tbody>
      </table>
</div>
<br>

<div class="container">
    <table class="table table-sm table-responsive-sm">
        <thead>
            <tr>
                <th scope="col"><i class="bi bi-clipboard"></i> Observaciones Microscópicas</th>
                <th scope="col"></th>
              </tr>
        </thead>
        <tbody>
          <tr>
            <th>Eritrocitos Intactos</th>
            <td>
                @if($examenorina->eritrocitosIntactos == NULL)
                <p class="font-weight-light" >No se observan</p>
                @else
                <p class="font-weight-light" >{{ $examenorina->eritrocitosIntactos }}</p>
                @endif
            </td>
          </tr>
          <tr>
            <th>Eritrocitos Crenados</th>
            <td> 
                @if($examenorina->eritrocitosCrenados == NULL)
                <p class="font-weight-light" >No se observan</p>
                @else
                <p class="font-weight-light" >{{ $examenorina->eritrocitosCrenados }}</p>
                @endif
            </td>
          </tr>
          <tr>
            <th>Leucocitos</th>
            <td> 
                @if($examenorina->observacionLeucocitos == NULL)
                <p class="font-weight-light" >No se observan</p>
                @else
                <p class="font-weight-light" >{{ $examenorina->observacionLeucocitos }}</p>
                @endif
            </td>
          </tr>
          <tr>
            <th>Cristales</th>
            <td> 
                @if($examenorina->cristales == NULL)
                <p class="font-weight-light" >No se observan</p>
                @else
                <p class="font-weight-light" >{{ $examenorina->cristales }}</p>
                @endif
            </td>
          </tr>
          <tr>
            <th>Cilindros</th>
            <td> 
                @if($examenorina->cilindros == NULL)
                <p class="font-weight-light" >No se observan</p>
                @else
                <p class="font-weight-light" >{{ $examenorina->cilindros }}</p>
                @endif
            </td>
          </tr>
          <tr>
            <th>Células Epiteliales</th>
            <td> 
                @if($examenorina->celulasEpiteliales == NULL)
                <p class="font-weight-light" >No se observan</p>
                @else
                <p class="font-weight-light" >{{ $examenorina->celulasEpiteliales }}</p>
                @endif
            </td>
          </tr>
          <tr>
            <th>Bacterias</th>
            <td> 
                @if($examenorina->bacterias == NULL)
                <p class="font-weight-light" >No se observan</p>
                @else
                <p class="font-weight-light" >{{ $examenorina->bacterias }}</p>
                @endif
            </td>
          </tr>
          <tr>
            <th>Observaciones</th>
            <td> 
                @if($examenorina->observaciones == NULL)
                <p class="font-weight-light" >Ninguna</p>
                @else
                <p class="font-weight-light" >{{ $examenorina->observaciones }}</p>
                @endif
            </td>
          </tr>
          <tr>
            <th>Fecha de examen</th>
            <td> 
                @if($examenorina->fecharegistro == NULL)
                <p class="font-weight-light" >No registrada</p>
                @else
                <p class="font-weight-light" >{{ $examenorina->fecharegistro }}</p>
                @endif
            </td>
          </tr>
          <tr>
            <th>Nota</th>
            <td> 
                @if($examenorina->nota == NULL)
                <p class="font-weight-light" >Ninguna</p>
                @else
                <p class="font-weight-light" >{{ $examenorina->nota }}</p>
                @endif
            </td>
          </tr>
        </tbody>
      </table>
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