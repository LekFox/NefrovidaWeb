<div class="card">
    <div class="card-body">
        <div class= "row">
            <div class="col">
            </div>
            <div class= "col text-center">
                <h2><i class="bi bi-heart greennefro"></i> Consulta</h2> 
            </div>
            <div class= "col text-right">
                <a href="{{ url('consulta/create') }}" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Agregar Consulta</a>
            </div>
            <br><br>
        </div>
        <div class="row">
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