<div class="row">
	<div class="col-sm-4">
		{!! Form::label('Personalidad', 'Personalidad:', array('class' => 'negrita')) !!}
		{!! Form::select('personalidad',$personalidades,null, ["class"=>"form-control","placeholder"=>"Seleccione....","required"=>"required"]) !!}

	</div>
	<div class="col-sm-4">
		{!! Form::label('País', 'País:', array('class' => 'negrita')) !!}
		{!! Form::select('pais',$paises,null, ["class"=>"form-control","placeholder"=>"Seleccione....","required"=>"required"]) !!}
	</div>
	<div class="col-sm-4">
		{!! Form::label('Tipo Relación Empresa', 'Tipo Relación Empresa:', array('class' => 'negrita')) !!}
		{!! Form::select('tipo_relacion_empresa',$tipoRelacionEmpresa,null, ["class"=>"form-control","placeholder"=>"Seleccione....","required"=>"required"]) !!}
	</div>
</div>
<div class="row">
	<div class="col-sm-4">
		{!! Form::label('Cantidad Acciones', 'Cantidad Acciones:', array('class' => 'negrita')) !!}
		{!! Form::text('cantidad_acciones',null, ["class"=>"form-control","placeholder"=>"Cantidad de Acciones","required"=>"required"]) !!}

	</div>
	<div class="col-sm-4">
		{!! Form::label('Correo', 'Correo:', array('class' => 'negrita')) !!}
		{!! Form::email('correo',null, ["class"=>"form-control","placeholder"=>"Correo Electronico","required"=>"required"]) !!}

	</div>
	<div class="col-sm-4">
		{!! Form::label('rif', 'rif:', array('class' => 'negrita')) !!}
		{!! Form::text('rif',null, ["class"=>"form-control","placeholder"=>"rif"]) !!}

	</div>
	
</div>