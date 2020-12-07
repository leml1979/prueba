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
Representante Legal

@endsection
@section('titulo')
Gestion de Representante Legal
@endsection

@section('content')
@include('partials.errores')
<div class="alert alert-danger col-md-4" id="error"></div>

<div class="info-box">
	<div class="info-box-content">
		<div class="content">
			<div class="row">
				<div class="col-md-12">
					<div class="float-right text-danger"><span>*</span>Campos Obligatorios</div>

				</div>
			</div>
			
			{!! Form::open(['route' => 'representante.store', 'method' => 'post','id'=>'representante-form']) !!}

			@csrf
			<div class="row" style="margin-bottom: 2%;margin-top: 5%; font-size:1.5em">
				<span class="fa fa-search"></span>Consulta de Cédula 
			</div>
			<hr />

			<div class="input-group col-md-6">
				{!! Form::select('tipo',["V"=>"V","E"=>"E"],null, ["class"=>"form-control","placeholder"=>"Seleccione....","required"=>"required","id"=>"tipo"]) !!}

				{!! Form::text('documento_identidad',null, ["class"=>"form-control","placeholder"=>"Buscar Persona","required"=>"required","id"=>"documento_identidad", "maxlength"=>"10"]) !!}
				<span class="input-group-btn">
					<a class="btn btn-primary" href="" id="buscar"><span class="fa fa-search"></span>buscar
					</a>
				</span>
			</div>
			<div class="row" style="margin-top: 3%" id="datos"></div>

		</div>
	</div>
</div>
<div class="info-box">
	<div class="info-box-content">
		<div class="content">
			<div class="row" style="margin-bottom: 2%;margin-top: 5%; font-size:1.5em">
				<span class="fa fa-pencil-alt"></span>Información del Representante Legal
			</div>
			<hr />

			@include('representante_legal.partials.form')

			<button type="submit" class="btn btn-success" id="btn-guardar"><span class="fa fa-save"></span>Guardar</button>
			<a href="{{url('representante')}}" class="btn btn-warning">Regresar</a>
			<input type='hidden' name='seniatsaime' value='' id="seniatsaime">

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
		$("#btn-guardar").prop("disabled",true);
		$("#buscar").on("click",function(event){
			event.preventDefault();
			$("#datos").empty();
			if($("#tipo").val()==""){
				$("#error").html("Seleccione el tipo de persona");
				$("#error").show();
				$("#tipo").focus();
				return false;
			}else {
				if($("#documento_identidad").val().trim()==""){

					$("#error").html("introduzca documento identidad de persona");
					$("#error").show();
					$("#documento_identidad").focus();
					return false;
				}
			}
			$("#error").hide();
			var documento_identidad = $("#documento_identidad").val();
			var tipo = $("#tipo").val()
			var token = $("input[name='_token']").val();
			$.ajax({
				url: "{{url('buscarpersona')}}",
				method: 'POST',
				data: {documento_identidad:documento_identidad,tipo:tipo, _token:token},
				beforeSend: function (){
					$("#datos").html('<div class="alert alert-info"><span>Consultando, por favor espere</span></div>');
				},
				error: function(){
					$("#datos").html('<div class="alert alert-danger"><span>Ocurrio un error, intente mas tarde...</span></div>');
					$("#btn-guardar").prop("disabled",true);
				},
				success: function(data) {
					if(data.encontrado==1){
						$("#datos").html("Datos encontrado: "+data.nombre1.toUpperCase()+" "+data.nombre2 + " "+data.apellido1 + " "+data.apellido2+", Sexo: "+data.sexo);
						$("#seniatsaime").val(data.codigo);
						$("#btn-guardar").prop("disabled",false);

					}else{
						$("#datos").html('<div class="alert alert-danger"><span>Datos no encontrado,vuelva a intentar</span></div>');
					}
				}
			});
		});
	});
</script>
@endsection