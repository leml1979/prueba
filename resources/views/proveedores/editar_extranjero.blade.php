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
	{!! Form::open(['route' => ["proveedores.update",$proveedorSujetos->id], 'method' => 'post','id'=>'proveedor-form'])!!}
	@method('PATCH')
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
								{!! Form::text('codigo',$proveedorSujetos->proveedor->rif_codigo, ["class"=>"form-control","placeholder"=>"Código"]) !!}						
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label>Nombre del Proveedor</label>
								<span class="control-obligatorio">*</span>
								{!! Form::text('nombre_proveedor',$proveedorSujetos->proveedor->proveedor, ["class"=>"form-control","placeholder"=>"Nombre del Proveedor"]) !!}						
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label>País</label>
								<span class="control-obligatorio">*</span> 
								{!! Form::select('pais',$paises,$proveedorSujetos->paises->id, ["id"=>"pais","class"=>"form-control input-lg select2","placeholder"=>"Seleccione...."]) !!}
							</div>
						</div>
					</div>
				</fieldset>
			</div>
		</div>

	</div>
	<div class="row">
		<button type="submit" class="btn btn-primary" id="btn-guardar"><span class="fa fa-save"></span>Guardar</button>
	</div>
	<input type="hidden" name="tipo_proveedor" value="2">
	{!! Form::close() !!}
</div>

@endsection

@section('js')
<script type="text/javascript" src="{{asset('plugins/select2/js/select2.min.js')}}"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("select").select2();
	});
</script>

@endsection