<br><br>
<div class="card">
    <div class="card-body">
            <div class= "row">
                <div class="col">
                </div>
                <div class= "col text-center">
                    <h2><i class="bi bi-basket greennefro"></i> Nutrición</h2> 
                </div>
                <div class= "col text-right">
                    <a href= "{{url('/beneficiario/'.$beneficiario->id.'/nutricion/create')}}" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Agregar Consulta</a>
                </div>
                <br><br>
            </div>
            <div class= "row">
            <br><br>
            <div class= "col-sm">
                <div class="col-sm text-center">
                    {{-- @if ($beneficiario->nutricionConsulta == NULL)
                        <p>No hay consultas registradas.</p>
                    @else
                    <p>ede</p>
                    @endif --}}

                    </div>
            <table id="table_data" class="table table-bordered table-sm">
    
                <thead class="thead-light">
                    <tr>
                        <th id="center">Fecha de la consulta</th>
                        <th id="center">Acciones</th>
                    </tr>
                </thead>
                
                <tbody id="dynamic-row">
                    @foreach ($Nutricion as $notas)
                    <tr>
                        <td id="center">{{$notas->created_at}}</td>
                        <td id="center">
                            <a href= "{{url('/nutricion/'.$notas->id)}}" class="btn btn-outline-dark">
                                Consultar
                            </a>
                            <a href="{{url('/nutricion/'.$notas->id.'/edit')}}" class="btn btn-outline-secondary">
                                Editar
                            </a>
                            <form action="{{url('/nutricion/'.$notas->id)}}" class="d-inline" method="post">
                                @csrf
                                {{ @method_field('DELETE') }}
                                <input type="submit" onclick="return confirm('¿Quieres borrar la consulta?')"  class="btn btn-outline-danger" value="Borrar">
                            </form> 
                        </td>
                    </tr>
                    @endforeach 
                   
                </tbody>
            
            </table>
            {{$Nutricion->links()}}
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