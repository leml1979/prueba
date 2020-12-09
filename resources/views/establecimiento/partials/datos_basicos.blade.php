<div class="form-group row">
	<div class="col-md-3">
		<label>Tipo Sede</label>
		<span class="control-obligatorio">*</span>
		<div class="input-group">
			{!! Form::select("tipo_sede",$tipoSedes,isset($establecimiento)?$establecimiento->tipo_sede_id:null,["class"=>"form-control select2", "required"=>"required","placeholder"=>"Seleccione ..."])!!}
		</div>
	</div>
	<div class="col-md-3">
		<label>Establecimiento</label>
		<span class="control-obligatorio">*</span>
		<div class="input-group">
			{!! Form::text("establecimiento",isset($establecimiento)?$establecimiento->establecimiento:null,["class"=>"form-control", "required"=>"required","placeholder"=>"Establecimiento","style"=>"text-transform:uppercase"])!!}
		</div>
	</div>
	<div class="col-md-3">
		<label>Tipo</label>
		<span class="control-obligatorio">*</span>
		<div class="input-group">
			{!! Form::select("tipo_establecimiento",$infraestructuras,isset($establecimiento)?$establecimiento->infraestructura_id:null,["class"=>"form-control select2", "required"=>"required","placeholder"=>"Seleccione ..."])!!}
		</div>
	</div>
	<div class="col-md-3">
		<label>Rel. Dependencia</label>
		<span class="control-obligatorio">*</span>
		<div class="input-group">
			{!! Form::select("relacion_dependencia",$relacion_dependencia,isset($establecimiento)?$establecimiento->relacion_dependencia_id:null,["class"=>"form-control select2", "required"=>"required","placeholder"=>"Seleccione ..."])!!}
		</div>
	</div>
</div>
<div class="form-group row">
	<div class="col-md-12">
		<label>Actividad</label>
		<span class="control-obligatorio">*</span>
		<div class="input-group">
			{!! Form::textarea("actividad",isset($establecimiento)?$establecimiento->actividad:null,["class"=>"form-control",'rows' => 4, 'cols' => 54, "required"=>"required","style"=>"text-transform:uppercase"])!!}
		</div>
	</div>
</div>