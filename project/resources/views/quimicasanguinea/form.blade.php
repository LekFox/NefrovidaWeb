
@if (count($errors)>0)
    
    <div class="alert alert-danger" role="alert">
        <ul>
        @foreach($errors->all() as $error)
            <li> {{$error}} </li>
        @endforeach 
        </ul>
    </div>
    
@endif

<h1 id="AntecedentesTitulo" class="text-center bluenefro"><i class="bi bi-eyedropper"></i> {{$mode}} Química Sanguinea de {{ $beneficiario->nombreBeneficiario }}</h1>
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

<div class="form-row">
    <div class="col-4">
        <label for="nombre">Glucosa</label>
    </div>
    <div class="col-2">
    </div>
    <div class="col-4">
    </div>
</div>
<div class="form-row">
    <div class="col-4">
        <textarea type="number" class="form-control" placeholder="Glucosa" id="Glucosa" name="Glucosa" maxlength="200" rows="1" ></textarea>
    </div>
    <div class="col-2">
    </div>
    <div class="col-4">
        <div class="d-flex justify-content-center">
            <div class="form-row">
                <div class="col-4">
                    <input class="form-control" type="text" placeholder="70" disabled>
                </div>
                <div class="col-1">
                    <div class="d-flex justify-content-center">
                        <p>-</p>
                    </div>
                </div>
                <div class="col-4">
                    <input class="form-control" type="text" placeholder="100" disabled>
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
        <label for="nombre">Urea</label>
    </div>
    <div class="col-2">
    </div>
    <div class="col-4">
    </div>
</div>
<div class="form-row">
    <div class="col-4">
        <textarea type="number" class="form-control" placeholder="Urea" id="Urea" name="Urea" maxlength="200" rows="1" ></textarea>
    </div>
    <div class="col-2">
    </div>
    <div class="col-4">
        <div class="d-flex justify-content-center">
            <div class="form-row">
                <div class="col-4">
                    <input class="form-control" type="text" placeholder="15" disabled>
                </div>
                <div class="col-1">
                    <div class="d-flex justify-content-center">
                        <p>-</p>
                    </div>
                </div>
                <div class="col-4">
                    <input class="form-control" type="text" placeholder="45" disabled>
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
        <label for="nombre">Bun</label>
    </div>
    <div class="col-2">
    </div>
    <div class="col-4">
    </div>
</div>
<div class="form-row">
    <div class="col-4">
        <textarea type="number" class="form-control" placeholder="Bun" id="Bun" name="Bun" maxlength="200" rows="1" ></textarea>
    </div>
    <div class="col-2">
    </div>
    <div class="col-4">
        <div class="d-flex justify-content-center">
            <div class="form-row">
                <div class="col-4">
                    <input class="form-control" type="text" placeholder="7" disabled>
                </div>
                <div class="col-1">
                    <div class="d-flex justify-content-center">
                        <p>-</p>
                    </div>
                </div>
                <div class="col-4">
                    <input class="form-control" type="text" placeholder="15" disabled>
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
        <textarea type="number" class="form-control" placeholder="Creatina" id="Creatina" name="Creatina" maxlength="200" rows="1" ></textarea>
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

<div class="form-row">
    <div class="col-4">
    </div>
    <div class="col-2">
    </div>
    <div class="col-4">
        <div class="d-flex justify-content-center">
            <div class="form-group row">
                <div class="col-3">
                    <input class="form-control" type="text" placeholder="0.30" disabled>
                </div>
                <div class="col-0">
                    <div class="d-flex justify-content-center">
                        <p>-</p>
                    </div>
                </div>
                <div class="col-3">
                    <input class="form-control" type="text" placeholder="0.50" disabled>
                </div>
                <div class="col-5">
                    <p>mg/dL 4-7 años</p>
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
                    <input class="form-control" type="text" placeholder="0.60" disabled>
                </div>
                <div class="col-0">
                    <div class="d-flex justify-content-center">
                        <p>-</p>
                    </div>
                </div>
                <div class="col-3">
                    <input class="form-control" type="text" placeholder="0.80" disabled>
                </div>
                <div class="col-5">
                    <p>mg/dL 8-10 años</p>
                </div>
            </div>
        </div>
    </div>
</div>

<br>
<br>

<div class="form-row">
    <div class="col-4">
        <label for="nombre">Acido Urico</label>
    </div>
    <div class="col-2">
    </div>
    <div class="col-4">
    </div>
</div>
<div class="form-row">
    <div class="col-4">
        <textarea type="number" class="form-control" placeholder="Acido Urico" id="acidoUrico" name="acidoUrico" maxlength="200" rows="1" ></textarea>
    </div>
    <div class="col-2">
    </div>
    <div class="col-4">
        <div class="d-flex justify-content-center">
            <div class="form-group row">
                <div class="col-3">
                    <input class="form-control" type="text" placeholder="2.4" disabled>
                </div>
                <div class="col-0">
                    <div class="d-flex justify-content-center">
                        <p>-</p>
                    </div>
                </div>
                <div class="col-3">
                    <input class="form-control" type="text" placeholder="6" disabled>
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
                    <input class="form-control" type="text" placeholder="3.4" disabled>
                </div>
                <div class="col-0">
                    <div class="d-flex justify-content-center">
                        <p>-</p>
                    </div>
                </div>
                <div class="col-3">
                    <input class="form-control" type="text" placeholder="7" disabled>
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
        <label for="nombre">Colesterol Total</label>
    </div>
    <div class="col-2">
    </div>
    <div class="col-4">
    </div>
</div>
<div class="form-row">
    <div class="col-4">
        <textarea type="number" class="form-control" placeholder="Colesterol Total" id="colesterolTotal" name="colesterolTotal" maxlength="200" rows="1" ></textarea>
    </div>
    <div class="col-2">
    </div>
    <div class="col-4">
        <div class="d-flex justify-content-center">
            <div class="form-row">
                <div class="col-4">
                    <input class="form-control" type="text" placeholder="2.4" disabled>
                </div>
                <div class="col-1">
                    <div class="d-flex justify-content-center">
                        <p>-</p>
                    </div>
                </div>
                <div class="col-4">
                    <input class="form-control" type="text" placeholder="6" disabled>
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
        <label for="nombre">Trigliceridos</label>
    </div>
    <div class="col-2">
    </div>
    <div class="col-4">
    </div>
</div>
<div class="form-row">
    <div class="col-4">
        <textarea type="number" class="form-control" placeholder="Trigliceridos" id="trigliceridos" name="trigliceridos" maxlength="200" rows="1" ></textarea>
    </div>
    <div class="col-2">
    </div>
    <div class="col-4">
        <div class="d-flex justify-content-center">
            <div class="form-row">
                <div class="col-4">
                    <input class="form-control" type="text" placeholder="2.4" disabled>
                </div>
                <div class="col-1">
                    <div class="d-flex justify-content-center">
                        <p>-</p>
                    </div>
                </div>
                <div class="col-4">
                    <input class="form-control" type="text" placeholder="6" disabled>
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
        <input type="text" class="form-control" placeholder="Metodo" id="Metodo" name="Metodo" value = "Colorimétrico">
    </div>
    <div class="col-2">
    </div>
</div>

<br>
<br>

<div class="form-group">
    <div class="row">
        <div class="col">
            <label for="Fecha">Fecha de laboratorio</label>
            <input class="date form-control" type="date" name="fecharegistro" id="fecharegistro">    
        </div>
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

  <script type="text/javascript">
      $('.date').datepicker({  
         format: 'yyyy-mm-dd'
       });  
  </script>
