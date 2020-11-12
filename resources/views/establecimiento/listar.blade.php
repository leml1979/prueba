@extends('layouts.home')

@section('css')

@endsection
@section('breadcrumb')
Listar
@endsection

@section('titulo')
Listado de Estabecimientos
@endsection

@section('content')
<div class="content">
	<div class="row">
		@include('flash::message')
	</div>
	<div class="row text-center">
		<div class="table table-responsive">
			<table>
				<thead>
					<th></th>
					<th>Establecimiento</th>
					<th>Sede</th>
					<th>Estado</th>
					<th>Municipio</th>
					<th>Parroquia</th>
					<th>Contacto Cargado</th>
					<th>Opciones</th>
				</thead>
				<tbody>
					@foreach($establecimientos as $establecimiento)
					<tr>
						<td>{!! $loop->iteration !!}</td>
						<td>
								{{ $establecimiento->establecimiento}} 
						</td>
						<td>{!! $establecimiento->sede_id!!}</td>
						<td>{!!$establecimiento->cargo !!}</td>
						<td><a href="{{url('establecimiento/'.$establecimiento->id.'/edit ')}}" alt="Editar Proveedor"><span class="fa fa-edit"></span></a> 
							<a href="{{url('establecimiento/'.$establecimiento->id.'/edit ')}}" alt="Editar Proveedor"><span class="fa fa-user-alt"></span></a> 
							<a href="{{url('establecimiento/eliminar/'.$establecimiento->id)}}" alt="Eliminar"><span class="fa fa-trash-alt"></span></a></td>
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