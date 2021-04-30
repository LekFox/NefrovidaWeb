<div class="card">
    <div class="card-body">
        <div class= "row">
            <div class= "col-sm-10">
                <h3>Notas</h3> 
            </div>
            <div class= "col-sm-2">
                <a href="{{ url('notas/create') }}" class="btn btn-success">Agregar Notas</a>
            </div>
            <br><br>
            
            <div class= "col-sm">
            <table class="table table-light table-sm">
    
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
                        <td>{{$Notas->comentario}}</td>
                        <td>
                            <a href="{{url('/notas/'.$Notas->id)}}" class="btn btn-primary">
                                Consultar
                            </a>
                            <a href="{{url('/notas/'.$Notas->id.'/edit')}}" class="btn btn-warning">
                                Editar
                            </a>
                             
                            <form action="{{url('/notas/'.$Notas->id)}}" class="d-inline" method="post">
                                @csrf
                                {{ @method_field('DELETE') }}
                                <input type="submit" onclick="return confirm('¿Quieres borrar la Notas?')"  class="btn btn-danger" value="Borrar">
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
