
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
                <h4 class="font-weight-light">Seguimiento: 
                @if($beneficiario->seguimiento === 1)
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-square-fill" viewBox="0 0 16 16">
                <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm10.03 4.97a.75.75 0 0 1 .011 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.75.75 0 0 1 1.08-.022z"/>
                </svg> Sí
                @else
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-square-fill" viewBox="0 0 16 16">
                <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z"/>
                </svg> No
                @endif
                </h4>
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

