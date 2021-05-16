
<h1 id="JornadaTitulo"class="bluenefro"><i class="bi bi-journal"></i> Nota</h1>

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


<a href="{{url('/beneficiario/'.$notas->beneficiario_id)}}" class="btn btn-primary"> Regresar </a>
<br><br>
<div class="card">
    <div class="card-header">
        <div class= "row">
            <div class= "col-8">
                <h5>Nombre: {{$notas->beneficiario->nombreBeneficiario}}</h5>
            </div>   
            <div class= "col-4">
                <h5 id="fechaC">Fecha: {{ $notas->fecha }}</h5>
            </div> 
        </div>
      </div>

    <div class="card-body">    
        <div class= "row">
            <div class= "col">
                  <p> <strong> Tipo de nota: </strong>{{ $notas->tiponota }}</p>
              </div>
          </div>
      <div class= "row">
          <div class= "col">
                <h6>Comentario:</h6>
                <p id="linebreak" class="text-break">{{ $notas->comentario }}</p>
            </div>
        </div>
        <div class= "row">
            <div id="fechaC"class= "col">
                <a href="{{url('/notas/'.$notas->id.'/edit')}}" class="btn btn-outline-secondary">
                    Editar
                </a>
            <form action="{{url('/notas/'.$notas->id)}}" class="d-inline" method="post">
                @csrf
                {{ @method_field('DELETE') }}
                <input type="submit" onclick="return confirm('¿Quieres borrar la nota?')"  class="btn btn-outline-danger" value="Borrar">
            </form>
            </div>
          </div> 
          <br>
     </div>
  
</div>