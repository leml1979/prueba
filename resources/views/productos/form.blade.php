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
Productos
@endsection

@section('titulo')
Productos

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
					{!! Form::open(['route' => 'productos.store', 'method' => 'post','id'=>'productos-form']) !!}

					@csrf
					
					<hr />
					<div class="form-group col-md-6">
						
						<label>Nombre: </label>
						{!! Form::text('nombre',null, ["class"=>"form-control","placeholder"=>"Nombre Categoria","required"=>"required","id"=>"nombre", "maxlength"=>"20"]) !!}
						
					</div>

					<div class="form-group col-md-6">
						
						<label>Descripcion: </label>
						{!! Form::text('descripcion',null, ["class"=>"form-control","placeholder"=>"Descripcion Categoria","required"=>"required","id"=>"descripcion", "maxlength"=>"120"]) !!}
						
					</div>
					<div class="form-group col-md-6">
						
						<label>Categoria: </label>
						{!! Form::select('categoria', $categorias, ["class"=>"form-control select2"]); !!}
						
					</div>
					<div class="form-group col-md-6">
						
						<label>Exento: </label>
						<label>SI: </label>{!! Form::radio('exento', '1');; !!}
						<label>No: </label>
						{!! Form::radio('exento', '0');; !!}
						
					</div>
					<br>
					<button type="submit" class="btn btn-primary" id="btn-guardar"><span class="fa fa-save"></span>Guardar</button>
					<a href="{{url('productos')}}" class="btn btn-warning">Regresar</a>
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
</script>
@endsection