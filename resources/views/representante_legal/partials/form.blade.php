<div class="form-group row">
	<div class="col-md-3">
		<div class="input-group">
			{!! Form::label('Cargo', 'Cargo:', array('class' => 'negrita')) !!}
			<span class="input-group-addon control-obligatorio">*</span>
		</div>
		<div class="input-group">
			{!! Form::text('cargo',isset($representanteLegal)?$representanteLegal->cargo:null, ["class"=>"form-control","placeholder"=>"Cargo","style"=>"text-transform:uppercase"]) !!}
		</div>
	</div>
	<div class="col-md-3">
		<div class="input-group">
			{!! Form::label('Correo', 'Correo:', array('class' => 'negrita')) !!}
			<span class="input-group-addon control-obligatorio">*</span>
		</div>
		<div class="input-group">
			{!! Form::text('correo',isset($representanteLegal)?$representanteLegal->correo:null, ["class"=>"form-control","placeholder"=>"Correo","required"=>"required","style"=>"text-transform:uppercase"]) !!}
		</div>
	</div>
	<div class="col-md-3">
		<div class="input-group">
			{!! Form::label('Telefono', 'Telefono:', array('class' => 'negrita')) !!}
			<span class="input-group-addon control-obligatorio">*</span>
		</div>
		<div class="input-group">
			{!! Form::text('telefono',isset($representanteLegal)?$representanteLegal->telefono:null, ["class"=>"form-control","placeholder"=>"02120000000","required"=>"required","maxlength"=>"11","id"=>"telefono"]) !!}
		</div>
	</div>

	<div class="col-md-3">
		<div class="input-group">
			{!! Form::label('Telefono Celular', 'Telefono Celular:', array('class' => 'negrita')) !!}
			<span class="input-group-addon control-obligatorio">*</span>
		</div>
		<div class="input-group">
			{!! Form::text('celular',isset($representanteLegal)?$representanteLegal->celular:null, ["class"=>"form-control","placeholder"=>"04160000000","maxlength"=>"11","id"=>"celular"]) !!}
		</div>
	</div>
</div>