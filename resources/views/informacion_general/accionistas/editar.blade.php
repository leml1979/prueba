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
Editar
@endsection
@section('titulo')
Gestión de Accionistas
@endsection

@section('content')
@include('partials.errores')
<div class="alert alert-danger col-sm-4" id="error"></div>
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card bg-white">
				<div class="card-body">
					<div class="row">
						<div class="col-sm-12">
							<div class="float-right text-danger"><span>*</span>Campos Obligatorios</div>

						</div>
					</div>

					{!! Form::open(['route' => ['accionista.update',$accionista->id], 'method' => 'post','id'=>'accionista-form']) !!}
					@method("PATCH")
					@csrf
					<div class="table-responsive">
						<table class="table">
							<thead>
								@if($accionista->saime_id!=null)
								<th>Documento de Identificación</th>
								<th>Nombres</th>
								<th>Apellidos</th>
								<th>Sexo</th>
								@else
								<th>Documento de Identificación</th>
								<th>Razon Social</th>
								@endif
							</thead>
							<tbody>
								<tr>
									@if($accionista->saime_id!=null)
									<td>{!! $accionista->saime->cedula!!}</td>
									<td>{!! $accionista->saime->nombre1. " ". $accionista->saime->nombre2 !!}</td>
									<td>{!! $accionista->saime->apellido1. " ".$accionista->saime->apellido2!!}</td>
									<td>{!! ($accionista->saime->sexo=='M')?"Masculino":"Femenino" !!}</td>
									@else
									<td>{!! $accionista->seniat->rif !!}</td>
									<td>{!! $accionista->seniat->razon_social!!}</td>
									@endif
								</tr>
							</tbody>
						</table>
					</div>
					<div class="row" style="margin-top: 3%" id="datos"></div>
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
					<div class="row" style="margin-bottom: 2%;margin-top: 5%; font-size:2em">
						<span class="fa fa-pencil-alt"></span>Datos Adicionales
					</div>
					<hr />
					@include('informacion_general.accionistas.partials.form')
					<button type="submit" class="btn btn-primary" id="btn-guardar"><span class="fa fa-save"></span>Guardar</button>
					<a href="{{url('accionista')}}" class="btn btn-warning">Regresar</a>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('js')
<script type="text/javascript" src="{{asset('plugins/select2/js/select2.min.js')}}"></script>
<script type="text/javascript">
	$( document ).ready(function(){
		$("#error").hide();
		$("select").select2();
		jQuery('#cantidad_acciones').keyup(function () {
			this.value = this.value.replace(/[^0-9]/g, '');
		});
	});
</script>
@endsection