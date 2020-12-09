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
  <link href="{{ captcha_layout_stylesheet_url() }}" type="text/css" rel="stylesheet">
  <style type="text/css">
    .main-footer2{
      background: #fff;
      border-top: 1px solid #dee2e6;
      color: #869099;
      padding: 1rem;
      position: absolute;
      bottom: 0;
      width:80%;
    }
    .btn-primary .btn-success:hover{
     background-color: #1c80a2;
     border-color: #adcee7;
   }

</style>
@yield('css')
</head>
<body class="hold-transition layout-navbar-fixed layout-footer-fixed">

  <!--<div class="content">
    
    <div id="header" class="col-sm-12">
      <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-100 mr-3">
    </div>

    <footer class="footer">
    <strong>Copyright &copy; 2020<a href="http://www.sundee.gob.ve">SUNDEE</a>.</strong>
    Tdos los derechos reservados.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 2.0
    </div>
  </footer> 

</div>-->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <!--<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>-->
      </li>
      <div class="row">
        <img src="{{asset('img/banner.png')}}" alt="Banner" class="img-responsive" width="98%" height="75%">
      </div>
    </ul>    
  </nav>
  <!-- /.navbar -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
      <div class="container">
        <!-- Info boxes -->
        <div class="row">

          <div class="col-md-8">
              <!--<div class="row">
              <a href="http://www.sundde.gob.ve" target="_BLANK" class="img-logo img img-rounded">
                <img src="{{asset('img/logoRupdae.png')}}" height="150px" style="margin-top:2px;"  > 
              </a>
            </div>-->
            <div class="row text-center">
              <h1>RUPDAE</h1>
            </div>
            <div class="row">
              <h4>Registro Único de Personas que Desarrollan Actividades Económicas</h4>
            </div>
            <div class="row">
              <img src="{{asset('img/rupdae2.png')}}" class="img img-responsive img-circle" style="margin-top:5px; width: 80%; height: 80%"  > 
            </div>

          </div>
          <div class="col-md-4">
            @yield('content')
          </div>
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer text-size-2">
    <strong>Copyright &copy; 2020 Superintendencia Nacional para la Defensa de los Derechos Socioecónomicos. G-20010920-3. <a href="http://www.sundee.gob.ve">SUNDEE</a>.</strong>
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

<!-- OPTIONAL SCRIPTS -->

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{asset('plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
@yield('js')
</body>
</html>
