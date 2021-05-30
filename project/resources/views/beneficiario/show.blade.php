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
    @csrf
    {{ method_field('PATCH') }}
    @include('beneficiario.card',['modo'=>'Detalle de'])
    @include('antecedentes.card',['modo'=>'Detalle de'])
    @include('notas.index',['id'=>$id])
    @include('consulta.card',['id'=>$id])
    @include('nefropediatria.card',['id'=>$id])
    @include('nutriologia.card',['id'=>$id])
    @include('tamizaje.card',['modo'=>'Detalle de'])
    @include('analisislab.card',['modo'=>'Index de'])
    @include('factorDeRiesgo.index')
    @include('evidencia.card',['id'=>$id])
    @include('evaluacion.index')
    @include('evaluacionFinal.index')
    
    

</div>

@endsection