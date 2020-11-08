@extends('layouts.home')

@section('css')

@endsection

@section('content')

<div class="content">
	<div class="row">
		<form action="/buscar" method="POST" role="search" id="buscar-form">
			{{ csrf_field() }}
			<div class="input-group">
				{!! Form::select('tipo',["V"=>"V","E"=>"E","P"=>"P","N"=>"N","J"=>"J"],null, ["class"=>"form-control","placeholder"=>"Seleccione...."]) !!}
				<input type="text" class="form-control" name="documento_identidad"
				placeholder="Buscar Persona"> <span class="input-group-btn">
					<a class="btn btn-primary" href="{{ route('accionista.buscar') }}"
					onclick="event.preventDefault();
					document.getElementById('buscar-form').submit();">
					<span class="fa fa-search"></span>Guardar
				</a>


			</span>
		</div>
	</form>
	@isset($mensaje)
	<form action="/guardar-accionista" method="POST" id="accionista-form">
		@include('informacion_general.accionistas.partials.form')
	</form>
	@endisset
</div>
</div>

@endsection