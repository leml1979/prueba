@extends('layouts.home')

@section('css')

@endsection
@section('breadcrumb')
Precios
@endsection

@section('titulo')
Precios

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
					<th>Fecha</th>
					<th>Producto</th>
					<th>Monto</th>
					<th>Monto en Petros</th>
					<th>Estatus</th>
					<th>Acciones</th>
				</thead>
				<tbody>
					@foreach($precios as $precio)
					<tr>
						<td>{!! $loop->iteration !!}</td>
						<td>{!! $precio->fecha !!}</td>
						<td>{!! $precio->producto->nombre !!}</td>
						<td>{!! $precio->monto !!}</td>
						<td></td>
						<td>{!! $precio->estatus?'Activo':'Inactivo' !!}</td>
						<td><a href="{{url('precios/'.$precio->id.'/edit ')}}" alt="Editar"><span class="fa fa-edit"></span></a> 
							<a href="{{url('precios/inactivar/'.$precio->id)}}"  alt="Inactivar" >@if($precio->estatus==1) Inactivar @else Activar @endif 
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	<div class="row pull-right">
		<a href="{{route('precios.create')}}" class="btn btn-primary" style="margin-top: 10px">Agregar Precio a Producto</a> 
	</div>
</div>
@endsection