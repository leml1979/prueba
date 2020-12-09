<div class="form-group row">
	<div class="col-md-3">
		<div class="input-group">
			<label>Zona Postal</label>
			<span class="input-group-addon control-obligatorio">*</span>
		</div>
		<div class="input-group">
			{!! Form::text("zona_postal",isset($sujeto)?$sujeto->zona_postal:null,["class"=>"form-control","required"=>"required","maxlength"=>"6", "id"=>"zona_postal"])!!}
		</div>
	</div>
	<div class="col-md-9">
		<div class="input-group">
			<label>Calle/Avenida/Vereda/Carretera/Esquina/Carrera</label>
			<span class="input-group-addon control-obligatorio">*</span>
		</div>
		<div class="input-group">
			{!! Form::text("avenida",isset($sujeto)?$sujeto->avenida:null,["class"=>"form-control","required"=>"required","style"=>"text-transform:uppercase"])!!}
		</div>
	</div>
</div>
<div class="form-group row">
	<div class="col-md-12">
		<div class="input-group">
			<label>Urbanización/Zona/Sector/Barrio/Caserio</label>
			<span class="input-group-addon control-obligatorio">*</span>
		</div>
		<div class="input-group">
			{!! Form::text("urbanizacion",isset($sujeto)?$sujeto->urbanizacion_barrio:null,["class"=>"form-control","required"=>"required","style"=>"text-transform:uppercase"])!!}
		</div>
	</div>
</div>

<div class="form-group row">
	<div class="col-md-12">
		<div class="input-group">
			<label>Punto de Referencia</label>
			<span class="input-group-addon control-obligatorio">*</span>
		</div>
		<div class="input-group">
			{!! Form::text("punto_referencia",isset($sujeto)?$sujeto->punto_referencia:null,["class"=>"form-control","required"=>"required","style"=>"text-transform:uppercase"])!!}
		</div>
	</div>
</div>
