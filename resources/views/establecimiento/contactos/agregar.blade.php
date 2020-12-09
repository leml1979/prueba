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
Gestión de Contactos

@endsection
@section('titulo')
Contactos Agregar
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

					{!! Form::open(['route' => 'establecimiento-contacto.store', 'method' => 'post','id'=>'establecimiento-contacto-form']) !!}

					@csrf
					<div class="row" style="margin-bottom: 2%;margin-top: 5%; font-size:1.5em">
						<span class="fa fa-search"></span>Consulta de Cédula 

					</div>
					<hr />

					<div class="input-group col-md-6">

						{!! Form::select('tipo',["V"=>"V","E"=>"E"],null, ["class"=>"form-control col-md-3","placeholder"=>"Seleccione....","required"=>"required","id"=>"tipo"]) !!}

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
					@include('establecimiento.contactos.partials.form')
					<div class="input-group col-md-6" style="margin-top: 10px;">

						<button type="submit" class="btn btn-primary" id="btn-guardar" style="margin-right: 5px"><span class="fa fa-save"></span>Guardar</button>
						<a href="{{url('/establecimiento/'.$id.'/contacto')}}" class="btn btn-warning">Regresar</a>
					</div>
					<input type='hidden' name='seniatsaime' value='' id="seniatsaime">
					<input type='hidden' name='establecimiento_id' value='{!! $id !!}' id="establecimiento_id">
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
		jQuery('#documento_identidad').keyup(function () {
			this.value = this.value.replace(/[^0-9]/g, '');
		});
		jQuery('#celular').keyup(function () {
			this.value = this.value.replace(/[^0-9]/g, '');
		});
		jQuery('#telefono').keyup(function () {
			this.value = this.value.replace(/[^0-9]/g, '');
		});
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
						$("#datos").html("Datos encontrado: "+data.nombre1.toUpperCase()+" "+data.nombre2 + " "+data.apellido1 + " "+data.apellido2);
						$("#seniatsaime").val(data.codigo);
						$("#btn-guardar").prop("disabled",false);

					}
				}
			});
		});
	});
</script>
@endsection