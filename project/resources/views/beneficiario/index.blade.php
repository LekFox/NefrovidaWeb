
@extends('layouts.app')

@section('content')

@include('sidebar.beneficiario')
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

    
<h1 id="JornadaTitulo" class="bluenefro"><i class="bi bi-people-fill"></i> Beneficiarios</h1>
<div class="container">
<br/>
<br/>

<div class= "container box" id="searchfields">
    <div class= "row">
        <div class= "col-sm">
            <div class="panel panel-default">
                <div class="panel-heading">
                   <h5>Buscar por nombre:</h5>
                </div>
                <div class="panel-body">
                   <input type="text" name="search" id="searchnombre"
                    class="form-control" placeholder="Nombre de beneficiario..."/>
                </div>
            </div>
        </div>
        <div class= "col-sm">
            <div class="panel panel-default">
                <div class="panel-heading">
                   <h5>Buscar por edad:</h5>
                </div>
                <div class="panel-body">
                   <input type="text" name="search" id="searchedad"
                    class="form-control" placeholder="Edad de beneficiario..."/>
                </div>
                <div class="table-responsive">
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class= "row">
        <div class= "col-sm">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h5>Buscar por sexo:</h5>
                </div>
                <div class="panel-body">
                    <select class="form-select" aria-label="selectsexo" id="searchsexo">
                        <option value="">Todos</option>
                        <option value="Mujer">Mujer</option>
                        <option value="Hombre">Hombre</option>
                    </select>
                </div>
            </div>
        </div>
        <div class= "col-sm">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h5>Buscar por seguimiento:</h5>
                </div>
                <div class="panel-body">
                    <select class="form-select" aria-label="selectseguimiento" id="searchseguimiento">
                        <option value="">Todos</option>
                        <option value="1">Con seguimiento</option>
                        <option value="0">Sin seguimiento</option>
                    </select>
                </div>
            </div>
        </div>
        <div class= "col-sm">
            
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-sm text-right">
        <a id="beneficiarioAddB" href="{{ url('beneficiario/create') }}" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Registrar Beneficiario</a>
    </div>
</div>
<br>

<table class="table table-light">
    
    <thead class="greennefrobg whitenefro">
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
        @foreach ($Beneficiario as $beneficiario)
        <tr>
            <td>{{$beneficiario->id}}</td>
            

            <td>{{$beneficiario->nombreBeneficiario}}</td>
            <td>{{$beneficiario->age}}</td>
            <td>{{$beneficiario->sexo}}</td>
            @if($beneficiario->seguimiento === 1)
            <td><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-square-fill" viewBox="0 0 16 16">
                    <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm10.03 4.97a.75.75 0 0 1 .011 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.75.75 0 0 1 1.08-.022z"/>
                </svg> Sí</td>
            @else
            <td><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-square-fill" viewBox="0 0 16 16">
                    <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z"/>
                </svg> No</td>
            @endif
            <td>
                <a href="{{url('/beneficiario/'.$beneficiario->id)}}" class="btn btn-outline-dark">
                    Consultar
                </a>
                <a href="{{url('/beneficiario/'.$beneficiario->id.'/edit')}}" class="btn btn-outline-secondary">
                    Editar
                </a>
                 
                <form action="{{url('/beneficiario/'.$beneficiario->id)}}" class="d-inline" method="post">
                    @method('DELETE')
                    @csrf
                    <input type="submit" onclick="return confirm('¿Quieres borrar la beneficiario?')"  class="btn btn-outline-danger" value="Borrar">
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>

</table>
{{$Beneficiario->links()}}

</div>

<script>
    $('body').on('keyup change', '#searchfields', function(){
        if ($( "#searchedad" ).val() == '') {
                var searchQuest = $( "#searchnombre" ).val();
                var searchQuestSexo = $("#searchsexo option:selected").val();
                var searchQuestSeguimiento = $("#searchseguimiento option:selected").val();
            $.ajax({
                method: 'POST',
                url:'{{ route("search-beneficiarios") }}',
                dataType: 'json',
                data: {
                    '_token': '{{ csrf_token() }}',
                    searchQuest: searchQuest,
                    searchQuestSexo: searchQuestSexo,
                    searchQuestSeguimiento: searchQuestSeguimiento,
                },
                success: function(res){
                    var tableRow = '';
                    $('#dynamic-row').html('');
                    $.each(res, function(index, value){
                        dob = new Date(value.fechaNacimiento);
                        var today = new Date();
                        var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
                        var urlshow = 'beneficiario/'+value.id;
                        var urledit = 'beneficiario/'+value.id+'/edit';
                        var urldel = 'beneficiario/'+value.id;
                        var segicon;
                        if (value.seguimiento == 1) {
                            segicon = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-square-fill" viewBox="0 0 16 16"><path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm10.03 4.97a.75.75 0 0 1 .011 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.75.75 0 0 1 1.08-.022z"/></svg> Sí';
                        }else{
                            segicon = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-square-fill" viewBox="0 0 16 16"><path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z"/></svg> No'
                        }
                        tableRow = '<tr><td>'+value.id+'</td><td>'+value.nombreBeneficiario+'</td><td>'+age+'</td><td>'+value.sexo+'</td><td>'+segicon+'</td>';
                        tableRow += '<td><a href="'+urlshow+'" class="btn btn-outline-dark">Consultar</a>';
                        tableRow += '<a href="'+urledit+'" class="btn btn-outline-secondary">Editar</a>';
                        tableRow += '<form action="'+urldel+'" class="d-inline" method="post"><input type="submit" onclick="return confirm("¿Quieres borrar?")"  class="btn btn-outline-danger" value="Borrar"></form>';
                        tableRow += '</td></tr>'
                        $('#dynamic-row').append(tableRow);
                    });
                }
            });
        }
        else{
            var searchQuest = $( "#searchnombre" ).val();
            var today = new Date().getFullYear();
            var searchQuestEdad = today - $( "#searchedad" ).val();
            var m = new Date().getMonth() + 1;
            if (m<10) {
                m = '0' + m;
            }
            var d = new Date().getDate();
            if (d<10) {
                d = '0' + d;
            }
            var fechaBegin = searchQuestEdad - 1 +'-'+m+'-'+d;
            var fechaEnd = searchQuestEdad+'-'+m+'-'+d;
            var searchQuestSexo = $("#searchsexo option:selected").val();
            var searchQuestSeguimiento = $("#searchseguimiento option:selected").val();
            $.ajax({
                method: 'POST',
                url:'{{ route("search-beneficiarios-age") }}',
                dataType: 'json',
                data: {
                    '_token': '{{ csrf_token() }}',
                    searchQuest: searchQuest,
                    searchQuestEdad: searchQuestEdad,
                    searchQuestSexo: searchQuestSexo,
                    searchQuestSeguimiento: searchQuestSeguimiento,
                    fechaBegin: fechaBegin,
                    fechaEnd: fechaEnd,
                },
                success: function(res){
                    var tableRow = '';
                    $('#dynamic-row').html('');
                    $.each(res, function(index, value){
                        dob = new Date(value.fechaNacimiento);
                        var today = new Date();
                        var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
                        var urlshow = 'beneficiario/'+value.id;
                        var urledit = 'beneficiario/'+value.id+'/edit';
                        var urldel = 'beneficiario/'+value.id;
                        var segicon;
                        if (value.seguimiento == 1) {
                            segicon = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-square-fill" viewBox="0 0 16 16"><path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm10.03 4.97a.75.75 0 0 1 .011 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.75.75 0 0 1 1.08-.022z"/></svg> Sí';
                        }else{
                            segicon = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-square-fill" viewBox="0 0 16 16"><path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z"/></svg> No'
                        }
                        tableRow = '<tr><td>'+value.id+'</td><td>'+value.nombreBeneficiario+'</td><td>'+age+'</td><td>'+value.sexo+'</td><td>'+segicon+'</td>';
                        tableRow += '<td><a href="'+urlshow+'" class="btn btn-outline-dark">Consultar</a>';
                        tableRow += '<a href="'+urledit+'" class="btn btn-outline-secondary">Editar</a>';
                        tableRow += '<form action="'+urldel+'" class="d-inline" method="post"><input type="submit" onclick="return confirm("¿Quieres borrar?")"  class="btn btn-outline-danger" value="Borrar"></form>';
                        tableRow += '</td></tr>'
                        $('#dynamic-row').append(tableRow);
                    });
                }
            });
        }
    });
</script>
@endsection