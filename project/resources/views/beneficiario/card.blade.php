
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
<div class="card">
    <div class="card-body">
        <div class= "row">
            <div class= "col-sm-10">
                <h3>Notas</h3> 
            </div>
            <div class= "col-sm-2">
                <button type="button" class="btn btn-success">Agregar Notass</button>
            </div>
            <br><br>
            <div class= "col-sm">
            {{-- <table class="table table-light">
    
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Fecha</th>
                        <th>Comentarios</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                
                <tbody id="dynamic-row">
                    @foreach ($Notas as $Notas)
                    <tr>
                        <td>{{$Notas->id}}</td>
            
                        <td>{{$Notas->fecha}}</td>
                        <td>{{$Notas->comentarios}}</td>
                        <td>
                            <a href="{{url('/Notas/'.$Notas->id)}}" class="btn btn-primary">
                                Consultar
                            </a>
                            <a href="{{url('/Notas/'.$Notas->id.'/edit')}}" class="btn btn-warning">
                                Editar
                            </a>
                             
                            <form action="{{url('/Notas/'.$Notas->id)}}" class="d-inline" method="post">
                                @csrf
                                {{ @method_field('DELETE') }}
                                <input type="submit" onclick="return confirm('¿Quieres borrar la Notas?')"  class="btn btn-danger" value="Borrar">
                            </form> 
                        </td>
                    </tr>
                    @endforeach 
                </tbody>
            
            </table> --}}
            </div>
        </div>
    </div>
</div>



