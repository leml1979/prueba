<div class="col-sm-3">
	<div class="form-group">
		<label>Estado</label>
		<span class="control-obligatorio">*</span>
		{!! Form::select("estado",$estados,null,["class"=>"form-control select2", "placeholder"=>"Seleccione....","required"=>"required", "id"=>"estado_id"])!!}
	</div>
</div>
<div class="col-sm-3">
	<div class="form-group">
		<label>Municipio</label>
		<span class="control-obligatorio">*</span>
		{!! Form::select("municipio",$municipios,null,["class"=>"form-control select2", "placeholder"=>"Seleccione....","disabled"=>true, "id"=>"municipio_id","required"=>"required"]) !!}
	</div>
</div>
<div class="col-sm-3">
	<div class="form-group">
		<label>Parroquia</label>
		<span class="control-obligatorio">*</span>
		{!! Form::select('parroquia', $parroquias, null, ['placeholder' => 'Selecciones...','class'=>'form-control select2',"disabled"=>true,"id"=>'parroquia_id',"required"=>"required"]) !!}
	</div>
</div>
<div class="col-sm-3">
	<div class="form-group">
		<label>ciudad</label>
		<span class="control-obligatorio">*</span>
		{!! Form::text("ciudad",null,["class"=>"form-control","placeholder"=>"Ciudad", "required"=>"required","id"=>"ciudad_id"])!!}
	</div>
</div>