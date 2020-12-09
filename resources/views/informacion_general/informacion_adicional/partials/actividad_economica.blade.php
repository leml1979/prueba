<div id="actividad_economica">
	<div class="row" style="font-size:1.5em">
		<span class="fa fa-pencil-alt"></span>Clasificación Industrial (Actividad Económica de la Empresa según CIIU Rev. 4)
	</div>
	<hr />
	<div class="form-group row">
		<div class="col-md-6">
			<div class="input-group">
				<label>Sección</label>
				<span class="input-group-addon control-obligatorio">*</span>
			</div>
			<div class="input-group">
				{!! Form::select("seccion_id",$secciones,isset($sujeto)?$sujeto->seccion_id:null ,["class"=>"form-control select2", "placeholder"=>"Seleccione....","required"=>"required","id"=>"seccion_id"]) !!}
			</div>
		</div>
		<div class="col-md-6">
			<div class="input-group">
				<label>División</label>
				<span class="input-group-addon control-obligatorio">*</span>
			</div>
			<div class="input-group">
				{!! Form::select("division_id",$divisiones,isset($sujeto)?$sujeto->division_id:null,["class"=>"form-control select2", "placeholder"=>"Seleccione....","required"=>"required","disabled"=>isset($sujeto)?false:true,  "id"=>"divisiones_id"])!!}
				
			</div>
		</div>
	</div>
	<div class="form-group row">
		<div class="col-md-6">
			<div class="input-group">
				<label>Grupo</label>
				<span class="input-group-addon control-obligatorio">*</span>
			</div>
			<div class="input-group">
				{!! Form::select("grupo_id",$grupos,isset($sujeto)?$sujeto->grupo_id:null,["class"=>"form-control select2", "placeholder"=>"Seleccione....","required"=>"required", "disabled"=>isset($sujeto)?false:true, "id"=>"grupo_id"])!!}
			</div>
		</div>
		<div class="col-md-6">
			<div class="input-group">
				<label>Clase</label>
				<span class="input-group-addon control-obligatorio">*</span>
			</div>
			<div class="input-group">
				{!! Form::select("clase_id",$clases,isset($sujeto)?$sujeto->clase_id:null,["class"=>"form-control select2", "placeholder"=>"Seleccione....","required"=>"required", "disabled"=>isset($sujeto)?false:true, "id"=>"clase_id"])!!}
			</div>
		</div>
	</div>

	<div class="form-group row">
		<div class="col-md-12">
			<div class="input-group">
				<label>Descripción específica</label>
				<span class="input-group-addon control-obligatorio">*</span>
			</div>
			<div class="input-group">
				{!! Form::textarea("descripcion",isset($sujeto)?$sujeto->descripcion_actividad:null,["class"=>"form-control","placeholder"=>"Descripcion","rows"=>4,"required"=>"required","style"=>"text-transform:uppercase"])!!}
			</div>
		</div>
	</div>
</div>
