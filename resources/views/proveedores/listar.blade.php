@extends('layouts.home')

@section('css')

@endsection
@section('breadcrumb')
Proveedor

@endsection

@section('titulo')
Proveedores

@endsection

@section('content')
<div class="content">
	<div class="row">
		@include('flash::message')
	</div>
	<div class="row">
		<div class="table table-responsive">
			<table class="table table-responsive table-hover">
				<thead>
					<th></th>
					<th>Rif/Código</th>
					<th>Proveedor</th>
					<th>Tipo Proveedor</th>
					<th>Opciones</th>
				</thead>
				<tbody>
					@foreach($proveedorSujetos as $proveedorSujeto)
					<tr>
						<td>{!! $loop->iteration !!}</td>
						<td>{!! $proveedorSujeto->proveedor->rif_codigo !!}</td>
						<td>{!! $proveedorSujeto->proveedor->proveedor !!}</td>
						<td>@if($proveedorSujeto->proveedor->tipo_proveedor==0) Extranjero @else Nacional @endif</td>
						<td><a href="{{url('proveedores/'.$proveedorSujeto->id.'/edit ')}}" alt="Editar Proveedor"><span class="fa fa-edit"></span></a> 
							<a href="{{url('proveedores/eliminar/'.$proveedorSujeto->id)}}" alt="Eliminar"><span class="fa fa-trash-alt"></span></a></td>
						</tr>
						@endforeach
					</tbody>
				</table>
				
			</div>
			
		</div>
		<div class="row pull-right">
			<a href="{{route('proveedores.create')}}" class="btn btn-primary">Agregar Proveedor</a>
		</div>
		
	</div>

	@endsection