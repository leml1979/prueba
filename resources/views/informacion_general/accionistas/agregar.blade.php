@extends('layouts.home')

@section('css')

@endsection

@section('content')

<div class="content">
	<div class="row">
		{!! Form::open(['url' => '/buscar', 'method' => 'post','id'=>'buscar-form'])!!}
		
		@csrf
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
	{!! Form::close() !!}
	@isset($mensaje)
	{!! Form::open(['route' => 'accionista.store', 'method' => 'post','id'=>'accionista-form']) !!}
	
	@csrf
	@include('informacion_general.accionistas.partials.form')
	
	{!! Form::close() !!}
	@endisset
</div>
</div>

@endsection