<br><br>
<div class="card">
    <div class="card-body">
        <div class= "row">
            <div class="col">
            </div>
            <div class= "col text-center">
                <h2><i class="bi bi-eyedropper greennefro"></i> Análisis de Laboratorio</h2> 
            </div>
            
            <div class= "col text-right">
            @can('lab', App\Models\User::class)
                
                    <a href="{{ url('/beneficiario/'.$beneficiario->id.'/analisislab') }}" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Registrar Análisis</a>
            @endcan

            @can('admin', App\Models\User::class)
                
                    <a href="{{ url('/beneficiario/'.$beneficiario->id.'/analisislab') }}" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Registrar Análisis</a>
            @endcan

            @can('procuracion', App\Models\User::class)
                
                    <a href="{{ url('/beneficiario/'.$beneficiario->id.'/analisislab') }}" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Registrar Análisis</a>
            @endcan
            </div>
            
            <br><br>
            
        </div>
        <h3>General de Orina</h3>
        <div class="row">
            <div class= "col-sm">
            <table id="table_data" class="table table-bordered table-sm table-hover table-responsive-sm">
    
                <thead class="thead-light">
                    <tr>
                        <th id="center">Fecha</th>
                        <th id="center">Acciones</th>
                    </tr>
                </thead>
                
                <tbody id="dynamic-row">
                    @foreach ($ExamenesOrina as $examenorina)
                    <tr>
                        <td id="center">{{$examenorina->fecharegistro}}</td>
                        <td id="center">
                            <a href="{{url('/examenorina/'.$examenorina->id)}}" class="btn btn-outline-dark">
                                Consultar
                            </a>
                            @can('lab', App\Models\User::class)
                            <a href="{{url('/examenorina/'.$examenorina->id.'/edit')}}" class="btn btn-outline-secondary">
                                Editar
                            </a>
                            
                           
                            <form action="{{url('/examenorina/'.$examenorina->id)}}" class="d-inline" method="post">
                                @csrf
                                {{ @method_field('DELETE') }}
                                <input type="hidden" id="id_beneficiario" name="id_beneficiario" value="{{ $beneficiario->id }}">
                                <input type="submit" onclick="return confirm('¿Quieres borrar el E.G.O.? Esta acción no puede deshacerse.')"  class="btn btn-outline-danger" value="Borrar">
                            </form> 
                            @endcan

                            @can('admin', App\Models\User::class)
                            <a href="{{url('/examenorina/'.$examenorina->id.'/edit')}}" class="btn btn-outline-secondary">
                                Editar
                            </a>
                            
                           
                            <form action="{{url('/examenorina/'.$examenorina->id)}}" class="d-inline" method="post">
                                @csrf
                                {{ @method_field('DELETE') }}
                                <input type="hidden" id="id_beneficiario" name="id_beneficiario" value="{{ $beneficiario->id }}">
                                <input type="submit" onclick="return confirm('¿Quieres borrar el E.G.O.? Esta acción no puede deshacerse.')"  class="btn btn-outline-danger" value="Borrar">
                            </form> 
                            @endcan

                            @can('procuracion', App\Models\User::class)
                            <a href="{{url('/examenorina/'.$examenorina->id.'/edit')}}" class="btn btn-outline-secondary">
                                Editar
                            </a>
                            
                           
                            <form action="{{url('/examenorina/'.$examenorina->id)}}" class="d-inline" method="post">
                                @csrf
                                {{ @method_field('DELETE') }}
                                <input type="hidden" id="id_beneficiario" name="id_beneficiario" value="{{ $beneficiario->id }}">
                                <input type="submit" onclick="return confirm('¿Quieres borrar el E.G.O.? Esta acción no puede deshacerse.')"  class="btn btn-outline-danger" value="Borrar">
                            </form> 
                            @endcan
                        </td>
                    </tr>
                    @endforeach 
                   
                </tbody>
            
            </table>
            {{$ExamenesOrina->links()}}
            </div>
        </div>
        <h3>Depuración de Creatinina en Orina de 24 h</h3>
        <div class="row">
            <div class= "col-sm">
            <table id="table_data" class="table table-bordered table-sm table-hover table-responsive-sm">
    
                <thead class="thead-light">
                    <tr>
                        <th id="center">Fecha</th>
                        <th id="center">Acciones</th>
                    </tr>
                </thead>
                
                <tbody id="dynamic-row">
                    @foreach ($DepuracionesCreatinina as $depuracioncreatinina)
                    <tr>
                        <td id="center">{{$depuracioncreatinina->fecharegistro}}</td>
                        <td id="center">
                            <a href="{{url('/depuracioncreatinina/'.$depuracioncreatinina->id)}}" class="btn btn-outline-dark">
                                Consultar
                            </a>
                            @can('lab', App\Models\User::class)
                            <a href="{{url('/depuracioncreatinina/'.$depuracioncreatinina->id.'/edit')}}" class="btn btn-outline-secondary">
                                Editar
                            </a>
                            <form action="{{url('/depuracioncreatinina/'.$depuracioncreatinina->id)}}" class="d-inline" method="post">
                                @csrf
                                {{ @method_field('DELETE') }}
                                <input type="hidden" id="id_beneficiario" name="id_beneficiario" value="{{ $beneficiario->id }}">
                                <input type="submit" onclick="return confirm('¿Quieres borrar la Depuración de creatinina en orina de 24 h?')"  class="btn btn-outline-danger" value="Borrar">
                            </form> 
                            @endcan

                            @can('admin', App\Models\User::class)
                            <a href="{{url('/depuracioncreatinina/'.$depuracioncreatinina->id.'/edit')}}" class="btn btn-outline-secondary">
                                Editar
                            </a>
                            <form action="{{url('/depuracioncreatinina/'.$depuracioncreatinina->id)}}" class="d-inline" method="post">
                                @csrf
                                {{ @method_field('DELETE') }}
                                <input type="hidden" id="id_beneficiario" name="id_beneficiario" value="{{ $beneficiario->id }}">
                                <input type="submit" onclick="return confirm('¿Quieres borrar la Depuración de creatinina en orina de 24 h?')"  class="btn btn-outline-danger" value="Borrar">
                            </form> 
                            @endcan

                            @can('procuracion', App\Models\User::class)
                            <a href="{{url('/depuracioncreatinina/'.$depuracioncreatinina->id.'/edit')}}" class="btn btn-outline-secondary">
                                Editar
                            </a>
                            <form action="{{url('/depuracioncreatinina/'.$depuracioncreatinina->id)}}" class="d-inline" method="post">
                                @csrf
                                {{ @method_field('DELETE') }}
                                <input type="hidden" id="id_beneficiario" name="id_beneficiario" value="{{ $beneficiario->id }}">
                                <input type="submit" onclick="return confirm('¿Quieres borrar la Depuración de creatinina en orina de 24 h?')"  class="btn btn-outline-danger" value="Borrar">
                            </form> 
                            @endcan
                        </td>
                    </tr>
                    @endforeach 
                   
                </tbody>
            
            </table>
            {{$DepuracionesCreatinina->links()}}
            </div>
        </div>
        <h3>Química Sanguínea</h3>
        <div class="row">
            <div class= "col-sm">
            <table id="table_data" class="table table-bordered table-sm table-hover table-responsive-sm">
    
                <thead class="thead-light">
                    <tr>
                        <th id="center">Fecha</th>
                        <th id="center">Acciones</th>
                    </tr>
                </thead>
                
                <tbody id="dynamic-row">
                    @foreach ($QuimicasSanguinea as $quimicasanguinea)
                    <tr>
                        <td id="center">{{$quimicasanguinea->fecharegistro}}</td>
                        <td id="center">
                            <a href="{{url('/quimicasanguinea/'.$quimicasanguinea->id)}}" class="btn btn-outline-dark">
                                Consultar
                            </a>
                            @can('lab', App\Models\User::class)
                            <a href="{{url('/quimicasanguinea/'.$quimicasanguinea->id.'/edit')}}" class="btn btn-outline-secondary">
                                Editar
                            </a>
                            <form action="{{url('/quimicasanguinea/'.$quimicasanguinea->id)}}" class="d-inline" method="post">
                                @csrf
                                {{ @method_field('DELETE') }}
                                <input type="hidden" id="id_beneficiario" name="id_beneficiario" value="{{ $beneficiario->id }}">
                                <input type="submit" onclick="return confirm('¿Quieres borrar la Química sanguinea?')"  class="btn btn-outline-danger" value="Borrar">
                            </form> 
                            @endcan

                            @can('admin', App\Models\User::class)
                            <a href="{{url('/quimicasanguinea/'.$quimicasanguinea->id.'/edit')}}" class="btn btn-outline-secondary">
                                Editar
                            </a>
                            <form action="{{url('/quimicasanguinea/'.$quimicasanguinea->id)}}" class="d-inline" method="post">
                                @csrf
                                {{ @method_field('DELETE') }}
                                <input type="hidden" id="id_beneficiario" name="id_beneficiario" value="{{ $beneficiario->id }}">
                                <input type="submit" onclick="return confirm('¿Quieres borrar la Química sanguinea?')"  class="btn btn-outline-danger" value="Borrar">
                            </form> 
                            @endcan

                            @can('procuracion', App\Models\User::class)
                            <a href="{{url('/quimicasanguinea/'.$quimicasanguinea->id.'/edit')}}" class="btn btn-outline-secondary">
                                Editar
                            </a>
                            <form action="{{url('/quimicasanguinea/'.$quimicasanguinea->id)}}" class="d-inline" method="post">
                                @csrf
                                {{ @method_field('DELETE') }}
                                <input type="hidden" id="id_beneficiario" name="id_beneficiario" value="{{ $beneficiario->id }}">
                                <input type="submit" onclick="return confirm('¿Quieres borrar la Química sanguinea?')"  class="btn btn-outline-danger" value="Borrar">
                            </form> 
                            @endcan
                        </td>
                    </tr>
                    @endforeach 
                   
                </tbody>
            
            </table>
            {{$QuimicasSanguinea->links()}}
            </div>
        </div>
        <h3>Microalbuminuria</h3>
        <div class="row">
            <div class= "col-sm">
            <table id="table_data" class="table table-bordered table-sm table-hover table-responsive-sm">
    
                <thead class="thead-light">
                    <tr>
                        <th id="center">Fecha</th>
                        <th id="center">Acciones</th>
                    </tr>
                </thead>
                
                <tbody id="dynamic-row">
                    @foreach ($microE as $micro)
                    <tr>
                        <td id="center">{{$micro->fecha}}</td>
                        <td id="center">
                            <a href="{{url('/micro/'.$micro->id)}}" class="btn btn-outline-dark">
                                Consultar
                            </a>
                            @can('lab', App\Models\User::class)
                            <a href="{{url('/micro/'.$micro->id.'/edit')}}" class="btn btn-outline-secondary">
                                Editar
                            </a>
                            <form action="{{url('/micro/'.$micro->id)}}" class="d-inline" method="post">
                                @csrf
                                {{ @method_field('DELETE') }}
                                <input type="hidden" id="id_beneficiario" name="id_beneficiario" value="{{ $beneficiario->id }}">
                                <input type="submit" onclick="return confirm('¿Quiere Borrar el Análisis de Microalbuminuria?')"  class="btn btn-outline-danger" value="Borrar">
                            </form> 
                            @endcan

                            @can('admin', App\Models\User::class)
                            <a href="{{url('/micro/'.$micro->id.'/edit')}}" class="btn btn-outline-secondary">
                                Editar
                            </a>
                            <form action="{{url('/micro/'.$micro->id)}}" class="d-inline" method="post">
                                @csrf
                                {{ @method_field('DELETE') }}
                                <input type="hidden" id="id_beneficiario" name="id_beneficiario" value="{{ $beneficiario->id }}">
                                <input type="submit" onclick="return confirm('¿Quiere Borrar el Análisis de Microalbuminuria?')"  class="btn btn-outline-danger" value="Borrar">
                            </form> 
                            @endcan

                            @can('procuracion', App\Models\User::class)
                            <a href="{{url('/micro/'.$micro->id.'/edit')}}" class="btn btn-outline-secondary">
                                Editar
                            </a>
                            <form action="{{url('/micro/'.$micro->id)}}" class="d-inline" method="post">
                                @csrf
                                {{ @method_field('DELETE') }}
                                <input type="hidden" id="id_beneficiario" name="id_beneficiario" value="{{ $beneficiario->id }}">
                                <input type="submit" onclick="return confirm('¿Quiere Borrar el Análisis de Microalbuminuria?')"  class="btn btn-outline-danger" value="Borrar">
                            </form> 
                            @endcan
                        </td>
                    </tr>
                    @endforeach 
                   
                </tbody>
            
            </table>
            {{$microE->links()}}
            </div>
        </div>
    </div>
</div>
{{-- 
<script>
    $(document).ready(function(){
    
     $(document).on('click', '.page-link', function(event){
        event.preventDefault(); 
        var page = $(this).attr('href').split('page=')[1];
        fetch_data(page);
     });
    
     function fetch_data(page)
     {
      var _token = $("input[name=_token]").val();
      $.ajax({
          url:"{{ route('beneficiario.fetch') }}",
          method:"POST",
          data:{_token:_token, page:page},
          success:function(data)
          {
           $('#table_data').html(data);
          }
        });
     }
    
    });
    </script> --}}
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