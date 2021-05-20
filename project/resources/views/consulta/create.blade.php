@extends('layouts.app')

@section('content')

@include('sidebar.beneficiario')

<div class="container"><form action="{{url('/beneficiario/'.$beneficiario->id.'/consulta')}}" method="post">
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

  
  <h1 id="consultaTitulo" class="text-center bluenefro"><i class="bi bi-person-lines-fill"></i> Registrar Consulta</h1>
  <a href="{{ url()->previous() }}" class="btn btn-primary"><i class="bi bi-arrow-left"></i> Regresar </a>
  
  
  <div class="container mt-3">
    <div class="stepwizard col">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step">
                <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                <p><i class="bi bi-person-square"></i> Padecimiento Actual</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                <p><i class="bi bi-person-square"></i> Exploración Física</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                <p><i class="bi bi-people-fill"></i> Estado Neurológico y Mental</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
                <p><i class="bi bi-journal-medical"></i> Otros</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-5" type="button" class="btn btn-default btn-circle" disabled="disabled">5</a>
                <p><i class="bi bi-journal-medical"></i> Diagnostico y Plan de Tratamiento</p>
            </div>
        </div>
    </div>
    <form role="form" action="" method="post">
    <div class="row setup-content" id="step-1">
          <div class="col">
                </div>
                <div class="col">
                    <div class="col">
                        <h3 class="text-center"><i class="bi bi-person-square"></i> Padecimiento Actual</h3>
                        <br>
                        <h5>Describa el Padecimiento Actual del Beneficiario</h5>
                        <div class="form-group">
                          <textarea class="form-control" id="padecimiento" name="padecimiento" maxlength="400" rows="3"></textarea>
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
        <div class="row setup-content" id="step-2">
          <div class="col">
                </div>
                <div class="col">
                    <div class="col">
                        <h3 class="text-center"><i class="bi bi-person-square"></i> Exploración Física</h3>
                        <br>
                        <h5>T.A. Brazo Derecho:</h5>
                        <div class="form-group">
                          <textarea class="form-control" id="brazoD" name="brazoD" maxlength="50" rows="1"></textarea>
                        </div>
                        <br>
                        <h5>T.A. Brazo Izquierdo:</h5>
                        <div class="form-group">
                          <textarea class="form-control" id="brazoI" name="brazoI" maxlength="50" rows="1"></textarea>
                        </div>
                        <br>
                        <h5>Frecuencia Cardíaca:</h5>
                        <div class="form-group">
                          <textarea class="form-control" id="fCardiaca" name="fCardiaca" maxlength="50" rows="1"></textarea>
                        </div>
                        <br>
                        <h5>Frecuencia Respiratoria:</h5>
                        <div class="form-group">
                          <textarea class="form-control" id="fRespiratoria" name="fRespiratoria" maxlength="50" rows="1"></textarea>
                        </div>
                        <br>
                        <h5>Temperatura:</h5>
                        <div class="form-group">
                          <textarea class="form-control" id="temperatura" name="temperatura" maxlength="50" rows="1"></textarea>
                        </div>
                        <br>
                        <h5>Peso:</h5>
                        <div class="form-group">
                          <textarea class="form-control" id="peso" name="peso" maxlength="50" rows="1"></textarea>
                        </div>
                        <h5>Talla:</h5>
                        <div class="form-group">
                          <textarea class="form-control" id="talla" name="talla" maxlength="50" rows="1"></textarea>
                        </div>
                        <br>
                        <h5>Cabeza y Cuello:</h5>
                        <div class="form-group">
                          <textarea class="form-control" id="cabezaCuello" name="cabezaCuello" maxlength="50" rows="1"></textarea>
                        </div>
                        <br>
                        <h5>Torax:</h5>
                        <div class="form-group">
                          <textarea class="form-control" id="torax" name="torax" maxlength="50" rows="1"></textarea>
                        </div>
                        <br>
                        <h5>Abdomen:</h5>
                        <div class="form-group">
                          <textarea class="form-control" id="abdomen" name="abdomen" maxlength="50" rows="1"></textarea>
                        </div>
                        <br>
                        <h5>Extremidades:</h5>
                        <div class="form-group">
                          <textarea class="form-control" id="extremidades" name="extremidades" maxlength="50" rows="1"></textarea>
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
                        <h3 class="text-center"><i class="bi bi-person-square"></i> Estado Neurológico y Mental</h3>
                        <br>
                        <h5>Describa el Estado Neurológico y Mental del Beneficiario</h5>
                        <div class="form-group">
                          <textarea class="form-control" id="mental" name="mental" maxlength="400" rows="3"></textarea>
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
        <div class="row setup-content" id="step-4">
          <div class="col">
                </div>
                <div class="col">
                    <div class="col">
                        <h3 class="text-center"><i class="bi bi-person-square"></i> Otros</h3>
                        <br>
                        <h5>Observaciones</h5>
                        <div class="form-group">
                          <textarea class="form-control" id="obervaciones" name="observaciones" maxlength="400" rows="3"></textarea>
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
        <div class="row setup-content" id="step-5">
          <div class="col">
                </div>
                <div class="col">
                    <div class="col">
                        <h3 class="text-center"><i class="bi bi-person-square"></i> Diagnósticos y Plan de Tratamiento</h3>
                        <br>
                        <h5>Diagnósticos</h5>
                        <div class="form-group">
                          <textarea class="form-control" id="diagnostico" name="diagnostico" maxlength="400" rows="3"></textarea>
                        </div>
                        <br>
                        <h5>Tratamiento</h5>
                        <div class="form-group">
                          <textarea class="form-control" id="tratamiento" name="tratamiento" maxlength="400" rows="3"></textarea>
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
    </form>
</div>

 

  <br>

  
  <script type="text/javascript">
      $('.date').datepicker({  
         format: 'yyyy-mm-dd'
       });  
  </script>
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