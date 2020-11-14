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
Establecimiento

@endsection
@section('titulo')
Gestion de Establecimiento
@endsection

@section('content')
@include('partials.errores')
<div class="alert alert-danger col-sm-4" id="error"></div>
<div class="row">
		<div class="col-sm-12">
			<div class="float-right text-danger"><span>*</span>Campos Obligatorios</div>

		</div>
	</div>
<div class="content">
	<div class="row">
		{!! Form::open(['route' => 'establecimiento.store', 'method' => 'post','id'=>'establecimiento-form']) !!}
		
		@csrf
		
		<div class="row" style="margin-bottom: 2%;margin-top: 3%; font-size:1.5em">
			<span class="fa fa-pencil-alt"></span>Datos Basicos
			
		</div>
		<hr />
		<div class="row">
			<div class="col-sm-3">
				<div class="form-group">
					<label>Tipo Sede</label>
					<span class="control-obligatorio">*</span>
					{!! Form::select("tipo_sede",$tipoSedes,null,["class"=>"form-control select2", "required"=>"required","placeholder"=>"Seleccione ..."])!!}
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<label>Establecimiento</label>
					<span class="control-obligatorio">*</span>
					{!! Form::text("establecimiento",null,["class"=>"form-control", "required"=>"required","placeholder"=>"Establecimiento"])!!}
				</div>
			</div>
			<div class="col-sm-3">
				<label>Tipo de Establecimiento</label>
				<span class="control-obligatorio">*</span>
				{!! Form::select("tipo_establecimiento",$infraestructuras,null,["class"=>"form-control select2", "required"=>"required","placeholder"=>"Seleccione ..."])!!}
			</div>
			<div class="col-sm-3">
				<label>Relacion de Dependencia</label>
				<span class="control-obligatorio">*</span>
				{!! Form::select("relacion_dependencia",$relacion_dependencia,null,["class"=>"form-control select2", "required"=>"required","placeholder"=>"Seleccione ..."])!!}
			</div>
			<div class="col-sm-12">
				<label>Actividad</label>
				<span class="control-obligatorio">*</span>
				{!! Form::textarea("actividad",null,["class"=>"form-control",'rows' => 4, 'cols' => 54, "required"=>"required"])!!}
			</div>
		</div>
		<div class="row" style="margin-bottom: 2%;margin-top: 3%; font-size:1.5em">
			<span class="fa fa-pencil-alt"></span>Dirección
			
		</div>
		<hr />
		<div class="row">
			@include("partials.estado_municipio_parroquia")
		</div>
		@include("partials.direccion")
		<div class="row" style="margin-bottom: 2%;margin-top: 3%; font-size:1.5em">
			<span class="fa fa-pencil-alt"></span>Inmueble
		</div>
		<div class="row">
			
			<div class="col-sm-3">
				<label>Tenencia</label>
				<span class="control-obligatorio">*</span>
				{!! Form::select("tenencia",$tenencias,null,["class"=>"form-control select2", "required"=>"required","placeholder"=>"Seleccione...."])!!}
			</div>
			<div class="col-sm-3">
				<label>Tipo de Inmueble</label>
				<span class="control-obligatorio">*</span>
				{!! Form::select("tipo_inmueble",$inmuebles,null,["class"=>"form-control select2", "required"=>"required","placeholder"=>"Seleccione...."])!!}
			</div>
			<div class="col-sm-3">
				<label>Nombre del Inmueble</label>
				<span class="control-obligatorio">*</span>
				{!! Form::text("nombre_inmueble",null,["class"=>"form-control","required"=>"required","placeholder"=>"Nombre del Inmueble"])!!}
			</div>
			<div class="col-sm-3">
				<label>Capacidad</label>
				<span class="control-obligatorio">*</span>
				{!! Form::text("capacidad",null,["class"=>"form-control","required"=>"required","placeholder"=>"Capacidad"])!!}
			</div>
			<div class="col-sm-6">
				<label>Apartamento/Local/Oficina</label>
				<span class="control-obligatorio">*</span>
				{!! Form::text("apartamento",null,["class"=>"form-control","required"=>"required","placeholder"=>"Apartamento/Local/Oficina"])!!}
			</div>
			<div class="col-sm-3">
				<label>Piso</label>
				{!! Form::text("piso",null,["class"=>"form-control","placeholder"=>"Piso"])!!}
			</div>
			<div class="col-sm-3">
				<label>Nivel</label>
				{!! Form::text("nivel",null,["class"=>"form-control","placeholder"=>"Nivel"])!!}
			</div>
		</div>
		<button type="submit" class="btn btn-primary" id="btn-guardar"><span class="fa fa-save"></span>Guardar</button>
		{!! Form::close() !!}
	</div>
</div>

@endsection

@section('js')
<script type="text/javascript" src="{{asset('plugins/select2/js/select2.min.js')}}"></script>
<script type="text/javascript">
	$( document ).ready(function(){
		$("#error").hide();
		$("select").select2();
		
		$("#estado_id").on("change",function(event){
			event.preventDefault();
			if($(this).val()!=""){
				var id_estado = $(this).val();
				var token = $("input[name='_token']").val();
				$.ajax({
					url: "{{url('municipios')}}",
					method: 'POST',
					data: {id_estado:id_estado, _token:token},
					//headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
					success: function(data) {
						$("#municipio_id").html(data);
						$("#municipio_id").prop("disabled", false);
						$("#municipio_id").html(data).selectpicker('refresh');
						$("#municipio_id").change();
					}
				});

			}else{
				$("#municipio_id").prop("disabled", true);
				$("#parroquia_id").prop("disabled", true);
			}
		});

		$("#municipio_id").on("change",function(event){
			event.preventDefault();
			if($(this).val()!=""){
				var id_municipio = $(this).val();
				var token = $("input[name='_token']").val();
				$.ajax({
					url: "{{url('parroquias')}}",
					method: 'POST',
					data: {id_municipio:id_municipio, _token:token},
					//headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
					success: function(data) {
						$("#parroquia_id").html(data);
						$("#parroquia_id").prop("disabled", false);
						$("#parroquia_id").html(data).selectpicker('refresh');
						$("#parroquia_id").change();
					}
				});

			}else{
				$("#parroquia_id").prop("disabled", true);
			}
		});
	});
</script>
@endsection