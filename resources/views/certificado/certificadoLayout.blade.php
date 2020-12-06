<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

	<!-- Font Awesome Icons -->
	<link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
	<!-- Theme style -->
	<link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
	<title>Certificado</title>
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
	</style>
</head>
<body>

	<div class="container">
		<div class="row">
			<div class="img-responsive">
				<img src="{{asset('img/banner.png')}}" alt="Banner" class="img-responsive" width="98%" height="75%">
			</div>
		</div>
		<div class="row justify-content-center" style="margin-top: 5%">
			<div class="col-md-8">
				<div class="card bg-light">
					<div class="card-header text-center"><img src="{{asset('img/logoRupdae.png')}}" height="60px" class="float-left img-circle elevation-2">{{ __('Certificado RUPDAE') }}</div>

					<div class="card-body">
						@yield("certificados")
					</div>
				</div>
			</div>
		</div>
		<footer class="main-footer2 text-size-2">
			<strong>Copyright &copy; 2020 Superintendencia Nacional para la Defensa de los Derechos Socioecónomicos. G-20010920-3. <a href="http://www.sundee.gob.ve">SUNDEE</a>.</strong>
			Tdos los derechos reservados.
			<div class="float-right d-none d-sm-inline-block">
				<b>Version</b> 2.0
			</div>
		</footer>
	</div>

</body>
</html>