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
					<th>Estatus</th>
					<th>Acciones</th>
				</thead>
				<tbody>
					@foreach($categorias as $categoria)
					<tr>
						<td>{!! $loop->iteration !!}</td>
						<td>{!! $categoria->nombre !!}</td>
						<td>{!! $categoria->estatus?'Activo':'Inactivo' !!}</td>
						<td><a href="{{url('categorias/'.$categoria->id.'/edit ')}}" alt="Editar"><span class="fa fa-edit"></span></a>&nbsp;&nbsp; 
							<a href="{{url('categorias/inactivar/'.$categoria->id)}}"  alt="Inactivar" >@if($categoria->estatus==1) Inactivar @else Activar @endif 
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	<div class="row pull-right">
		<a href="{{route('categorias.create')}}" class="btn btn-primary" style="margin-top: 10px">Agregar Categoria</a> 
	</div>
</div>
@endsection