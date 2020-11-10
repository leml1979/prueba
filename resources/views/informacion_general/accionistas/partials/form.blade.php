<div class="row">
	<div class="col-sm-4">
		{!! Form::label('Personalidad', 'Personalidad:', array('class' => 'negrita')) !!}
		{!! Form::select('personalidad',$personalidades,null, ["class"=>"form-control","placeholder"=>"Seleccione...."]) !!}

	</div>
	<div class="col-sm-4">
		{!! Form::label('País', 'País:', array('class' => 'negrita')) !!}
		{!! Form::select('pais',$paises,null, ["class"=>"form-control","placeholder"=>"Seleccione...."]) !!}
	</div>
	<div class="col-sm-4">
		{!! Form::label('Tipo Relación Empresa', 'Tipo Relación Empresa:', array('class' => 'negrita')) !!}
		{!! Form::select('tipo_relacion_empresa',$tipoRelacionEmpresa,null, ["class"=>"form-control","placeholder"=>"Seleccione...."]) !!}
	</div>
</div>
<div class="row">
	<div class="col-sm-4">
		{!! Form::label('Cantidad Acciones', 'Cantidad Acciones:', array('class' => 'negrita')) !!}
		{!! Form::text('cantidad_acciones',null, ["class"=>"form-control","placeholder"=>"Cantidad de Acciones"]) !!}

	</div>
	<div class="col-sm-4">
		{!! Form::label('Correo', 'Correo:', array('class' => 'negrita')) !!}
		{!! Form::text('correo',null, ["class"=>"form-control","placeholder"=>"Correo Electronico"]) !!}

	</div>
	<div class="col-sm-4">
		{!! Form::label('rif', 'rif:', array('class' => 'negrita')) !!}
		{!! Form::text('rif',null, ["class"=>"form-control","placeholder"=>"rif"]) !!}

	</div>
	
</div>
{!! Form::text('primer_apellido',$persona->apellido1, ["class"=>"form-control","placeholder"=>"Cantidad de Acciones"]) !!}
{!! Form::text('primer_nombre',$persona->nombre1, ["class"=>"form-control","placeholder"=>"Cantidad de Acciones"]) !!}
{!! Form::text('segundo_apellido',$persona->apellido2, ["class"=>"form-control","placeholder"=>"Cantidad de Acciones"]) !!}
{!! Form::text('segundo_nombre',$persona->nombre2, ["class"=>"form-control","placeholder"=>"Cantidad de Acciones"]) !!}
{!! Form::text('documento_identificacion',$persona->cedula, ["class"=>"form-control","placeholder"=>"Cantidad de Acciones"]) !!}
{!! Form::text('tipo_documento',$persona->tipo, ["class"=>"form-control","placeholder"=>"Cantidad de Acciones"]) !!}

<div class="row">
	<div class="col-sm-4">
		<a class="btn btn-primary" href="{{ route('accionista.store') }}"
		onclick="event.preventDefault(); document.getElementById('accionista-form').submit();">
		<span class="fa fa-save"></span>Guardar
	</a>
</div>
</div>