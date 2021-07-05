
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  
        <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-light border-right" id="sidebar-wrapper">
        <div class="list-group list-group-flush">
            <a href="{{url('/home')}}" class="list-group-item list-group-item-action bg-success active"><i class="bi bi-house-door-fill"></i> Inicio</a>
            <a href="{{url('/jornada')}}" class="list-group-item list-group-item-action bg-light"><i class="bi bi-calendar3"></i> Jornadas</a>
            <a href="{{url('/beneficiario')}}" class="list-group-item list-group-item-action bg-light"><i class="bi bi-people-fill"></i> Beneficiarios</a>
            <a href="#" class="list-group-item list-group-item-action bg-light"><i class="bi bi-arrow-left-right"></i> Comparar Jornadas</a>
            <a href="#" class="list-group-item list-group-item-action bg-light"><i class="bi bi-bar-chart-line-fill"></i> Reportes</a>

            @can('social', App\Models\User::class)
            <a href="{{url('/register')}}" class="list-group-item list-group-item-action bg-light"><i class="bi bi-person-plus-fill"></i> Gestión de Usuarios</a>
            @endcan

            @can('admin', App\Models\User::class)
            <a href="{{url('/register')}}" class="list-group-item list-group-item-action bg-light"><i class="bi bi-person-plus-fill"></i> Gestión de Usuarios</a>
            @endcan

            @can('procuracion', App\Models\User::class)
            <a href="{{url('/register')}}" class="list-group-item list-group-item-action bg-light"><i class="bi bi-person-plus-fill"></i> Gestión de Usuarios</a>
            @endcan
        </div>
        </div>
        <!-- /#sidebar-wrapper -->