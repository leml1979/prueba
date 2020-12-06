@extends('layouts.home')

@section('css')

@endsection
@section('breadcrumb')
Listar
@endsection

@section('titulo')
Representante Legal
@endsection

@section('content')
<div class="content">
	<div class="row">
		@include('flash::message')
	</div>
	<div class="row text-center">
		<div class="table-responsive">
			<table class="table  table-hover bg-white">
				<thead>
					<th></th>
					<th>Nombres</th>
					<th>Apellidos</th>
					<th>Cargo</th>
					<th>Opciones</th>
				</thead>
				<tbody>
					@foreach($representantes as $representante)
					<tr>
						<td>{!! $loop->iteration !!}</td>
						<td>
								{{ $representante->saime->nombre1. " ".$representante->saime->nombre2 }} 
						</td>
						<td>{!! $representante->saime->apellido1. " ".$representante->saime->apellido2 !!}</td>
						<td>{!!$representante->cargo !!}</td>
						<td><a href="{{url('representante/'.$representante->id.'/edit ')}}" alt="Editar Proveedor"><span class="fa fa-edit"></span></a> 
							<a href="{{url('representante/eliminar/'.$representante->id)}}" alt="Eliminar" class=""><span class="fa fa-trash-alt"></span></a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
			
		</div>
		
	</div>
	<div class="row pull-right">
		<a href="{{url('representante/create')}}" class="btn btn-primary">Agregar Representante</a>
	</div>
	
</div>

@endsection