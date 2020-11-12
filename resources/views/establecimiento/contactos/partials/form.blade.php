<div class="row">
	<div class="col-sm-3">
		{!! Form::label('Cargo', 'Cargo:', array('class' => 'negrita')) !!}
		{!! Form::text('cargo',null, ["class"=>"form-control","placeholder"=>"Cargo"]) !!}

	</div>
	<div class="col-sm-3">
		{!! Form::label('Correo', 'Correo:', array('class' => 'negrita')) !!}
		<span class="control-obligatorio">*</span>
		{!! Form::email('correo',null, ["class"=>"form-control","placeholder"=>"Correo Electronico","required"=>"required"]) !!}

	</div>
	<div class="col-sm-3">
		{!! Form::label('Teléfono', 'Teléfono:', array('class' => 'negrita')) !!}
		<span class="control-obligatorio">*</span>
		{!! Form::text('telefono',null, ["class"=>"form-control","placeholder"=>"02120000000","maxlength"=>"11","required"=>"required"]) !!}


	</div>
	<div class="col-sm-3">
		{!! Form::label('Celular', 'Celular:', array('class' => 'negrita')) !!}
		{!! Form::text('celular',null, ["class"=>"form-control","placeholder"=>"04160000000","maxlength"=>"11"]) !!}

	</div>
	
</div>