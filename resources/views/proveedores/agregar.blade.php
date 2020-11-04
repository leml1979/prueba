@extends('layouts.home')
@section('css')
<link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">

@endsection
@section('breadcrumb')
Proveedor

@endsection
@section('titulo')
Gestión de Proveedores

@endsection

@section('content')
<div class="content">
	<div class="row">
		<div class="col-sm-12">
			<div class="pull-right text-danger"><span>*</span>Campos Obligatorios</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<fieldset class="fieldset-collapse">
				<legend><span class="glyphicon glyphicon-check"></span>Tpo Proveedor</legend>
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group clearfix">
							<div class="icheck-primary d-inline">
								<input type="radio" id="radioPrimary1" name="tipo_proveedor" value="nacional">
								<label for="radioPrimary1">
									Nacional
								</label>
							</div>
							<div class="icheck-primary d-inline">
								<input type="radio" id="radioPrimary2" name="tipo_proveedor" value="extranjero">
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
				<legend><span class="glyphicon glyphicon-check"></span>Consulta por Documento de Idetficación RIF</legend>
				<div class="row">
					<div class="col-sm-3">
						<div class="form-group">
							<label>Registro de Información Fiscal</label>
							<span class="control-obligatorio">*</span>
							<div class="input-group">
								<input ID="txtPassword" type="tet" Class="form-control" name="rif">
								<button id="buscar" class="btn btn-primary" type="button"> 
									<span class="fa fa-search icon"></span>
								</button>
							</div>
						</div>
					</div>
				</div>
			</fieldset>
		</div>
		<div class="col-sm-12" id="datos_proveedor">
			<fieldset class="fieldset-collapse">
				<legend><span class="glyphicon glyphicon-check"></span>Datos</legend>
				<div class="row">
					<div class="col-sm-3">
						valores
					</div>
				</div>
			</fieldset>
		</div>
	</div>
	<div class="row" id="extranjero">
		<div class="col-sm-12">
			<fieldset class="fieldset-collapse">
				<legend><span class="glyphicon glyphicon-check"></span></legend>
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<label>Código</label>
							<input id="" type="text" Class="form-control" name="codigo">
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label>Nombre del Proveedor</label>
							<input id="" type="text" Class="form-control" name="nombre_proveedor">
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label>País</label>
							<select name="pais" class="form-control select2-single">
								<option value="A">A</option>
								<option value="A">H</option>
								<option value="A">G</option>
								<option value="A">F</option>
								<option value="A">E</option>
								<option value="A">D</option>
								<option value="A">C</option>
								<option value="A">B</option>
							</select>
						</div>
					</div>
				</div>
			</fieldset>
		</div>
	</div>
</div>

@endsection

@section('js')
<script type="text/javascript" src="{{asset('plugins/select2/js/select2.min.js')}}"></script>
<script type="text/javascript">
	$('#nacional').hide();
	$('#extranjero').hide();
	$('#datos_proveedor').hide();
	$('input[name="tipo_proveedor"]').prop('checked', false);
	$(document).ready(function(){
		$('#nacional').hide();
		$('#extranjero').hide();
		$('#datos_proveedor').hide();
		$('input[name="tipo_proveedor"]').prop('checked', false);
		$('input:radio[name=tipo_proveedor]').change(function () {
			if ($("input[name='tipo_proveedor']:checked").val() == 'nacional') {
				$('#nacional').show();
				$('#extranjero').hide();
			}
			if ($("input[name='tipo_proveedor']:checked").val() == 'extranjero') {
				$('#nacional').hide();
				$('#extranjero').show();
			}
		});

		$("#buscar").on('click',function(e){
			e.preventDefault();
			$('#datos_proveedor').show();
		});

		
		$("#pais").select2();


	});
</script>

@endsection