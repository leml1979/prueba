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
		{!! Form::open(['route' => ['establecimiento.update',$establecimiento->id], 'method' => 'post','id'=>'establecimiento-form']) !!}
		@method("PATCH")
		@csrf
		
		<div class="row" style="margin-bottom: 2%;margin-top: 3%; font-size:1.5em">
			<span class="fa fa-pencil-alt"></span>Datos Basicos
			
		</div>
		<hr />
		@include("establecimiento.partials.form")
		<button type="submit" class="btn btn-primary" id="btn-guardar"><span class="fa fa-save"></span>Guardar</button>
		<a href="{{url('establecimiento')}}" class="btn btn-warning">Regresar</a>
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