@extends('layouts.app')

@section('content')

@include('sidebar.beneficiario')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css"/>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

@if (isset($beneficiario))
  <div class="container"><form action="{{url('/beneficiario/'.$beneficiario->id.'/quimicasanguinea')}}" method="post">
    @include('quimicasanguinea.form',['mode'=>'Registrar'])
@elseif (isset($quimicasanguinea))
  <div class="container"><form action="{{url('/quimicasanguinea/'.$quimicasanguinea->id.'/edit')}}" method="post">
    @method('PUT')
    @include('quimicasanguinea.edit',['mode'=>'Editar'])
@else
  <div class="container"><form action="{{url('/beneficiario/'.$beneficiario->id.'/quimicasanguinea')}}" method="post">
    @include('quimicasanguinea.form',['mode'=>'Registrar'])
@endif
  @csrf

<!--<div>-->


  <br>

  
  <script type="text/javascript">
      $('.date').datepicker({  
         format: 'yyyy-mm-dd'
       });  
  </script>

</form>
</div>
@endsection