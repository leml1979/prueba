@extends('layouts.home')

@section('css')

@endsection
@section('breadcrumb')
Listar
@endsection

@section('titulo')
Listado de Contactos Establecimiento
@endsection

@section('content')
<div class="content">
	<div class="row">
		@include('flash::message')
	</div>
	<div class="row">
		<div class="table table-responsive">
			<table>
				<thead>
					<th></th>
					<th>Documento</th>
					<th>Nombre Contaco</th>
					<th>Cargo</th>
					<th>Fecha Registro</th>
					<th>Opciones</th>
				</thead>
				<tbody>
					@foreach($contactos as $contacto)
					<tr>
						<td>{!! $loop->iteration !!}</td>
						<td>{!! $contacto->saime->tipo. "-".$contacto->saime->cedula   !!}</td>
						<td>{{ $contacto->saime->nombre1. " ".$contacto->saime->nombre2. " ".$contacto->saime->apellido1. " ".$contacto->saime->apellido2 }}</td>
						<td>{!!$contacto->cargo!!}</td>
						<td></td>
						<td><a href="{{url('establecimiento-contacto/'.$contacto->id.'/edit')}}" alt="Editar Proveedor"><span class="fa fa-edit"></span></a> 
							<a href="{{url('contactos/eliminar/'.$contacto->id.'/'.$id)}}" alt="Eliminar"><span class="fa fa-trash-alt"></span></a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
			
		</div>
		
	</div>
	<div class="row">
		<a href="{{url('establecimiento-contacto/'.$id.'/create')}}" class="btn btn-primary">Agregar Contacto</a>
		<a href="{{url('establecimiento')}}" class="btn btn-warning">Establecimientos</a>
	</div>
	
</div>

@endsection