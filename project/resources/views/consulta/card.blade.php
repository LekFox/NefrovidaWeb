<br><br>
<div class="card">
    <div class="card-body">
            <div class= "row">
                <div class="col">
                </div>
                <div class= "col text-center">
                    <h2><i class="bi bi-heart greennefro"></i> Consulta Médica</h2> 
                </div>
                <div class= "col text-right">
                @cannot('nutriologo', App\Models\User::class)
                    <a href= "{{url('/beneficiario/'.$beneficiario->id.'/consulta/create')}}" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Agregar Consulta</a>
                @endcannot
                </div>
                <br><br>
            </div>
            <div class= "row">
            <br><br>
            <div class= "col-sm">
                <div class="col-sm text-center">
                    {{-- @if ($beneficiario->consulta == NULL)
                        <p>No hay consultas registradas.</p>
                    @else
                    <p>ede</p>
                    @endif --}}

                    </div>
            <table id="table_data" class="table table-bordered table-sm table-responsive-sm">
    
                <thead class="thead-light">
                    <tr>
                        <th id="center">Fecha de la consulta</th>
                        <th id="center">Acciones</th>
                    </tr>
                </thead>
                
                <tbody id="dynamic-row">
                    @foreach ($consulta as $notas)
                    <tr>
                        <td id="center">{{$notas->fecha}}</td>
                        <td id="center">
                            <a href= "{{url('/consulta/'.$notas->id)}}" class="btn btn-outline-dark">
                                Consultar
                            </a>
                            @cannot('nutriologo', App\Models\User::class)
                            <a href="{{url('/consulta/'.$notas->id.'/edit')}}" class="btn btn-outline-secondary">
                                Editar
                            </a>
                            

                            <form action="{{url('/consulta/'.$notas->id)}}" class="d-inline" method="post">
                                @csrf
                                {{ @method_field('DELETE') }}
                                <input type="submit" onclick="return confirm('¿Quiere Borrar la Consulta?')"  class="btn btn-outline-danger" value="Borrar">
                            </form> 
                            @endcannot
                        </td>
                    </tr>
                    @endforeach 
                   
                </tbody>
            
            </table>
            {{$consulta->links()}}
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