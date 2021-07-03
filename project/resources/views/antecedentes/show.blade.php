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

  
  <h1 id="AntecedentesTitulo" class="text-center bluenefro"><i class="bi bi-person-lines-fill"></i> Historia Clínica de {{$antecedentes->beneficiario->nombreBeneficiario}}</h1>
  <div class="row">
    <div class="col">
      <a href="{{ url('/beneficiario/'.$antecedentes->beneficiario->id) }}" class="btn btn-primary"><i class="bi bi-arrow-left"></i> Regresar </a>
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
                <h2 class="card-title "><i class="bi bi-clipboard"></i> Historia Clínica</h2>
          </div>
          <div class="col text-right">
                <a href="{{url('/antecedentes/'.$antecedentes->id.'/edit')}}" class="btn btn-outline-secondary"><i class="bi bi-pencil-fill"></i> Editar </a>
                <form action="{{url('/antecedentes/'.$antecedentes->id)}}" class="d-inline" method="post">
                    @csrf
                    {{ @method_field('DELETE') }}
                    <input type="hidden" id="id_beneficiario" name="id_beneficiario" value="{{ $antecedentes->beneficiario->id }}">
                    <button type="submit" onclick="return confirm('¿Quieres borrar los antecedentes? Esta acción no puede deshacerse.')"  class="btn btn-outline-danger"><i class="bi bi-trash-fill"></i> Borrar</button>
                </form>
          </div>
        </div>
        
        <div class="container">
            <table class="table table-sm table-responsive-sm">
                <thead>
                    <tr>
                        <th scope="col"><i class="bi bi-house-fill"></i>  Vivienda</th>
                        <th scope="col"></th>
                      </tr>
                </thead>
                <tbody>
                  <tr>
                    <th>Casa</th>
                    <td>{{ $antecedentes->casa }}</td>
                  </tr>
                  <tr>
                    <th>Servicios básicos</th>
                    <td> 
                        @if($antecedentes->serviciosBasicos == 0)
                        <p class="font-weight-light" >No</p>
                        @else
                        <p class="font-weight-light" >Sí</p>
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
                    <th scope="col"><i class="bi bi-person-square"></i> Antecedentes Personales</th>
                    <th scope="col"></th>
                  </tr>
            </thead>
            <tbody>
              <tr>
                <th>Patológicos</th>
                <td>
                    @if($antecedentes->personalesPatologicos == NULL)
                    <p class="font-weight-light" >No registrado / No aplica</p>
                    @else
                    <p class="font-weight-light" >{{ $antecedentes->personalesPatologicos }}</p>
                    @endif
                </td>
              </tr>
              <tr>
                <th>No patológicos</th>
                <td> 
                    @if($antecedentes->personalesNoPatologicos == NULL)
                    <p class="font-weight-light" >No registrado / No aplica</p>
                    @else
                    <p class="font-weight-light" >{{ $antecedentes->personalesNoPatologicos }}</p>
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
                <th scope="col"><i class="bi bi-people-fill"></i> Antecedentes Familiares</th>
                <th scope="col"></th>
              </tr>
        </thead>
        <tbody>
          <tr>
            <th>Padre vivo</th>
            <td>
                @if($antecedentes->padreVivo == 0)
                <p class="font-weight-light" >No</p>
                @else
                <p class="font-weight-light" >Sí</p>
                @endif
            </td>
          </tr>
          <tr>
            <th>Enfermedades del padre</th>
            <td> 
                @if($antecedentes->enfermedadesPadre == NULL)
                <p class="font-weight-light" >No registrado / No aplica</p>
                @else
                <p class="font-weight-light" >{{ $antecedentes->enfermedadesPadre }}</p>
                @endif
            </td>
          </tr>
          <tr>
            <th>Madre viva</th>
            <td> 
                @if($antecedentes->madreVivo == 0)
                <p class="font-weight-light" >No</p>
                @else
                <p class="font-weight-light" >Sí</p>
                @endif
            </td>
          </tr>
          <tr>
            <th>Enfermedades de la madre</th>
            <td> 
                @if($antecedentes->enfermedadesMadre == NULL)
                <p class="font-weight-light" >No registrado / No aplica</p>
                @else
                <p class="font-weight-light" >{{ $antecedentes->enfermedadesMadre }}</p>
                @endif
            </td>
          </tr>
          <tr>
            <th>Número de hermanos</th>
            <td> 
                @if($antecedentes->numHermanos == NULL)
                <p class="font-weight-light" >No registrado / No aplica</p>
                @else
                <p class="font-weight-light" >{{ $antecedentes->numHermanos }}</p>
                @endif
            </td>
          </tr>
          <tr>
            <th>Número de hermanos vivos</th>
            <td> 
                @if($antecedentes->numHermanosVivos == NULL)
                <p class="font-weight-light" >No registrado / No aplica</p>
                @else
                <p class="font-weight-light" >{{ $antecedentes->numHermanosVivos }}</p>
                @endif
            </td>
          </tr>
          <tr>
            <th>Enfermedades de los hermanos</th>
            <td> 
                @if($antecedentes->enfermedadesHermanos == NULL)
                <p class="font-weight-light" >No registrado / No aplica</p>
                @else
                <p class="font-weight-light" >{{ $antecedentes->enfermedadesHermanos }}</p>
                @endif
            </td>
          </tr>
          <tr>
            <th>Otros datos de los hermanos</th>
            <td> 
                @if($antecedentes->otrosHermanos == NULL)
                <p class="font-weight-light" >No registrado / No aplica</p>
                @else
                <p class="font-weight-light" >{{ $antecedentes->otrosHermanos }}</p>
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
                <th scope="col"><i class="bi bi-journal-medical"></i> Antecedentes Gineco-obstétricos</th>
                <th scope="col"></th>
              </tr>
        </thead>
        <tbody>
          <tr>
            <th>Menarquia</th>
            <td>
                @if($antecedentes->menarquia == NULL)
                <p class="font-weight-light" >No registrado / No aplica</p>
                @else
                <p class="font-weight-light" >{{ $antecedentes->menarquia }}</p>
                @endif
            </td>
          </tr>
          <tr>
            <th>Ritmo</th>
            <td> 
                @if($antecedentes->ritmo == NULL)
                <p class="font-weight-light" >No registrado / No aplica</p>
                @else
                <p class="font-weight-light" >{{ $antecedentes->ritmo }}</p>
                @endif
            </td>
          </tr>
          <tr>
            <th>F.U.M</th>
            <td> 
                @if($antecedentes->fum == NULL)
                <p class="font-weight-light" >No registrado / No aplica</p>
                @else
                <p class="font-weight-light" >{{ $antecedentes->fum }}</p>
                @endif
            </td>
          </tr>
          <tr>
            <th>Gestaciones</th>
            <td> 
                @if($antecedentes->gestaciones == NULL)
                <p class="font-weight-light" >No registrado / No aplica</p>
                @else
                <p class="font-weight-light" >{{ $antecedentes->gestaciones }}</p>
                @endif
            </td>
          </tr>
          <tr>
            <th>Partos</th>
            <td> 
                @if($antecedentes->partos == NULL)
                <p class="font-weight-light" >No registrado / No aplica</p>
                @else
                <p class="font-weight-light" >{{ $antecedentes->partos }}</p>
                @endif
            </td>
          </tr>
          <tr>
            <th>Abortos</th>
            <td> 
                @if($antecedentes->abortos == NULL)
                <p class="font-weight-light" >No registrado / No aplica</p>
                @else
                <p class="font-weight-light" >{{ $antecedentes->abortos }}</p>
                @endif
            </td>
          </tr>
          <tr>
            <th>Cesáreas</th>
            <td> 
                @if($antecedentes->cesareas == NULL)
                <p class="font-weight-light" >No registrado / No aplica</p>
                @else
                <p class="font-weight-light" >{{ $antecedentes->cesareas }}</p>
                @endif
            </td>
          </tr>
          <tr>
            <th>I.V.S.A</th>
            <td> 
                @if($antecedentes->ivsa == NULL)
                <p class="font-weight-light" >No registrado / No aplica</p>
                @else
                <p class="font-weight-light" >{{ $antecedentes->ivsa }}</p>
                @endif
            </td>
          </tr>
          <tr>
            <th>Métodos anticonceptivos</th>
            <td> 
                @if($antecedentes->metodosAnticonceptivos == NULL)
                <p class="font-weight-light" >No registrado / No aplica</p>
                @else
                <p class="font-weight-light" >{{ $antecedentes->metodosAnticonceptivos }}</p>
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