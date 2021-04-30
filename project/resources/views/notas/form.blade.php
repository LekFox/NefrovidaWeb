
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
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

{{-- <div class="form-group">
    <label for="beneficiario_id">id</label>
    <input class="form-control" name="beneficiario_id" value="{{$id}}" id="beneficiario_id">    
</div> --}}

<div class="form-group">
    {{-- <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
          Dropdown button
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
           
            @foreach ($Notas as $Beneficiario)
                <li><a class="dropdown-item">{{$Beneficiario->id}} {{$Beneficiario->nombreBeneficiario}}</a></li>
            @endforeach

        </ul>
      </div> --}}
      <tbody id="dynamic-row">
        @foreach ($Notas as $Notas)
        <tr>
            <td>{{$Notas->id}}</td>

            <td>{{$Notas->fecha}}</td>
            <td>{{$Notas->comentario}}</td>
            <td>
                <a href="{{url('/notas/'.$Notas->id)}}" class="btn btn-primary">
                    Consultar
                </a>
                <a href="{{url('/notas/'.$Notas->id.'/edit')}}" class="btn btn-warning">
                    Editar
                </a>
                 
                <form action="{{url('/notas/'.$Notas->id)}}" class="d-inline" method="post">
                    @csrf
                    {{ @method_field('DELETE') }}
                    <input type="submit" onclick="return confirm('¿Quieres borrar la Notas?')"  class="btn btn-danger" value="Borrar">
                </form> 
            </td>
        </tr>
        @endforeach 
    </tbody>
</div>
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