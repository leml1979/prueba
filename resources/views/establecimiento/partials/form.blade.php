<div class="row">
	<div class="col-sm-3">
		{!! Form::label('Cargo', 'Cargo:', array('class' => 'negrita')) !!}
		{!! Form::text('cargo',null, ["class"=>"form-control","placeholder"=>"Cargo","required"=>"required"]) !!}

	</div>
	<div class="col-sm-3">
		{!! Form::label('Correo', 'Correo:', array('class' => 'negrita')) !!}
		{!! Form::text('correo',null, ["class"=>"form-control","placeholder"=>"Correo","required"=>"required"]) !!}
	</div>
	<div class="col-sm-3">
		{!! Form::label('Telefono', 'Telefono:', array('class' => 'negrita')) !!}
		{!! Form::text('telefono',null, ["class"=>"form-control","placeholder"=>"02120000000","required"=>"required","maxlength"=>"11"]) !!}
	</div>

	<div class="col-sm-3">
		{!! Form::label('Telefono Celular', 'Telefono Celular:', array('class' => 'negrita')) !!}
		{!! Form::text('celular',null, ["class"=>"form-control","placeholder"=>"04160000000","required"=>"required","maxlength"=>"11"]) !!}

	</div>
	
</div>