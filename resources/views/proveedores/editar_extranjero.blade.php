@extends('layouts.home')
@section('css')
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
Editar
@endsection
@section('titulo')
Gestión de Proveedores

@endsection

@section('content')
@if ($errors->any())

<div class="alert alert-danger col-md-3">
	<ul>
		
	</ul>
</div>
@endif
<div class="info-box">

	<div class="info-box-content">
		<div class="content">
			<div class="row">
				<div class="col-md-12">
					<div class="pull-right text-danger"><span>*</span>Campos Obligatorios</div>
				</div>
			</div>
			{!! Form::open(['route' => ["proveedores.update",$proveedorSujetos->id], 'method' => 'post','id'=>'proveedor-form'])!!}
			@method('PATCH')
			@csrf
			<div class="row">
				@include("proveedores.partials.form")
			</div>
			<div class="row">
				<button type="submit" class="btn btn-success" id="btn-guardar"><span class="fa fa-save"></span>Guardar</button>
				<a href="{{url('proveedores')}}" class="btn btn-warning">Regresar</a>
			</div>

			<input type="hidden" name="tipo_proveedor" value="2">
			{!! Form::close() !!}
		</div>
	</div>
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