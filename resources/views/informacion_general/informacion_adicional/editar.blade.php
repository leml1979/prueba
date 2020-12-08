@extends('layouts.home')

@section('css')
<link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
<link href="{{asset('dist/css/bootstrap-select.min.css')}}" rel='stylesheet' type='text/css'>
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
Información Adicional
@endsection

@section('content')
<div class="">
	@include('flash::message')
</div>
@include('partials.errores')
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
					{!! Form::open(['route' => ["adicional.update",$sujeto->id], 'method' => 'post','id'=>'adicional-form']) !!}
					@method('PATCH')
					@csrf
					@if($sujeto->numero_registro!=null)
					@include("informacion_general.informacion_adicional.partials.registro_mercantil")
					@endif
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
					@include("informacion_general.informacion_adicional.partials.actividad_economica")

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

					<div id="direccion_fiscal">
						<div class="row" style="font-size:1.5em">
							<span class="fa fa-pencil-alt"></span>Dirección
						</div>
						<hr />
						@include("partials.estado_municipio_parroquia")
						@include("partials.direccion")
						<div class="form-group row">
							<div class="col-md-6">
								<div class="input-group">
									<label>Teléfono</label>
									<span class="input-group-addon control-obligatorio">*</span>
								</div>
								<div class="input-group">
									{!! Form::text("telefono",isset($sujeto)?$sujeto->telefono:null,["class"=>"form-control","placeholder"=>"Teléfono","maxlength"=>"15","id"=>"telefono"])!!}
								</div>
							</div>
							<div class="col-md-6">
								<div class="input-group">
									<label>Fax</label>
								</div>
								<div class="input-group">
									{!! Form::text("fax",isset($sujeto)?$sujeto->fax:null,["class"=>"form-control","placeholder"=>"Fax","maxlength"=>"15","id"=>"fax"])!!}
								</div>
							</div>
						</div>
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
					<div id="sitio_internet">
						<div class="row" style="font-size:1.5em">
							<span class="fa fa-pencil-alt"></span>Sitio de Internet
						</div>
						<hr />
						<div class="form-group row">
							<div class="col-sm-12">
								<div class="input-group">
									<label>Sitio de Internet</label>
								</div>
								<div class="input-group">
									{!! Form::text("sitio_internet",isset($sujeto)?$sujeto->pagina_web:null,["class"=>"form-control","placeholder"=>"Página WEB"])!!}
								</div>
							</div>
						</div>
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
					<div id="tipologia_empresa">
						<div class="row" style="font-size:1.5em">Tipología de la Empresa
						</div>
						<hr />
						@include("partials.tipologia")
					</div>
					<button class="btn btn-primary" type="submit">Guardar</button>
				</div>
				
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

@endsection

@section('js')
<script type="text/javascript" src="{{asset('plugins/select2/js/select2.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/inputmask/jquery.inputmask.min.js')}}"></script>
<script src="{{asset('dist/js/bootstrap-select.min.js')}}"></script>
<script type="text/javascript">
	$( document ).ready(function(){
		//$('#telefono').inputmask("(9999) 999-9999");
		//$('#fax').inputmask("(9999) 999-9999");
		//$('#capital_pagado').inputmask('###.###.###,##', { reverse: true });
		
		jQuery('#zona_postal').keyup(function () {
			this.value = this.value.replace(/[^0-9]/g, '');
		});
		
		$("select").select2();
		
		$('input:radio[name=posse]').change(function () {
			$('#btn-guardar').show();
			if ($("input[name='posse']:checked").val() == 'si') {
				$("#numero_expediente").prop("required", true);
				$("#tomo").prop("required", true);
				$("#fecha_registro").prop("required", true);
				$("#folio").prop("required", true);
				$("#capital_pagado").prop("required", true);
				$("#capital_suscrito").prop("required", true);
				$("#fecha_desde").prop("required", true);
				//$("#estatus_empresa").removeAttr("required");
				$("#explicacion_estatus").prop("required", true);
				$('#registro_mercantil').show();
				$('#extranjero').hide();
			}
			if ($("input[name='posse']:checked").val() == 'no') {
				$("#numero_expediente").prop("required", false);
				$("#tomo").prop("required", false);
				$("#fecha_registro").prop("required", false);
				$("#folio").prop("required", false);
				$("#capital_pagado").prop("required", false);
				$("#capital_suscrito").prop("required", false);
				$("#fecha_desde").prop("required", false);
				//$("#estatus_empresa").removeAttr("required");
				$("#explicacion_estatus").prop("required", false);
				$('#registro_mercantil').hide();
				$('#extranjero').show();
			}
		});

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
		$("#seccion_id").on("change",function(event){
			event.preventDefault();
			if($(this).val()!=""){
				var seccion_id = $(this).val();
				var token = $("input[name='_token']").val();
				$.ajax({
					url: "{{url('division')}}",
					method: 'POST',
					data: {seccion_id:seccion_id, _token:token},
					//headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
					success: function(data) {
						$("#divisiones_id").html(data);
						$("#divisiones_id").prop("disabled", false);
						$("#divisiones_id").html(data).selectpicker('refresh');
						$("#divisiones_id").change();
					}
				});

			}else{
				$("#divisiones_id").prop("disabled", true);
			}
		});
		$("#divisiones_id").on("change",function(event){
			event.preventDefault();
			if($(this).val()!=""){
				var divisiones_id = $(this).val();
				var token = $("input[name='_token']").val();
				$.ajax({
					url: "{{url('grupo')}}",
					method: 'POST',
					data: {divisiones_id:divisiones_id, _token:token},
					//headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
					success: function(data) {
						$("#grupo_id").html(data);
						$("#grupo_id").prop("disabled", false);
						$("#grupo_id").html(data).selectpicker('refresh');
						$("#grupo_id").change();
					}
				});

			}else{
				$("#grupo_id").prop("disabled", true);
			}
		});
		$("#grupo_id").on("change",function(event){
			event.preventDefault();
			if($(this).val()!=""){
				var grupo_id = $(this).val();
				var token = $("input[name='_token']").val();
				$.ajax({
					url: "{{url('clase')}}",
					method: 'POST',
					data: {grupo_id:grupo_id, _token:token},
					//headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
					success: function(data) {
						$("#clase_id").html(data);
						$("#clase_id").prop("disabled", false);
						$("#clase_id").html(data).selectpicker('refresh');
						$("#clase_id").change();
					}
				});

			}else{
				$('#clase_id option[value=""]').attr('selected', true)
				$("#clase_id").prop("disabled", true);
			}
		});
	});
</script>
@endsection