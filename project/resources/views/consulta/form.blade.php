
<h1 id="JornadaTitulo">{{$modo}} Consulta</h1>

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
           
            @foreach ($Consulta as $Beneficiario)
                <li><a class="dropdown-item">{{$Beneficiario->id}} {{$Beneficiario->nombreBeneficiario}}</a></li>
            @endforeach

        </ul>
      </div> --}}
      <tbody id="dynamic-row">
        @foreach ($Consulta as $Consulta)
        <tr>
            <td>{{$Consulta->id}}</td>

            <td>{{$Consulta->fecha}}</td>

            <td>{{$Consulta->padecimiento}}</td>

            <td>{{$Consulta->TAbrazoDerecho}}</td>

            <td>{{$Consulta->TAbrazoIzquierdo}}</td>

            <td>{{$Consulta->frecuenciaCardiaca}}</td>

            <td>{{$Consulta->frecuenciaRespiratoria}}</td>

            <td>{{$Consulta->temperatura}}</td>

            <td>{{$Consulta->peso}}</td>

            <td>{{$Consulta->talla}}</td>

            <td>{{$Consulta->cabezaCuello}}</td>

            <td>{{$Consulta->torax}}</td>

            <td>{{$Consulta->abdomen}}</td>

            <td>{{$Consulta->extremidades}}</td>

            <td>{{$Consulta->estadoMentalNeurologico}}</td>
            
            <td>{{$Consulta->observaciones}}</td>

            <td>{{$Consulta->diagnostico}}</td>

            <td>{{$Consulta->tratamiento}}</td>

            <td>
                <a href="{{url('/consulta/'.$Consulta->id)}}" class="btn btn-primary">
                    Consultar
                </a>
                <a href="{{url('/consulta/'.$Consulta->id.'/edit')}}" class="btn btn-warning">
                    Editar
                </a>
                 
                <form action="{{url('/consulta/'.$Consulta->id)}}" class="d-inline" method="post">
                    @csrf
                    {{ @method_field('DELETE') }}
                    <input type="submit" onclick="return confirm('¿Quieres borrar la Consulta?')"  class="btn btn-danger" value="Borrar">
                </form> 
            </td>
        </tr>
        @endforeach
    </tbody>
</div>
<div class="form-group">
    <label for="Fecha">Fecha</label>
    <input class="date form-control" type="date" name="fecha" value="{{ isset($consulta->fecha)?$consulta->fecha:old('fecha') }}" id="fecha">    
</div>

<div class="form-group">
    <label for="padecimiento">Padecimiento</label>
    {{-- <input type="text-area"class="form-control" name="padecimiento" value="{{ isset($consulta->localidad)?$consulta->padecimiento:old('padecimiento') }}" id="padecimietno">  --}}
    <textarea class="form-control" id="exampleFormControlTextarea1" name="padecimiento" value="{{ isset($consulta->localidad)?$consulta->padecimiento:old('padecimiento') }}" id="padecimiento" rows="4"></textarea>
</div>

<div class="form-group">
    <label for="TAbrazoDerechos">T.A. Brazo Derecho</label>
    {{-- <input type="text"class="form-control" name="TAbrazoDerechos" value="{{ isset($consulta->localidad)?$consulta->TAbrazoDerechos:old('TAbrazoDerechos') }}" id="TAbrazoDerechos"> --}}
    <input type="text"class="form-control" name="TAbrazoDerechos" value="{{ isset($consulta->localidad)?$consulta->TAbrazoDerechos:old('TAbrazoDerechos') }}" id="TAbrazoDerechos" placeholder="T.A. Brazo Derecho">
</div>

<div class="form-group">
    <label for="TAbrazoIzquierdo">T.A. Brazo Izquierdo</label>
    {{-- <input type="text"class="form-control" name="TAbrazoIzquierdo" value="{{ isset($consulta->localidad)?$consulta->TAbrazoIzquierdo:old('TAbrazoIzquierdo') }}" id="TAbrazoIzquierdo"> --}}
    <input type="text"class="form-control" name="TAbrazoIzquierdo" value="{{ isset($consulta->localidad)?$consulta->TAbrazoIzquierdo:old('TAbrazoIzquierdo') }}" id="TAbrazoIzquierdo" placeholder="T.A. Brazo Izquierdo">
</div>

<div class="form-group">
    <label for="frecuenciaCardiaca">Frecuencia Cardiaca</label>
    {{-- <input type="text"class="form-control" name="frecuenciaCardiaca" value="{{ isset($consulta->localidad)?$consulta->frecuenciaCardiaca:old('frecuenciaCardiaca') }}" id="frecuenciaCardiaca"> --}}
    <input type="text"class="form-control" name="frecuenciaCardiaca" value="{{ isset($consulta->localidad)?$consulta->frecuenciaCardiaca:old('frecuenciaCardiaca') }}" id="frecuenciaCardiaca" placeholder="Frecuencia Cardiaca">
</div>

<div class="form-group">
    <label for="frecuenciaRespiratoria">Frecuencia Respiratoria</label>
    {{-- <input type="text"class="form-control" name="frecuenciaRespiratoria" value="{{ isset($consulta->localidad)?$consulta->frecuenciaRespiratorias:old('frecuenciaRespiratoria') }}" id="frecuenciaRespiratoria"> --}}
    <input type="text"class="form-control" name="frecuenciaRespiratoria" value="{{ isset($consulta->localidad)?$consulta->frecuenciaRespiratoria:old('frecuenciaRespiratoria') }}" id="frecuenciaRespiratoria" placeholder="Frecuencia Respiratoria">
</div>

<div class="form-group">
    <label for="temperatura">Temperatura</label>
    {{-- <input type="text"class="form-control" name="temperatura" value="{{ isset($consulta->localidad)?$consulta->temperatura:old('temperatura') }}" id="temperatura"> --}}
    <input type="text"class="form-control" name="temperatura" value="{{ isset($consulta->localidad)?$consulta->temperatura:old('temperaturas') }}" id="temperatura" placeholder="Temperatura">
</div>

<div class="form-group">
    <label for="peso">Peso</label>
    {{-- <input type="text"class="form-control" name="peso" value="{{ isset($consulta->localidad)?$consulta->peso:old('peso') }}" id="peso"> --}}
    <input type="text"class="form-control" name="peso" value="{{ isset($consulta->localidad)?$consulta->peso:old('peso') }}" id="peso" placeholder="Peso">
</div>

<div class="form-group">
    <label for="talla">Talla</label>
    {{-- <input type="text"class="form-control" name="talla" value="{{ isset($consulta->localidad)?$consulta->talla:old('talla') }}" id="talla"> --}}
    <input type="text"class="form-control" name="talla" value="{{ isset($consulta->localidad)?$consulta->talla:old('talla') }}" id="talla" placeholder="Talla">
</div>

<div class="form-group">
    <label for="cabezaCuello">Cabeza y Cuello</label>
    {{-- <input type="text"class="form-control" name="cabezaCuello" value="{{ isset($consulta->localidad)?$consulta->cabezaCuello:old('cabezaCuello') }}" id="cabezaCuello"> --}}
    <input type="text"class="form-control" name="cabezaCuello" value="{{ isset($consulta->localidad)?$consulta->cabezaCuello:old('cabezaCuello') }}" id="cabezaCuello" placeholder="Cabeza y Cuello">
</div>

<div class="form-group">
    <label for="torax">Tórax</label>
    {{-- <input type="text"class="form-control" name="torax" value="{{ isset($consulta->localidad)?$consulta->torax:old('torax') }}" id="torax"> --}}
    <input type="text"class="form-control" name="torax" value="{{ isset($consulta->localidad)?$consulta->torax:old('torax') }}" id="torax" placeholder="Cabeza y Cuello">
</div>

<div class="form-group">
    <label for="abdomen">Abdomen</label>
    {{-- <input type="text"class="form-control" name="abdomen" value="{{ isset($consulta->localidad)?$consulta->abdomen:old('abdomen') }}" id="abdomen"> --}}
    <input type="text"class="form-control" name="abdomen" value="{{ isset($consulta->localidad)?$consulta->abdomen:old('abdomen') }}" id="abdomen" placeholder="Abdomen">
</div>

<div class="form-group">
    <label for="extremidades">Extremidades</label>
    {{-- <input type="text"class="form-control" name="extremidades" value="{{ isset($consulta->localidad)?$consulta->extremidades:old('extremidades') }}" id="extremidades"> --}}
    <input type="text"class="form-control" name="extremidades" value="{{ isset($consulta->localidad)?$consulta->extremidades:old('extremidades') }}" id="extremidades" placeholder="Extremidades">
</div>

<div class="form-group">
    <label for="estadoMentalNeurologico">Estado Mental y Neurologico</label>
    {{-- <input type="text-area"class="form-control" name="estadoMentalNeurologico" value="{{ isset($consulta->localidad)?$consulta->estadoMentalNeurologico:old('estadoMentalNeurologico') }}" id="estadoMentalNeurologico">  --}}
    <textarea class="form-control" id="exampleFormControlTextarea1" name="estadoMentalNeurologico" value="{{ isset($consulta->localidad)?$consulta->estadoMentalNeurologico:old('estadoMentalNeurologico') }}" id="estadoMentalNeurologico" rows="4"></textarea>
</div>

<div class="form-group">
    <label for="observaciones">Observaciones</label>
    {{-- <input type="text-area"class="form-control" name="observaciones" value="{{ isset($consulta->localidad)?$consulta->observaciones:old('observaciones') }}" id="observaciones">  --}}
    <textarea class="form-control" id="exampleFormControlTextarea1" name="observaciones" value="{{ isset($consulta->localidad)?$consulta->observaciones:old('observaciones') }}" id="observaciones" rows="4"></textarea>
</div>

<div class="form-group">
    <label for="diagnostico">Diagnóstico</label>
    {{-- <input type="text-area"class="form-control" name="diagnostico" value="{{ isset($consulta->localidad)?$consulta->diagnostico:old('diagnostico') }}" id="diagnostico">  --}}
    <textarea class="form-control" id="exampleFormControlTextarea1" name="diagnostico" value="{{ isset($consulta->localidad)?$consulta->diagnostico:old('diagnostico') }}" id="diagnostico" rows="4"></textarea>
</div>

<div class="form-group">
    <label for="tratamiento">Tratamiento</label>
    {{-- <input type="text-area"class="form-control" name="tratamiento" value="{{ isset($consulta->localidad)?$consulta->tratamiento:old('tratamiento') }}" id="tratamiento">  --}}
    <textarea class="form-control" id="exampleFormControlTextarea1" name="tratamiento" value="{{ isset($consulta->localidad)?$consulta->tratamiento:old('tratamiento') }}" id="tratamiento" rows="4"></textarea>
</div>



<input class="btn btn-success" type="submit" value="{{$modo}} datos">

<a href="{{ url('beneficiario') }}" class="btn btn-primary"> Regresar </a>

<script type="text/javascript">
    $('.date').datepicker({  
       format: 'yyyy-mm-dd'
     });  
</script> 