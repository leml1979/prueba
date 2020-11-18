@extends('layouts.home')

@section('css')
<link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
<link href="{{asset('dist/css/bootstrap-select.min.css')}}" rel='stylesheet' type='text/css'>
<style type="text/css">
	.select2-container .select2-selection--single{
		height: calc(2.25rem + 2px);
	}
	.control-obligatorio {
		margin: 3px;
		vertical-align: middle;
		font-weight: bold;
		font-size: 20px;
		color: #c0273c;
	}
</style>
@endsection

@section('breadcrumb')
Información Adicional

@endsection
@section('titulo')
Información Adicional
@endsection

@section('content')
<div class="">
	@include('flash::message')
</div>
@include('partials.errores')
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class="float-right text-danger"><span>*</span>Campos Obligatorios</div>

		</div>
	</div>
	{!! Form::open(['url' => '/adicional', 'method' => 'post','id'=>'proveedor-form']) !!}
	@csrf
	@if($sujeto->numero_registro!=null)
	<div id="registro_mercantil">		
		<div class="row">
			<div class="col-sm-12">
				<fieldset class="fieldset-collapse">
					<legend>
						<span class="fa fa-check"></span>Registro Mercantil
					</legend>
					<hr />
					<div class="row">
						<div class="col-sm-3">
							<div class="form-group">
								<label>Numero de Expediente</label>
								<span class="control-obligatorio">*</span>
								{!! Form::text("numero_expediente",$sujeto->numero_registro,["class"=>"form-control","placeholder"=>"Expediente", "id"=>"numero_expediente"])!!}
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group">
								<label>Fecha Registro</label>
								<span class="control-obligatorio">*</span>
								{!! Form::date("fecha_registro",$sujeto->fecha_registros,["class"=>"form-control","placeholder"=>"Fecha Registro", "id"=>"fecha_registro"])!!}
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group">
								<label>Tomo</label>
								<span class="control-obligatorio">*</span>
								{!! Form::text("tomo",$sujeto->tomo,["class"=>"form-control","placeholder"=>"Tomo", "id"=>"tomo"])!!}
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group">
								<label>Folio</label>
								<span class="control-obligatorio">*</span>
								{!! Form::text("folio",$sujeto->folio,["class"=>"form-control","placeholder"=>"Folio", "id"=>"folio"])!!}
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<label>Nombre Comercial</label>
								{!! Form::text("nombre_comercial",$sujeto->nombre_comercial,["class"=>"form-control","placeholder"=>"Nombre Comercial"])!!}
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label>Capital Suscrito</label>
								<span class="control-obligatorio">*</span>
								{!! Form::text("capital_suscrito",$sujeto->capital_suscrito,["class"=>"form-control","placeholder"=>"Capital Suscrito","id"=>"capital_suscrito"])!!}
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label>Capital Pagado</label>
								<span class="control-obligatorio">*</span>
								{!! Form::text("capital_pagado",$sujeto->capital_pagado,["class"=>"form-control","placeholder"=>"Capital Pagado","id"=>"capital_pagado"])!!}
							</div>
						</div>
					</div>
				</fieldset>
			</div>
		</div>
		
		<div class="row" id="estatus_empresa">
			<div class="col-sm-12">
				<fieldset class="fieldset-collapse">
					<legend><span class="fa fa-check"></span>Estatus de Empresa</legend>
					<hr />
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label>Fecha desde:</label>
								<span class="control-obligatorio">*</span>
								{!! Form::date("fecha_desde",$sujeto->fecha_estatus_desde,["class"=>"form-control","placeholder"=>"Fecha desde", "id"=>"fecha_desde"])!!}
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label>Estatus</label>
								<span class="control-obligatorio">*</span>
								{!! Form::select("estatus_empresa",$estatus_empresa,$sujeto->estatus_empresa_adicional_id,["class"=>"form-control select2", "placeholder"=>"Seleccione....","id"=>"estatus_empresa"]) !!}
							</div>
						</div>

					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label>Explicación del Estatus</label>
								<span class="control-obligatorio">*</span>
								{!! Form::textarea("explicacion_estatus",$sujeto->explicacion_estatus,["class"=>"form-control","placeholder"=>"Explicacion","rows"=>4, "id"=>"explicacion_estatus"])!!}
							</div>
						</div>
					</div>
				</fieldset>
			</div>
		</div>
	</div>
	@endif
	<div class="row" id="actividad_economica">
		<div class="col-sm-12">
			<fieldset class="fieldset-collapse">
				<legend><span class="fa fa-check"></span>Clasificación Industrial (Actividad Económica de la Empresa según CIIU Rev. 4)</legend>
				<hr />
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label>Sección</label>
							<span class="control-obligatorio">*</span>
							{!! Form::select("seccion_id",$secciones,$sujeto->seccion_id,["class"=>"form-control select2", "placeholder"=>"Seleccione....","required"=>"required","id"=>"seccion_id"]) !!}
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label>División</label>
							<span class="control-obligatorio">*</span>
							{!! Form::select("division_id",$divisiones,$sujeto->division_id,["class"=>"form-control select2", "placeholder"=>"Seleccione....","required"=>"required","disabled"=>true,  "id"=>"divisiones_id"])!!}
						</div>
					</div>

				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label>Grupo</label>
							<span class="control-obligatorio">*</span>
							{!! Form::select("grupo_id",$grupos,$sujeto->grupo_id,["class"=>"form-control select2", "placeholder"=>"Seleccione....","required"=>"required", "disabled"=>true, "id"=>"grupo_id"])!!}
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label>Clase</label>
							<span class="control-obligatorio">*</span>
							{!! Form::select("clase_id",$clases,$sujeto->clase_id,["class"=>"form-control select2", "placeholder"=>"Seleccione....","required"=>"required", "disabled"=>true, "id"=>"clase_id"])!!}
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<label>Descripción específica</label>
							<span class="control-obligatorio">*</span>
							{!! Form::textarea("descripcion",null,["class"=>"form-control","placeholder"=>"Descripcion","rows"=>4,"required"=>"required"])!!}
						</div>
					</div>
				</div>
			</fieldset>
		</div>
	</div>
	<div class="row" id="direccion_fiscal">
		<div class="col-sm-12">
			<fieldset class="fieldset-collapse">
				<legend><span class="fa fa-check"></span>Dirección Fiscal</legend>
				<div class="row">
					@include("partials.estado_municipio_parroquia")
				</div>
				@include("partials.direccion")
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label>Teléfono</label>
							{!! Form::text("telefono",null,["class"=>"form-control","placeholder"=>"Teléfono","maxlength"=>"15","id"=>"telefono"])!!}
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label>Fax</label>
							{!! Form::text("fax",null,["class"=>"form-control","placeholder"=>"Fax","maxlength"=>"15","id"=>"fax"])!!}
						</div>
					</div>
				</div>
			</fieldset>
		</div>
	</div>
	<div class="row" id="sitio_internet">
		<div class="col-sm-12">
			<fieldset class="fieldset-collapse">
				<legend><span class="glyphicon glyphicon-check"></span>Sitio de Internet</legend>
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<label>Sitio de Internet</label>
							{!! Form::text("sitio_internet",null,["class"=>"form-control","placeholder"=>"Página WEB"])!!}
						</div>
					</div>
				</div>
			</fieldset>
		</div>
	</div>
	<div class="row" id="tipologia_empresa">
		<div class="col-sm-12">
			<fieldset class="fieldset-collapse">
				<legend><span class="glyphicon glyphicon-check"></span>Tipología de la Empresa</legend>
				<div class="row">
					<div class="col-sm-2">
						<div class="form-group">
							<label>Servicios</label>
							<span class="control-obligatorio">*</span>
							<div class="form-group clearfix">
								<div class="icheck-primary d-inline">
									<input type="radio" id="servicios1" name="servicios" value="1" required>
									<label for="servicios1">
										Sí
									</label>
								</div>
								<div class="icheck-primary d-inline">
									<input type="radio" id="servicios0" name="servicios" value="0">
									<label for="servicios0">
										No
									</label>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="form-group">
							<label>Comercializadora</label>
							<span class="control-obligatorio">*</span>
							<div class="form-group clearfix">
								<div class="icheck-primary d-inline">
									<input type="radio" id="comercializadora1" name="comercializadora" value="1" required>
									<label for="comercializadora1">
										Sí
									</label>
								</div>
								<div class="icheck-primary d-inline">
									<input type="radio" id="comercializadora0" name="comercializadora" value="0">
									<label for="comercializadora0">
										No
									</label>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="form-group">
							<label>Productora</label>
							<span class="control-obligatorio">*</span>
							<div class="form-group clearfix">
								<div class="icheck-primary d-inline">
									<input type="radio" id="productora1" name="productora" value="1" required>
									<label for="productora1">
										Sí
									</label>
								</div>
								<div class="icheck-primary d-inline">
									<input type="radio" id="productora0" name="productora" value="0">
									<label for="productora0">
										No
									</label>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="form-group">
							<label>Distribuidora</label>
							<span class="control-obligatorio">*</span>
							<div class="form-group clearfix">
								<div class="icheck-primary d-inline">
									<input type="radio" id="distribuidora1" name="distribuidora" value="1" required>
									<label for="distribuidora1">
										Sí
									</label>
								</div>
								<div class="icheck-primary d-inline">
									<input type="radio" id="distribuidora0" name="distribuidora" value="0">
									<label for="distribuidora0">
										No
									</label>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="form-group">
							<label>Exportadora</label>
							<span class="control-obligatorio">*</span>
							<div class="form-group clearfix">
								<div class="icheck-primary d-inline">
									<input type="radio" id="exportadora1" name="exportadora" value="1" required>
									<label for="exportadora1">
										Sí
									</label>
								</div>
								<div class="icheck-primary d-inline">
									<input type="radio" id="exportadora0" name="exportadora" value="0">
									<label for="exportadora0">
										No
									</label>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="form-group">
							<label>Importadora</label>
							<span class="control-obligatorio">*</span>
							<div class="form-group clearfix">
								<div class="icheck-primary d-inline">
									<input type="radio" id="importadora1" name="importadora" value="1" required>
									<label for="importadora1">
										Sí
									</label>
								</div>
								<div class="icheck-primary d-inline">
									<input type="radio" id="importadora0" name="importadora" value="0">
									<label for="importadora0">
										No
									</label>
								</div>
							</div>
						</div>
					</div>
				</div>
			</fieldset>
		</div>
	</div>
	<button class="btn btn-primary" type="submit">Guardar</button>
	{!! Form::close() !!}
</div>
@endsection

@section('js')
<script type="text/javascript" src="{{asset('plugins/select2/js/select2.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/inputmask/jquery.inputmask.min.js')}}"></script>
<script src="{{asset('dist/js/bootstrap-select.min.js')}}"></script>
<script type="text/javascript">
	$( document ).ready(function(){
		//$('#telefono').inputmask("(9999) 999-9999");
		//$('#fax').inputmask("(9999) 999-9999");
		//$('#capital_pagado').inputmask('###.###.###,##', { reverse: true });
		
		
		
		$("select").select2();
		
		$('input:radio[name=posse]').change(function () {
			$('#btn-guardar').show();
			if ($("input[name='posse']:checked").val() == 'si') {
				$("#numero_expediente").prop("required", true);
				$("#tomo").prop("required", true);
				$("#fecha_registro").prop("required", true);
				$("#folio").prop("required", true);
				$("#capital_pagado").prop("required", true);
				$("#capital_suscrito").prop("required", true);
				$("#fecha_desde").prop("required", true);
				//$("#estatus_empresa").removeAttr("required");
				$("#explicacion_estatus").prop("required", true);
				$('#registro_mercantil').show();
				$('#extranjero').hide();
			}
			if ($("input[name='posse']:checked").val() == 'no') {
				$("#numero_expediente").prop("required", false);
				$("#tomo").prop("required", false);
				$("#fecha_registro").prop("required", false);
				$("#folio").prop("required", false);
				$("#capital_pagado").prop("required", false);
				$("#capital_suscrito").prop("required", false);
				$("#fecha_desde").prop("required", false);
				//$("#estatus_empresa").removeAttr("required");
				$("#explicacion_estatus").prop("required", false);
				$('#registro_mercantil').hide();
				$('#extranjero').show();
			}
		});

		$("#estado_id").on("change",function(event){
			event.preventDefault();
			if($(this).val()!=""){
				var id_estado = $(this).val();
				var token = $("input[name='_token']").val();
				$.ajax({
					url: "{{url('municipios')}}",
					method: 'POST',
					data: {id_estado:id_estado, _token:token},
					//headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
					success: function(data) {
						$("#municipio_id").html(data);
						$("#municipio_id").prop("disabled", false);
						$("#municipio_id").html(data).selectpicker('refresh');
						$("#municipio_id").change();
					}
				});

			}else{
				$("#municipio_id").prop("disabled", true);
				$("#parroquia_id").prop("disabled", true);
			}
		});

		$("#municipio_id").on("change",function(event){
			event.preventDefault();
			if($(this).val()!=""){
				var id_municipio = $(this).val();
				var token = $("input[name='_token']").val();
				$.ajax({
					url: "{{url('parroquias')}}",
					method: 'POST',
					data: {id_municipio:id_municipio, _token:token},
					//headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
					success: function(data) {
						$("#parroquia_id").html(data);
						$("#parroquia_id").prop("disabled", false);
						$("#parroquia_id").html(data).selectpicker('refresh');
						$("#parroquia_id").change();
					}
				});

			}else{
				$("#parroquia_id").prop("disabled", true);
			}
		});
		$("#seccion_id").on("change",function(event){
			event.preventDefault();
			if($(this).val()!=""){
				var seccion_id = $(this).val();
				var token = $("input[name='_token']").val();
				$.ajax({
					url: "{{url('division')}}",
					method: 'POST',
					data: {seccion_id:seccion_id, _token:token},
					//headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
					success: function(data) {
						$("#divisiones_id").html(data);
						$("#divisiones_id").prop("disabled", false);
						$("#divisiones_id").html(data).selectpicker('refresh');
						$("#divisiones_id").change();
					}
				});

			}else{
				$("#divisiones_id").prop("disabled", true);
			}
		});
		$("#divisiones_id").on("change",function(event){
			event.preventDefault();
			if($(this).val()!=""){
				var divisiones_id = $(this).val();
				var token = $("input[name='_token']").val();
				$.ajax({
					url: "{{url('grupo')}}",
					method: 'POST',
					data: {divisiones_id:divisiones_id, _token:token},
					//headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
					success: function(data) {
						$("#grupo_id").html(data);
						$("#grupo_id").prop("disabled", false);
						$("#grupo_id").html(data).selectpicker('refresh');
						$("#grupo_id").change();
					}
				});

			}else{
				$("#grupo_id").prop("disabled", true);
			}
		});
		$("#grupo_id").on("change",function(event){
			event.preventDefault();
			if($(this).val()!=""){
				var grupo_id = $(this).val();
				var token = $("input[name='_token']").val();
				$.ajax({
					url: "{{url('clase')}}",
					method: 'POST',
					data: {grupo_id:grupo_id, _token:token},
					//headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
					success: function(data) {
						$("#clase_id").html(data);
						$("#clase_id").prop("disabled", false);
						$("#clase_id").html(data).selectpicker('refresh');
						$("#clase_id").change();
					}
				});

			}else{
				$('#clase_id option[value=""]').attr('selected', true)
				$("#clase_id").prop("disabled", true);
			}
		});
	});
</script>
@endsection