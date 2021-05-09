<div class="card">
    <div class="card-body">
        <div class= "row">
            <div class= "col-sm-10">
                <h3><i class="bi bi-journal"></i> Notas</h3> 
            </div>
            <div class= "col-sm-2">
                <a href="{{ url('notas/create') }}" class="btn btn-success">Agregar Notas</a>
            </div>
            <br><br>
            <div class= "col-sm">
            <table id="dtBasicExample" class="table table-bordered table-sm">
    
                <thead class="thead-light">
                    <tr>
                        <th id="center">Fecha</th>
                        <th id="center">Comentarios</th>
                        <th id="center">Acciones</th>
                    </tr>
                </thead>
                
                <tbody id="dynamic-row">
                    @foreach ($Notas as $Notas)
                    <tr>
                        <td id="center">{{$Notas->fecha}}</td>
                        <td id="center" class="ellipsis">{{$Notas->comentario}}</td>
                        <td id="center">
                            <a href="{{url('/notas/'.$Notas->id)}}" class="btn btn-outline-dark">
                                Consultar
                            </a>
                            <a href="{{url('/notas/'.$Notas->id.'/edit')}}" class="btn btn-outline-secondary">
                                Editar
                            </a>
                            <form action="{{url('/notas/'.$Notas->id)}}" class="d-inline" method="post">
                                @csrf
                                {{ @method_field('DELETE') }}
                                <input type="submit" onclick="return confirm('¿Quieres borrar la nota?')"  class="btn btn-outline-danger" value="Borrar">
                            </form> 
                        </td>
                    </tr>
                    @endforeach 
                </tbody>
            
            </table>
            </div>
        </div>
    </div>
</div>

<script>$(document).ready(function () {
    $('#dtBasicExample').DataTable();
    $('.dataTables_length').addClass('bs-select');
  });</script>