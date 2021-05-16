<h1 id="JornadaTitulo" class="bluenefro"><i class="bi bi-person-plus-fill"></i> {{$modo}} Beneficiario</h1>

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

<a href="{{ url('beneficiario') }}" class="btn btn-primary"><i class="bi bi-arrow-left"></i> Regresar </a>
<br><br>

<div class="form-group">

<label for="nombreBeneficiario">Nombre</label>
<input type="text" class="form-control" name="nombreBeneficiario" value="" id="nombreBeneficiario">

</div>
@if(empty($jornadas))
  <fieldset disabled>
@endif

<div class="form-group">

<label for="jornada_id">Jornada</label>
    @if(empty($jornadas))
        <select id="disabledSelect" class="custom-select">
        <option selected>No existen jornadas</option>
    @else
        <select name="jornada_id" id="jornada_id" class="custom-select">
        <option selected>Seleccione la jornada</option>
    @endif
    @foreach($jornadas as $jornada)
        <option value={{$jornada['id']}}>{{$jornada['nombre']}}</option>
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
        <option value="Hombre">Hombre</option>
        <option value="Mujer">Mujer</option>
    </select>
</div>

<div class="form-group">
    <label for="escolaridade_id">Escolaridad</label>
    <select name="escolaridade_id" class="custom-select" id="escolaridade_id">
        <option value="1">Preparatoria</option>
        <option value="2">Primaria</option>
        <option value="3">Secundaria</option>
        <option value="4">Universidad</option>
        <option value="5">Maestría</option>
        <option value="6">Analfabeta</option>
    </select>
</div>

<div class="form-group">
    <label for="estatus">Estatus</label>
    <select name="estatus" class="custom-select" id="estatus">
        <option value="Activo">Activo</option>
        <option value="Inactivo">Inactivo</option>
    </select>
</div>

<div class="form-group">
    <label for="estatus">De seguimiento</label>
    <select name="seguimiento" class="custom-select" id="seguimiento">
        <option value="1">Sí</option>
        <option value="0">No</option>
    </select>
</div>

<!--
    //Aun no estamos seguro que tipo de información es estatus

<div class="m-3">
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="1" id="defaultCheck1">
  <label class="form-check-label" for="defaultCheck1">
    De seguimiento
  </label>
</div>
</div>
-->

<div class="col text-center">
    <button class="btn btn-success btn-lg" type="submit"><i class="bi bi-pencil-square"></i> {{$modo}}</button>
</div>

<script type="text/javascript">
    $('.date').datepicker({  
       format: 'yyyy-mm-dd'
     });  
</script> 