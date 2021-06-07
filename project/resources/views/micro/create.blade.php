@extends('layouts.app')

@section('content')

@include('sidebar.beneficiario')

<div class="container"><form action="{{url('/beneficiario/'.$beneficiario->id.'/micro')}}" method="post">
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

  
  <h1 id="AntecedentesTitulo" class="text-center bluenefro"><i class="bi bi-eyedropper"></i> Registrar Análisis de {{ $beneficiario->nombreBeneficiario }}</h1>
  <br>
  <a href="{{ url('/beneficiario/'.$beneficiario->id.'/analisislab') }}" class="btn btn-primary"><i class="bi bi-arrow-left"></i> Regresar </a>
  <br>
  <br>

<div>
<div class= "row">
      <div class = "col-1">
      </div>
      <div class = "col">
        <h3 class="text-center">Análisis de Microalbuminuria</h3>
      </div>
      <div class = "col-3">
      </div>
</div>

<br>

<div class="form-row">
    <div class="col-2">
    </div>
    <div class="col-6">
        <div class="form-group">
            <label for="fecha">Fecha Análisis</label>
            <input class="date form-control" type="date" name="fecha" value="{{ isset($micro->fecha)?$micro->fecha:old('fecha') }}" id="fecha">    
        </div>
    </div>
    <div class="col-4">
    </div>
</div>
<br>

<div class="form-row">
    <div class="col-4">
    </div>
    <div class="col-1">
    </div>
    <div class="col-5">
    <div class="d-flex justify-content-center">
        <p class="font-weight-bold">Valores de Referencia</p>
    </div>
    </div>
</div>

<input type="hidden" id="beneficiario_id" name="beneficiario_id" value="{{ $beneficiario->id }}">

<div class="form-row">
    <div class="col-4">
        <label for="nombre">Micro Albumina (mg/dL)</label>
    </div>
    <div class="col-2">
    </div>
    <div class="col-4">
    </div>
</div>
<div class="form-row">
    <div class="col-4">
        <input type="number" placeholder="0.00" step="0.01" min="0.00" class="form-control" name="microalbumina" id="microalbumina" rows="1">
    </div>
    <div class="col-2">
    </div>
    <div class="col-4">
        <div class="d-flex justify-content-center">
            <div class="form-row">
                <div class="col-4">
                    <input class="form-control" type="text" placeholder="0.00" disabled>
                </div>
                <div class="col-1">
                    <div class="d-flex justify-content-center">
                        <p>-</p>
                    </div>
                </div>
                <div class="col-4">
                    <input class="form-control" type="text" placeholder="30.00" disabled>
                </div>
                <div class="col-3">
                    <p>mg/dL</p>
                </div>
            </div>
        </div>
    </div>
</div>

<br>
<br>
<br>

<div class="form-row">
    <div class="col-4">
        <label for="nombre">Creatinina (mg/dL)</label>
    </div>
    <div class="col-2">
    </div>
    <div class="col-4">
    </div>
</div>
<div class="form-row">
    <div class="col-4">
        <input type="number" placeholder="0.00" step="0.01" min="0.00" class="form-control" name="creatinina" id="creatinina" rows="1">
    </div>
    <div class="col-2">
    </div>
    <div class="col-4">
        <div class="d-flex justify-content-center">
            <div class="form-row">
                <div class="col-4">
                    <input class="form-control" type="text" placeholder="10.00" disabled>
                </div>
                <div class="col-1">
                    <div class="d-flex justify-content-center">
                        <p>-</p>
                    </div>
                </div>
                <div class="col-4">
                    <input class="form-control" type="text" placeholder="300.00" disabled>
                </div>
                <div class="col-3">
                    <p>mg/dL</p>
                </div>
            </div>
        </div>
    </div>
</div>

<br>
<br>
<br>


<div class="form-row">
    <div class="col-4">
        <label for="nombre">Albumina/Creatinina (mg/g)</label>
    </div>
    <div class="col-2">
    </div>
    <div class="col-4">
    </div>
</div>
<div class="form-row">
    <div class="col-4">
        <input class="form-control" type="text" placeholder="Calculo Autmático"  rows="1" disabled>
    </div>
    <div class="col-2">
        <div class="d-flex justify-content-center">
            <p class="font-weight-bold">Normal</p>
        </div>
    </div>
    <div class="col-4">
        <div class="d-flex justify-content-center">
            <div class="form-row">
                <div class="col-4">
                    <input class="form-control" type="text" placeholder="0.00" disabled>
                </div>
                <div class="col-1">
                    <div class="d-flex justify-content-center">
                        <p>-</p>
                    </div>
                </div>
                <div class="col-4">
                    <input class="form-control" type="text" placeholder="30.00" disabled>
                </div>
                <div class="col-3">
                    <p>mg/g</p>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    
    <div class="col-4">
    </div>
    <div class="col-2">
        <div class="d-flex justify-content-center">
            <p class="font-weight-bold">Anormal</p>
        </div>
    </div>
    <div class="col-4">
        <div class="d-flex justify-content-center">
            <div class="form-row">
                <div class="col-4">
                    <input class="form-control" type="text" placeholder="30.00" disabled>
                </div>
                <div class="col-1">
                    <div class="d-flex justify-content-center">
                        <p>-</p>
                    </div>
                </div>
                <div class="col-4">
                    <input class="form-control" type="text" placeholder="300.00" disabled>
                </div>
                <div class="col-3">
                    <p>mg/g</p>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>

    <div class="col-4">
    </div>
    <div class="col-2">
        <div class="d-flex justify-content-center">
            <p class="font-weight-bold">Anormal</p>
        </div>
    </div>
    <div class="col-4">
        <div class="d-flex justify-content-center">
            <div class="form-row">
                <div class="col-4">
                    <input class="form-control" type="text" placeholder="300.00" disabled>
                </div>
                <div class="col-1">
                    <div class="d-flex justify-content-center">
                        <p>-</p>
                    </div>
                </div>
                <div class="col-4">
                    <input class="form-control" type="text" placeholder="Mayor" disabled>
                </div>
                <div class="col-3">
                    <p>mg/g</p>
                </div>
            </div>
        </div>
    </div>
</div>

<br>
<br>
<br>

<div class="form-row">
    <div class="col-4">
    </div>
    <div class="col-2">
        <div class="d-flex justify-content-center">
            <label for="nombre">Método</label>
        </div>
    </div>
    <div class="col-4">
    </div>
</div>

<div class="form-row">
    <div class="col-2">
    </div>
    <div class="col-6">
        <input type="text" class="form-control" placeholder="Método" id="metodo" name="metodo" >
    </div>
    <div class="col-2">
    </div>
</div>

<br>
<br>
<br>

<label for="comentario">Nota</label>
<div class="form-group">
    <textarea class="form-control" placeholder="Nota" id="nota" name="nota" maxlength="500" rows="5"></textarea>
</div>

<br>

<div class="col text-center">
    <button class="btn btn-success" type="submit"><i class="bi bi-pencil-square"></i> Registrar</button>
</div>


<br>

  
  <!-- <script type="text/javascript">
      $('.date').datepicker({  
         format: 'yyyy-mm-dd'
       });  
  </script> -->

</form>
</div>
@endsection