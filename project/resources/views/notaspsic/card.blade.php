
<h1 id="JornadaTitulo"class="bluenefro"><i class="bi bi-journal"></i> Psicología</h1>

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


<a href="{{url('/beneficiario/'.$notas->beneficiario_id)}}" class="btn btn-primary"><i class="bi bi-arrow-left"></i> Regresar </a>
<br><br>
<div class="card">
    <div class="card-header">
        <div class= "row">
            <div class= "col-8">
                <h5>Beneficiario: {{$notas->beneficiario->nombreBeneficiario}}</h5>
            </div>   
            <div class= "col-4">
                <h5 id="fechaC">Fecha: {{ $notas->fecha }}</h5>
            </div> 
        </div>
      </div>

    <div class="card-body">
        <div class= "row">
            <div id="fechaC"class= "col">
                <a href="{{url('/notaspsic/'.$notas->id.'/edit')}}" class="btn btn-outline-secondary"><i class="bi bi-pencil-fill"></i>
                    Editar
                </a>
            <form action="{{url('/notaspsic/'.$notas->id)}}" class="d-inline" method="post">
                @csrf
                {{ @method_field('DELETE') }}
                <button type="submit" onclick="return confirm('¿Quieres borrar la nota?')"  class="btn btn-outline-danger"><i class="bi bi-trash-fill"></i> Borrar</button>
            </form>
            </div>
          </div> 
      <div class= "row">
          <div class= "col">
                <h6>Comentario:</h6>
                <p id="linebreak" class="text-break">{{ $notas->comentario }}</p>
            </div>
        </div>
        <br>

        @if ($notas->file != null)
        <h6>Archivo:</h6>
        <div class="container">
            
            <table class="table table-sm">
                <thead>
                    <tr>
                        <div class= "col text-center">
                          <iframe height="1000" width="1000" src="/assets/{{ $notas->file}}"></iframe>
                        </div>
                      </tr>
                </thead>
              </table>
        @endif
        
        </div>
        
          <br>
     </div>
  
</div>