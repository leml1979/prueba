<div class="form-group row">
	<div class="col-md-3">
		<label>Tenencia</label>
		<span class="control-obligatorio">*</span>
		<div class="input-group">
			{!! Form::select("tenencia",$tenencias,isset($establecimiento)?$establecimiento->tenencia_id:null,["class"=>"form-control select2", "required"=>"required","placeholder"=>"Seleccione...."])!!}
		</div>
	</div>
	<div class="col-md-3">
		<label>Tipo de Inmueble</label>
		<span class="control-obligatorio">*</span>
		<div class="input-group">
			{!! Form::select("tipo_inmueble",$inmuebles,isset($establecimiento)?$establecimiento->inmueble_id:null,["class"=>"form-control select2", "required"=>"required","placeholder"=>"Seleccione...."])!!}
		</div>
	</div>
	<div class="col-md-3">
		<label>Nombre</label>
		<span class="control-obligatorio">*</span>
		<div class="input-group">
			{!! Form::text("nombre_inmueble",isset($establecimiento)?$establecimiento->nombre_inmueble:null,["class"=>"form-control","required"=>"required","placeholder"=>"Nombre del Inmueble"])!!}
		</div>
	</div>
	<div class="col-md-3">
		<label>Capacidad</label>
		<span class="control-obligatorio">*</span>
		<div class="input-group">
			{!! Form::text("capacidad",isset($establecimiento)?$establecimiento->capacidad:null,["class"=>"form-control","required"=>"required","placeholder"=>"Capacidad","id"=>"capacidad"])!!}
		</div>
	</div>
</div>
<div class="form-group row">
	<div class="col-md-6">
		<label>Apartamento/Local/Oficina</label>
		<span class="control-obligatorio">*</span>
		<div class="input-group">
			{!! Form::text("apartamento",isset($establecimiento)?$establecimiento->apartamento_oficina:null,["class"=>"form-control","required"=>"required","placeholder"=>"Apartamento/Local/Oficina"])!!}
		</div>
	</div>
	<div class="col-md-3">
		<label>Piso</label>
		<div class="input-group">
			{!! Form::text("piso",isset($establecimiento)?$establecimiento->piso:null,["class"=>"form-control","placeholder"=>"Piso","id"=>"piso"])!!}
		</div>
	</div>
	<div class="col-md-3">
		<label>Nivel</label>
		<div class="input-group">
			{!! Form::text("nivel",isset($establecimiento)?$establecimiento->nivel:null,["class"=>"form-control","placeholder"=>"Nivel"])!!}
		</div>
	</div>
</div>