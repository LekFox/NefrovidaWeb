<h1 id="JornadaTitulo" class="bluenefro"><i class="bi bi-person-bounding-box"></i> {{$modo}} Beneficiario</h1>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css"/>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

<!--
<div class= "container box">
    <div class= "row">
        <div class= "col-sm">
            <div class="panel panel-default">
                <div class="panel-heading">
                   <h5>Buscar beneficiario:</h5>
                </div>
                <div class="panel-body">
                   <input type="search" name="search" id="searchnombre"
                    class="form-control" placeholder="Nombre de Beneficiario..."/>
                </div>
            </div>
        </div>
    </div>
</div>
-->
<input type="hidden" value = "{{$jornada->id}}">

<div class="form-group">
    <label for="escolaridade_id">Beneficiario</label>
    <select name="escolaridade_id" class="custom-select" id="beneficiario_id">
        <option value="" selected>hola</option>
        <option value="5">Preparatoria</option>
        <option value="6">Primaria</option>
        <option value="7">Secundaria</option>
        <option value="8">Universidad</option>
    </select>
</div>

<br><br>
<div class="card">
  <div class="card-body">
      <div class= "row">
          <div class= "col-sm">
                <h2 class="card-title bluenefro" id="beneNombre"></h2>
                <br>
                <h4 class="font-weight-light">Fecha de Nacimiento: <span id="beneNacimiento"></span></h4>
                <h4 class="font-weight-light">Sexo: <span id="beneSexo"></span></h4>
                <h4 class="font-weight-light">Teléfono: <span id="beneTel"></span></h4>
                <h4 class="font-weight-light">Dirección: <span id="beneDir"></span></h4>
                <h4 class="font-weight-light">Escolaridad: <span id="beneEscolaridad"></span></h4>
                <h4 class="font-weight-light">Estatus: <span id="beneEstatus"></span></h4>
            </div>
        </div>
        
  </div>
</div>

<script>

$('#beneficiario_id').on("change", function(){
    var id = $(this).val();
    if (id){
        $.ajax({
        url: "http://127.0.0.1:8000/beneficiario/"+id+"/datos",
        cache: false,
        dataType: "json"
        })
        .done(function( beneficiario ) {
            $("#beneNombre").html(beneficiario.nombreBeneficiario);
            $("#beneNacimiento").html(beneficiario.fechaNacimiento);
            $("#beneSexo").html(beneficiario.sexo);
            $("#beneTel").html(beneficiario.telefono);
            $("#beneDir").html(beneficiario.direccion);
            $("#beneEscolaridad").html(beneficiario.escolaridade.nombreEscolaridad);
            $("#beneEstatus").html(beneficiario.estatus);
        });
    }
    else {
        $("#beneNombre").html("Nombre");
        $("#beneNacimiento").html("");
        $("#beneSexo").html("");
        $("#beneTel").html("");
        $("#beneDir").html("");
        $("#beneEscolaridad").html("");
        $("#beneEstatus").html("");
    }
});
</script>
