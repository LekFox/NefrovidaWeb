@extends('layouts.app')

@section('content')

@include('sidebar.beneficiario')

<div class="container">
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
  @if (Session::has('eliminado'))
    <div class="alert alert-success" role="alert"> {{Session::get('eliminado')}} </div>      
  @endif

  @if (Session::has('nuevo'))
    <div class="alert alert-success" role="alert"> {{Session::get('nuevo')}} </div>       
  @endif

  @if (Session::has('editado'))
    <div class="alert alert-success" role="alert"> {{Session::get('editado')}} </div>    
  
  @endif
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

  
  <h1 id="AntecedentesTitulo" class="text-center bluenefro"><i class="bi bi-eyedropper"></i> Química sanguinea de {{$quimicasanguinea->beneficiario->nombreBeneficiario}}</h1>
  <div class="row">
    <div class="col">
      <a href="{{ url('/beneficiario/'.$quimicasanguinea->beneficiario->id) }}" class="btn btn-primary"><i class="bi bi-arrow-left"></i> Regresar </a>
    </div>
    <div class="col">
    </div>
  </div>
  <br><br>
  <div class="card">
    <div class="card-body">
      <div class= "row">
        <div class="col"></div>
          <div class= "col text-center align-bottom">
            <h2 class="card-title "><i class="bi bi-clipboard"></i> Química sanguinea </h2>
          </div>
          <div class="col text-right">
          @can('lab', App\Models\User::class)
                <a href="{{url('/quimicasanguinea/'.$quimicasanguinea->id.'/edit')}}" class="btn btn-outline-secondary"><i class="bi bi-pencil-fill"></i> Editar </a>
                <form action="{{url('/quimicasanguinea/'.$quimicasanguinea->id)}}" class="d-inline" method="post">
                    @csrf
                    {{ @method_field('DELETE') }}
                    <input type="hidden" id="id_beneficiario" name="id_beneficiario" value="{{ $quimicasanguinea->beneficiario->id }}">
                    <button type="submit" onclick="return confirm('¿Quieres borrar la Química sanguinea? Esta acción no puede deshacerse.')"  class="btn btn-outline-danger"><i class="bi bi-trash-fill"></i> Borrar</button>
                </form>
          @endcan

          @can('admin', App\Models\User::class)
                <a href="{{url('/quimicasanguinea/'.$quimicasanguinea->id.'/edit')}}" class="btn btn-outline-secondary"><i class="bi bi-pencil-fill"></i> Editar </a>
                <form action="{{url('/quimicasanguinea/'.$quimicasanguinea->id)}}" class="d-inline" method="post">
                    @csrf
                    {{ @method_field('DELETE') }}
                    <input type="hidden" id="id_beneficiario" name="id_beneficiario" value="{{ $quimicasanguinea->beneficiario->id }}">
                    <button type="submit" onclick="return confirm('¿Quieres borrar la Química sanguinea? Esta acción no puede deshacerse.')"  class="btn btn-outline-danger"><i class="bi bi-trash-fill"></i> Borrar</button>
                </form>
          @endcan

          @can('procuracion', App\Models\User::class)
                <a href="{{url('/quimicasanguinea/'.$quimicasanguinea->id.'/edit')}}" class="btn btn-outline-secondary"><i class="bi bi-pencil-fill"></i> Editar </a>
                <form action="{{url('/quimicasanguinea/'.$quimicasanguinea->id)}}" class="d-inline" method="post">
                    @csrf
                    {{ @method_field('DELETE') }}
                    <input type="hidden" id="id_beneficiario" name="id_beneficiario" value="{{ $quimicasanguinea->beneficiario->id }}">
                    <button type="submit" onclick="return confirm('¿Quieres borrar la Química sanguinea? Esta acción no puede deshacerse.')"  class="btn btn-outline-danger"><i class="bi bi-trash-fill"></i> Borrar</button>
                </form>
          @endcan
          </div>
        </div>        

  
        <div class="container">
            <table class="table table-sm table-responsive-sm">
                <tbody>
                  <tr>
                    <th>Fecha</th>
                    <td> 
                        @if($quimicasanguinea->fecharegistro == NULL)
                          <p class="font-weight-light" >No registrado</p>
                        @else
                          <p class="font-weight-light" >{{ $quimicasanguinea->fecharegistro }}</p>
                        @endif
                    </td>
                  </tr>
                  <tr>
                    <th>Glucosa</th>
                    <td> 

                      <div class="form-row">
                        <div class="col-4">
                          @if($quimicasanguinea->glucosa == NULL)
                            <p class="font-weight-light" >No registrado</p>
                          @else
                            <p class="font-weight-light" >{{ $quimicasanguinea->glucosa }}</p>
                          @endif         
                        </div>

                        <div class="col-2">
                        </div>
                        
                        <div class="col-4">
                          <p class="font-weight-light" >70 - 100 mg/dL</p>
                        </div>
                      </div>


                    </td>
                  </tr>
                  <tr>
                    <th>Urea</th>
                    <td> 

                      <div class="form-row">
                        <div class="col-4">
                          @if($quimicasanguinea->urea == NULL)
                            <p class="font-weight-light" >No registrado</p>
                          @else
                            <p class="font-weight-light" >{{ $quimicasanguinea->urea }}</p>
                          @endif        
                        </div>

                        <div class="col-2">
                        </div>
                        
                        <div class="col-4">
                          <p class="font-weight-light" >15 - 45 mg/dL</p>
                        </div>
                      </div>


                    </td>
                  </tr>
                  <tr>
                    <th>Bun</th>
                    <td> 

                      <div class="form-row">
                        <div class="col-4">
                          @if($quimicasanguinea->bun == NULL)
                            <p class="font-weight-light" >No registrado</p>
                          @else
                            <p class="font-weight-light" >{{ $quimicasanguinea->bun }}</p>
                          @endif      
                        </div>

                        <div class="col-2">
                        </div>
                        
                        <div class="col-4">
                          <p class="font-weight-light" >7 - 15 mg/dL</p>
                        </div>
                      </div>
                    

                    </td>
                  </tr> 
                  <tr>
                    <th>Creatinina</th>
                    <td> 

                      <div class="form-row">
                        <div class="col-4">
                          @if($quimicasanguinea->creatina == NULL)
                              <p class="font-weight-light" >No registrado</p>
                          @else
                            <p class="font-weight-light" >{{ $quimicasanguinea->creatina }}</p>
                          @endif         
                        </div>
                        <div class="col-2">
                        </div>
                            
                        <div class="col-4">
                          <p class="font-weight-light" >0.5 - 1 mg/dL Mujer</p>
                            <br>
                          <p class="font-weight-light" >0.7 - 1.2 mg/dL Hombre</p>
                            <br>
                          <p class="font-weight-light" >0.30 - 0.50 mg/dL 4-7 años</p>
                            <br>
                          <p class="font-weight-light" >0.60 - 0.80 mg/dL 8-10 años</p>
                        </div>
                      </div>

                        
                    </td>
                  </tr> 
                  <tr>
                    <th>Acido Urico</th>
                    <td> 

                      <div class="form-row">
                        <div class="col-4">
                          @if($quimicasanguinea->acidoUrico == NULL)
                            <p class="font-weight-light" >No registrado</p>
                          @else
                            <p class="font-weight-light" >{{ $quimicasanguinea->acidoUrico }}</p>
                          @endif         
                        </div>
                        <div class="col-2">
                        </div>
                            
                        <div class="col-4">
                          <p class="font-weight-light" >2.4 - 6 mg/dL Mujer</p>
                            <br>
                          <p class="font-weight-light" >3.4 - 7 mg/dL Hombre</p>
                        </div>
                      </div>

                    </td>
                  </tr>
                  <tr>
                    <th>Colesterol Total</th>
                    <td> 

                      <div class="form-row">
                        <div class="col-4">
                          @if($quimicasanguinea->colesterolTotal == NULL)
                            <p class="font-weight-light" >No registrado</p>
                          @else
                            <p class="font-weight-light" >{{ $quimicasanguinea->colesterolTotal }}</p>
                          @endif       
                        </div>
                        <div class="col-2">
                        </div>
                            
                        <div class="col-4">
                          <p class="font-weight-light" >125 - 200 mg/dL Mujer</p>
                        </div>
                      </div>

                    </td>
                  </tr>  
                  <tr>
                    <th>Trigliceridos</th>
                    <td>

                      <div class="form-row">
                        <div class="col-4">
                          @if($quimicasanguinea->trigliceridos == NULL)
                            <p class="font-weight-light" >No registrado</p>
                          @else
                            <p class="font-weight-light" >{{ $quimicasanguinea->trigliceridos }}</p>
                          @endif     
                        </div>
                        <div class="col-2">
                        </div>
                            
                        <div class="col-4">
                          <p class="font-weight-light" >10 - 150 mg/dL Mujer</p>
                        </div>
                      </div>

                       
                    </td>
                  </tr>  
                   <tr>
                    <th>Método</th>
                    <td> 
                        @if($quimicasanguinea->metodo == NULL)
                          <p class="font-weight-light" >No registrado</p>
                        @else
                          <p class="font-weight-light" >{{ $quimicasanguinea->metodo }}</p>
                        @endif
                    </td>
                  </tr> 
                  <tr>
                    <th>Nota</th>
                    <td> 
                        @if($quimicasanguinea->nota == NULL)
                          <p class="font-weight-light" >No registrado</p>
                        @else
                          <p class="font-weight-light" >{{ $quimicasanguinea->nota }}</p>
                        @endif
                    </td>
                  </tr>
                </tbody>
              </table>
        </div>
         <br>

      </div>
    </div>
<script type="text/javascript">
    $('.date').datepicker({  
        format: 'yyyy-mm-dd'
      });  
</script>
  

</div>
@endsection