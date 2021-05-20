@extends('layouts.app')

@section('content')

@include('sidebar.beneficiario')

<div class="container"><form action="{{url('/beneficiario/'.$beneficiario->id.'/nutricion')}}" method="post">
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

  
  <h1 id="AntecedentesTitulo" class="text-center bluenefro"><i class="bi bi-basket"></i> Registrar Consulta</h1>
  <a href="{{ url()->previous() }}" class="btn btn-primary"><i class="bi bi-arrow-left"></i> Regresar </a>
  
  
  <div class="container mt-3">
    <div class="stepwizard col">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step">
                <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                <p id="timeline"><i class="bi bi-house-fill"></i> Datos Nutrimentales</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                <p id="timeline"><i class="bi bi-person-square"></i>Datos Clínicos</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                <p id="timeline"><i class="bi bi-people-fill"></i> Estilo de Vida </p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
                <p id="timeline"><i class="bi bi-journal-medical"></i> Datos Dietéticos</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-5" type="button" class="btn btn-default btn-circle" disabled="disabled">5</a>
                <p id="timeline"><i class="bi bi-journal-medical"></i>Recordatorio de 24 Horas</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-6" type="button" class="btn btn-default btn-circle" disabled="disabled">6</a>
                <p id="timeline"><i class="bi bi-journal-medical"></i> Datos Antropométricos</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-7" type="button" class="btn btn-default btn-circle" disabled="disabled">7</a>
                <p id="timeline"><i class="bi bi-journal-medical"></i>Necesidades Energéticas y Nutrimentales</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-8" type="button" class="btn btn-default btn-circle" disabled="disabled">8</a>
                <p id="timeline"><i class="bi bi-journal-medical"></i> Plan de Alimentación</p>
            </div>
        </div>
    </div>
    <form role="form" action="" method="post">
        <div class="row setup-content" id="step-1">

            <div class="col-1">
            </div>
                <div class="col-10">
                    <h3 class="text-center"><i class="bi bi-house-fill"></i> Datos Nutrimentales</h3>
                    <br>
                    <input type="hidden" id="beneficiario_id" name="beneficiario_id" value="{{ $beneficiario->id }}">

                <div class="container">

                    <div class="form-group">
                        <label for="ocupacion">Ocupación</label>
                        <input class="form-control" name="ocupacion" value="{{ isset($consulta->ocupacion)?$consulta->ocupacion:old('ocupacion') }}" id="ocupacion" rows="6">
                    </div>

                    <div class="form-group">
                        <label for="horarioscomida">Horarios de Comida</label>
                        <input class="form-control" name="horarioscomida" value="{{ isset($consulta->horarioscomida)?$consulta->horarioscomida:old('horarioscomida') }}" id="horarioscomida" rows="6">
                    </div>

                    <div class="form-group">
                        <label for="cantidadalimentos">Cantidad destinada a alimentos</label>
                        <input class="form-control" name="cantidadalimentos" value="{{ isset($consulta->cantidadalimentos)?$consulta->cantidadalimentos:old('cantidadalimentos') }}" id="cantidadalimentos" rows="6">
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
            <h3 class="text-center"><i class="bi bi-person-square"></i>Datos Clínicos</h3>
            <br>
            <div class="container">

            <div class="row">
                <div class="col-1">
                </div>
                <div class="col">


                    <div class="form-group">
                        <label for="apetito">Apetito</label>
                        <input class="form-control" name="apetito" value="{{ isset($consulta->apetito)?$consulta->apetito:old('apetito') }}" id="apetito" rows="6">
                    </div>

                    <div class="form-group">
                        <label for="distension">Distensión</label>
                        <input class="form-control" name="distension" value="{{ isset($consulta->distension)?$consulta->distension:old('distension') }}" id="distension" rows="6">
                    </div>

                    <div class="form-group">
                        <label for="estrenimiento">Estreñimiento</label>
                        <input class="form-control" name="estrenimiento" value="{{ isset($consulta->estrenimiento)?$consulta->estrenimiento:old('estrenimiento') }}" id="estrenimiento" rows="6">
                    </div>

                    <div class="form-group">
                        <label for="flatulencias">Flatulencias</label>
                        <input class="form-control" name="flatulencias" value="{{ isset($consulta->flatulencias)?$consulta->flatulencias:old('flatulencias') }}" id="flatulencias" rows="6">
                    </div>
                    
                    <div class="form-group">
                        <label for="vomitos">Vómitos</label>
                        <input class="form-control" name="vomitos" value="{{ isset($consulta->vomitos)?$consulta->vomitos:old('vomitos') }}" id="vomitos" rows="6">
                    </div>

                    <div class="form-group">
                        <label for="caries">Caries</label>
                        <input class="form-control" name="caries" value="{{ isset($consulta->caries)?$consulta->caries:old('caries') }}" id="caries" rows="6">
                    </div>

                </div>

                <div class="col">

                    <div class="form-group">
                        <label for="edema">Edema</label>
                        <input class="form-control" name="edema" value="{{ isset($consulta->edema)?$consulta->edema:old('edema') }}" id="edema" rows="6">
                    </div>

                    <div class="form-group">
                        <label for="mareo">Mareo</label>
                        <input class="form-control" name="mareo" value="{{ isset($consulta->mareo)?$consulta->mareo:old('mareo') }}" id="mareo" rows="6">
                    </div>

                    <div class="form-group">
                        <label for="zumbido">Zumbido de oídos</label>
                        <input class="form-control" name="zumbido" value="{{ isset($consulta->zumbido)?$consulta->zumbido:old('zumbido') }}" id="zumbido" rows="6">
                    </div>

                    <div class="form-group">
                        <label for="cefaleas">Cefaleas</label>
                        <input class="form-control" name="cefaleas" value="{{ isset($consulta->cefaleas)?$consulta->cefaleas:old('cefaleas') }}" id="cefaleas" rows="6">
                    </div>
                    
                    <div class="form-group">
                        <label for="disnea">Disnea</label>
                        <input class="form-control" name="disnea" value="{{ isset($consulta->disnea)?$consulta->disnea:old('disnea') }}" id="disnea" rows="6">
                    </div>

                    <div class="form-group">
                        <label for="poliuria">Poliuria</label>
                        <input class="form-control" name="poliuria" value="{{ isset($consulta->poliuria)?$consulta->poliuria:old('poliuria') }}" id="poliuria" rows="6">
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

                <div class="col">
                        <h3 class="text-center"><i class="bi bi-people-fill"></i> Estilo de Vida</h3>

                        <div class="form-group">
                            <label for="actividadfisica">Actividad Física/Tipo/Frecuencia</label>
                            <input class="form-control" name="actividadfisica" value="{{ isset($consulta->actividadfisica)?$consulta->actividadfisica:old('actividadfisica') }}" id="actividadfisica" rows="6">
                        </div>
    
                        <div class="form-group">
                            <label for="suenohoras">Horas de Sueño</label>
                            <input class="form-control" name="suenohoras" value="{{ isset($consulta->suenohoras)?$consulta->suenohoras:old('suenohoras') }}" id="suenohoras" rows="6">
                        </div> 
                    
                        <div class="text-center">
                          <button class="btn btn-primary prevBtn btn-lg pull-left" type="button"><i class="bi bi-chevron-left"></i> Anterior</button>
                          <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Siguiente <i class="bi bi-chevron-right"></i></button>
                        </div>
                </div>

                <div class="col-1">
                </div>
        </div>
        </div>
        <div class="container">

        <div class="row setup-content" id="step-4">
            <div class="col-1">
            </div>
              <div class="col">
                      <h3 class="text-center"><i class="bi bi-journal-medical"></i>Datos Dietéticos</h3>
                        <div class="form-group">
                            <label for="comidasdia">N° de comidas al día</label>
                            <input class="form-control" name="comidasdia" value="{{ isset($consulta->comidasdia)?$consulta->comidasdia:old('comidasdia') }}" id="comidasdia" rows="6">
                        </div>

                        <div class="form-group">
                            <label for="lugarcomida">¿Dónde realiza sus comidas?</label>
                            <input class="form-control" name="lugarcomida" value="{{ isset($consulta->lugarcomida)?$consulta->lugarcomida:old('lugarcomida') }}" id="lugarcomida" rows="6">
                        </div>

                        <div class="form-group">
                            <label for="preparacomida">¿Quién prepara?</label>
                            <input class="form-control" name="preparacomida" value="{{ isset($consulta->preparacomida)?$consulta->preparacomida:old('preparacomida') }}" id="preparacomida" rows="6">
                        </div>

                        <div class="form-group">
                            <label for="entrecomidas">¿Come entre comidas?</label>
                            <input class="form-control" name="entrecomidas" value="{{ isset($consulta->entrecomidas)?$consulta->entrecomidas:old('entrecomidas') }}" id="entrecomidas" rows="6">
                        </div>
                        
                        <div class="form-group">
                            <label for="alimentospreferidos">Alimentos Preferidos</label>
                            <input class="form-control" name="alimentospreferidos" value="{{ isset($consulta->alimentospreferidos)?$consulta->alimentospreferidos:old('alimentospreferidos') }}" id="alimentospreferidos" rows="6">
                        </div>

                        <div class="form-group">
                            <label for="alimentosodiados">Alimentos que no le gustan</label>
                            <input class="form-control" name="alimentosodiados" value="{{ isset($consulta->alimentosodiados)?$consulta->alimentosodiados:old('alimentosodiados') }}" id="alimentosodiados" rows="6">
                        </div> 
                        
                        <div class="form-group">
                            <label for="suplementos">Consumo de suplementos o complementos alimentarios</label>
                            <input class="form-control" name="suplementos" value="{{ isset($consulta->suplementos)?$consulta->suplementos:old('suplementos') }}" id="suplementos" rows="6">
                        </div>
                        
                        <div class="form-group">
                            <label for="medicamentos">Medicamentos consumidos actualmente</label>
                            <input class="form-control" name="medicamentos" value="{{ isset($consulta->medicamentos)?$consulta->medicamentos:old('medicamentos') }}" id="medicamentos" rows="6">
                        </div> 

                        <div class="form-group">
                            <label for="consumoagua">Consumo de agua natural</label>
                            <input class="form-control" name="consumoagua" value="{{ isset($consulta->consumoagua)?$consulta->consumoagua:old('consumoagua') }}" id="consumoagua" rows="6">
                        </div> 

                      <div class="text-center">
                        <button class="btn btn-primary prevBtn btn-lg pull-left" type="button"><i class="bi bi-chevron-left"></i> Anterior</button>
                          <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Siguiente <i class="bi bi-chevron-right"></i></button>

                      </div>
              </div>
              <div class="col-1">
            </div>

        </div>

    </div>


        <div class="row setup-content" id="step-5">

            <div class="col-1">
            </div>  
            <div class="col-10">
                    <h3 class="text-center"><i class="bi bi-journal-medical"></i>Recordatorio de 24 Horas</h3>
                      <div class="form-group">
                          <label for="recordatoriodesayuno">Desayuno</label>
                          <input class="form-control" name="recordatoriodesayuno" value="{{ isset($consulta->recordatoriodesayuno)?$consulta->recordatoriodesayuno:old('recordatoriodesayuno') }}" id="recordatoriodesayuno" rows="6">
                      </div>

                      <div class="form-group">
                          <label for="recordatoriocolacionm">Colación 1</label>
                          <input class="form-control" name="recordatoriocolacionm" value="{{ isset($consulta->recordatoriocolacionm)?$consulta->recordatoriocolacionm:old('recordatoriocolacionm') }}" id="recordatoriocolacionm" rows="6">
                      </div>

                      <div class="form-group">
                          <label for="recordatoriocomida">Comida</label>
                          <input class="form-control" name="recordatoriocomida" value="{{ isset($consulta->recordatoriocomida)?$consulta->recordatoriocomida:old('recordatoriocomida') }}" id="recordatoriocomida" rows="6">
                      </div>

                      <div class="form-group">
                          <label for="recordatoriocolaciont">Colación 2</label>
                          <input class="form-control" name="recordatoriocolaciont" value="{{ isset($consulta->recordatoriocolaciont)?$consulta->recordatoriocolaciont:old('recordatoriocolaciont') }}" id="recordatoriocolaciont" rows="6">
                      </div>
                      
                      <div class="form-group">
                          <label for="recordatoriocena">Cena</label>
                          <input class="form-control" name="recordatoriocena" value="{{ isset($consulta->recordatoriocena)?$consulta->recordatoriocena:old('recordatoriocena') }}" id="recordatoriocena" rows="6">
                      </div>
                </div>

                    <div class="text-center">
                      <button class="btn btn-primary prevBtn btn-lg pull-left" type="button"><i class="bi bi-chevron-left"></i> Anterior</button>
                        <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Siguiente <i class="bi bi-chevron-right"></i></button>
                    </div>
                <div class="col-1">
                </div>  
            </div>
            <div class="row setup-content" id="step-6">

                <div class="col-1">
                </div>  
                <div class="col-10">
                    <h3 class="text-center"><i class="bi bi-journal-medical"></i>Datos Antropométricos</h3>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="peso">Peso (kg)</label>
                                <input type="number" placeholder="50.00" step="0.01" min="0.00" class="form-control" name="peso" value="{{ isset($consulta->peso)?$consulta->peso:old('peso') }}" id="peso" rows="6">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="estatura">Estatura (cm)</label>
                                <input type="number" placeholder="170.00" step="0.01" min="0.00" class="form-control" name="estatura" value="{{ isset($consulta->estatura)?$consulta->estatura:old('estatura') }}" id="estatura" rows="6">
                            </div>
                        </div>
                    </div>
                    <br><br>
                    </div>
                       
                        <div class="text-center">
                          <button class="btn btn-primary prevBtn btn-lg pull-left" type="button"><i class="bi bi-chevron-left"></i> Anterior</button>
                            <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Siguiente <i class="bi bi-chevron-right"></i></button>
                        </div>
                    <div class="col-1">
                    </div>  
                </div>
           
          
       

          <div class="row setup-content" id="step-7">

            <div class="col-1">
            </div>  
            <div class="col-10">
                <h3 class="text-center"><i class="bi bi-journal-medical"></i>Necesidades Energéticas y Nutrimentales</h3>

                <div class="col">
                    <div class="form-group">
                        <label for="tipodieta">Tipo de dieta</label>
                        <input class="form-control" name="tipodieta" value="{{ isset($consulta->tipodieta)?$consulta->tipodieta:old('tipodieta') }}" id="tipodieta" rows="6">
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="kilocaloriastotal">Kilocalorías totales</label>
                            <input type="number" placeholder="50.00" step="0.01" min="0.00" class="form-control" name="kilocaloriastotal" value="{{ isset($consulta->kilocaloriastotal)?$consulta->kilocaloriastotal:old('kilocaloriastotal') }}" id="kilocaloriastotal" rows="6">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="porcentajehidratos">Porcentaje HC</label>
                            <input type="number" placeholder="50.00" step="0.01" min="0.00" class="form-control" name="porcentajehidratos" value="{{ isset($consulta->porcentajehidratos)?$consulta->porcentajehidratos:old('porcentajehidratos') }}" id="porcentajehidratos" rows="6">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="porcentajeproteinas">Porcentaje LS</label>
                            <input type="number" placeholder="50.00" step="0.01" min="0.00" class="form-control" name="porcentajeproteinas" value="{{ isset($consulta->porcentajeproteinas)?$consulta->porcentajeproteinas:old('porcentajeproteinas') }}" id="porcentajeproteinas" rows="6">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="porcentajegrasas">Porcentaje PS</label>
                            <input type="number" placeholder="50.00" step="0.01" min="0.00" class="form-control" name="porcentajegrasas" value="{{ isset($consulta->porcentajegrasas)?$consulta->porcentajegrasas:old('porcentajegrasas') }}" id="porcentajegrasas" rows="6">
                        </div>
                    </div>
                </div>
                <br><br>
                </div>
                   
                    <div class="text-center">
                      <button class="btn btn-primary prevBtn btn-lg pull-left" type="button"><i class="bi bi-chevron-left"></i> Anterior</button>
                        <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Siguiente <i class="bi bi-chevron-right"></i></button>
                    </div>
                <div class="col-1">
                </div>  
            </div>

            <div class="row setup-content" id="step-8">
                <div class="col-1">
                </div>  
                <div class="col-10">
                    <h3 class="text-center"><i class="bi bi-journal-medical"></i>Plan de Alimentación</h3>
    
                    <div class="form-group">
                        <label for="diagnostico">Diagnostico (Dx)</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="diagnostico" value="{{ isset($consulta->diagnostico)?$consulta->diagnostico:old('diagnostico') }}" id="diagnostico" rows="6"></textarea>        
                    </div>

                    <div class="form-group">
                        <label for="nota">Nota</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="nota" value="{{ isset($consulta->nota)?$consulta->nota:old('nota') }}" id="nota" rows="6"></textarea>
                    </div>
                   
                    <br><br>
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