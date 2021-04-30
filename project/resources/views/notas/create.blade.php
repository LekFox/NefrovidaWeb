@extends('layouts.app')

@section('content')

@include('sidebar.beneficiario')

<div class="container"><form action="{{url('/notas')}}" method="post">
  @csrf
  
  @include('notas.form',['modo'=>'Crear'])


</form>
</div>
@endsection