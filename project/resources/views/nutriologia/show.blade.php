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
                <h2 class="card-title ">Nutrición</h2>
          </div>
          <div class="col text-right">
                <a href="{{url('/nutricion/'.$consulta->id.'/edit')}}" class="btn btn-outline-secondary"><i class="bi bi-pencil-fill"></i> Editar </a>
                <form action="{{url('/nutricion/'.$consulta->id)}}" class="d-inline" method="post">
                    @csrf
                    {{ @method_field('DELETE') }}
                    <input type="hidden" id="id_beneficiario" name="id_beneficiario" value="{{ $consulta->beneficiario->id }}">
                    <button type="submit" onclick="return confirm('¿Quieres borrar los consulta? Esta acción no puede deshacerse.')"  class="btn btn-outline-danger"><i class="bi bi-trash-fill"></i> Borrar</button>
                </form>
          </div>
        </div>
        <div class="container">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th scope="col"><i class="bi bi-clipboard"></i>  Datos Nutrimentales</th>
                        <th scope="col"></th>
                      </tr>
                </thead>
                <tbody>
                  <tr>
                    <th>Ocupación</th>
                    <td>{{ $consulta->ocupacion }}</td>
                  </tr>
                  <tr>
                    <th>Horarios de comida</th>
                    <td>{{ $consulta->horarioscomida }}</td>
                  </tr>
                  <tr>
                    <th>Cantidad destinada a alimentos</th>
                    <td>{{ $consulta->cantidadalimentos }}</td>
                  </tr>
                </tbody>
              </table>
        </div>
       <br>
        <div class="container">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th scope="col"><i class="bi bi-clipboard"></i>  Datos Clínicos</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                      </tr>
                </thead>
                <tbody>
                  <tr>
                    <th>Apetito</th>
                    <td>{{ $consulta->apetito }}</td>
                    <th>Edema</th>
                    <td>{{ $consulta->edema }}</td>
                  </tr>
                  <tr>
                    <th>Distensión</th>
                    <td>{{ $consulta->distension }}</td>
                    <th>Mareo</th>
                    <td>{{ $consulta->mareo }}</td>
                  </tr>
                  <tr>
                    <th>Estreñimiento</th>
                    <td>{{ $consulta->estrenimiento }}</td>
                    <th>Zumbido en oídos</th>
                    <td>{{ $consulta->zumbido }}</td>
                  </tr>
                  <tr>
                    <th>Flatulencias</th>
                    <td>{{ $consulta->flatulencias }}</td>
                    <th>Cefaleas</th>
                    <td>{{ $consulta->cefaleas }}</td>
                  </tr>
                  <tr>
                    <th>Vómitos</th>
                    <td>{{ $consulta->vomitos }}</td>
                    <th>Disnea</th>
                    <td>{{ $consulta->disnea }}</td>
                  </tr>
                  <tr>
                    <th>Caries</th>
                    <td>{{ $consulta->caries }}</td>
                    <th>Poliuria</th>
                    <td>{{ $consulta->poliuria }}</td>
                  </tr>
                </tbody>
              </table>
        </div>
        <br>

        <div class="container">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th scope="col"><i class="bi bi-clipboard"></i>  Estilo de Vida</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                  <tr>
                    <th>Actividad física/tipo/frecuencia</th>
                    <td>{{ $consulta->actividadfisica }}</td>
                  </tr>
                  <tr>
                    <th>Horas de sueño</th>
                    <td>{{ $consulta->suenohoras }}</td>
                  </tr>
                </tbody>
              </table>
        </div>
       <br>

       <div class="container">
        <table class="table table-sm">
            <thead>
                <tr>
                    <th scope="col"><i class="bi bi-clipboard"></i>  Datos Dietéticos</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
              <tr>
                <th>N• comidas al día</th>
                <td>{{ $consulta->comidasdia }}</td>
              </tr>
              <tr>
                <th>¿Dónde realiza sus comidas?</th>
                <td>{{ $consulta->lugarcomida }}</td>
              </tr>
              <tr>
                <th>¿Quién prepara?</th>
                <td>{{ $consulta->preparacomida }}</td>
              </tr>
              <tr>
                <th>¿Come entre comidas?</th>
                <td>{{ $consulta->entrecomidas }}</td>
              </tr>
              <tr>
                <th>Alimentos Preferidos</th>
                <td>{{ $consulta->alimentospreferidos }}</td>
              </tr>
              <tr>
                <th>Alimentos que no le gustan</th>
                <td>{{ $consulta->alimentosodiados }}</td>
              </tr>
              <tr>
                <th>Consumo de suplementos o complementos alimentarios</th>
                <td>{{ $consulta->suplementos }}</td>
              </tr>
              <tr>
                <th>Medicamentos consumidos actualmente</th>
                <td>{{ $consulta->medicamentos }}</td>
              </tr>
              <tr>
                <th>Consumo de agua natural</th>
                <td>{{ $consulta->consumoagua }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      <br>

      <div class="container">
        <table class="table table-sm">
            <thead>
                <tr>
                    <th scope="col"><i class="bi bi-clipboard"></i>  Recordatorio de 24 Horas</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
              <tr>
                <th>Desayuno</th>
                <td>{{ $consulta->recordatoriodesayuno }}</td>
              </tr>
              <tr>
                <th>Colación en la mañana</th>
                <td>{{ $consulta->recordatoriocolacionm }}</td>
              </tr>
              <tr>
                <th>Comida</th>
                <td>{{ $consulta->recordatoriocomida }}</td>
              </tr>
              <tr>
                <th>Colación en la tarde</th>
                <td>{{ $consulta->recordatoriocolaciont }}</td>
              </tr>
              <tr>
                <th>Cena</th>
                <td>{{ $consulta->recordatoriocena }}</td>
              </tr>
            </tbody>
          </table>
    </div>
   <br>

   <div class= "col text-center align-bottom">
    <h2 class="card-title ">Evaluación Nutricia</h2>
    </div>

    <div class="container">
        <table class="table table-sm">
            <thead>
                <tr>
                    <th scope="col"><i class="bi bi-clipboard"></i>  Datos Antropométricos</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
              <tr>
                <th>Edad</th>
                <td>{{$consulta->beneficiario->age}}</td>
              </tr>
              <tr>
                <th>Peso (kg)</th>
                <td>{{ $consulta->peso }}</td>
              </tr>
              <tr>
                <th>Estatura (cm)</th>
                <td>{{ $consulta->estatura }}</td>
              </tr>
            </tbody>
          </table>
    </div>
   <br>


   <div class="container">
    <table class="table table-sm">
        <thead>
            <tr>
                <th scope="col"><i class="bi bi-clipboard"></i>  Necesidades Energéticas y Nutrimentales</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
          <tr>
            <th>Tipo de dieta</th>
            <td>{{ $consulta->tipodieta }}</td>
          </tr>
          <tr>
            <th>Kilocalorías totales</th>
            <td>{{ $consulta->kilocaloriastotal }}</td>
          </tr>
        </tbody>
      </table>
</div>
<br>
<div class="row">
    

<div class="col-3">
<div class="container">
    <table class="table table-sm">
        <thead>
            <tr>
                <th scope="col">Nutrimento</th>
                <th scope="col">Porcentaje</th>
            </tr>
        </thead>
        <tbody>
          <tr>
            <th>HC</th>
            <td>{{ $consulta->porcentajehidratos }}</td>
          </tr>
          <tr>
            <th>LS</th>
            <td>{{ $consulta->porcentajeproteinas }}</td>
          </tr>
          <tr>
            <th>PS</th>
            <td>{{ $consulta->porcentajegrasas }}</td>
          </tr>
        </tbody>
      </table> 
</div>
</div>

<div class="col-9">
    <div class="container">
        <table class="table table-sm">
            <thead>

            </thead>
            <tbody>
              <tr>
                <th>IMC</th>
                <td>{{ $consulta->imc }}</td>
              </tr>
              <tr>
                <th>DX</th>
                <td>{{ $consulta->diagnostico }}</td>
              </tr>
              <tr>
                <th>Nota</th>
                <td>{{ $consulta->nota }}</td>
              </tr>
            </tbody>
          </table> 
    </div>
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