
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
<br><br>
<div class="card">
  <div class="card-body">
      <br>
      <div class= "row">
          <div class= "col-sm">
                <h1 class="card-title">Beneficiarios de la jornada {{ $jornada->nombre }}</h1>
                <br><br><br>
                <table class="table table-light">
                    <thead class="thead-light">
                    <tr>
                    <th>Nombre</th>
                    <th>Edad</th>
                    <th>Sexo</th>
                    <th>Acciones</th>
                    </tr>
                    </thead>
    
                    <tbody id="dynamic-row">
                        <tr>
                            <td>{{$jornada->id}}</td>
                    

                            <td>{{$jornada->nombre}}</td>
                            <td>{{$jornada->fecha}}</td>
                            <td>
                            <a href="{{url('/jornada/'.$jornada->id)}}" class="btn btn-primary">
                                Consultar
                            </a>
                            <a href="{{url('/jornada/'.$jornada->id.'/edit')}}" class="btn btn-warning">
                                Editar
                            </a>
                            <form action="{{url('/jornada/'.$jornada->id)}}" class="d-inline" method="post">
                            @csrf
                            {{ @method_field('DELETE') }}
                            <input type="submit" onclick="return confirm('¿Quieres borrar la jornada?')"  class="btn btn-danger" value="Borrar">
                            </form>
                            </td>
                        </tr>
                    </tbody>

                </table>
            </div>
        </div>
        <br><br>
  </div>
</div>

