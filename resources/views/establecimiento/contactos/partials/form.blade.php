<div class="row">
	<div class="col-sm-3">
		{!! Form::label('Cargo', 'Cargo:', array('class' => 'negrita')) !!}
		{!! Form::text('cargo',isset($contacto)?$contacto->cargo:null, ["class"=>"form-control","placeholder"=>"Cargo"]) !!}

	</div>
	<div class="col-sm-3">
		{!! Form::label('Correo', 'Correo:', array('class' => 'negrita')) !!}
		<span class="control-obligatorio">*</span>
		{!! Form::text('correo',isset($contacto)?$contacto->correo:null, ["class"=>"form-control","placeholder"=>"Correo","required"=>"required"]) !!}
	</div>
	<div class="col-sm-3">
		{!! Form::label('Telefono', 'Telefono:', array('class' => 'negrita')) !!}
		<span class="control-obligatorio">*</span>
		{!! Form::text('telefono',isset($contacto)?$contacto->telefono:null, ["class"=>"form-control","placeholder"=>"02120000000","required"=>"required","maxlength"=>"11"]) !!}
	</div>

	<div class="col-sm-3">
		{!! Form::label('Telefono Celular', 'Telefono Celular:', array('class' => 'negrita')) !!}
		{!! Form::text('celular',isset($contacto)?$contacto->celular:null, ["class"=>"form-control","placeholder"=>"04160000000","maxlength"=>"11"]) !!}

	</div>
	
</div>