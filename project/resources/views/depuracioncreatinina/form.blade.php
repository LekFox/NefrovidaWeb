
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

<br>
<br>

<div class="form-row">
    <div class="col-4">
        <label for="nombre">Creatinina en Suero</label>
    </div>
    <div class="col-2">
    </div>
    <div class="col-4">
    </div>
</div>
<div class="form-row">
    <div class="col-4">
        <input type="number" class="form-control" placeholder="Creatinina en Suero" id="creatininaSuero" name="creatininaSuero" >
    </div>
    <div class="col-2">
    </div>
    <div class="col-4">
        <div class="d-flex justify-content-center">
            <div class="form-group row">
                <div class="col-3">
                    <input class="form-control" type="text" placeholder="0.5" disabled>
                </div>
                <div class="col-0">
                    <div class="d-flex justify-content-center">
                        <p>-</p>
                    </div>
                </div>
                <div class="col-3">
                    <input class="form-control" type="text" placeholder="1" disabled>
                </div>
                <div class="col-5">
                    <p>mg/dL Mujeres</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="form-row">
    <div class="col-4">
    </div>
    <div class="col-2">
    </div>
    <div class="col-4">
        <div class="d-flex justify-content-center">
            <div class="form-group row">
                <div class="col-3">
                    <input class="form-control" type="text" placeholder="0.7" disabled>
                </div>
                <div class="col-0">
                    <div class="d-flex justify-content-center">
                        <p>-</p>
                    </div>
                </div>
                <div class="col-3">
                    <input class="form-control" type="text" placeholder="1.2" disabled>
                </div>
                <div class="col-5">
                    <p>mg/dL Hombres</p>
                </div>
            </div>
        </div>
    </div>
</div>

<br>
<br>

<div class="form-row">
    <div class="col-4">
        <label for="nombre">Depuración de Creatinina</label>
    </div>
    <div class="col-2">
    </div>
    <div class="col-4">
    </div>
</div>
<div class="form-row">
    <div class="col-4">
        <input type="number" class="form-control" placeholder="Depuración de Creatina" id="creatininaDepuracion" name="creatininaDepuracion" >
    </div>
    <div class="col-2">
    </div>
    <div class="col-4">
        <div class="d-flex justify-content-center">
            <div class="form-group row">
                <div class="col-3">
                    <input class="form-control" type="text" placeholder="88" disabled>
                </div>
                <div class="col-0">
                    <div class="d-flex justify-content-center">
                        <p>-</p>
                    </div>
                </div>
                <div class="col-3">
                    <input class="form-control" type="text" placeholder="128" disabled>
                </div>
                <div class="col-5">
                    <p>mg/dL Mujeres</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="form-row">
    <div class="col-4">
    </div>
    <div class="col-2">
    </div>
    <div class="col-4">
        <div class="d-flex justify-content-center">
            <div class="form-group row">
                <div class="col-3">
                    <input class="form-control" type="text" placeholder="97" disabled>
                </div>
                <div class="col-0">
                    <div class="d-flex justify-content-center">
                        <p>-</p>
                    </div>
                </div>
                <div class="col-3">
                    <input class="form-control" type="text" placeholder="137" disabled>
                </div>
                <div class="col-5">
                    <p>mg/dL Hombres</p>
                </div>
            </div>
        </div>
    </div>
</div>

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
        <input type="text" class="form-control" placeholder="Metodo" id="Metodo" name="Metodo" >
    </div>
    <div class="col-2">
    </div>
</div>

<br>
<br>

<label for="comentario">Nota</label>
<div class="form-group">
    <textarea class="form-control" id="nota" name="nota" maxlength="200" rows="2"></textarea>
</div>

<br>

<div class="col text-center">
    <button class="btn btn-success" type="submit"><i class="bi bi-pencil-square"></i> Registrar</button>
</div>
