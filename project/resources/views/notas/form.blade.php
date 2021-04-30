
<h1 id="JornadaTitulo">{{$modo}} Nota</h1>

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
    <label for="Fecha">Fecha</label>
    <input class="date form-control" type="date" name="fecha" value="{{ isset($notas->fecha)?$notas->fecha:old('fecha') }}" id="fecha">    
</div>

<div class="form-group">
    <label for="comentario">Comentario</label>
    {{-- <input type="text-area"class="form-control" name="comentario" value="{{ isset($notas->localidad)?$notas->comentario:old('comentario') }}" id="comentario">  --}}
    <textarea class="form-control" id="exampleFormControlTextarea1" name="comentario" value="{{ isset($notas->localidad)?$notas->comentario:old('comentario') }}" id="comentario" rows="6"></textarea>
   
</div>

<input class="btn btn-success" type="submit" value="{{$modo}} datos">

<a href="{{ url('beneficiario') }}" class="btn btn-primary"> Regresar </a>

<script type="text/javascript">
    $('.date').datepicker({  
       format: 'yyyy-mm-dd'
     });  
</script> 