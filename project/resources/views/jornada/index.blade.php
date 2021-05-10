
@extends('layouts.app')

@section('content')

@include('sidebar.jornada')
<div class="container">

@if (Session::has('eliminado'))
    <div class="alert alert-success" role="alert"> {{Session::get('eliminado')}} </div>      
@endif

@if (Session::has('nuevo'))
    <div class="alert alert-success" role="alert"> {{Session::get('nuevo')}} </div>       
@endif

@if (Session::has('editado'))
    <div class="alert alert-success" role="alert"> {{Session::get('editado')}} </div>    
  
@endif

    
<h1 id="JornadaTitulo" class="bluenefro"><i class="bi bi-calendar3"></i> Jornadas</h1>
<div class="container">
    <br/>
    <br/>

<div class= "container box">
    <div class= "row">
        <div class= "col-sm">
            <div class="panel panel-default">
                <div class="panel-heading">
                   <h5>Buscar por nombre:</h5>
                </div>
                <div class="panel-body">
                   <input type="search" name="search" id="searchnombre"
                    class="form-control" placeholder="Nombre de Jornada..."/>
                </div>
            </div>
        </div>
        <div class= "col-sm">
            <div class="panel panel-default">
                <div class="panel-heading">
                   <h5>Buscar por localidad:</h5>
                </div>
                <div class="panel-body">
                   <input type="text" name="search" id="searchlocalidad"
                    class="form-control" placeholder="Localidad de Jornada..."/>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <div class="row">
        <div class="col-sm text-right">
        <a id="beneficiarioAddB" href="{{ url('jornada/create') }}" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Registrar Jornada</a>
    </div>
</div>
<br>

<table class="table table-light">
    
    <thead class="greennefrobg whitenefro">
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
                <a href="{{url('/jornada/'.$Jornada->id)}}" class="btn btn-outline-dark">
                    Consultar
                </a>
                <a href="{{url('/jornada/'.$Jornada->id.'/edit')}}" class="btn btn-outline-secondary">
                    Editar
                </a>
                 
                <form action="{{url('/jornada/'.$Jornada->id)}}" class="d-inline" method="post">
                    @csrf
                    {{ @method_field('DELETE') }}
                    <input type="submit" onclick="return confirm('¿Quieres borrar la jornada?')"  class="btn btn-outline-danger" value="Borrar">
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>

</table>
</div>

<script>
    $('body').on('keyup', '#searchnombre', function(){
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
                    var urlshow = 'jornada/'+value.id;
                    var urledit = 'jornada/'+value.id+'/edit';
                    var urldel = 'jornada/'+value.id;
                    tableRow = '<tr><td>'+value.id+'</td><td>'+value.nombre+'</td><td>'+value.fecha+'</td><td>'+value.localidad+'</td><td>'+value.municipio+'</td>';
                    tableRow += '<td><a href="'+urlshow+'" class="btn btn-outline-dark">Consultar</a>';
                    tableRow += '<a href="'+urledit+'" class="btn btn-outline-secondary">Editar</a>';
                    tableRow += '<form action="'+urldel+'" class="d-inline" method="post">@csrf{{ @method_field('DELETE') }}<input type="submit" onclick="return confirm("¿Quieres borrar?")"  class="btn btn-outline-danger" value="Borrar"></form>';
                    tableRow += '</td></tr>'
                    $('#dynamic-row').append(tableRow);
                });
            }
        });
    });
    $('body').on('keyup', '#searchlocalidad', function(){
        var searchQuest = $(this).val();
        $.ajax({
            method: 'POST',
            url:'{{ route("search-jornadas-loc") }}',
            dataType: 'json',
            data: {
                '_token': '{{ csrf_token() }}',
                searchQuest: searchQuest,
            },
            success: function(res){
                var tableRow = '';
                $('#dynamic-row').html('');
                $.each(res, function(index, value){
                    var urlshow = 'jornada/'+value.id;
                    var urledit = 'jornada/'+value.id+'/edit';
                    var urldel = 'jornada/'+value.id;
                    tableRow = '<tr><td>'+value.id+'</td><td>'+value.nombre+'</td><td>'+value.fecha+'</td><td>'+value.localidad+'</td><td>'+value.municipio+'</td>';
                    tableRow += '<td><a href="'+urlshow+'" class="btn btn-outline-dark">Consultar</a>';
                    tableRow += '<a href="'+urledit+'" class="btn btn-outline-secondary">Editar</a>';
                    tableRow += '<form action="'+urldel+'" class="d-inline" method="post">@csrf{{ @method_field('DELETE') }}<input type="submit" onclick="return confirm("¿Quieres borrar?")"  class="btn btn-outline-danger" value="Borrar"></form>';
                    tableRow += '</td></tr>'
                    $('#dynamic-row').append(tableRow);
                });
            }
        });
    });
</script>
@endsection