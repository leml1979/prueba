@extends('layouts.home')

@section('css')
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
Precios
@endsection

@section('titulo')
Precios

@endsection

@section('content')
@include('partials.errores')
<div class="alert alert-danger col-md-4" id="error"></div>

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-10">
			<div class="card bg-white">
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<div class="float-right text-danger"><span>*</span>Campos Obligatorios</div>
						</div>
					</div>
					{!! Form::open(['route' => 'precios.store', 'method' => 'post','id'=>'precios-form']) !!}

					@csrf
					
					<hr />
					<div class="form-group col-md-6">
						
						<label>Fecha: </label>
						{!! Form::date('fecha',null, ["class"=>"form-control","placeholder"=>"Fecha","required"=>"required","id"=>"fecha"]) !!}
						
					</div>

					<div class="form-group col-md-6">
						
						<label>Monto: </label>
						{!! Form::text('monto',null, ["class"=>"form-control","placeholder"=>"Monto","required"=>"required","id"=>"monto","onkeypress"=>"return isNumberKey(event)"]) !!}
						
					</div>
					<div class="form-group col-md-6">
						
						<label>Producto: </label>
						{!! Form::select('producto', $productos, ["class"=>"form-control select2"]); !!}
						
					</div>
					
					<br>
					<button type="submit" class="btn btn-primary" id="btn-guardar"><span class="fa fa-save"></span>Guardar</button>
					<a href="{{url('precios')}}" class="btn btn-warning">Regresar</a>
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
	});
	function isNumberKey(evt){
		var charCode = (evt.which) ? evt.which : event.keyCode
		if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode!=46)
			return false;
		return true;
	}

</script>
@endsection