@extends('layouts.home')

@section('css')

@endsection
@section('breadcrumb')
Listar
@endsection

@section('titulo')
Certificados
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
					<th>Certificar</th>
				</thead>
				<tbody>
					@foreach($establecimientos as $establecimiento)
					<tr>
						<td>{!! $loop->iteration !!}</td>
						<td>
							{{ $establecimiento->establecimiento}} 
						</td>
						<td>{!! $establecimiento->sede->sede!!}</td>
						<td>{!! $establecimiento->estado->estado!!}</td>
						<td>{!! mb_strtoupper($establecimiento->municipio->municipio,"UTF-8")!!}</td>
						<td>{!! mb_strtoupper($establecimiento->parroquia->parroquia,"UTF-8")!!}</td>
						<td>@if($establecimiento->estatus_contacto)
							SI 
							@else NO 
						@endif</td>
						<td>@if($establecimiento->certificado==0)<a href="{{url('certificado/'.$establecimiento->id.'/certificar ')}}" alt="Editar Establecimiento"><span class="fa fa-edit"></span></a>
							@else
							<a href="{{url('/certificado/establecimiento/pdf/'.$establecimiento->id)}}" alt="Descargar Certificado Establecimiento"><span class="fa fa-file-pdf"></span></a>
						
						@endif
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<div class="row table table-responsive" style="margin-top: 10%">
		<table>
			<thead>
				<th></th>
				<th>RIF</th>
				<th>NOMBRE</th>
				<th>Certificar</th>
			</thead>
			<tbody>
				<tr>
					<td></td>
					<td>
						{{ $sujeto->rif}} 
					</td>
					<td>{!! $sujeto->sujeto!!}</td>
					<td><a href="{{url('certificado-matriz/'.$sujeto->id.'/edit ')}}" alt="Certificar Matriz"><span class="fa fa-edit"></span></a> 
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
</div>

@endsection