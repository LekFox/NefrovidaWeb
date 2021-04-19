
<h1 id="JornadaTitulo">{{$modo}} Jornada</h1>

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


<a href="{{ url('jornada') }}" class="btn btn-primary"> Regresar </a>
<br><br>
<div class="card">
  <div class="card-body">
      <br>
      <div class= "row">
          <div class= "col-sm">
                <h1 class="card-title">{{ $jornada->nombre }}</h1>
                <br><br><br>
                <h3>Estado: {{ $jornada->estado }}</h3>
                <h3>Municipio: {{ $jornada->municipio }}</h3>
                <h3>Localidad: {{ $jornada->localidad }}</h3>
                <h3>Fecha: {{ $jornada->fecha }}</h3>
            </div>
            <div class="col-sm">
                <div class= "pt-xl-5">
                    
                </div>
                <div class= "pt-xl-5">
                    <button type="button" class="btn btn-primary">
                        Añadir beneficiario existente
                    </button>
                </div>
                <div class= "pt-xl-2">
                    
                </div>
                <div class= "pt-xl-5">
                    <button type="button" class="btn btn-success">
                        Añadir nuevo beneficiario
                    </button>
                </div>
            </div>
        </div>
        <br><br>
  </div>
</div>

