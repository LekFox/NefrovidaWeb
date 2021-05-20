
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
                <h2 class="card-title">Factores de Riesgo en NULL</h2>
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
              <a href="{{ url('riesgos/'.$beneficiario->id)}}" class="btn btn-primary btn-lg"><i class="bi bi-plus-circle"></i> Consultar Factores de Riesgo</a>
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





