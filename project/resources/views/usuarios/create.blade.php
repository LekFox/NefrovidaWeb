@extends('layouts.app')

@section('content')

@include('sidebar.usuarios')

    
<div class="container">
    <form method="post" action="/register">

        @csrf
  
        @include('usuarios.form',['modo'=>'Crear'])

    </form>
</div>

@endsection