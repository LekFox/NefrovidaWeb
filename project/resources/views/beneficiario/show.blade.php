@extends('layouts.app')

@section('content')

@include('sidebar.beneficiario')

<div class="container">
    @csrf
    {{ method_field('PATCH') }}
    @include('beneficiario.card',['modo'=>'Detalle de'])
    @include('antecedentes.card',['modo'=>'Detalle de'])
    @include('notas.index',['id'=>$id])
    @include('evaluacion.index')

</div>

@endsection