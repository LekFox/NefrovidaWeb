<br><br>
<div class="">
<div class="card">
  <div class="card-body">
      <div class= "row">
          <div class= "col-sm">
            </div>
            <div class="col-sm text-center">
                <h2 class="card-title"><i class="bi bi-droplet greennefro"></i> Tamizaje</h2>
            </div>
            <div class="col-sm">
            </div>
        </div>
        <div class= "row">
          <div class= "col-sm">
            </div>
            <div class="col-sm text-center">
            @if ($beneficiario->tamizaje == NULL)
                <p>No hay tamizaje registrado.</p>
            @endif
            </div>
            <div class="col-sm">
            </div>
        </div>
        <div class= "row">
          <div class= "col-sm">
            </div>
            <div class="col-sm text-center">
                @if ($beneficiario->tamizaje == NULL)
                <a href= "{{url('/beneficiario/'.$beneficiario->id.'/tamizaje/create')}}" type="button" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                        <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z"/>
                    </svg>
                        Registrar
                </a>
                @else
                <br>
                <a href = "{{url('/tamizaje/'.$beneficiario->tamizaje->id)}}" type="button" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                        <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z"/>
                    </svg>
                        Consultar
                </a>
                <br>
                @endif
            </div>
            <div class="col-sm">
            </div>
        </div>
        
  </div>
</div>
</div>

