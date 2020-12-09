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
				<div class="card-header text-right">{{ __('Configurar Contraseña') }}</div>

				<div class="card-body">
					{!! Form::open(['route' => 'registro.password', 'method' => 'post']) !!}
					<!-- <form method="POST" action="{{ route('registro.validar') }}">-->
						@csrf

						<div class="form-group row">
							<div class="col-sm-12">
								<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="password" autofocus placeholder="Contraseña" maxlength="10" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Debe contener al menos un numero, una letra Mayuscula y una letra Minuscula, minimo 8 caracteres">

								@error('password')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="form-group row">
							<div class="col-sm-12">
								<input id="password_confirmar" type="password" class="form-control @error('password_confirmar') is-invalid @enderror" name="password_confirmar" value="{{ old('password_confirmar') }}" required autocomplete="password_confirmar" placeholder="Verificar Contraseña">

								@error('password_confirmar')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>
						<div class="form-group row mb-0">
							<div class="col-md-12 offset-md-0">
								<button type="submit" class="btn btn-primary btn-lg btn-block">
									{{ __('Guardar datos') }}
								</button>
							</div>
						</div>
						<input id="email" type="hidden" name="email" value="{{ $tUsuariosTemporal[0]['email'] }}">
						<input id="rif" type="hidden" name="rif" value="{{ $tUsuariosTemporal[0]['rif']}}">
						<input id="razon_social" type="hidden" name="razon_social" value="{{ $seniat[0]['razon_social']}}">
						<input id="seniat_id" type="hidden" name="seniat_id" value="{{ $seniat[0]['id']}}">
						{!! Form::close() !!}
						<!--</form>-->
					</div>
				</div>
			</div>
		</div>
		<div class="">
			@include('flash::message')
		</div>
	</div>

	@endsection