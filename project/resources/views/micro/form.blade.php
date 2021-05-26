
@if (count($errors)>0)
    
    <div class="alert alert-danger" role="alert">
        <ul>
        @foreach($errors->all() as $error)
            <li> {{$error}} </li>
        @endforeach 
        </ul>
    </div>
    
@endif

   
<h1 id="AntecedentesTitulo" class="text-center bluenefro"><i class="bi bi-eyedropper"></i> {{$mode}} Microalbuminuría de {{ $beneficiario->nombreBeneficiario }}</h1>
<a href="{{ url('/beneficiario/'.$beneficiario->id.'/analisislab') }}" class="btn btn-primary"><i class="bi bi-arrow-left"></i> Regresar </a>
<br>
<br>

<input type="hidden" value = "{{$beneficiario->id}}" id = "beneficiario_id" name = "beneficiario_id">

<div class="form-row">
    <div class="col-4">
    </div>
    <div class="col-2">
    </div>
    <div class="col-4">
    <div class="d-flex justify-content-center">
        <p class="font-weight-bold">Valores de referencia</p>
    </div>
    </div>
</div>

<!--<x-labInput label = "Glucosa" : min = "70" : max = "100"/>-->
<div class="form-row">
    <div class="col-4">
        <label for="nombre">Micro Albumina</label>
    </div>
    <div class="col-2">
    </div>
    <div class="col-4">
    </div>
</div>
<div class="form-row">
    <div class="col-4">
        <input type="number" class="form-control" placeholder="Micro Albumina" id="microalbumina" name="microalbumina" >
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

<div class="form-row">
    <div class="col-4">
        <label for="nombre">Creatinina</label>
    </div>
    <div class="col-2">
    </div>
    <div class="col-4">
    </div>
</div>
<div class="form-row">
    <div class="col-4">
        <input type="number" class="form-control" placeholder="Creatinina" id="creatinina" name="creatinina">
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
   

<div class="form-row">
    <div class="col-4">
        <label for="nombre">Albumina/Creatinina</label>
    </div>
    <div class="col-2">
    </div>
    <div class="col-4">
    </div>
</div>
<div class="form-row">
    <div class="col-4">
        <input type="number" class="form-control" placeholder="Albumina/Creatinina" id="microalbuminaCreatinina" name="microalbuminaCreatinina" >
    </div>
    <div class="col-2">
    </div>
    <div class="col-4">
        <div class="d-flex justify-content-center">
            <p class="font-weight-bold">Normal</p>
        </div>
        <div class="d-flex justify-content-center">
            <div class="form-group row">
                <div class="col-3">
                    <input class="form-control" type="text" placeholder="0.00" disabled>
                </div>
                <div class="col-0">
                    <div class="d-flex justify-content-center">
                        <p>-</p>
                    </div>
                </div>
                <div class="col-3">
                    <input class="form-control" type="text" placeholder="30.00" disabled>
                </div>
                <div class="col-5">
                    <p>mg/g</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="form-row">
    <div class="col-4">
    <div class="d-flex justify-content-center">
        <p class="font-weight-bold">Anormal</p>
    </div>
    </div>
    <div class="col-2">
    </div>
    <div class="col-4">
        <div class="d-flex justify-content-center">
            <div class="form-group row">
                <div class="col-3">
                    <input class="form-control" type="text" placeholder="30.00" disabled>
                </div>
                <div class="col-0">
                    <div class="d-flex justify-content-center">
                        <p>-</p>
                    </div>
                </div>
                <div class="col-3">
                    <input class="form-control" type="text" placeholder="300.00" disabled>
                </div>
                <div class="col-5">
                    <p>mg/g</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="form-row">
    <div class="col-4">
    <div class="d-flex justify-content-center">
        <p class="font-weight-bold">Anormal Alto</p>
    </div>
    </div>
    <div class="col-2">
    </div>
    <div class="col-4">
        <div class="d-flex justify-content-center">
            <div class="form-group row">
                <div class="col-3">
                    <input class="form-control" type="text" placeholder="300.00" disabled>
                </div>
                <div class="col-0">
                    <div class="d-flex justify-content-center">
                        <p>-</p>
                    </div>
                </div>
                <div class="col-3">
                    <input class="form-control" type="text" placeholder="Mayor" disabled>
                </div>
                <div class="col-5">
                    <p>mg/g</p>
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
        <input type="text" class="form-control" placeholder="Metodo" id="metodo" name="metodo" >
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
