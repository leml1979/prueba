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
Proveedor

@endsection
@section('titulo')
Gestión de Proveedores

@endsection

@section('content')
@include('partials.errores')
<div class="content">
	<div class="row">
		<div class="col-sm-12">
			<div class="float-right text-danger"><span>*</span>Campos Obligatorios</div>
		</div>
	</div>
	{!! Form::open(['url' => '/proveedores', 'method' => 'post','id'=>'proveedor-form'])!!}
	
	@csrf
	<div class="row">
		
		<div class="col-sm-12">
			<fieldset class="fieldset-collapse">
				<legend><span class="fa fa-check"></span>Tipo Proveedor</legend>
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group clearfix">
							<div class="icheck-primary d-inline">
								<input type="radio" id="radioPrimary1" name="tipo_proveedor" value="1">
								<label for="radioPrimary1">
									Nacional
								</label>
							</div>
							<div class="icheck-primary d-inline">
								<input type="radio" id="radioPrimary2" name="tipo_proveedor" value="2">
								<label for="radioPrimary2">
									Extranjero
								</label>
							</div>

						</div>
					</div>
				</div>
			</fieldset>
		</div>
	</div>
	<div class="row" id="nacional">
		<div class="col-sm-12">
			<fieldset class="fieldset-collapse">
				<legend><span class="fa fa-check"></span>Consulta por Documento de Identificación RIF</legend>
				<div class="row">
					<div class="col-sm-3">
						<div class="form-group">
							<label>Registro de Información Fiscal</label>
							<span class="control-obligatorio">*</span>
							<div class="input-group">
								<div class="col-xs-3">
									<select name="tipo" class="form-control select2" id="tipo">
										<option value="V">V</option>
										<option value="E">E</option>
										<option value="P">P</option>
										<option value="J">J</option>
										<option value="G">G</option>
										<option value="N">N</option>
									</select>
								</div>
								{!! Form::text('rif',null, ["class"=>"form-control","placeholder"=>"RIF","maxlength"=>10, "id"=>"rif"]) !!}
								<button id="buscar" class="btn btn-primary" type="button"> 
									<span class="fa fa-search icon"></span>
								</button>
							</div>
						</div>
					</div>
				</div>
			</fieldset>
		</div>
		<div class="col-sm-12" id="datos_proveedor" style="margin-bottom: 4%">
			<fieldset class="fieldset-collapse">
				<legend><span class="fa fa-check"></span>Datos</legend>
				<div class="row">
					<div class="col-sm-3" id="datos">
						
					</div>
				</div>
			</fieldset>
		</div>
	</div>
	<div class="row" id="extranjero">
		<div class="col-sm-12">
			<fieldset class="fieldset-collapse">
				<legend><span class="fa fa-check"></span></legend>
				<div class="row">
					@include("proveedores.partials.form")
				</div>
			</fieldset>
		</div>
	</div>
	<button type="submit" class="btn btn-primary" id="btn-guardar"><span class="fa fa-save"></span>Guardar</button>
	<input type='hidden' name='razon_social' value='' id="razon_social">
	{!! Form::close() !!}
</div>

@endsection

@section('js')
<script type="text/javascript" src="{{asset('plugins/select2/js/select2.min.js')}}"></script>
<script type="text/javascript">
	$('#nacional').hide();
	$('#extranjero').hide();
	$('#datos_proveedor').hide();
	$('#btn-guardar').hide();
	$('input[name="tipo_proveedor"]').prop('checked', false);
	$(document).ready(function(){
		$("#proveedor-form").trigger("reset");
		$('#nacional').hide();
		$('#extranjero').hide();
		$('#datos_proveedor').hide();
		$('input[name="tipo_proveedor"]').prop('checked', false);
		$('input:radio[name=tipo_proveedor]').change(function () {
			$("#btn-guardar").prop("disabled",true);
			$('#btn-guardar').show();
			if ($("input[name='tipo_proveedor']:checked").val() == '1') {
				$('#nacional').show();
				$('#extranjero').hide();
			}
			if ($("input[name='tipo_proveedor']:checked").val() == '2') {
				$('#nacional').hide();
				$('#extranjero').show();
				$("#btn-guardar").prop("disabled",false);
			}
		});

		$("#buscar").on('click',function(e){
			e.preventDefault();
			var msjUser = $("#datos");
			$.ajax({
				url: '{{url('proveedores/buscarDatos')}}',
				type: 'post',
				data: { tipo: $("#tipo").val(), rif: $("#rif").val(),_token:$("input[name='_token']").val() },
				beforeSend: function (){
					msjUser.html('<div class="alert alert-info"><span>Consultando, por favor espere</span></div>');
				},
				error: function(){
					msjUser.html('<div class="alert alert-danger"><span>Ocurrio un error, intente mas tarde...</span></div>');
					$("#btn-guardar").prop("disabled",true);
				},
				success: function (data) {
					msjUser.empty();
					if (data.mensajes == 1) {
						msjUser.html(data.razon_social);
						$("#razon_social").val(data.razon_social);
						$("#btn-guardar").prop("disabled",false);
					} else {
						msjUser.empty();
						msjUser.html('<div class="alert alert-danger"><span>El RIF no se encuentra registrado en el Seniat</span></div>');
						$("#btn-guardar").prop("disabled",true);
					}
				}
			});
			$('#datos_proveedor').show();
		});
		$("select").select2();
	});
</script>

@endsection