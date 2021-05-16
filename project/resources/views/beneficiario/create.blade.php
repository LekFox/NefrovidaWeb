@extends('layouts.app')

@section('content')

@include('sidebar.beneficiario')

<div class="container">

@if(isset($beneficiario))
  <form action="{{url('/beneficiario/'.$beneficiario->id)}}" method="post">
  @method('PUT')
  @include('beneficiario.form',['modo'=>'Editar', $jornadas])
@else
  <form action="{{url('/beneficiario/')}}" method="post">
  @include('beneficiario.form',['modo'=>'Crear', $jornadas])
@endif
  @csrf
  

</form>
</div>
@endsection