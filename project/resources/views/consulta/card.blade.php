
<h1 id="JornadaTitulo"class="bluenefro"><i class="bi bi-journal"></i> Consulta</h1>

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


<a href="{{url('/beneficiario/'.$consulta->beneficiario_id)}}" class="btn btn-primary"><i class="bi bi-arrow-left"></i> Regresar </a>
<br><br>
<div class="card">
    <div class="card-header">
        <div class= "row">
            <div class= "col-8">
                <h5>Beneficiario: {{$consulta->beneficiario->nombreBeneficiario}}</h5>
            </div>   
            <div class= "col-4">
                <h5 id="fechaC">Fecha: {{ $consulta->fecha }}</h5>
            </div> 
        </div>
      </div>

    <br><br>
    <div class="card">
      <div class="card-body">
            <div class= "row">
                <div class= "col-sm-10">
                    <h3><i class="bi bi-heart"></i> Consulta Médica</h3> 
                </div>
                <div class= "col-sm-2">
                    <a href="{{ url('consulta/create') }}" class="btn btn-success">Agregar Consulta</a>
                </div>
                <br><br>
                <div class= "col-sm">
                <table id="table_data" class="table table-bordered table-sm">
    
                    <thead class="thead-light">
                        <tr>
                            <th id="center">Consulta</th>
                            <th id="center">Fecha</th>
                            <th id="center">Comentario</th>
                            <th id="center">Acciones</th>
                        </tr>
                    </thead>
                
                    <tbody id="dynamic-row">
                        @foreach ($Consulta as $consulta)
                        <tr>
                            <td id="center">{{$consulta->temperatura}}</td>
                            <td id="center">{{$consulta->fecha}}</td>
                            <td id="center" class="ellipsis">{{$consulta->temperatura}}</td>
                            <td id="center">
                                <a href="{{url('/consulta/'.$consulta->id)}}" class="btn btn-outline-dark">
                                    Consultar
                                </a>
                                <a href="{{url('/consulta/'.$consulta->id.'/edit')}}" class="btn btn-outline-secondary">
                                    Editar
                                </a>
                                <form action="{{url('/consulta/'.$consulta->id)}}" class="d-inline" method="post">
                                    @csrf
                                    {{ @method_field('DELETE') }}
                                    <input type="submit" onclick="return confirm('¿Quiere Borrar la Consulta?')"  class="btn btn-outline-danger" value="Borrar">
                                </form> 
                            </td>
                        </tr>
                        @endforeach 
                   
                    </tbody>
            
                </table>
                {{$Consulta->links()}}
                </div>
            </div>
        </div>
</div>

    <script src="~/Scripts/jquery-3.5.1.min.js"></script>
<script>
        $(window).scroll(function () {
            sessionStorage.scrollTop = $(this).scrollTop();
        });
        $(document).ready(function () {
            if (sessionStorage.scrollTop != "undefined") {
                $(window).scrollTop(sessionStorage.scrollTop);
            }
        });
</script>