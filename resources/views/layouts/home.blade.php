<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>RUPDAE</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style type="text/css">
   .sidebar-dark-primary{
    background: #1e81a3 !important;
  }
  .layout-navbar-fixed .wrapper .sidebar-dark-primary .brand-link:not([class*="navbar"]) {
    background-color: #1e81a3;
  }
  .round_table {
    border-collapse:separate;
    border-spacing: 10;
    border:solid #044279 1px;
    border-radius:10px;
    -moz-border-radius:10px;
    -webkit-border-radius: 5px;  
    box-shadow: black 0.5em 0.5em 0.3em;
  }
  .btn-primary, .btn-primary:disabled, .btn-primary:hover {
     background-color: #1c80a2;
     border-color: #adcee7;
   }
</style>
@yield('css')
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="{{url('home')}}" class="brand-link">
        <img src="{{asset('img/logoRupdae.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
        style="opacity: .8">
        <span class="brand-text font-weight-light">RUPDAE</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
           <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            @guest

            @else
            <li class="nav-item has-treeview menu-close">
              <a href="#" class="nav-link">
                <p>
                  {{ Auth::user()->name }}
                  <i class="fas fa-angle-left right"></i>
                </p>
                
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  {{ __('Cerrar Sesion') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>
              </li>
            </ul>
          </li>

          @endguest
        </ul>

      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      @if(Auth::user()->declaracion_jurada && Auth::user()->respuesta_declaracion_jurada==='ESTOY DE ACUERDO')
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              INFORMACIÓN GENERAL
            </p>
            <i class="fas fa-angle-left right"></i>
          </a>
          <ul class="nav nav-treeview">
            @can('seniat.index')
            <li class="nav-item">
              <a class="nav-link" href="{{ url('seniat') }}">
                {{ __('Información SENIAT') }}
              </a>
            </li>
            @endcan
            @can('accionista.index')

            <li class="nav-item">
              <a class="nav-link" href="{{ url('accionista') }}">
                {{ __('Accionistas') }}
              </a>
            </li>
            @endcan
            @can('adicional.index')
            <li class="nav-item">
              <a class="nav-link" href="{{ url('adicional') }}">
                {{ __('Información Adicional') }}
              </a>
            </li>
            @endcan
          </ul>
        </li>

        @can('establecimiento.index')
        <li class="nav-item">
          <a href="{{route('establecimiento.index')}}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              ESTABLECIMIENTO
            </p>
          </a>
        </li>
        @endcan
        @can('representante.index')
        <li class="nav-item">
          <a href="{{route('representante.index')}}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              REPRESENTANTE LEGAL
            </p>
          </a>
        </li>

        @endcan
        @can('proveedores.index')
        <li class="nav-item">
          <a href="{{route('proveedores.index')}}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              PROVEEDORES
            </p>
          </a>
        </li>

        @endcan
        @can('certificado.index')
        <li class="nav-item">
          <a href="{{route('certificados.index')}}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              CERTIFICADOS
            </p>
          </a>
        </li>
        @endcan
      </ul>
      @endif
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">@yield('titulo')</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('home')}}">Inicio</a></li>
            <li class="breadcrumb-item active">@yield('breadcrumb')</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-12 ">

          @yield('content')

        </div>

      </div>
      <!-- /.row -->          
    </div><!--/. container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->

<!-- Main Footer -->
<footer class="main-footer">
  <strong>Copyright &copy; 2020<a href="http://www.sundee.gob.ve">SUNDEE</a>.</strong>
  Tdos los derechos reservados.
  <div class="float-right d-none d-sm-inline-block">
    <b>Version</b> 2.0
  </div>
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.js')}}"></script>
@yield('js')
</body>
</html>
