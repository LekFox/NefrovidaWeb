
<h1>{{$modo}} Jornada</h1>

@if (count($errors)>0)
    
    <div class="alert alert-danger" role="alert">
        <ul>
        @foreach($errors->all() as $error)
           <li> {{$error}} </li>
        @endforeach 
        </ul>
    </div>
    
@endif

<div class="form-group">

<label for="nombre">nombre</label>
<input type="text" class="form-control" name="nombre" value="{{ isset($Jornada->nombre)?$Jornada->nombre:old('nombre') }}" id="nombre">

</div>

<div class="form-group">
    <label for="Fecha">Fecha</label>
    <input type="date" placeholder="YYYY-MM-DD" class="form-control" name="fecha" value="{{ isset($Jornada->fecha)?$Jornada->fecha:old('fecha') }}" id="fecha">
    
</div>

<div class="form-group">
    <label for="localidad">Localidad</label>
    <input type="text"class="form-control" name="localidad" value="{{ isset($Jornada->localidad)?$Jornada->localidad:old('localidad') }}" id="localidad">
    
    </div>

<div class="form-group">
<label for="Municipio">Municipio</label>
<input type="text" class="form-control" name="municipio" value="{{ isset($Jornada->municipio)?$Jornada->municipio:old('municipio') }}" id="municipio">

</div>




<input class="btn btn-success" type="submit" value="{{$modo}} datos">

<a href="{{ url('jornada') }}" class="btn btn-primary"> Regresar </a>

