@extends('layouts.app')

@section('content')

@include('sidebar.beneficiario')

<div class="container">
  @csrf
  
  {{-- @include('notas.form',['modo'=>'Crear'],['id'=>'2']) --}}

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

  
  <h1 id="AntecedentesTitulo" class="text-center bluenefro"><i class="bi bi-eyedropper"></i> Análisis de {{$micro->beneficiario->nombreBeneficiario}}</h1>
  <br>
  <div class="row">
  <br>
    <div class="col">
      <a href="{{ url('/beneficiario/'.$micro->beneficiario->id) }}" class="btn btn-primary"><i class="bi bi-arrow-left"></i> Regresar </a>
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
                <h2 class="card-title "><i class="bi bi-clipboard"></i> Análisis de Microalbuminuria</h2>
          </div>
          <div class="col text-right">
          @can('lab', App\Models\User::class)
                <a href="{{url('/micro/'.$micro->id.'/edit')}}" class="btn btn-outline-secondary"><i class="bi bi-pencil-fill"></i> Editar </a>
                <form action="{{url('/micro/'.$micro->id)}}" class="d-inline" method="post">
                    @csrf
                    {{ @method_field('DELETE') }}
                    <input type="hidden" id="id_beneficiario" name="id_beneficiario" value="{{ $micro->beneficiario->id }}">
                    <button type="submit" onclick="return confirm('¿Quiere Borrar el Análisis de Microalbuminuria?')"  class="btn btn-outline-danger"><i class="bi bi-trash-fill"></i> Borrar</button>
                </form>
          @endcan

          @can('admin', App\Models\User::class)
                <a href="{{url('/micro/'.$micro->id.'/edit')}}" class="btn btn-outline-secondary"><i class="bi bi-pencil-fill"></i> Editar </a>
                <form action="{{url('/micro/'.$micro->id)}}" class="d-inline" method="post">
                    @csrf
                    {{ @method_field('DELETE') }}
                    <input type="hidden" id="id_beneficiario" name="id_beneficiario" value="{{ $micro->beneficiario->id }}">
                    <button type="submit" onclick="return confirm('¿Quiere Borrar el Análisis de Microalbuminuria?')"  class="btn btn-outline-danger"><i class="bi bi-trash-fill"></i> Borrar</button>
                </form>
          @endcan

          @can('procuracion', App\Models\User::class)
                <a href="{{url('/micro/'.$micro->id.'/edit')}}" class="btn btn-outline-secondary"><i class="bi bi-pencil-fill"></i> Editar </a>
                <form action="{{url('/micro/'.$micro->id)}}" class="d-inline" method="post">
                    @csrf
                    {{ @method_field('DELETE') }}
                    <input type="hidden" id="id_beneficiario" name="id_beneficiario" value="{{ $micro->beneficiario->id }}">
                    <button type="submit" onclick="return confirm('¿Quiere Borrar el Análisis de Microalbuminuria?')"  class="btn btn-outline-danger"><i class="bi bi-trash-fill"></i> Borrar</button>
                </form>
          @endcan
          </div>
        </div>
        
        <div class="container">
            <table class="table table-sm table-responsive-sm">
                <thead>
                    <tr>
                        <th scope="col"><i class="bi bi-clipboard"></i>  Análisis Microalbuminuria</th>
                        <th scope="col"></th>
                      </tr>
                </thead>
                <tbody>
                <tr>
                    <th>Fecha</th>
                    <td>{{ $micro->fecha }}</td>
                  </tr>

                  <tr>
                    <th>Valor Referencia Micro Albumina (mg/dL)</th>
                    <td>0.00 - 30.00</td>
                  </tr>

                  <tr>
                    <th>Micro Albumina (mg/dL)</th>
                    <td> 
                      @if($micro->microalbumina == NULL)
                        <p class="font-weight-light" >No registrado</p>                          
                        @else
                          @if($micro->microalbumina <= 30)
                            <p class="font-weight-light" style="color:green">{{ $micro->microalbumina }}</p>
                          @else
                            <p class="font-weight-light" style="color:red">{{ $micro->microalbumina }}</p>
                          @endif  
                        @endif
                    </td>
                  </tr>

                  <tr>
                    <th>Valor Referencia Creatinina (mg/dL)</th>
                    <td>10.00 - 300.00</td>
                  </tr>

                  <tr>
                    <th>Creatinina (mg/dL)</th>
                    <td> 
                        @if($micro->creatinina == NULL)
                        <p class="font-weight-light" >No registrado</p>                          
                        @else
                          @if($micro->creatinina >= 10 && $micro->creatinina <= 300)
                            <p class="font-weight-light" style="color:green">{{ $micro->creatinina }}</p>
                          @else
                            <p class="font-weight-light" style="color:red">{{ $micro->creatinina }}</p>
                          @endif  
                        @endif
                    </td>
                  </tr>
                  
                  <tr>
                    <th>Valor Referencia Albumina/Creatinina (mg/g)</th>
                    <td>0.00 - 30.00</td>
                  </tr>

                  <tr>
                    <th>Albumina/Creatinina (mg/g)</th>
                    <td> 
                      @if($micro->microalbuminaCreatinina == NULL)
                        <p class="font-weight-light" >No registrado</p>                       
                      @else
                          @if($micro->microalbuminaCreatinina >= 0 && $micro->microalbuminaCreatinina <= 30)
                            <p class="font-weight-light" style="color:green">{{ $micro->microalbuminaCreatinina }}</p>
                          @else
                            @if($micro->microalbuminaCreatinina > 30 && $micro->microalbuminaCreatinina <= 300)
                              <p class="font-weight-light" style="color:#cccc00">{{ $micro->microalbuminaCreatinina }}</p>
                            @else($micro->microalbuminaCreatinina > 300)
                              <p class="font-weight-light" style="color:red">{{ $micro->microalbuminaCreatinina }}</p>
                            @endif
                          @endif
                      @endif
                    </td>
                  </tr>
                  <tr>
                    <th>Método</th>
                    <td> 
                        @if($micro->metodo == NULL)
                        <p class="font-weight-light" >No registrado</p>
                        @else
                        <p class="font-weight-light" >{{ $micro->metodo }}</p>
                        @endif
                    </td>
                  </tr>
                  <tr>
                    <th>Nota</th>
                    <td> 
                        @if($micro->nota == NULL)
                        <p class="font-weight-light" >No registrado</p>
                        @else
                        <p class="font-weight-light" >{{ $micro->nota }}</p>
                        @endif
                    </td>
                  </tr>
                </tbody>
              </table>
</div>
<br>

  
  <script type="text/javascript">
      $('.date').datepicker({  
         format: 'yyyy-mm-dd'
       });  
  </script>
  

</div>
@endsection