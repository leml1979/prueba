<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			<label>Sección</label>
			<span class="control-obligatorio">*</span>
			{!! Form::select("seccion_id",$secciones,isset($sujeto)?$sujeto->seccion_id:null,["class"=>"form-control select2", "placeholder"=>"Seleccione....","required"=>"required","id"=>"seccion_id"]) !!}
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label>División</label>
			<span class="control-obligatorio">*</span>
			{!! Form::select("division_id",$divisiones,isset($sujeto)?$sujeto->division_id:null,["class"=>"form-control select2", "placeholder"=>"Seleccione....","required"=>"required","disabled"=>isset($sujeto)?false:true,  "id"=>"divisiones_id"])!!}
		</div>
	</div>

</div>
<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			<label>Grupo</label>
			<span class="control-obligatorio">*</span>
			{!! Form::select("grupo_id",$grupos,isset($sujeto)?$sujeto->grupo_id:null,["class"=>"form-control select2", "placeholder"=>"Seleccione....","required"=>"required", "disabled"=>isset($sujeto)?false:true, "id"=>"grupo_id"])!!}
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label>Clase</label>
			<span class="control-obligatorio">*</span>
			{!! Form::select("clase_id",$clases,isset($sujeto)?$sujeto->clase_id:null,["class"=>"form-control select2", "placeholder"=>"Seleccione....","required"=>"required", "disabled"=>isset($sujeto)?false:true, "id"=>"clase_id"])!!}
		</div>
	</div>
</div>