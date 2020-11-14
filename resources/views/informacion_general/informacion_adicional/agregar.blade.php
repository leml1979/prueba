@extends('layouts.home')

@section('css')
<link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
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
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class="float-right text-danger"><span>*</span>Campos Obligatorios</div>

		</div>
	</div>
	{!! Form::open(['url' => '/adicional', 'method' => 'post','id'=>'proveedor-form']) !!}
	@csrf
	<div class="row">
		<div class="col-sm-12">
			<div class="form-group">
				<label>Posse usted registro mercantil</label>
				<span class="control-obligatorio">*</span>
				<div class="form-group clearfix">
					<div class="icheck-primary d-inline">
						<input type="radio" id="radioPrimary1" name="posse" value="si">
						<label for="radioPrimary1">
							Sí
						</label>
					</div>
					<div class="icheck-primary d-inline">
						<input type="radio" id="radioPrimary2" name="posse" value="no">
						<label for="radioPrimary2">
							No
						</label>
					</div>
				</div>
			</div>
		</div>
	</div>
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
								{!! Form::text("numero_expediente",null,["class"=>"form-control","placeholder"=>"Expediente", "id"=>"numero_expediente"])!!}
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group">
								<label>Fecha Registro</label>
								<span class="control-obligatorio">*</span>
								{!! Form::date("fecha_registro",null,["class"=>"form-control","placeholder"=>"Fecha Registro"])!!}
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group">
								<label>Tomo</label>
								<span class="control-obligatorio">*</span>
								{!! Form::text("tomo",null,["class"=>"form-control","placeholder"=>"Tomo"])!!}
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group">
								<label>Folio</label>
								<span class="control-obligatorio">*</span>
								{!! Form::text("folio",null,["class"=>"form-control","placeholder"=>"Folio"])!!}
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<label>Nombre Comercial</label>
								{!! Form::text("nombre_comercial",null,["class"=>"form-control","placeholder"=>"Nombre Comercial"])!!}
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label>Capital Suscrito</label>
								<span class="control-obligatorio">*</span>
								{!! Form::text("capital_suscrito",null,["class"=>"form-control","placeholder"=>"Capital Suscrito"])!!}
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label>Capital Pagado</label>
								<span class="control-obligatorio">*</span>
								{!! Form::text("capital_pagado",null,["class"=>"form-control","placeholder"=>"Capital Pagado"])!!}
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
								{!! Form::date("fecha_desde",null,["class"=>"form-control","placeholder"=>"Fecha desde"])!!}
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label>Estatus</label>
								<span class="control-obligatorio">*</span>
								<select name="estatus_empresa" class="form-control" placeholder="introduca">
									<option value="A">Activa</option>
								</select>
							</div>
						</div>

					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label>Explicación del Estatus</label>
								<span class="control-obligatorio">*</span>
								{!! Form::textarea("explicacion_estatus",null,["class"=>"form-control","placeholder"=>"Explicacion","rows"=>4])!!}
							</div>
						</div>
					</div>
				</fieldset>
			</div>
		</div>
	</div>

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
							{!! Form::select("seccion_id",$secciones,null,["class"=>"form-control select2", "placeholder"=>"Seleccione....","required"=>"required","id"=>"seccion_id"]) !!}
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label>División</label>
							<span class="control-obligatorio">*</span>
							{!! Form::select("division_id",$divisiones,null,["class"=>"form-control select2", "placeholder"=>"Seleccione....","required"=>"required", "id"=>"divisiones_id"])!!}
						</div>
					</div>

				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label>Grupo</label>
							<span class="control-obligatorio">*</span>
							{!! Form::select("grupo_id",$grupos,null,["class"=>"form-control select2", "placeholder"=>"Seleccione....","required"=>"required", "id"=>"grupo_id"])!!}
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label>Clase</label>
							<span class="control-obligatorio">*</span>
							{!! Form::select("clase_id",$clases,null,["class"=>"form-control select2", "placeholder"=>"Seleccione....","required"=>"required", "id"=>"clase_id"])!!}
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
							{!! Form::text("telefono",null,["class"=>"form-control","placeholder"=>"Teléfono"])!!}
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label>Fax</label>
							{!! Form::text("fax",null,["class"=>"form-control","placeholder"=>"Fax"])!!}
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
					<div class="col-sm-3">
						<div class="form-group">
							<label>Servicios</label>
							<span class="control-obligatorio">*</span>
							<div class="form-group clearfix">
								<div class="icheck-primary d-inline">
									<input type="radio" id="servicios1" name="servicios" value="1">
									<label for="servicios1">
										Sí
									</label>
								</div>
								<div class="icheck-primary d-inline">
									<input type="radio" id="servicios2" name="servicios" value="2">
									<label for="servicios2">
										No
									</label>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<label>Comercializadora</label>
							<span class="control-obligatorio">*</span>
							<div class="form-group clearfix">
								<div class="icheck-primary d-inline">
									<input type="radio" id="comercializadora1" name="comercializadora" value="1">
									<label for="comercializadora1">
										Sí
									</label>
								</div>
								<div class="icheck-primary d-inline">
									<input type="radio" id="comercializadora2" name="comercializadora" value="2">
									<label for="comercializadora2">
										No
									</label>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<label>Productora</label>
							<span class="control-obligatorio">*</span>
							<div class="form-group clearfix">
								<div class="icheck-primary d-inline">
									<input type="radio" id="productora1" name="productora" value="1">
									<label for="productora1">
										Sí
									</label>
								</div>
								<div class="icheck-primary d-inline">
									<input type="radio" id="productora2" name="productora" value="2">
									<label for="productora2">
										No
									</label>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<label>Importadora</label>
							<span class="control-obligatorio">*</span>
							<div class="form-group clearfix">
								<div class="icheck-primary d-inline">
									<input type="radio" id="importadora1" name="importadora" value="1">
									<label for="importadora1">
										Sí
									</label>
								</div>
								<div class="icheck-primary d-inline">
									<input type="radio" id="importadora2" name="importadora" value="2">
									<label for="importadora2">
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
<script type="text/javascript">
	$( document ).ready(function(){
		$('input[name="posse"]').prop('checked', false);
		$("select").select2();
		$("#registro_mercantil").hide();
		$("#divisiones_id").prop("disabled", true);
		$("#grupo_id").prop("disabled", true);
		$("#clase_id").prop("disabled", true);
		$('input:radio[name=posse]').change(function () {
			$('#btn-guardar').show();
			if ($("input[name='posse']:checked").val() == 'si') {
				$('#registro_mercantil').show();
				$("#")
				$('#extranjero').hide();
			}
			if ($("input[name='posse']:checked").val() == 'no') {
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