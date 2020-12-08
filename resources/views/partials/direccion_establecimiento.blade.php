<div class="form-group row">
	<div class="col-sm-3">
		<div class="input-group">
			<label>Zona Postal</label>
			<span class="input-group-addon control-obligatorio">*</span>
		</div>
		<div class="input-group">
			{!! Form::text("zona_postal",isset($establecimiento)?$establecimiento->zona_postal:null,["class"=>"form-control","required"=>"required","maxlength"=>"6", "id"=>"zona_postal"])!!}
		</div>
	</div>
	<div class="col-sm-9">
		<div class="input-group">
			<label>Calle/Avenida/Vereda/Carretera/Esquina/Carrera</label>
			<span class="input-group-addon control-obligatorio">*</span>
		</div>
		<div class="input-group">
			{!! Form::text("avenida",isset($establecimiento)?$establecimiento->avenida:null,["class"=>"form-control","required"=>"required"])!!}
		</div>
	</div>
</div>
<div class="form-group row">
	<div class="col-sm-12">
		<div class="input-group">
			<label>Urbanización/Zona/Sector/Barrio/Caserio</label>
			<span class="input-group-addon control-obligatorio">*</span>
		</div>
		<div class="input-group">
			{!! Form::text("urbanizacion",isset($establecimiento)?$establecimiento->urbanizacion_barrio:null,["class"=>"form-control","required"=>"required"])!!}
		</div>
	</div>
</div>
<div class="form-group row">
	<div class="col-sm-12">
		<div class="input-group">
			<label>Punto de Referencia</label>
			<span class="input-group-addon control-obligatorio">*</span>
		</div>
		<div class="input-group">
			{!! Form::text("punto_referencia",isset($establecimiento)?$establecimiento->punto_referencia:null,["class"=>"form-control","required"=>"required"])!!}
		</div>
	</div>
</div>
