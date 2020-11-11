@extends('layouts.home')

@section('css')

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
					<th>Nombre/Razón Social</th>
					<th>Tipo de Persona</th>
					<th>Tipo Relación</th>
					<th>País</th>
					<th>Correo</th>
					<th>Nº de Acciones</th>
					<th>Opciones</th>
				</thead>
				<tbody>
					@foreach($accionistas as $accionista)
					<tr>
						<td>{!! $loop->iteration !!}</td>
						<td>{!!$accionista->sujetos->sujeto !!}</td>
						<td>{!!$accionista->personalidades->personalidad !!}</td>
						<td>{!!$accionista->tiposRelacionEmpresas->tipo_relacion_empresa !!}</td>
						<td>{!!$accionista->paises->pais !!}</td>
						<td>{!!$accionista->correo !!}</td>
						<td>{!!$accionista->cantidad_acciones !!}</td>
						<td><a href="{{url('accionista/'.$accionista->id.'/edit ')}}" alt="Editar Proveedor"><span class="fa fa-edit"></span></a> 
							<a href="{{url('accionista/eliminar/'.$accionista->id)}}" alt="Eliminar"><span class="fa fa-trash-alt"></span></a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
			
		</div>
		
	</div>
	<div class="row pull-right">
		<a href="{{url('accionista/create')}}" class="btn btn-primary">Agregar Accionista</a>
	</div>
	
</div>

@endsection