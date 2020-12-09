<div id="registro_mercantil">
	<div class="row" style="font-size:1.5em">
		<span class="fa fa-pencil-alt"></span>Registro Mercantil
	</div>
	<hr />
	<div class="form-group row">
		<div class="col-md-3">
			<div class="input-group">
				<label>Nº de Expediente</label>
				<span class="input-group-addon control-obligatorio">*</span>
			</div>
			<div class="input-group">
				{!! Form::text("numero_expediente",isset($sujeto)?$sujeto->numero_registro:null,["class"=>"form-control","placeholder"=>"Expediente", "id"=>"numero_expediente","style"=>"text-transform:uppercase"])!!}
			</div>
		</div>
		<div class="col-md-3">
			<div class="input-group">
				<label>Fecha Registro</label>
				<span class="input-group-addon control-obligatorio">*</span>
			</div>
			<div class="input-group">
				{!! Form::date("fecha_registro",isset($sujeto)?$sujeto->fecha_registros:null,["class"=>"form-control","placeholder"=>"Fecha Registro", "id"=>"fecha_registro"])!!}
			</div>
		</div>
		<div class="col-md-3">
			<div class="input-group">
				<label>Tomo</label>
				<span class="input-group-addon control-obligatorio">*</span>
			</div>
			<div class="input-group">
				{!! Form::text("tomo",isset($sujeto)?$sujeto->tomo:null,["class"=>"form-control","placeholder"=>"Tomo", "id"=>"tomo","style"=>"text-transform:uppercase"])!!}
			</div>
		</div>
		<div class="col-md-3">
			<div class="input-group">
				<label>Folio</label>
				<span class="input-group-addon control-obligatorio">*</span>
			</div>
			<div class="input-group">
				{!! Form::text("folio",isset($sujeto)?$sujeto->folio:null,["class"=>"form-control","placeholder"=>"Folio", "id"=>"folio","style"=>"text-transform:uppercase"])!!}
			</div>
		</div>
	</div>
	<div class="form-group row">
		<div class="col-md-4">
			<div class="input-group">
				<label>Nombre Comercial</label>
				<span class="input-group-addon control-obligatorio">*</span>
			</div>
			<div class="input-group">
				{!! Form::text("nombre_comercial",isset($sujeto)?$sujeto->nombre_comercial:null,["class"=>"form-control","placeholder"=>"Nombre Comercial","style"=>"text-transform:uppercase"])!!}
			</div>
		</div>
		
		<div class="col-md-4">
			<div class="input-group">
				<label>Capital Suscrito</label>
				<span class="input-group-addon control-obligatorio">*</span>
			</div>
			<div class="input-group">
				{!! Form::text("capital_suscrito",isset($sujeto)?$sujeto->capital_suscrito:null,["class"=>"form-control","placeholder"=>"Capital Suscrito","id"=>"capital_suscrito"])!!}
			</div>
		</div>
		<div class="col-md-4">
			<div class="input-group">
				<label>Capital Pagado</label>
				<span class="input-group-addon control-obligatorio">*</span>
			</div>
			<div class="input-group">
				{!! Form::text("capital_pagado",isset($sujeto)?$sujeto->capital_pagado:null,["class"=>"form-control","placeholder"=>"Capital Pagado","id"=>"capital_pagado"])!!}
			</div>
		</div>
	</div>

	<div id="estatus_empresa">
		<div class="row" style="font-size:1.5em">
			<span class="fa fa-pencil-alt"></span>Estatus de Empresa
		</div>
		<hr />
		<div class="form-group row">
			<div class="col-md-6">
				<label>Fecha desde:</label>
				<span class="control-obligatorio">*</span>
				{!! Form::date("fecha_desde",isset($sujeto)?$sujeto->fecha_estatus_desde:null,["class"=>"form-control","placeholder"=>"Fecha desde", "id"=>"fecha_desde"])!!}
			</div>
			<div class="col-md-6">
				<label>Estatus</label>
				<span class="control-obligatorio">*</span>
				{!! Form::select("estatus_empresa",$estatus_empresa,isset($sujeto)?$sujeto->estatus_empresa_adicional_id:null,["class"=>"form-control select2", "placeholder"=>"Seleccione....","id"=>"estatus_empresa"]) !!}
			</div>
		</div>
		<div class="form-group row">
			<div class="col-md-12">
				<div class="form-group">
					<label>Explicación del Estatus</label>
					<span class="control-obligatorio">*</span>
					{!! Form::textarea("explicacion_estatus",isset($sujeto)?$sujeto->explicacion_estatus:null,["class"=>"form-control","placeholder"=>"Explicacion","rows"=>4, "id"=>"explicacion_estatus","style"=>"text-transform:uppercase"])!!}
				</div>
			</div>
		</div>
	</div>
</div>

