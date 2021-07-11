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
    
    @include('tamizaje.card',['modo'=>'Detalle de'])
    
    @include('evaluacion.index')
    @include('evaluacionFinal.index')

    @include('analisislab.card',['modo'=>'Index de'])

    @include('antecedentes.card',['modo'=>'Detalle de'])

    @include('factorDeRiesgo.index')
    @include('consulta.card',['id'=>$id])
    @include('nefropediatria.card',['id'=>$id])
   
   
    @include('nutriologia.card',['id'=>$id])

    @include('notaspsic.index',['id'=>$id])

    @include('notas.index',['id'=>$id])
    @include('evidencia.card',['id'=>$id])
    
    
    

</div>

@endsection