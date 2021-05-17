@extends('layouts.app')

@section('content')

@include('sidebar.beneficiario')

<div class="container">
    @csrf
    {{ method_field('PATCH') }}
    @include('nutriologia.card',['modo'=>'Detalle de'])

</div>

@endsection