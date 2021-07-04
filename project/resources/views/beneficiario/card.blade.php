
<h1 id="JornadaTitulo" class="bluenefro"><i class="bi bi-person-bounding-box"></i> {{$modo}} Beneficiario</h1>

@if (count($errors)>0)
    
    <div class="alert alert-danger" role="alert">
        <ul>
        @foreach($errors->all() as $error)
           <li> {{$error}} </li>
        @endforeach 
        </ul>
    </div>
    
@endif
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css"/>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>


<a href="{{ url('beneficiario') }}" class="btn btn-primary"><i class="bi bi-arrow-left"></i> Regresar</a>
<br><br>
<div class="card">
  <div class="card-body">
      <div class= "row">
          <div class= "col-sm">
                <h2 class="card-title bluenefro">{{ $beneficiario->nombreBeneficiario }}</h2>
                <br>
                <h4 class="font-weight-light">Fecha de Nacimiento: {{ $beneficiario->fechaNacimiento }}</h4>
                <h4 class="font-weight-light">Sexo: {{ $beneficiario->sexo }}</h4>
                <h4 class="font-weight-light">Teléfono: {{ $beneficiario->telefono }}</h4>
                <h4 class="font-weight-light">Dirección: {{ $beneficiario->direccion }}</h4>
                <h4 class="font-weight-light">Escolaridad: {{ $beneficiario->escolaridade->nombreEscolaridad }}</h4>
                <h4 class="font-weight-light">Estatus: {{ $beneficiario->estatus }}</h4>
                @if($beneficiario->seguimiento === 1)
                    <h4 class="font-weight-light">Seguimiento: Si</h4>
                @else
                    <h4 class="font-weight-light" >Seguimiento: No</h4>
                @endif
                @if($beneficiario->jornadas->isEmpty())
                <h4 class="font-weight-light">Jornada: No asignado</h4>
                @else
                <h4 class="font-weight-light">Jornada: <a href = "{{ url('jornada/'.$beneficiario->jornadas[0]->pivot->jornada_id) }}">{{ $beneficiario->getJornadaName() }}</a></h4>
                @endif
            </div>
            <div class="col-sm">
                <div class= "pt-xl-5">
                    
                </div>
                <div class= "pt-xl-5">
                    @can('social',App\Models\User::class)
                    <a href="{{url('/beneficiario/'.$beneficiario->id.'/edit')}}">
                    <button type="button" class="btn btn-primary">
                        Editar beneficiario
                    </button>
                    </a>
                    @endcan
                    @can('admin',App\Models\User::class)
                    <a href="{{url('/beneficiario/'.$beneficiario->id.'/edit')}}">
                    <button type="button" class="btn btn-primary">
                        Editar beneficiario
                    </button>
                    </a>
                    @endcan
                    @can('procuracion',App\Models\User::class)
                    <a href="{{url('/beneficiario/'.$beneficiario->id.'/edit')}}">
                    <button type="button" class="btn btn-primary">
                        Editar beneficiario
                    </button>
                    </a>
                    @endcan
                </div>
                <div class= "pt-xl-2">
                    
                </div>
                <div class= "pt-xl-5">
                @can('social',App\Models\User::class)
                    <form action="{{url('/beneficiario/'.$beneficiario->id)}}" class="d-inline" method="post">
                    @method('DELETE')
                    @csrf
                    <input type="submit" onclick="return confirm('¿Quieres borrar la beneficiario?')"  class="btn btn-danger" value="Borrar">
                </form>
                @endcan

                @can('admin',App\Models\User::class)
                    <form action="{{url('/beneficiario/'.$beneficiario->id)}}" class="d-inline" method="post">
                    @method('DELETE')
                    @csrf
                    <input type="submit" onclick="return confirm('¿Quieres borrar la beneficiario?')"  class="btn btn-danger" value="Borrar">
                </form>
                @endcan

                @can('procuracion',App\Models\User::class)
                    <form action="{{url('/beneficiario/'.$beneficiario->id)}}" class="d-inline" method="post">
                    @method('DELETE')
                    @csrf
                    <input type="submit" onclick="return confirm('¿Quieres borrar la beneficiario?')"  class="btn btn-danger" value="Borrar">
                </form>
                @endcan
                </div>
            </div>
        </div>
        
  </div>
</div>


 <br><br>

