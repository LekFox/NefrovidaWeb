@extends('layouts.app')

@section('content')

@include('sidebar.beneficiario')

<div class="container"><form action="{{url('/antecedentes/'.$antecedentes->id)}}" method="post">
  @csrf
    {{ method_field('PATCH') }}

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

  
  <h1 id="AntecedentesTitulo" class="text-center bluenefro"><i class="bi bi-person-lines-fill"></i> Editar Historia Clínica de {{ $antecedentes->beneficiario->nombreBeneficiario }}</h1>
  <a href="{{ url('/antecedentes/'.$antecedentes->id) }}" class="btn btn-primary"><i class="bi bi-arrow-left"></i> Regresar </a>
  
  
  <div class="container mt-3">
    <div id="none" class="stepwizard col">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step">
                <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                <p><i class="bi bi-house-fill"></i> Datos de Vivienda</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                <p><i class="bi bi-person-square"></i> Antecedentes Personales</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                <p><i class="bi bi-people-fill"></i> Antecedentes Familiares</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
                <p><i class="bi bi-journal-medical"></i> Antecedentes Gineco-obstétricos</p>
            </div>
        </div>
    </div>
    <form role="form" action="" method="post">
        <div class="row setup-content" id="step-1">
            <div class="col">
                
            </div>
            <div class="col">
                <div class="col">
                    <h3 class="text-center"><i class="bi bi-house-fill"></i> Datos de Vivienda</h3>
                    <br>
                    <input type="hidden" id="id" name="id" value="{{ $antecedentes->id }}">
                    <h5>Vive en casa:</h5>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="casa" id="casa" value="propia"
                      @if($antecedentes->casa == "propia") checked @endif>
                      <label class="form-check-label" for="propia">
                        Propia
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="casa" id="casa" value="rentada"
                      @if($antecedentes->casa == "rentada") checked @endif>
                      <label class="form-check-label" for="rentada">
                        Rentada
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="casa" id="casa" value="prestada"
                      @if($antecedentes->casa == "prestada") checked @endif>
                      <label class="form-check-label" for="prestada">
                        Prestada
                      </label>
                    </div>
                    <br>
                    <h5>Servicios básicos:</h5>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="serviciosBasicos" id="serviciosBasicos" value="1"
                      @if($antecedentes->serviciosBasicos == "1") checked @endif>
                      <label class="form-check-label" for="si">
                        Sí
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="serviciosBasicos" id="serviciosBasicos" value="0"
                      @if($antecedentes->serviciosBasicos == "0") checked @endif>
                      <label class="form-check-label" for="no">
                        No
                      </label>
                    </div>
                    <br>
                    <div class="text-center">
                      <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Siguiente <i class="bi bi-chevron-right"></i></button>
                    </div>
                </div>
            </div>
            <div class="col">
            </div>
        </div>
        <div class="row setup-content" id="step-2">
          <div class="col">
                </div>
                <div class="col">
                    <div class="col">
                        <h3 class="text-center"><i class="bi bi-person-square"></i> Antecedentes Personales</h3>
                        <br>
                        <h5>Personales Patológicos:</h5>
                        <div class="form-group">
                          <textarea class="form-control" id="personalesPatologicos" name="personalesPatologicos" maxlength="400" rows="3">{{ isset($antecedentes->personalesPatologicos)?$antecedentes->personalesPatologicos:old('personalesPatologicos') }}</textarea>
                        </div>
                        <br>
                        <h5>Personales No Patológicos:</h5>
                        <div class="form-group">
                          <textarea class="form-control" id="personalesNoPatologicos" name="personalesNoPatologicos" maxlength="400" rows="3">{{ isset($antecedentes->personalesNoPatologicos)?$antecedentes->personalesNoPatologicos:old('personalesNoPatologicos') }}</textarea>
                        </div>
                        <br>
                        <div class="text-center">
                          <button class="btn btn-primary prevBtn btn-lg pull-left" type="button"><i class="bi bi-chevron-left"></i> Anterior</button>
                          <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Siguiente <i class="bi bi-chevron-right"></i></button>
                        </div>
                    </div>
                </div>
                <div class="col">
                </div>
        </div>
        <div class="row setup-content" id="step-3">
          <div class="col">
                </div>
                <div class="col">
                    <div class="col">
                        <h3 class="text-center"><i class="bi bi-people-fill"></i> Antecedentes Familiares</h3>
                        <br>
                        <h5>Padre vivo:</h5>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="padreVivo" id="padreVivo" value="1"
                          @if($antecedentes->padreVivo == "1") checked @endif>
                          <label class="form-check-label" for="si">
                            Sí
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="padreVivo" id="padreVivo" value="0"
                          @if($antecedentes->padreVivo == "0") checked @endif>
                          <label class="form-check-label" for="no">
                            No
                          </label>
                        </div>
                        <br>
                        <h5>Enfermedades del padre:</h5>
                        <div class="form-group">
                          <textarea class="form-control" id="enfermedadesPadre" name="enfermedadesPadre" maxlength="400" rows="3">{{ isset($antecedentes->enfermedadesPadre)?$antecedentes->enfermedadesPadre:old('enfermedadesPadre') }}</textarea>
                        </div>
                        <br>
                        <h5>Madre viva:</h5>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="madreVivo" id="madreVivo" value="1"
                          @if($antecedentes->madreVivo == "1") checked @endif>
                          <label class="form-check-label" for="si">
                            Sí
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="madreVivo" id="madreVivo" value="0"
                          @if($antecedentes->madreVivo == "0") checked @endif>
                          <label class="form-check-label" for="no">
                            No
                          </label>
                        </div>
                        <br>
                        <h5>Enfermedades de la madre:</h5>
                        <div class="form-group">
                          <textarea class="form-control" id="enfermedadesMadre" name="enfermedadesMadre" maxlength="400" rows="3">{{ isset($antecedentes->enfermedadesMadre)?$antecedentes->enfermedadesMadre:old('enfermedadesMadre') }}</textarea>
                        </div>
                        <br>
                        <h5>Número de hermanos:</h5>
                        <div class="form-group">
                          <input type="number" value="{{ isset($antecedentes->numHermanos)?$antecedentes->numHermanos:old('numHermanos') }}" class="form-control" id="numHermanos" name="numHermanos" placeholder="Número de hermanos">
                        </div>
                        <br>
                        <h5>Número de hermanos vivos:</h5>
                        <div class="form-group">
                          <input type="number" value="{{ isset($antecedentes->numHermanosVivos)?$antecedentes->numHermanosVivos:old('numHermanosVivos') }}" class="form-control" id="numHermanosVivos" name="numHermanosVivos" placeholder="Número de hermanos vivos">
                        </div>
                        <br>
                        <h5>Enfermedades de los hermanos:</h5>
                        <div class="form-group">
                          <textarea class="form-control" id="enfermedadesHermanos" name="enfermedadesHermanos" maxlength="400" rows="3">{{ isset($antecedentes->enfermedadesHermanos)?$antecedentes->enfermedadesHermanos:old('enfermedadesHermanos') }}</textarea>
                        </div>
                        <br>
                        <h5>Observaciones de los hermanos:</h5>
                        <div class="form-group">
                          <textarea class="form-control" id="otrosHermanos" name="otrosHermanos" maxlength="400" rows="3">{{ isset($antecedentes->otrosHermanos)?$antecedentes->otrosHermanos:old('otrosHermanos') }}</textarea>
                        </div>
                        <div class="text-center">
                          <button class="btn btn-primary prevBtn btn-lg pull-left" type="button"><i class="bi bi-chevron-left"></i> Anterior</button>
                          <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Siguiente <i class="bi bi-chevron-right"></i></button>
                        </div>
                    </div>
                </div>
                <div class="col">
                </div>
          </div>
        </div>
        <div class="row setup-content" id="step-4">
              <div class="col">
              </div>
              <div class="col">
                  <div class="col">
                      <h3 class="text-center"><i class="bi bi-journal-medical"></i> Antecedentes Gineco-obstétricos</h3>
                      <br>
                      <h5>Menarquia:</h5>
                        <div class="form-group">
                          <input type="number" value="{{ isset($antecedentes->menarquia)?$antecedentes->menarquia:old('menarquia') }}" class="form-control" id="menarquia" name="menarquia" placeholder="Edad de comienzo de menarquia">
                        </div>
                        <br>
                      <h5>Ritmo:</h5>
                        <div class="form-group">
                            <input type="number" value="{{ isset($antecedentes->ritmo)?$antecedentes->ritmo:old('ritmo') }}" class="form-control" id="ritmo" name="ritmo" placeholder="Ritmo">
                        </div>
                      <br>
                      <h5>F.U.M.:</h5>
                        <div class="form-group">
                            <input class="date form-control" value="{{ isset($antecedentes->fum)?$antecedentes->fum:old('fum') }}" type="date" name="fum" id="fum">    
                        </div>
                      <br>
                      <h5>Gestaciones:</h5>
                        <div class="form-group">
                            <input type="number" value="{{ isset($antecedentes->gestaciones)?$antecedentes->gestaciones:old('gestaciones') }}" class="form-control" id="gestaciones" name="gestaciones" placeholder="Número de gestaciones">
                        </div>
                      <br>
                      <h5>Partos:</h5>
                        <div class="form-group">
                            <input type="number" value="{{ isset($antecedentes->partos)?$antecedentes->partos:old('partos') }}" class="form-control" id="partos" name="partos" placeholder="Número de partos">
                        </div>
                      <br>
                      <h5>Abortos:</h5>
                        <div class="form-group">
                            <input type="number" value="{{ isset($antecedentes->abortos)?$antecedentes->abortos:old('abortos') }}" class="form-control" id="abortos" name="abortos" placeholder="Número de abortos">
                        </div>
                      <br>
                      <h5>Cesáreas:</h5>
                        <div class="form-group">
                            <input type="number" value="{{ isset($antecedentes->cesareas)?$antecedentes->cesareas:old('cesareas') }}" class="form-control" id="cesareas" name="cesareas" placeholder="Número de cesáreas">
                        </div>
                      <br>
                      <h5>I.V.S.A.:</h5>
                        <div class="form-group">
                            <input type="number" value="{{ isset($antecedentes->ivsa)?$antecedentes->ivsa:old('ivsa') }}" class="form-control" id="ivsa" name="ivsa" placeholder="Inicio de vida sexual activa">
                        </div>
                      <br>
                      <h5>Métodos anticonceptivos:</h5>
                        <div class="form-group">
                          <textarea class="form-control" id="metodosAnticonceptivos" name="metodosAnticonceptivos" maxlength="400" rows="3">{{ isset($antecedentes->metodosAnticonceptivos)?$antecedentes->metodosAnticonceptivos:old('metodosAnticonceptivos') }}</textarea>
                        </div>
                      <br>
                      <div class="text-center">
                        <button class="btn btn-primary prevBtn btn-lg pull-left" type="button"><i class="bi bi-chevron-left"></i> Anterior</button>
                          <button class="btn btn-success btn-lg pull-right" type="submit"><i class="bi bi-pencil-square"></i> Guardar</button>
                      </div>
                  </div>
              </div>
              <div class="col">
              </div>
        </div>
    </form>
</div>

 

  <br>

  
  {{-- <script type="text/javascript">
      $('.date').datepicker({  
         format: 'yyyy-mm-dd'
       });  
  </script> --}}
  <script>
   $(document).ready(function () {
  var navListItems = $('div.setup-panel div a'),
          allWells = $('.setup-content'),
          allNextBtn = $('.nextBtn'),
  		  allPrevBtn = $('.prevBtn');

  allWells.hide();

  navListItems.click(function (e) {
      e.preventDefault();
      var $target = $($(this).attr('href')),
              $item = $(this);

      if (!$item.hasClass('disabled')) {
          navListItems.removeClass('btn-primary').addClass('btn-default');
          $item.addClass('btn-primary');
          allWells.hide();
          $target.show();
          $target.find('input:eq(0)').focus();
      }
  });
  
  allPrevBtn.click(function(){
      var curStep = $(this).closest(".setup-content"),
          curStepBtn = curStep.attr("id"),
          prevStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().prev().children("a");

          prevStepWizard.removeAttr('disabled').trigger('click');
  });

  allNextBtn.click(function(){
      var curStep = $(this).closest(".setup-content"),
          curStepBtn = curStep.attr("id"),
          nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
          curInputs = curStep.find("input[type='text'],input[type='url']"),
          isValid = true;

      $(".form-group").removeClass("has-error");
      for(var i=0; i<curInputs.length; i++){
          if (!curInputs[i].validity.valid){
              isValid = false;
              $(curInputs[i]).closest(".form-group").addClass("has-error");
          }
      }

      if (isValid)
          nextStepWizard.removeAttr('disabled').trigger('click');
  });

  $('div.setup-panel div a.btn-primary').trigger('click');
});
  </script>

</form>
</div>
@endsection