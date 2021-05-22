@extends('layouts.app')

@section('content')

@include('sidebar.beneficiario')

<div class="container"><form action="{{url('/beneficiario/'.$beneficiario->id.'/consulta')}}" method="post">
  @csrf
  
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

  
  <h1 id="AntecedentesTitulo" class="text-center bluenefro"><i class="bi bi-heart"></i> Registrar Consulta</h1>
  <a href="{{url('/beneficiario/'.$beneficiario->id)}}" class="btn btn-primary"><i class="bi bi-arrow-left"></i> Regresar </a>

  
  <div class="container mt-3">
    <div class="stepwizard col">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step">
                <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                <p id="timeline"><i class="bi bi-clipboard"></i> Padecimiento</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                <p id="timeline"><i class="bi bi-clipboard"></i>Exploración Física</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                <p id="timeline"><i class="bi bi-clipboard"></i> Estado Neurológico y Mental </p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
                <p id="timeline"><i class="bi bi-clipboard"></i> Otros</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-5" type="button" class="btn btn-default btn-circle" disabled="disabled">5</a>
                <p id="timeline"><i class="bi bi-clipboard"></i>Diagnóstico y Plan de Tratamiento</p>
            </div>
        </div>
    </div>
    <br>
    <form role="form" action="" method="post">
        <div class="row setup-content" id="step-1">

            <div class="col-1">
            </div>
                <div class="col-10">
                    <h3 class="text-center"><i class="bi bi-clipboard"></i> Padecimiento</h3>
                    <br>
                    <input type="hidden" id="beneficiario_id" name="beneficiario_id" value="{{ $beneficiario->id }}">

                <div class="container">
                    <div class="form-group">
                        <label for="padecimiento">Padecimiento</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="padecimiento" value="{{ isset($consulta->padecimiento)?$consulta->padecimiento:old('padecimiento') }}" id="padecimiento" rows="6"></textarea>        
                    </div>
            <div class="col-1">
            </div>                    
                    <div class="text-center">
                      <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Siguiente <i class="bi bi-chevron-right"></i></button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row setup-content" id="step-2">
            <div class="col-1">
            </div>
            <h3 class="text-center"><i class="bi bi-clipboard"></i> Exploración Física</h3>
            <br>
            <div class="container">

            <div class="row">
                <div class="col-1">
                </div>
                <div class="col">


                    <div class="form-group">
                        <label for="brazoD">T.A. Brazo Derecho</label>
                        <input class="form-control" name="brazoD" value="{{ isset($consulta->brazoD)?$consulta->brazoD:old('brazoD') }}" id="brazoD" rows="6">
                    </div>

                    <div class="form-group">
                        <label for="fCardiaca">Frecuencia Cardíaca</label>
                        <input class="form-control" name="fCardiaca" value="{{ isset($consulta->fCardiaca)?$consulta->fCardiaca:old('fCardiaca') }}" id="fCardiaca" rows="6">
                    </div>

                    <div class="form-group">
                        <label for="temperatura">Temperatura</label>
                        <input class="form-control" name="temperatura" value="{{ isset($consulta->temperatura)?$consulta->temperatura:old('temperatura') }}" id="temperatura" rows="6">
                    </div>

                    <div class="form-group">
                        <label for="talla">Talla</label>
                        <input class="form-control" name="talla" value="{{ isset($consulta->talla)?$consulta->talla:old('talla') }}" id="talla" rows="6">
                    </div>

                    <div class="form-group">
                        <label for="cabeza">Cabeza y Cuello</label>
                        <input class="form-control" name="cabeza" value="{{ isset($consulta->cabeza)?$consulta->cabeza:old('cabeza') }}" id="cabeza" rows="6">
                    </div>

                    <div class="form-group">
                        <label for="abdomen">Abdomen</label>
                        <input class="form-control" name="abdomen" value="{{ isset($consulta->abdomen)?$consulta->abdomen:old('abdomen') }}" id="abdomen" rows="6">
                    </div>

                </div>

                <div class="col">

                    <div class="form-group">
                        <label for="brazoI">T.A. Brazo Izquierdo</label>
                        <input class="form-control" name="brazoI" value="{{ isset($consulta->brazoI)?$consulta->brazoI:old('brazoI') }}" id="brazoI" rows="6">
                    </div>

                    <div class="form-group">
                        <label for="fRespiratoria">Frecuencia Respiratoria</label>
                        <input class="form-control" name="fRespiratoria" value="{{ isset($consulta->fRespiratoria)?$consulta->fRespiratoriao:old('fRespiratoria') }}" id="fRespiratoria" rows="6">
                    </div>

                    <div class="form-group">
                        <label for="peso">Peso</label>
                        <input class="form-control" name="peso" value="{{ isset($consulta->peso)?$consulta->peso:old('peso') }}" id="peso" rows="6">
                    </div>

                    <div class="form-group">
                        <label for="torax">Torax</label>
                        <input class="form-control" name="torax" value="{{ isset($consulta->torax)?$consulta->torax:old('torax') }}" id="torax" rows="6">
                    </div>

                    <div class="form-group">
                        <label for="extremidades">Extremidades</label>
                        <input class="form-control" name="extremidades" value="{{ isset($consulta->extremidades)?$consulta->extremidades:old('extremidades') }}" id="extremidadess" rows="6">
                    </div>
                    
                </div>
                <div class="col-1">
                </div>
            </div>
        </div>
        <div class="text-center">
            <button class="btn btn-primary prevBtn btn-lg pull-left" type="button"><i class="bi bi-chevron-left"></i> Anterior</button>

            <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Siguiente <i class="bi bi-chevron-right"></i></button>
          </div>  
        </div>
        
        <div class="row setup-content" id="step-3">

            <div class="col-1">
            </div>
                <div class="col-10">
                    <h3 class="text-center"><i class="bi bi-clipboard"></i> Estado Neurológico y Mental</h3>

                <div class="container">
                    <div class="form-group">
                        <label for="mental">Estado Neurológico y Mental</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="mental" value="{{ isset($consulta->mental)?$consulta->mentalo:old('mental') }}" id="mental" rows="6"></textarea>        
                    </div>
                    <div class="text-center">
                      <button class="btn btn-primary prevBtn btn-lg pull-left" type="button"><i class="bi bi-chevron-left"></i> Anterior</button>
                        <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Siguiente <i class="bi bi-chevron-right"></i></button>
                    </div>
            <div class="col-1">
        </div>
               <div class="row setup-content" id="step-3">

            <div class="col-1">
            </div>
                <div class="col-10">
                    <h3 class="text-center"><i class="bi bi-clipboard"></i> Estado Neurológico y Mental</h3>

                <div class="container">
                    <div class="form-group">
                        <label for="mental">Estado Neurológico y Mental</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="mental" value="{{ isset($consulta->mental)?$consulta->mentalo:old('mental') }}" id="mental" rows="6"></textarea>        
                    </div>
                    <div class="text-center">
                      <button class="btn btn-primary prevBtn btn-lg pull-left" type="button"><i class="bi bi-chevron-left"></i> Anterior</button>
                        <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Siguiente <i class="bi bi-chevron-right"></i></button>
                    </div>
            <div class="col-1">
        </div>

               <div class="row setup-content" id="step-3">

            <div class="col-1">
            </div>
                <div class="col-10">
                    <h3 class="text-center"><i class="bi bi-clipboard"></i> Estado Neurológico y Mental</h3>

                <div class="container">
                    <div class="form-group">
                        <label for="mental">Estado Neurológico y Mental</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="mental" value="{{ isset($consulta->mental)?$consulta->mental:old('mental') }}" id="mental" rows="6"></textarea>        
                    </div>
                    <div class="text-center">
                        <button class="btn btn-primary prevBtn btn-lg pull-left" type="button"><i class="bi bi-chevron-left"></i> Anterior</button>
                        <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Siguiente <i class="bi bi-chevron-right"></i></button>
                    </div>
            <div class="col-1">
        </div>
        <div class="row setup-content" id="step-4">

            <div class="col-1">
            </div>
                <div class="col-10">
                    <h3 class="text-center"><i class="bi bi-clipboard"></i> Otros</h3>

                <div class="container">
                    <div class="form-group">
                        <label for="observaciones">Estado Neurológico y Mental</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="observaciones" value="{{ isset($consulta->observaciones)?$consulta->observaciones:old('observaciones') }}" id="observaciones" rows="6"></textarea>        
                    </div>
                    <div class="text-center">
                        <button class="btn btn-primary prevBtn btn-lg pull-left" type="button"><i class="bi bi-chevron-left"></i> Anterior</button>
                        <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Siguiente <i class="bi bi-chevron-right"></i></button>
                    </div>
            <div class="col-1">
        </div>
        <div class="row setup-content" id="step-5">

            <div class="col-1">
            </div>
                <div class="col-10">
                    <h3 class="text-center"><i class="bi bi-clipboard"></i> Diagnóstico y Tratamiento</h3>

                <div class="container">
                    <div class="form-group">
                        <label for="diagnostico">Diagnoóstico</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="diagnostico" value="{{ isset($consulta->diagnostico)?$consulta->diagnostico:old('diagnostico') }}" id="diagnostico" rows="6"></textarea>        
                    </div>
                    <div class="form-group">
                        <label for="tratamiento">Tratamiento</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="tratamiento" value="{{ isset($consulta->tratamiento)?$consulta->tratamiento:old('tratamiento') }}" id="tratamiento" rows="6"></textarea>        
                    </div>
                    <div class="text-center">
                          <button class="btn btn-primary prevBtn btn-lg pull-left" type="button"><i class="bi bi-chevron-left"></i> Anterior</button>
                          <button class="btn btn-success btn-lg pull-right" type="submit"><i class="bi bi-pencil-square"></i> Registrar</button>
                    </div>
            <div class="col-1">
        </div>
        
            </div>
        </div>
      </div> 

        </div>
    </div>
  </div> 
    </div>
    </div>   
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