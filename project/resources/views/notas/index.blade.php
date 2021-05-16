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
            <table id="table_data" class="table table-bordered table-sm">
    
                <thead class="thead-light">
                    <tr>
                        <th id="center">Tipo de Nota</th>
                        <th id="center">Fecha</th>
                        <th id="center">Comentarios</th>
                        <th id="center">Acciones</th>
                    </tr>
                </thead>
                
                <tbody id="dynamic-row">
                    @foreach ($Notas as $notas)
                    <tr>
                        <td id="center">{{$notas->tiponota}}</td>
                        <td id="center">{{$notas->fecha}}</td>
                        <td id="center" class="ellipsis">{{$notas->comentario}}</td>
                        <td id="center">
                            <a href="{{url('/notas/'.$notas->id)}}" class="btn btn-outline-dark">
                                Consultar
                            </a>
                            <a href="{{url('/notas/'.$notas->id.'/edit')}}" class="btn btn-outline-secondary">
                                Editar
                            </a>
                            <form action="{{url('/notas/'.$notas->id)}}" class="d-inline" method="post">
                                @csrf
                                {{ @method_field('DELETE') }}
                                <input type="submit" onclick="return confirm('¿Quieres borrar la nota?')"  class="btn btn-outline-danger" value="Borrar">
                            </form> 
                        </td>
                    </tr>
                    @endforeach 
                   
                </tbody>
            
            </table>
            {{$Notas->links()}}
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