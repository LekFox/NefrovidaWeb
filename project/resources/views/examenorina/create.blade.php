@extends('layouts.app')

@section('content')

@include('sidebar.beneficiario')

<div class="container"><form action="{{url('/beneficiario/'.$beneficiario->id.'/examenorina')}}" method="post">
  @csrf
  
  {{-- @include('notas.form',['modo'=>'Crear'],['id'=>'2']) --}}

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

  
  <h1 id="AntecedentesTitulo" class="text-center bluenefro"><i class="bi bi-eyedropper"></i> Registrar Examen General de Orina de {{ $beneficiario->nombreBeneficiario }}</h1>
  <a href="{{ url('/beneficiario/'.$beneficiario->id.'/analisislab') }}" class="btn btn-primary"><i class="bi bi-arrow-left"></i> Regresar </a>
  <br>
  <br>

<div>
<div class= "row">
      <div class = "col-1">
      </div>
      <div class = "col">
        <h3 class="text-center">Examen Macroscópico</h3>
      </div>
      <div class = "col-3">
      </div>
    </div>
  <div class="form-row">
    <div class="col-4">
      <label for="nombre">Color</label>
    </div>
    <div class="col-2">
      </div>
    <div class="col-4">
      <label for="nombre">Aspecto</label>
    </div>
  </div>
  <div class="form-row">
      <div class="col-4">
        <input type="hidden" id="beneficiario_id" name="beneficiario_id" value="{{ $beneficiario->id }}">
        <textarea class="form-control" id="color" name="color" maxlength="200" rows="2">{{ isset($examenorina->color)?$examenorina->color:old('color') }}</textarea>
      </div>
      <div class="col-2">
      </div>
      <div class="col-4">
      <textarea class="form-control" id="aspecto" name="aspecto" maxlength="200" rows="2">{{ isset($examenorina->aspecto)?$examenorina->aspecto:old('aspecto') }}</textarea>
      </div>
    </div>
    <br>
    <div class= "row">
      <div class = "col-1">
      </div>
      <div class = "col">
        <h3 class="text-center">Examen Químico</h3>
      </div>
      <div class = "col-3">
      </div>
    </div>
    <div class="form-row">
    <div class="col-4">
      <label for="nombre">PH</label>
    </div>
    <div class="col-2">
      </div>
    <div class="col-4">
      <label for="nombre">Densidad</label>
    </div>
  </div>
  <div class="form-row">
      <div class="col-4">
        <input type="number" class="form-control" placeholder="PH" id="ph" name="ph" value="{{ isset($examenorina->ph)?$examenorina->ph:old('ph') }}">
      </div>
      <div class="col-2">
      </div>
      <div class="col-4">
        <input type="number" class="form-control" placeholder="Densidad" id="densidad" name="densidad" value="{{ isset($examenorina->densidad)?$examenorina->densidad:old('densidad') }}">
      </div>
    </div>
    <br>
    <div class="form-row">
    <div class="col-4">
      <label for="nombre">Nitritos</label>
    </div>
    <div class="col-2">
      </div>
    <div class="col-4">
      <label for="nombre">Glucosa</label>
    </div>
  </div>
  <div class="form-row">
      <div class="col-4">
        <textarea class="form-control" id="nitritos" name="nitritos" maxlength="200" rows="1">{{ isset($examenorina->nitritos)?$examenorina->nitritos:old('nitritos') }}</textarea>
      </div>
      <div class="col-2">
      </div>
      <div class="col-4">
      <textarea class="form-control" id="glucosa" name="glucosa" maxlength="200" rows="1">{{ isset($examenorina->glucosa)?$examenorina->glucosa:old('glucosa') }}</textarea>
      </div>
    </div>
    <br>
    <div class="form-row">
    <div class="col-4">
      <label for="nombre">Proteínas</label>
    </div>
    <div class="col-2">
      </div>
    <div class="col-4">
      <label for="nombre">Hemoglobina</label>
    </div>
  </div>
  <div class="form-row">
      <div class="col-4">
        <textarea class="form-control" id="proteinas" name="proteinas" maxlength="200" rows="1">{{ isset($examenorina->proteinas)?$examenorina->proteinas:old('proteinas') }}</textarea>
      </div>
      <div class="col-2">
      </div>
      <div class="col-4">
      <textarea class="form-control" id="hemoglobina" name="hemoglobina" maxlength="200" rows="1">{{ isset($examenorina->hemoglobina)?$examenorina->hemoglobina:old('hemoglobina') }}</textarea>
      </div>
    </div>
    <br>
    <div class="form-row">
    <div class="col-4">
      <label for="nombre">Cuerpos cetónicos</label>
    </div>
    <div class="col-2">
      </div>
    <div class="col-4">
      <label for="nombre">Bilirrubina</label>
    </div>
  </div>
  <div class="form-row">
      <div class="col-4">
        <textarea class="form-control" id="cuerposCetonicos" name="cuerposCetonicos" maxlength="200" rows="1">{{ isset($examenorina->cuerposCetonicos)?$examenorina->cuerposCetonicos:old('cuerposCetonicos') }}</textarea>
      </div>
      <div class="col-2">
      </div>
      <div class="col-4">
      <textarea class="form-control" id="bilirribuna" name="bilirribuna" maxlength="200" rows="1">{{ isset($examenorina->bilirribuna)?$examenorina->bilirribuna:old('bilirribuna') }}</textarea>
      </div>
    </div>
    <br>
    <div class="form-row">
    <div class="col-4">
      <label for="nombre">Urobilinógeno</label>
    </div>
    <div class="col-2">
      </div>
    <div class="col-4">
      <label for="nombre">Leucocitos</label>
    </div>
  </div>
  <div class="form-row">
      <div class="col-4">
        <textarea class="form-control" id="urobilinogeno" name="urobilinogeno" maxlength="200" rows="1">{{ isset($examenorina->urobilinogeno)?$examenorina->urobilinogeno:old('urobilinogeno') }}</textarea>
      </div>
      <div class="col-2">
      </div>
      <div class="col-4">
      <textarea class="form-control" id="leucocitos" name="leucocitos" maxlength="200" rows="1">{{ isset($examenorina->leucocitos)?$examenorina->leucocitos:old('leucocitos') }}</textarea>
      </div>
    </div>
    <br>
    <div class= "row">
      <div class = "col-1">
      </div>
      <div class = "col">
        <h3 class="text-center">Observaciones Microscópicas</h3>
      </div>
      <div class = "col-3">
      </div>
    </div>
    <div class="form-row">
    <div class="col-4">
      <label for="nombre">Eritrocitos Intactos</label>
    </div>
    <div class="col-2">
      </div>
    <div class="col-4">
      <label for="nombre">Eritrocitos Crenados</label>
    </div>
  </div>
  <div class="form-row">
      <div class="col-4">
        <textarea class="form-control" id="eritrocitosIntactos" name="eritrocitosIntactos" maxlength="200" rows="1">{{ isset($examenorina->eritrocitosIntactos)?$examenorina->eritrocitosIntactos:old('eritrocitosIntactos') }}</textarea>
        <small id="cinturaHelp" class="form-text text-muted">/CPO.</small>
      </div>
      <div class="col-2">
      </div>
      <div class="col-4">
      <textarea class="form-control" id="eritrocitosCrenados" name="eritrocitosCrenados" maxlength="200" rows="1">{{ isset($examenorina->eritrocitosCrenados)?$examenorina->eritrocitosCrenados:old('eritrocitosCrenados') }}</textarea>
      <small id="cinturaHelp" class="form-text text-muted">/CPO.</small>
      </div>
  </div>
  <div class="form-row">
    <div class="col-4">
      <label for="nombre">Leucocitos</label>
    </div>
    <div class="col-2">
      </div>
    <div class="col-4">
      <label for="nombre">Cristales</label>
    </div>
  </div>
  <div class="form-row">
      <div class="col-4">
        <textarea class="form-control" id="observacionLeucocitos" name="observacionLeucocitos" maxlength="200" rows="1">{{ isset($examenorina->observacionLeucocitos)?$examenorina->observacionLeucocitos:old('observacionLeucocitos') }}</textarea>
        <small id="cinturaHelp" class="form-text text-muted">/CPO.</small>
      </div>
      <div class="col-2">
      </div>
      <div class="col-4">
      <textarea class="form-control" id="cristales" name="cristales" maxlength="200" rows="1">{{ isset($examenorina->cristales)?$examenorina->cristales:old('cristales') }}</textarea>
      <small id="cinturaHelp" class="form-text text-muted">/CPO.</small>
      </div>
  </div>
  <div class="form-row">
    <div class="col-4">
      <label for="nombre">Cilindros</label>
    </div>
    <div class="col-2">
      </div>
    <div class="col-4">
      <label for="nombre">Células Epiteliales</label>
    </div>
  </div>
  <div class="form-row">
      <div class="col-4">
        <textarea class="form-control" id="cilindros" name="cilindros" maxlength="200" rows="1">{{ isset($examenorina->cilindros)?$examenorina->cilindros:old('cilindros') }}</textarea>
        <small id="cinturaHelp" class="form-text text-muted">/CPO.</small>
      </div>
      <div class="col-2">
      </div>
      <div class="col-4">
      <textarea class="form-control" id="celulasEpiteliales" name="celulasEpiteliales" maxlength="200" rows="1">{{ isset($examenorina->celulasEpiteliales)?$examenorina->celulasEpiteliales:old('celulasEpiteliales') }}</textarea>
      <small id="cinturaHelp" class="form-text text-muted">/CPO.</small>
      </div>
  </div>
  <div class="form-row">
    <div class="col-4">
      <label for="nombre">Bacterias</label>
    </div>
    <div class="col-2">
      </div>
    <div class="col-4">
     
    </div>
  </div>
  <div class="form-row">
      <div class="col-4">
        <textarea class="form-control" id="bacterias" name="bacterias" maxlength="200" rows="1">{{ isset($examenorina->bacterias)?$examenorina->bacterias:old('bacterias') }}</textarea>
      </div>
      <div class="col-2">
      </div>
      <div class="col-4">
      
      </div>
  </div>

      <label for="comentario">Método</label>
      <div class="form-group">
      <textarea class="form-control" id="metodo" name="metodo" maxlength="200" rows="1">{{ isset($examenorina->metodo)?$examenorina->metodo:old('metodo') }}</textarea>
      </div>
      <label for="comentario">Observaciones</label>
      <div class="form-group">
      <textarea class="form-control" id="observaciones" name="observaciones" maxlength="200" rows="2">{{ isset($examenorina->observaciones)?$examenorina->observaciones:old('observaciones') }}</textarea>
      </div>
      <label for="comentario">Nota</label>
      <div class="form-group">
      <textarea class="form-control" id="nota" name="nota" maxlength="200" rows="2">{{ isset($examenorina->nota)?$examenorina->nota:old('nota') }}</textarea>
      </div>
    <div class="col text-center">
        <button class="btn btn-success" type="submit"><i class="bi bi-pencil-square"></i> Registrar</button>
    </div>
</div>



  <br>

  
  <script type="text/javascript">
      $('.date').datepicker({  
         format: 'yyyy-mm-dd'
       });  
  </script>

</form>
</div>
@endsection