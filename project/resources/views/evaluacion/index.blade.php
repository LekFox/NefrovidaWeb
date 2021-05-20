
<br><br>
<div class="">
<div class="card">
  <div class="card-body text-right">
    <a href="{{url('evaluacion/1/edit')}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Modificar Preguntas de Evaluación">
      <style>
        .bi-three-dots-vertical:hover{
          background-color:#000;
          opacity:0.4;
          border-radius:35px;
          transition:.25s ease-in-out;
        }
      </style>
      <svg xmlns="http://www.w3.org/2000/svg" href="{{ url('notas/create') }}" width="30" height="30" fill="gray" class="bi bi-three-dots-vertical" viewBox="0 0 16 16" >
        <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
      </svg>
    </a>
        <br>
      <div class= "row">
          <div class= "col-sm">
            </div>
            <div class="col-sm text-center">
                <h2 class="card-title">Evaluación</h2>
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
                <button class="btn btn-primary btn-lg dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Agregar Evaluación
                </button>
                <div class="dropdown-menu" >
                  @foreach($evaluaciones as $id=>$evaluacion)
                    <a class="dropdown-item" href="{{route("evaluacion.show",$evaluacion['id'])}}">{{$evaluacion['nombre']}}</a>
                  @endforeach
                </div>
                <br><br><br><br><br>
              </div>
            </div>
          <div class="col-sm">
          </div>
        </div> 
  </div>
</div>
</div>




