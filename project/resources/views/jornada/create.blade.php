@extends('layouts.app')

@section('content')

@include('sidebar.jornada')
<div class="container"><form action="{{url('/jornada')}}" method="post">
  @csrf
  @include('jornada.form',['modo'=>'Crear'])


</form>
</div>
@endsection