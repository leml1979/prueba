@extends('layouts.home')

@section('css')
<style type="text/css">

</style>

@endsection
@section('breadcrumb')
Listar
@endsection

@section('titulo')
Establecimientos
@endsection

@section('content')
		<div class="content">
			<div class="row">
				@include('flash::message')
			</div>
			<div class="row text-center">
				<div class="table-responsive bg-white">
					<table class="table table-hover">
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
									{{ mb_strtoupper($establecimiento->establecimiento,"UTF-8")}} 
								</td>
								<td>{!! $establecimiento->sede->sede!!}</td>
								<td>{!! $establecimiento->estado->estado!!}</td>
								<td>{!! mb_strtoupper($establecimiento->municipio->municipio,"UTF-8")!!}</td>
								<td>{!! mb_strtoupper($establecimiento->parroquia->parroquia,"UTF-8")!!}</td>
								<td>@if($establecimiento->estatus_contacto)
									SI 
									@else NO 
								@endif</td>
								<td><a href="{{url('establecimiento/'.$establecimiento->id.'/edit ')}}" alt="Editar Establecimiento"><span class="fa fa-edit"></span></a> 
									<a href="{{url('establecimiento/'.$establecimiento->id.'/contacto ')}}" alt="Agregar Contacto"><span class="fa fa-user-alt"></span></a> 
									@if($establecimiento->certificado==0)
									<a href="{{url('establecimiento/eliminar/'.$establecimiento->id)}}" alt="Eliminar"><span class="fa fa-trash-alt"></span></a></td>
									@endif
								</tr>
								@endforeach
							</tbody>
						</table>

					</div>

				</div>
				<div class="row pull-right">
					<a href="{{url('establecimiento/create')}}" class="btn btn-success">
					Agregar Establecimiento</a>
				</div>

			</div>
		</div>
	</div>

	@endsection