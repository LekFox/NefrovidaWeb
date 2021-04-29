
<h1 id="JornadaTitulo">{{$modo}} Beneficiario</h1>

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


<a href="{{ url('beneficiario') }}" class="btn btn-primary"> Regresar </a>
<br><br>
<div class="card">
  <div class="card-body">
      <div class= "row">
          <div class= "col-sm">
                <h2 class="card-title">{{ $beneficiario->nombreBeneficiario }}</h2>
                <br>
                <h4>Fecha de Nacimiento: {{ $beneficiario->fechaNacimiento }}</h4>
                <h4>Sexo: {{ $beneficiario->sexo }}</h4>
                <h4>Teléfono: {{ $beneficiario->telefono }}</h4>
                <h4>Dirección: {{ $beneficiario->direccion }}</h4>
                <h4>Escolaridad: {{ $beneficiario->escolaridade_id }}</h4>
                <h4>Estatus: {{ $beneficiario->estatus }}</h4>
            </div>
            <div class="col-sm">
                <div class= "pt-xl-5">
                    
                </div>
                <div class= "pt-xl-5">
                    <button type="button" class="btn btn-primary">
                        Editar beneficiario
                    </button>
                </div>
                <div class= "pt-xl-2">
                    
                </div>
                <div class= "pt-xl-5">
                    <button type="button" class="btn btn-danger">
                        Borrar beneficiario
                    </button>
                </div>
            </div>
        </div>
        
  </div>
</div>


 <br><br>

