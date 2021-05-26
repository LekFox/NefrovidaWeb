
@if (count($errors)>0)
    
    <div class="alert alert-danger" role="alert">
        <ul>
        @foreach($errors->all() as $error)
            <li> {{$error}} </li>
        @endforeach 
        </ul>
    </div>
    
@endif

<h1 id="AntecedentesTitulo" class="text-center bluenefro"><i class="bi bi-eyedropper"></i> {{$mode}} Depuración de Creatinina en Orina de 24 Hrs de {{ $beneficiario->nombreBeneficiario }}</h1>
<a href="{{ url('/beneficiario/'.$beneficiario->id.'/analisislab') }}" class="btn btn-primary"><i class="bi bi-arrow-left"></i> Regresar </a>
<br>
<br>

<input type="hidden" value = "{{$beneficiario->id}}" id = "beneficiario_id" name = "beneficiario_id">

<div class= "row">
    <div class = "col-1">
    </div>
    <div class = "col">
    <h3 class="text-center">Examen de Orina de</h3>
    </div>
    <div class = "col-3">
    </div>
</div>
<br>
<div class="form-row">
    <div class="col-4">
        <label for="nombre">Talla</label>
    </div>
    <div class="col-2">
    </div>
    <div class="col-4">
        <label for="nombre">Peso</label>
    </div>
</div>
<div class="form-row">
    <div class="col-4">
        <input type="number" class="form-control" placeholder="Talla" id="talla" name="talla" >
    </div>
    <div class="col-2">
    </div>
    <div class="col-4">
    <input type="number" class="form-control" placeholder="Peso" id="peso" name="peso" >
    </div>
</div>
    
<br>
<br>
<div class="form-row">
    <div class="col-4">
        <label for="nombre">Volumen</label>
    </div>
    <div class="col-2">
    </div>
    <div class="col-4">
        <label for="nombre">Superficie Corporal</label>
    </div>
</div>
<div class="form-row">
    <div class="col-4">
        <input type="number" class="form-control" placeholder="Volumen" id="volumen" name="volumen" >
    </div>
    <div class="col-2">
    </div>
    <div class="col-4">
        <input type="number" class="form-control" placeholder="Superficie Corporal" id="superficieCorporal" name="superficieCorporal" >
    </div>
</div>