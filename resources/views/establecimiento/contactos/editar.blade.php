@extends('layouts.home')

@section('css')
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
Gestión de Contactos
@endsection

@section('content')
@include('partials.errores')
<div class="alert alert-danger col-sm-4" id="error"></div>

<div class="content">
	<div class="row">
		<div class="col-sm-12">
			<div class="float-right text-danger"><span>*</span>Campos Obligatorios</div>

		</div>
	</div>
	<div class="row">
		{!! Form::open(['route' => ['establecimiento-contacto.update',$id], 'method' => 'post','id'=>'establecimiento-contacto-form']) !!}
		@method("PATCH")
		@csrf
		<div class="table">
			<table class="table">
				<thead>
					<th>Documento de Identificación</th>
					<th>Nombres</th>
					<th>Apellidos</th>
					<th>Sexo</th>
				</thead>
				<tbody>
					<tr>

						<td>{!! $contacto->saime->cedula!!}</td>
						<td>{!! $contacto->saime->nombre1. " ". $contacto->saime->nombre2 !!}</td>
						<td>{!! $contacto->saime->apellido1. " ".$contacto->saime->apellido2!!}</td>
						<td>{!! ($contacto->saime->sexo=='M')?"Masculino":"Femenino"!!}</td>
					</tr>
				</tbody>
			</table>
		</div>
		<hr />
		<div class="row" style="margin-bottom: 2%;margin-top: 5%; font-size:1.5em">
			<span class="fa fa-pencil-alt"></span>Datos Adicionales
			
		</div>
		<hr />

		@include('establecimiento.contactos.partials.form')

		<button type="submit" class="btn btn-primary" id="btn-guardar"><span class="fa fa-save"></span>Guardar</button>
		{!! Form::close() !!}
	</div>
</div>

@endsection

@section('js')
<script type="text/javascript">
	$( document ).ready(function(){
		$("#error").hide();
		$("select").select2();
	
	});
</script>
@endsection