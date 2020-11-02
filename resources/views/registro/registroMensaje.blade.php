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
				<div class="card-header">{{ __('Paso 2 Registro') }}</div>

				<div class="card-body">
					<p class="text-justify">Por favor, revise su correo electrónico
						Le hemos enviado un mensaje al correo electrónico que le permitirá completar su proceso de inscripción de manera rápida y fácil.
					</p>
					<p class="text-justify">

						Si no recibe las instrucciones dentro de pocos minutos, revise la bandeja de spam de su correo electrónico o de correo no deseado.
					</p>
					<p class="text-justify">
						Tenga en cuenta que este enlace estará activo por un período de 24 horas, de no completar su proceso de inscripción debera realizarlo nuevamente.
					</p>
					<a href="{{route('login')}}" class="btn btn-primary btn-lg btn-block">Continuar</a>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection