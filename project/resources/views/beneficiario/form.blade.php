<h1 id="JornadaTitulo">{{$modo}} Beneficiario</h1>

@if (count($errors)>0)
    
    <div class="alert alert-danger" role="alert">
        <ul>
        @foreach($errors->all() as $error)
           <li> {{$error}} </li>
        @endforeach 
        </ul>
    </div>
    
@endif

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css"/>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

<div class="form-group">

<label for="nombreBeneficiario">Nombre</label>
<input type="text" class="form-control" name="nombreBeneficiario" value="" id="nombreBeneficiario">

</div>
@if(empty($jornadas))
  <fieldset disabled>
@endif

<div class="form-group">

<label for="jornada">Jornada</label>
    @if(empty($jornadas))
        <select id="disabledSelect" class="custom-select">
        <option selected>No existen jornadas</option>
    @else
        <select name="jornada" class="custom-select">
        <option selected>Seleccione la jornada</option>
    @endif
    @foreach($jornadas as $jornada)
        <option value="$jornada['id']">{{$jornada['nombre']}}</option>
    @endforeach
</select>

</div>
@if(empty($jornadas))
  </fieldset>
@endif

<div class="form-group">
    <label for="fechaNacimiento">Fecha de nacimiento</label>
    <input class="date form-control" type="date" name="fechaNacimiento" value="" id="fechaNacimiento">    
</div>

<div class="form-group">
<label for="direccion">Dirección</label>
<input type="text" class="form-control" name="direccion" value="" id="direccion">

</div>

<div class="form-group">
<label for="telefono">Número de telefono</label>
<input type="text" class="form-control" name="telefono" value="" id="telefono">

</div>

<div class="form-group">
    <label for="sexo">Sexo</label>
    <select name="sexo" class="custom-select" id="sexo">
        <option value="1">Hombre</option>
        <option value="2">Mujer</option>
    </select>
</div>

<div class="form-group">
    <label for="escolaridade_id">Escolaridad</label>
    <select name="escolaridade_id" class="custom-select" id="escolaridade_id">
        <option value="1">Primaria</option>
        <option value="2">Secundaria</option>
        <option value="3">Preparatoria</option>
        <option value="4">Licenciatura</option>
        <option value="5">Ninguno</option>
    </select>
</div>

<div class="form-group">
    <label for="estatus">Estatus</label>
    <select name="estatus" class="custom-select" id="estatus">
        <option value="1">Activo</option>
        <option value="2">Inactivo</option>
    </select>
</div>

<!--
<div class="m-3">
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="1" id="defaultCheck1">
  <label class="form-check-label" for="defaultCheck1">
    De seguimiento
  </label>
</div>
</div>
-->

<input class="btn btn-success" type="submit" value="{{$modo}} datos">

<a href="{{ url('beneficiario') }}" class="btn btn-primary"> Regresar </a>

<script type="text/javascript">
    $('.date').datepicker({  
       format: 'yyyy-mm-dd'
     });  
</script> 