
@extends('layouts.app')

@section('content')

@include('sidebar.jornada')
<div class="container">

@if (Session::has('mensaje'))
    {{Session::get('mensaje')}}   
@endif


<a href="{{ url('jornada/create') }}" class="btn btn-success"> Registrar nueva Jornada </a>
<br/>
<br/>
<div class= "container box">
    <div class="panel panel-default">
        <div class="panel-heading">
            Search
        </div>
        <div class="panel-body">
            <input type="text" name="search" id="search"
            class="form-control" placeholder="Search"/>
        </div>
        <div class="table-responsive">
            <h3 >Total Data :  <span id="total_records"></span></h3>
            
        </div>
    </div>
</div>
<br>
<br>
<table class="table table-light">
    
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Fecha</th>
            <th>Localidad</th>
            <th>Municipio</th>
            <th>Acciones</th>
        </tr>
    </thead>
    
    <tbody id="dynamic-row">
        @foreach ($Jornada as $Jornada)
        <tr>
            <td>{{$Jornada->id}}</td>
            

            <td>{{$Jornada->nombre}}</td>
            <td>{{$Jornada->fecha}}</td>
            <td>{{$Jornada->localidad}}</td>
            <td>{{$Jornada->municipio}}</td>
            <td>
                <a href="{{url('/Jornada/'.$Jornada->id.'/edit')}}" class="btn btn-warning">
                    Editar
                </a>
                 
                <form action="{{url('/Jornada/'.$Jornada->id)}}" class="d-inline" method="post">
                    @csrf
                    {{ @method_field('DELETE') }}
                    <input type="submit" onclick="return confirm('¿Quieres borrar?')"  class="btn btn-danger" value="Borrar">
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>

</table>
</div>

<script>
    $('body').on('keyup', '#search', function(){
        var searchQuest = $(this).val();
        
        $.ajax({
            method: 'POST',
            url:'{{ route("search-jornadas") }}',
            dataType: 'json',
            data: {
                '_token': '{{ csrf_token() }}',
                searchQuest: searchQuest,
            },
            success: function(res){
                var tableRow = '';
                $('#dynamic-row').html('');
                $.each(res, function(index, value){
                    tableRow = '<tr><td>'+value.id+'</td><td>'+value.nombre+'</td><td>'+value.fecha+'</td><td>'+value.localidad+'</td><td>'+value.municipio+'</td></tr>';

                    $('#dynamic-row').append(tableRow);

                
                });
            }
        });
    });
</script>
@endsection