<div class="row">
	<div class="col-sm-4">
		{!! Form::label('Personalidad', 'Personalidad:', array('class' => 'negrita')) !!}
		{!! Form::select('personalidad',$personalidades,isset($accionista)?$accionista->personalidad_id:null, ["class"=>"form-control","placeholder"=>"Seleccione....","required"=>"required"]) !!}

	</div>
	<div class="col-sm-4">
		{!! Form::label('País', 'País:', array('class' => 'negrita')) !!}
		{!! Form::select('pais',$paises,isset($accionista)?$accionista->pais_id:null, ["class"=>"form-control","placeholder"=>"Seleccione....","required"=>"required"]) !!}
	</div>
	<div class="col-sm-4">
		{!! Form::label('Tipo Relación Empresa', 'Tipo Relación Empresa:', array('class' => 'negrita')) !!}
		{!! Form::select('tipo_relacion_empresa',$tipoRelacionEmpresa,isset($accionista)?$accionista->tipo_relacion_empresa_id:null, ["class"=>"form-control","placeholder"=>"Seleccione....","required"=>"required"]) !!}
	</div>
</div>
<div class="row">
	<div class="col-sm-4">
		{!! Form::label('Cantidad Acciones', 'Cantidad Acciones:', array('class' => 'negrita')) !!}
		{!! Form::text('cantidad_acciones',isset($accionista)?$accionista->cantidad_acciones:null, ["class"=>"form-control","placeholder"=>"Cantidad de Acciones","required"=>"required"]) !!}

	</div>
	<div class="col-sm-4">
		{!! Form::label('Correo', 'Correo:', array('class' => 'negrita')) !!}
		{!! Form::email('correo',isset($accionista)?$accionista->correo:null, ["class"=>"form-control","placeholder"=>"Correo Electronico","required"=>"required"]) !!}

	</div>
	<div class="col-sm-4">
		

	</div>
	
</div>