@extends('layouts.home')

@section('css')

@endsection
@section('breadcrumb')
Productos
@endsection

@section('titulo')
Productos

@endsection

@section('content')
<div class="content">
	<div class="row">
		@include('flash::message')
	</div>
	<div class="row">
		<div class="table-responsive bg-white round_table">
			<table class="table table-hover">
				<thead>
					<th></th>
					<th>Nombre</th>
					<th>Descripcion</th>
					<th>Categoria</th>
					<th>Exento</th>
					<th>Estatus</th>
					<th>Acciones</th>
				</thead>
				<tbody>
					@foreach($productos as $producto)
					<tr>
						<td>{!! $loop->iteration !!}</td>
						<td>{!! $producto->nombre !!}</td>
						<td>{!! $producto->descripcion !!}</td>
						<td>{!! $producto->categoria->nombre !!}</td>
						<td>{!! $producto->exento?'SI':'NO' !!}</td>
						<td>{!! $producto->estatus?'Activo':'Inactivo' !!}</td>
						<td><a href="{{url('productos/'.$producto->id.'/edit ')}}" alt="Editar"><span class="fa fa-edit"></span></a> 
							<a href="{{url('productos/inactivar/'.$producto->id)}}"  alt="Inactivar" >@if($producto->estatus==1) Inactivar @else Activar @endif 
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	<div class="row pull-right">
		<a href="{{route('productos.create')}}" class="btn btn-primary" style="margin-top: 10px">Agregar Producto</a> 
	</div>
</div>
@endsection