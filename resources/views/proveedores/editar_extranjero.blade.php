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
@if ($errors->any())

<div class="alert alert-danger col-sm-3">
	<ul>
		
	</ul>
</div>
@endif
<div class="content">
	<div class="row">
		<div class="col-sm-12">
			<div class="pull-right text-danger"><span>*</span>Campos Obligatorios</div>
		</div>
	</div>
	{!! Form::open(['url' => '/proveedores/'.$proveedorSujetos->id, 'method' => 'path','id'=>'proveedor-form'])!!}

	@csrf
	<div class="row">
		<div class="row" id="extranjero">
			<div class="col-sm-12">
				<fieldset class="fieldset-collapse">
					<legend><span class="fa fa-check"></span></legend>
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<label>Código</label>
								{!! Form::text('codigo',null, ["class"=>"form-control","placeholder"=>"Código"]) !!}						
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label>Nombre del Proveedor</label>
								<span class="control-obligatorio">*</span>
								{!! Form::text('nombre_proveedor',null, ["class"=>"form-control","placeholder"=>"Nombre del Proveedor"]) !!}						
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label>País</label>
								<span class="control-obligatorio">*</span> 
								{!! Form::select('pais',$paises,null, ["id"=>"pais","class"=>"form-control input-lg select2","style"=>"width: 100%; height: calc(2.25rem + 2px);","placeholder"=>"Seleccione...."]) !!}
							</div>
						</div>
					</div>
				</fieldset>
			</div>
		</div>
		<button type="submit" class="btn btn-primary" id="btn-guardar"><span class="fa fa-save"></span>Guardar</button>
		<input type='hidden' name='razon_social' value='' id="razon_social">
	</div>
	{!! Form::close() !!}
</div>

@endsection

@section('js')
<script type="text/javascript" src="{{asset('plugins/select2/js/select2.min.js')}}"></script>
<script type="text/javascript">
	$('#btn-guardar').hide();
	$('input[name="tipo_proveedor"]').prop('checked', false);
	$(document).ready(function(){
		$("select").select2();
	});
</script>

@endsection