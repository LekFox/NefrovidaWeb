@extends('layouts.app')

@section('content')

@include('sidebar.beneficiario')

<div class="container"><form action="{{url('/beneficiario')}}" method="post">
  @csrf
  
  @include('beneficiario.form',['modo'=>'Registrar', $jornadas])


</form>
</div>
@endsection