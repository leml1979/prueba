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
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class="pull-right text-danger"><span>*</span>Campos Obligatorios</div>

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
					<legend><span class="glyphicon glyphicon-check"></span>Registro Mercantil</legend>
					<div class="row">
						<div class="col-sm-3">
							<div class="form-group">
								<label>Numero de Expediente</label>
								<span class="control-obligatorio">*</span>
								<input type="text" name="numero_expediente" class="form-control" placeholder="Expediente">
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group">
								<label>Fecha Registro</label>
								<span class="control-obligatorio">*</span>
								<input type="text" name="fecha_registro" class="form-control" placeholder="Fecha Registro">
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group">
								<label>Tomo</label>
								<span class="control-obligatorio">*</span>
								<input type="text" name="tomo" class="form-control" placeholder="Tomo" required="true">
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group">
								<label>Folio</label>
								<span class="control-obligatorio">*</span>
								<input type="text" name="folio" class="form-control" placeholder="Folio" required="true">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<label>Nombre Comercial</label>
								<input type="text" name="nombre_comercial" class="form-control" placeholder="Nombre Comercial">
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label>Capital Suscrito</label>
								<span class="control-obligatorio">*</span>
								<input type="text" name="capital_suscrito" class="form-control" placeholder="Capital Suscrito">
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label>Capital Pagado</label>
								<span class="control-obligatorio">*</span>
								<input type="text" name="capital_pagado" class="form-control" placeholder="Capital Pagado">
							</div>
						</div>
						
					</div>
				</fieldset>

			</div>
		</div>
		<div class="row" id="estatus_empresa">
			<div class="col-sm-12">
				<fieldset class="fieldset-collapse">
					<legend><span class="glyphicon glyphicon-check"></span>Estatus de Empresa</legend>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label>Fecha desde:</label>
								<span class="control-obligatorio">*</span>
								<input type="text" name="fecha_desde" class="form-control" placeholder="Fecha Desde" readonly="" required="true">
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
								<textarea name="explicacion" rows="4"  class="form-control"></textarea>
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
				<legend><span class="glyphicon glyphicon-check"></span>Clasificación Industrial (Actividad Económica de la Empresa según CIIU Rev. 4)</legend>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label>Sección</label>
							<span class="control-obligatorio">*</span>
							{!! Form::select("seccion",$secciones,null,["class"=>"form-control select2", "placeholder"=>"Seleccione...."]) !!}
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label>División</label>
							<span class="control-obligatorio">*</span>
							{!! Form::select("division",$divisiones,null,["class"=>"form-control select2", "placeholder"=>"Seleccione....","required"=>"required", "id"=>"divisiones_id"])!!}
						</div>
					</div>

				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label>Grupo</label>
							<span class="control-obligatorio">*</span>
							{!! Form::select("grupo",$grupos,null,["class"=>"form-control select2", "placeholder"=>"Seleccione....","required"=>"required", "id"=>"grupo_id"])!!}
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label>Clase</label>
							<span class="control-obligatorio">*</span>
							{!! Form::select("clase",$clases,null,["class"=>"form-control select2", "placeholder"=>"Seleccione....","required"=>"required", "id"=>"clase_id"])!!}
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<label>Descripción específica</label>
							<span class="control-obligatorio">*</span>
							<textarea name="explicacion" rows="4"  class="form-control" required="required"></textarea>
						</div>
					</div>
				</div>
			</fieldset>
		</div>
	</div>
	<div class="row" id="direccion_fiscal">
		<div class="col-sm-12">
			<fieldset class="fieldset-collapse">
				<legend><span class="glyphicon glyphicon-check"></span>Dirección Fiscal</legend>
				<div class="row">
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
							<input id="ciudad_id" type="text" name="ciudad" class="form-control" placeholder="Ciudad" required="required">
						</div>
					</div>

				</div>
				<div class="row">
					<div class="col-sm-3">
						<div class="form-group">
							<label>Zona Postal</label>
							<span class="control-obligatorio">*</span>
							{!! Form::text("zona_postal",null,["class"=>"form-control","required"=>"required"])!!}
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<label>Latitud</label>
							{!! Form::text("latitud",null,["class"=>"form-control","required"=>"required"])!!}
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<label>Longitud</label>
							{!! Form::text("longitud",null,["class"=>"form-control","required"=>"required"])!!}
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<label>Avenida</label>
							<span class="control-obligatorio">*</span>
							{!! Form::text("avenida",null,["class"=>"form-control","required"=>"required"])!!}
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label>Calle</label>
							<span class="control-obligatorio">*</span>
							{!! Form::text("calle",null,["class"=>"form-control","required"=>"required"])!!}
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label>Carrera</label>
							<span class="control-obligatorio">*</span>
							{!! Form::text("carrera",null,["class"=>"form-control","required"=>"required"])!!}
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<label>Urbanización</label>
							{!! Form::text("urbanizacion",null,["class"=>"form-control","required"=>"required"])!!}
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label>Transversal</label>
							<span class="control-obligatorio">*</span>
							{!! Form::text("transversal",null,["class"=>"form-control","required"=>"required"])!!}
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label>Esquina</label>
							<span class="control-obligatorio">*</span>
							{!! Form::text("esquina",null,["class"=>"form-control","required"=>"required"])!!}
						</div>
					</div>
					
				</div>
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<label>Callejón</label>
							<input type="text" name="callejon" class="form-control" placeholder="Callejón">
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label>Ruta</label>
							<span class="control-obligatorio">*</span>
							<input type="text" name="ruta" class="form-control" placeholder="Ruta">
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label>Vereda</label>
							<span class="control-obligatorio">*</span>
							<input type="text" name="vereda" class="form-control" placeholder="Vereda">
						</div>
					</div>
					
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label>Teléfono</label>
							<input type="text" name="telefono" class="form-control" placeholder="Teléfono">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label>Fax</label>
							<input type="text" name="fax" class="form-control" placeholder="Fax">
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
							<input type="text" name="sitio_internet" class="form-control" placeholder="Página WEB">
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
	{!! Form::close() !!}
</div>
<div class="">
	@include('flash::message')
</div>
@endsection

@section('js')
<script type="text/javascript" src="{{asset('plugins/select2/js/select2.min.js')}}"></script>
<script type="text/javascript">
	$( document ).ready(function(){
		$('input[name="posse"]').prop('checked', false);
		$("select").select2();
		$("#registro_mercantil").hide();

		$('input:radio[name=posse]').change(function () {
			$('#btn-guardar').show();
			if ($("input[name='posse']:checked").val() == 'si') {
				$('#registro_mercantil').show();
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
	});
</script>
@endsection