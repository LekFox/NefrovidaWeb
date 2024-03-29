@cannot('nutriologo', App\Models\User::class)
@if (count($errors)>0)
    
    <div class="alert alert-danger" role="alert">
        <ul>
        @foreach($errors->all() as $error)
            <li> {{$error}} </li>
        @endforeach 
        </ul>
    </div>
    
@endif

<h1 id="AntecedentesTitulo" class="text-center bluenefro"><i class="bi bi-eyedropper"></i> {{$mode}} Depuración de Creatinina en Orina de 24 Hrs de {{ $depuracioncreatinina->beneficiario->nombreBeneficiario }}</h1>
<a href="{{ url('/depuracioncreatinina/'.$depuracioncreatinina->id) }}" class="btn btn-primary"><i class="bi bi-arrow-left"></i> Regresar </a>
<br>
<br>

<input type="hidden" value = "{{$depuracioncreatinina->id}}" id = "depuracioncreatinina_id" name = "depuracioncreatinina_id">

<div class= "row">
    <div class = "col-1">
    </div>
    <div class = "col">
    <h3 class="text-center"></h3>
    </div>
    <div class = "col-3">
    </div>
</div>
<br>

<div class="form-group">
    <div class="row">
        <div class="col">
            <label for="Fecha">Fecha de laboratorio</label>
            <input class="date form-control" type="date" name="fecharegistro" value="{{isset($depuracioncreatinina) && $depuracioncreatinina->fecharegistro != NULL ? $depuracioncreatinina->fecharegistro: ''}}" id="fecharegistro">
        </div>
    </div>
</div>

<br>
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
        <textarea type="number" class="form-control" placeholder="Talla (cm)" id="talla" name="talla" maxlength="200" rows="1" >{{ isset($depuracioncreatinina->talla) ? $depuracioncreatinina->talla: '' }}</textarea>
    </div>
    <div class="col-2">
    </div>
    <div class="col-4">
    <textarea type="number" class="form-control" placeholder="Peso (kg)" id="peso" name="peso" maxlength="200" rows="1">{{ isset($depuracioncreatinina->peso) ? $depuracioncreatinina->peso: '' }}</textarea>
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
        <textarea type="number" class="form-control" placeholder="Volumen (mL)" id="volumen" name="volumen" maxlength="200" rows="1">{{ isset($depuracioncreatinina->volumen) ? $depuracioncreatinina->volumen: '' }}</textarea>
    </div>
    <div class="col-2">
    </div>
    <div class="col-4">
        <textarea type="number" class="form-control" placeholder="Calculo automático" id="superficieCorporal" name="superficieCorporal" maxlength="200" rows="1">{{ isset($depuracioncreatinina->superficieCorporal) ? $depuracioncreatinina->superficieCorporal: '' }}</textarea>
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
        <textarea type="number" class="form-control" placeholder="Creatinina en Suero" id="creatininaSuero" name="creatininaSuero" maxlength="200" rows="1">{{ isset($depuracioncreatinina->creatininaSuero) ? $depuracioncreatinina->creatininaSuero: '' }}</textarea>
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
        <label for="nombre">Creatinina en Orina</label>
    </div>
    <div class="col-2">
    </div>
    <div class="col-4">
    </div>
</div>
<div class="form-row">
    <div class="col-4">
        <textarea type="number" class="form-control" placeholder="Creatinina en Orina" id="creatininaOrina" name="creatininaOrina" maxlength="200" rows="1">{{ isset($depuracioncreatinina->creatininaOrina) ? $depuracioncreatinina->creatininaOrina: '' }}</textarea>
    </div>
    <div class="col-2">
    </div>
    <div class="col-4">
        <div class="d-flex justify-content-center">
            <div class="form-group row">
                <div class="col-3">
                    <input class="form-control" type="text" placeholder="28" disabled>
                </div>
                <div class="col-0">
                    <div class="d-flex justify-content-center">
                        <p>-</p>
                    </div>
                </div>
                <div class="col-3">
                    <input class="form-control" type="text" placeholder="217" disabled>
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
                    <input class="form-control" type="text" placeholder="39" disabled>
                </div>
                <div class="col-0">
                    <div class="d-flex justify-content-center">
                        <p>-</p>
                    </div>
                </div>
                <div class="col-3">
                    <input class="form-control" type="text" placeholder="259" disabled>
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
        <textarea type="number" class="form-control" placeholder="Calculo automático" id="creatininaDepuracion" name="creatininaDepuracion" maxlength="200" rows="1">{{ isset($depuracioncreatinina->creatininaDepuracion) ? $depuracioncreatinina->creatininaDepuracion: '' }}</textarea>
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
                    <p>ml/min Mujeres</p>
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
                    <p>ml/min Hombres</p>
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
        <input type="text" class="form-control" placeholder="Metodo" id="Metodo" name="Metodo" value="{{ isset($depuracioncreatinina->metodo) ? $depuracioncreatinina->metodo: '' }}">
    </div>
    <div class="col-2">
    </div>
</div>

<br>
<br>

<label for="comentario">Nota</label>
<div class="form-group">
    <textarea class="form-control" id="nota" name="nota" maxlength="200" rows="2">{{ isset($depuracioncreatinina->nota) ? $depuracioncreatinina->nota: '' }}</textarea>
</div>

<br>

<div class="col text-center">
    <button class="btn btn-success" type="submit"><i class="bi bi-pencil-square"></i>Guardar</button>
</div>
@else

<div class="container">
<br><br><br><br><br><br>
    <h2 class="text-center">ERROR: El personal de nutriología no puede editar registros de depuración de creatinina, contacte al administrador.</h2>
</div>
@endif

<!--<script type="text/javascript">
    $('.date').datepicker({  
        format: 'yyyy-mm-dd'
    }); 
</script>-->

