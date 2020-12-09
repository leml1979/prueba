@extends('layouts.home')

@section('css')

@endsection
@section('breadcrumb')
Listar
@endsection

@section('titulo')
Listado de Accionistas
@endsection

@section('content')
<div class="content">
	<div class="row">
		@include('flash::message')
	</div>
	
	<div class="table-responsive bg-white round_table">
		<table class="table">
			<thead>
				<th></th>
				<th>Nombre/Razón Social</th>
				<th>Tipo de Persona</th>
				<th>Sexo</th>
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
					<td>@if($accionista->seniat_id)
						{{ $accionista->seniat->razon_social}}
						@else
						{{ $accionista->saime->nombre1. " ".$accionista->saime->nombre2. " ".$accionista->saime->apellido1. " ".$accionista->saime->apellido2 }}
						@endif
					</td>
					<td>{!!$accionista->personalidades->personalidad !!}</td>
					<td>@if($accionista->saime_id)
						{!!($accionista->saime->sexo=="M")?"Masculino":"Femenino" !!}
						@endif
					</td>
					<td>{!!$accionista->tiposRelacionEmpresas->tipo_relacion_empresa !!}</td>
					<td>{!!mb_strtoupper($accionista->paises->pais,"UTF-8") !!}</td>
					<td>{!!$accionista->correo !!}</td>
					<td>{!!$accionista->cantidad_acciones !!}</td>
					<td><a href="{{url('accionista/'.$accionista->id.'/edit ')}}" alt="Editar Proveedor"><span class="fa fa-edit"></span></a> 
						<a href="{{url('accionista/eliminar/'.$accionista->id)}}" alt="Eliminar"><span class="fa fa-trash-alt"></span></a></td>
					</tr>
					@endforeach
				</tbody>
			</table>

		</div>
		<div class="row" style="margin-top: 10px">
			<a href="{{url('accionista/create')}}" class="btn btn-primary">Agregar Accionista</a>
		</div>

	</div>

	@endsection