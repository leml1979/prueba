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
Gestion de Representante Legal
@endsection

@section('content')
@include('partials.errores')
<div class="alert alert-danger col-sm-4" id="error"></div>
<div class="info-box">
	<div class="info-box-content">
		<div class="content">
			<div class="row">
				<div class="col-sm-12">
					<div class="float-right text-danger"><span>*</span>Campos Obligatorios</div>

				</div>
			</div>
			<div class="row">
				{!! Form::open(['route' => ['representante.update',$id], 'method' => 'post','id'=>'representante-form']) !!}
				@method("PATCH")
				@csrf
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
								<td>{!! $representanteLegal->saime->cedula!!}</td>
								<td>{!! $representanteLegal->saime->nombre1. " ". $representanteLegal->saime->nombre2 !!}</td>
								<td>{!! $representanteLegal->saime->apellido1. " ".$representanteLegal->saime->apellido2!!}</td>
								<td>{!! ($representanteLegal->saime->sexo=='M')?"Masculino":"Femenino"!!}</td>
							</tr>
						</tbody>
					</table>
				</div>
				<hr />
			</div>
		</div>
	</div>
</div>
<div class="info-box">
	<div class="info-box-content">
		<div class="content">
			<div class="row" style="margin-bottom: 2%;margin-top: 5%; font-size:2em">
				<span class="fa fa-pencil-alt"></span>Información del Representante Legal

			</div>
			<hr />

			@include('representante_legal.partials.form')

			<button type="submit" class="btn btn-success" id="btn-guardar"><span class="fa fa-save"></span>Guardar</button>
			<a href="{{url('representante')}}" class="btn btn-warning">Regresar</a>
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
	});
</script>
@endsection