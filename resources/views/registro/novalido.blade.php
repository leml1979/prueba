@extends('layouts.inicio')

@section('css')
<style type="text/css">
	.content-wrapper {
		background: #FFFFFF;
	}
</style>
@endsection

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header" style="color: red">{{ __('Verificación no Aceptada') }}</div> 

				<div class="card-body">
					<p class="text-justify">Su verificación del registro solicitado ha sido <b>invalida</b>, debido a que el correo ya se encuentra registrado o ha sido modificado el código enviado. Favor volver a intentar registrarse o recordar sus datos de registro
					</p>
					<a href="{{route('login')}}" class="btn btn-info btn-lg btn-block">LOGUEARSE</a>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection