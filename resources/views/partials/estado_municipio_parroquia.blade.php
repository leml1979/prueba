<div class="form-group row">
	<div class="col-md-3">
		<div class="input-group">
			<label>Estado</label>
			<span class="input-group-addon control-obligatorio">*</span>
		</div>
		<div class="input-group">
			{!! Form::select("estado",$estados,isset($sujeto)?$sujeto->estado_id:null,["class"=>"form-control select2", "placeholder"=>"Seleccione....","required"=>"required", "id"=>"estado_id"])!!}
		</div>
	</div>

	<div class="col-md-3">
		<div class="input-group">
			<label>Municipio</label>
			<span class="input-group-addon control-obligatorio">*</span>
		</div>
		<div class="input-group">
			{!! Form::select("municipio",$municipios,isset($sujeto)?$sujeto->municipio_id:null,["class"=>"form-control select2", "placeholder"=>"Seleccione....","disabled"=>isset($sujeto)?false:false, "id"=>"municipio_id","required"=>"required"]) !!}
		</div>
	</div>

	<div class="col-md-3">
		<div class="input-group">
			<label>Parroquia</label>
			<span class="input-group-addon control-obligatorio">*</span>
		</div>
		<div class="input-group">
			{!! Form::select('parroquia', $parroquias, isset($sujeto)?$sujeto->parroquia_id:null, ['placeholder' => 'Selecciones...','class'=>'form-control select2',"disabled"=>isset($sujeto)?false:false,"id"=>'parroquia_id',"required"=>"required"]) !!}
		</div>
	</div>

	<div class="col-md-3">
		<div class="input-group">
			<label>ciudad</label>
			<span class="input-group-addon control-obligatorio">*</span>
		</div>
		<div class="input-group">
			{!! Form::text("ciudad",isset($sujeto)?$sujeto->ciudad:null,["class"=>"form-control","placeholder"=>"Ciudad", "required"=>"required","id"=>"ciudad_id","style"=>"text-transform:uppercase"])!!}
		</div>
	</div>
</div>