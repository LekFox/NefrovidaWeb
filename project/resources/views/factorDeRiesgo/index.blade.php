
<br><br>
<div class="">
<div class="card">
  <div class="card-body text-right">
      <div class= "row">
          <div class= "col-sm">
            </div>
            <div class="col-sm text-center">
            <br>  
                @if($beneficiario->factoresDeRiesgo == NULL)
                <h2 class="card-title"><i class="bi bi-exclamation-circle greennefro"></i> Factores de Riesgo</h2>
                @endif
                @if($beneficiario->factoresDeRiesgo != NULL)
                <h2 class="card-title">Factores de Riesgo de {{$beneficiario->nombreBeneficiario}}</h2>
                @endif
                <br>
            </div>
            <div class="col-sm">
            </div>
        </div>
        <div class= "row">
          <div class= "col-sm">
            </div>
            <div class="col-sm text-center">
              <div class="dropdown ">
              @if($beneficiario->factoresDeRiesgo == NULL)
              <a href="{{ url('riesgos/create') }}" class="btn btn-primary btn-lg"><i class="bi bi-plus-circle"></i> Registrar Factores de Riesgo</a>
              @endif
              @if($beneficiario->factoresDeRiesgo != NULL)
              <a href="{{ url('riesgos/'.$beneficiario->id)}}" class="btn btn-primary btn-lg"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                        <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z"/>
                    </svg> Consultar Factores de Riesgo</a>
              @endif
                <br><br><br><br><br>
              </div>
            </div>
          <div class="col-sm">
          </div>
        </div> 
  </div>
</div>
</div>





