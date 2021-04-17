@extends('layouts.app')

@section('content')
<div class="container">
@if (Session::has('mensaje'))
    {{Session::get('mensaje')}}   
@endif

<a href="{{ url('jornada/create') }}" class="btn btn-success"> Registrar nueva Jornada </a>
<br/>
<br/>
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
    
    <tbody>
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
@endsection