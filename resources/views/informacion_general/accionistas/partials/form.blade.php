<div class="row">
	<div class="col-md-4">
		<div class="form-group">
			{!! Form::label('Personalidad', 'Personalidad:', array('class' => 'negrita')) !!}
		</div>
		<div class="form-group">
			{!! Form::select('personalidad',$personalidades,isset($accionista)?$accionista->personalidad_id:null, ["class"=>"form-control","placeholder"=>"Seleccione....","required"=>"required"]) !!}
		</div>

	</div>
	<div class="col-md-4">
		<div class="form-group">
			{!! Form::label('País', 'País:', array('class' => 'negrita')) !!}
		</div>
		<div class="form-group">
			{!! Form::select('pais',$paises,isset($accionista)?$accionista->pais_id:null, ["class"=>"form-control","placeholder"=>"Seleccione....","required"=>"required"]) !!}
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			{!! Form::label('Tipo Relación Empresa', 'Tipo Relación Empresa:', array('class' => 'negrita')) !!}
		</div>
		<div class="form-group">
			{!! Form::select('tipo_relacion_empresa',$tipoRelacionEmpresa,isset($accionista)?$accionista->tipo_relacion_empresa_id:null, ["class"=>"form-control","placeholder"=>"Seleccione....","required"=>"required"]) !!}
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-4">
		<div class="form-group">
			{!! Form::label('Cantidad Acciones', 'Cantidad Acciones:', array('class' => 'negrita')) !!}
		</div>
		<div class="form-group">
			{!! Form::text('cantidad_acciones',isset($accionista)?$accionista->cantidad_acciones:null, ["class"=>"form-control","placeholder"=>"Cantidad de Acciones","required"=>"required"]) !!}
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			{!! Form::label('Correo', 'Correo:', array('class' => 'negrita')) !!}
		</div>
		<div class="form-group">
			{!! Form::email('correo',isset($accionista)?$accionista->correo:null, ["class"=>"form-control","placeholder"=>"Correo Electronico","required"=>"required"]) !!}
		</div>

	</div>
	<div class="col-md-4">
	</div>
</div>