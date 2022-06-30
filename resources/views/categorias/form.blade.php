@extends('layouts.home')

@section('css')

@endsection
@section('breadcrumb')
Categorias
@endsection

@section('titulo')
Categorias

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
					{!! Form::open(['route' => 'categorias.store', 'method' => 'post','id'=>'categorias-form']) !!}

					@csrf
					
					<hr />
					<div class="input-group col-md-6">
						
						<label>Nombre: </label>
						{!! Form::text('nombre',null, ["class"=>"form-control","placeholder"=>"Nombre Categoria","required"=>"required","id"=>"nombre", "maxlength"=>"20"]) !!}
						
					</div>
					<br>
					<button type="submit" class="btn btn-primary" id="btn-guardar"><span class="fa fa-save"></span>Guardar</button>
					<a href="{{url('categorias')}}" class="btn btn-warning">Regresar</a>
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
	});
</script>
@endsection