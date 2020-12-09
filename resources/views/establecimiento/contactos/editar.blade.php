@extends('layouts.home')

@section('css')
<style type="text/css">
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
<div class="alert alert-danger col-md-4" id="error"></div>

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card bg-white">
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<div class="float-right text-danger"><span>*</span>Campos Obligatorios</div>

						</div>
					</div>
					<div class="row">
						<div class="table-responsive">
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
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card bg-white">
				<div class="card-body">

					<div class="row" style="margin-bottom: 2%;margin-top: 5%; font-size:1.5em">
						<span class="fa fa-pencil-alt"></span>Datos Adicionales

					</div>
					<hr />
					{!! Form::open(['route' => ['establecimiento-contacto.update',$id], 'method' => 'post','id'=>'establecimiento-contacto-form']) !!}
					@method("PATCH")
					@csrf
					@include('establecimiento.contactos.partials.form')

					<div class="input-group col-md-6" style="margin-top: 10px;">

						<button type="submit" class="btn btn-primary" id="btn-guardar" style="margin-right: 5px"><span class="fa fa-save"></span>Guardar</button>
						<a href="{{url('/establecimiento/'.$id.'/contacto')}}" class="btn btn-warning">Regresar</a>
					</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

@section('js')
<script type="text/javascript">
	$( document ).ready(function(){
		$("#error").hide();
		jQuery('#celular').keyup(function () {
			this.value = this.value.replace(/[^0-9]/g, '');
		});
		jQuery('#telefono').keyup(function () {
			this.value = this.value.replace(/[^0-9]/g, '');
		});
		
	});
</script>
@endsection