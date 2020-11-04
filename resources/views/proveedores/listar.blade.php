@extends('layouts.home')

@section('css')

@endsection

@section('content')
<div class="content">
	<div class="row text-center">
		<div class="table table-responsive">
			<table>
				<thead>
					<th></th>
					<th>Rif/Código</th>
					<th>Proveedor</th>
					<th>Tipo Proveedor</th>
					<th>Opciones</th>
				</thead>
				<tbody>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td><a href=""><span></span>Editar</a><a href="">Eliminar</a></td>
				</tbody>
			</table>
			
		</div>
		
	</div>
	<div class="row pull-right">
		<a href="{{route('proveedor.create')}}" class="btn btn-primary">Agregar Proveedor</a>
	</div>
	
</div>

@endsection