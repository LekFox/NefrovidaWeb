@extends('layouts.app')

@section('content')

@include('sidebar.beneficiario')

<div class="container">
    @csrf
    {{ method_field('PATCH') }}
    @include('beneficiario.card',['modo'=>'Detalle de'])

</div>

@endsection