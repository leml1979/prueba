<div class="col-lg-3">
	<div class="form-group">
		<label>Estado</label>
		<span class="control-obligatorio">*</span>
		{!! Form::select("estado",$estados,isset($sujeto)?$sujeto->estado_id:null,["class"=>"form-control select2", "placeholder"=>"Seleccione....","required"=>"required", "id"=>"estado_id"])!!}
	</div>
</div>
<div class="col-lg-3">
	<div class="form-group">
		<label>Municipio</label>
		<span class="control-obligatorio">*</span>
		{!! Form::select("municipio",$municipios,isset($sujeto)?$sujeto->municipio_id:null,["class"=>"form-control select2", "placeholder"=>"Seleccione....","disabled"=>isset($sujeto)?false:true, "id"=>"municipio_id","required"=>"required"]) !!}
	</div>
</div>
<div class="col-lg-3">
	<div class="form-group">
		<label>Parroquia</label>
		<span class="control-obligatorio">*</span>
		{!! Form::select('parroquia', $parroquias, isset($sujeto)?$sujeto->parroquia_id:null, ['placeholder' => 'Selecciones...','class'=>'form-control select2',"disabled"=>isset($sujeto)?false:true,"id"=>'parroquia_id',"required"=>"required"]) !!}
	</div>
</div>
<div class="col-lg-3">
	<div class="form-group">
		<label>ciudad</label>
		<span class="control-obligatorio">*</span>
		{!! Form::text("ciudad",isset($sujeto)?$sujeto->ciudad:null,["class"=>"form-control","placeholder"=>"Ciudad", "required"=>"required","id"=>"ciudad_id"])!!}
	</div>
</div>