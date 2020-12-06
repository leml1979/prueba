<div class="row">
	<div class="col-lg-3">
		<div class="form-group">
			<label>Zona Postal</label>
			<span class="control-obligatorio">*</span>
			{!! Form::text("zona_postal",isset($sujeto)?$sujeto->zona_postal:null,["class"=>"form-control","required"=>"required","maxlength"=>"6", "id"=>"zona_postal"])!!}
		</div>
	</div>
	<div class="col-lg-9">
		<div class="form-group">
			<label>Calle/Avenida/Vereda/Carretera/Esquina/Carrera</label>
			<span class="control-obligatorio">*</span>
			{!! Form::text("avenida",isset($sujeto)?$sujeto->avenida:null,["class"=>"form-control","required"=>"required"])!!}
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="form-group">
			<label>Urbanización/Zona/Sector/Barrio/Caserio</label>
			<span class="control-obligatorio">*</span>
			{!! Form::text("urbanizacion",isset($sujeto)?$sujeto->urbanizacion_barrio:null,["class"=>"form-control","required"=>"required"])!!}
		</div>
	</div>
	<div class="col-lg-12">
		<div class="form-group">
			<label>Punto de Referencia</label>
			<span class="control-obligatorio">*</span>
			{!! Form::text("punto_referencia",isset($sujeto)?$sujeto->punto_referencia:null,["class"=>"form-control","required"=>"required"])!!}
		</div>
	</div>
</div>
