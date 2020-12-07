<div class="row">
	<div class="col-md-3">
		<label>Tipo Sede</label>
		<span class="control-obligatorio">*</span>
		{!! Form::select("tipo_sede",$tipoSedes,isset($establecimiento)?$establecimiento->tipo_sede_id:null,["class"=>"form-control select2", "required"=>"required","placeholder"=>"Seleccione ..."])!!}
	</div>
	<div class="col-md-3">
		<label>Establecimiento</label>
		<span class="control-obligatorio">*</span>
		{!! Form::text("establecimiento",isset($establecimiento)?$establecimiento->establecimiento:null,["class"=>"form-control", "required"=>"required","placeholder"=>"Establecimiento"])!!}
	</div>
	<div class="col-md-3">
		<label>Tipo de Establecimiento</label>
		<span class="control-obligatorio">*</span>
		{!! Form::select("tipo_establecimiento",$infraestructuras,isset($establecimiento)?$establecimiento->infraestructura_id:null,["class"=>"form-control select2", "required"=>"required","placeholder"=>"Seleccione ..."])!!}
	</div>
	<div class="col-md-3">
		<label>Relacion de Dependencia</label>
		<span class="control-obligatorio">*</span>
		{!! Form::select("relacion_dependencia",$relacion_dependencia,isset($establecimiento)?$establecimiento->relacion_dependencia_id:null,["class"=>"form-control select2", "required"=>"required","placeholder"=>"Seleccione ..."])!!}
	</div>
	<div class="col-md-12">
		<label>Actividad</label>
		<span class="control-obligatorio">*</span>
		{!! Form::textarea("actividad",isset($establecimiento)?$establecimiento->actividad:null,["class"=>"form-control",'rows' => 4, 'cols' => 54, "required"=>"required"])!!}
	</div>
</div>
</div>
</div>
</div>
<div class="info-box">

	<div class="info-box-content">
		<div class="content">
			<div class="row" style="margin-bottom: 2%;margin-top: 3%; font-size:1.5em">
				<span class="fa fa-pencil-alt"></span>Dirección

			</div>
			<hr />
			<div class="row">
				@include("partials.estado_municipio_parroquia_establecimiento")
			</div>
			@include("partials.direccion_establecimiento")
		</div>
	</div>
</div>
<div class="info-box">

	<div class="info-box-content">
		<div class="content">
			<div class="row" style="margin-bottom: 2%;margin-top: 3%; font-size:1.5em">
				<span class="fa fa-pencil-alt"></span>Inmueble
			</div>
			<div class="row">

				<div class="col-md-3">
					<label>Tenencia</label>
					<span class="control-obligatorio">*</span>
					{!! Form::select("tenencia",$tenencias,isset($establecimiento)?$establecimiento->tenencia_id:null,["class"=>"form-control select2", "required"=>"required","placeholder"=>"Seleccione...."])!!}
				</div>
				<div class="col-md-3">
					<label>Tipo de Inmueble</label>
					<span class="control-obligatorio">*</span>
					{!! Form::select("tipo_inmueble",$inmuebles,isset($establecimiento)?$establecimiento->inmueble_id:null,["class"=>"form-control select2", "required"=>"required","placeholder"=>"Seleccione...."])!!}
				</div>
				<div class="col-md-3">
					<label>Nombre del Inmueble</label>
					<span class="control-obligatorio">*</span>
					{!! Form::text("nombre_inmueble",isset($establecimiento)?$establecimiento->nombre_inmueble:null,["class"=>"form-control","required"=>"required","placeholder"=>"Nombre del Inmueble"])!!}
				</div>
				<div class="col-md-3">
					<label>Capacidad</label>
					<span class="control-obligatorio">*</span>
					{!! Form::text("capacidad",isset($establecimiento)?$establecimiento->capacidad:null,["class"=>"form-control","required"=>"required","placeholder"=>"Capacidad"])!!}
				</div>
				<div class="col-md-6">
					<label>Apartamento/Local/Oficina</label>
					<span class="control-obligatorio">*</span>
					{!! Form::text("apartamento",isset($establecimiento)?$establecimiento->apartamento_oficina:null,["class"=>"form-control","required"=>"required","placeholder"=>"Apartamento/Local/Oficina"])!!}
				</div>
				<div class="col-md-3">
					<label>Piso</label>
					{!! Form::text("piso",isset($establecimiento)?$establecimiento->piso:null,["class"=>"form-control","placeholder"=>"Piso"])!!}
				</div>
				<div class="col-md-3">
					<label>Nivel</label>
					{!! Form::text("nivel",isset($establecimiento)?$establecimiento->nivel:null,["class"=>"form-control","placeholder"=>"Nivel"])!!}
				</div>
			</div>