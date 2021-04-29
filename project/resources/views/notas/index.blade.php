
@extends('layouts.app')

@section('content')

@include('sidebar.beneficiario')
<div class="container">

{{-- @if (Session::has('eliminado'))
    <div class="alert alert-success" role="alert"> {{Session::get('eliminado')}} </div>      
@endif

@if (Session::has('nuevo'))
    <div class="alert alert-success" role="alert"> {{Session::get('nuevo')}} </div>       
@endif

@if (Session::has('editado'))
    <div class="alert alert-success" role="alert"> {{Session::get('editado')}} </div>    
  
@endif --}}

    
<h1 id="JornadaTitulo">Notas</h1>
<div class="container">
    <div class="row">
        <div class="col-md-12 text-right">
        <a id="NotasAddB" href="{{ url('Notas/create') }}" class="btn btn-success"> Registrar nuevo Notas </a>
    </div>
<br/>
<br/>

{{-- <div class= "container box">
    <div class= "row">
        <div class= "col-sm">
            <div class="panel panel-default">
                <div class="panel-heading">
                   Buscar por nombre:
                </div>
                <div class="panel-body">
                   <input type="text" name="search" id="searchnombre"
                    class="form-control" placeholder="Nombre de Notas..."/>
                </div>
                <div class="table-responsive">
                    <h3 >Total Data :  <span id="total_records"></span></h3>
                </div>
            </div>
        </div>
        <div class= "col-sm">
            <div class="panel panel-default">
                <div class="panel-heading">
                   Buscar por localidad:
                </div>
                <div class="panel-body">
                   <input type="text" name="search" id="searchlocalidad"
                    class="form-control" placeholder="Localidad de Notas..."/>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br> --}}

<table class="table table-light">
    
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Edad</th>
            <th>Sexo</th>
            <th>Seguimiento</th>
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

{{-- <script>
    $('body').on('keyup', '#searchnombre', function(){
        var searchQuest = $(this).val();
        $.ajax({
            method: 'POST',
            url:'{{ route("search-Notas") }}',
            dataType: 'json',
            data: {
                '_token': '{{ csrf_token() }}',
                searchQuest: searchQuest,
            },
            success: function(res){
                var tableRow = '';
                $('#dynamic-row').html('');
                $.each(res, function(index, value){
                    var urlshow = 'Notas/'+value.id;
                    var urledit = 'Notas/'+value.id+'/edit';
                    var urldel = 'Notas/'+value.id;
                    tableRow = '<tr><td>'+value.id+'</td><td>'+value.nombre+'</td><td>'+value.fecha+'</td><td>'+value.localidad+'</td><td>'+value.municipio+'</td>';
                    tableRow += '<td><a href="'+urlshow+'" class="btn btn-primary">Consultar</a>';
                    tableRow += '<a href="'+urledit+'" class="btn btn-warning">Editar</a>';
                    tableRow += '<form action="'+urldel+'" class="d-inline" method="post"><input type="submit" onclick="return confirm("¿Quieres borrar?")"  class="btn btn-danger" value="Borrar"></form>';
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
            url:'{{ route("search-Notas-loc") }}',
            dataType: 'json',
            data: {
                '_token': '{{ csrf_token() }}',
                searchQuest: searchQuest,
            },
            success: function(res){
                var tableRow = '';
                $('#dynamic-row').html('');
                $.each(res, function(index, value){
                    var urlshow = 'Notas/'+value.id;
                    var urledit = 'Notas/'+value.id+'/edit';
                    var urldel = 'Notas/'+value.id;
                    tableRow = '<tr><td>'+value.id+'</td><td>'+value.nombre+'</td><td>'+value.fecha+'</td><td>'+value.localidad+'</td><td>'+value.municipio+'</td>';
                    tableRow += '<td><a href="'+urlshow+'" class="btn btn-primary">Consultar</a>';
                    tableRow += '<a href="'+urledit+'" class="btn btn-warning">Editar</a>';
                    tableRow += '<form action="'+urldel+'" class="d-inline" method="post"><input type="submit" onclick="return confirm("¿Quieres borrar?")"  class="btn btn-danger" value="Borrar"></form>';
                    tableRow += '</td></tr>'
                    $('#dynamic-row').append(tableRow);
                });
            }
        });
    });
</script> --}}
@endsection