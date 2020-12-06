@extends('layouts.home')

@section('css')
<style type="text/css">
	caption{
		text-align: center;
		caption-side: top;
	}
</style>
@endsection
@section('breadcrumb')
Listar
@endsection

@section('titulo')
Certificados
@endsection

@section('content')
<div class="info-box">

	<div class="info-box-content">
		<div class="content">
			<div class="row">
				@include('flash::message')
			</div>
			<div class="row">
				<div class="table-responsive">
					<table class="table">
						<caption>ESTABLECIMIENTOS</caption>
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
									{!! mb_strtoupper($establecimiento->establecimiento,"UTF-8") !!} 
								</td>
								<td>{!! $establecimiento->sede->sede!!}</td>
								<td>{!! $establecimiento->estado->estado!!}</td>
								<td>{!! mb_strtoupper($establecimiento->municipio->municipio,"UTF-8")!!}</td>
								<td>{!! mb_strtoupper($establecimiento->parroquia->parroquia,"UTF-8")!!}</td>
								<td>@if($establecimiento->estatus_contacto)
									SI 
									@else NO 
								@endif</td>
								<td>@if($establecimiento->cierre==0)<a href="{{url('certificado/'.$establecimiento->id.'/certificar ')}}" alt="Editar Establecimiento"><span class="fa fa-edit"></span></a>
									@else
									<a href="{{url('/certificado/establecimiento/pdf/'.$establecimiento->id)}}" alt="Descargar Certificado Establecimiento"><span class="fa fa-file-pdf"></span></a>

									@endif
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>


		</div>
	</div>
	<!-- /.info-box-content -->
</div>

<div class="info-box">
	<div class="info-box-content">
		<div class="content">
			<div class="row">
				<div class="row table-responsive" style="margin-top: 5%">
					<table class="table">
						<caption>SUJETO DE APLICACION</caption>
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
								<td>{!! mb_strtoupper($sujeto->sujeto,"UTF-8")!!}</td>
								<td>@if($sujeto->estatus_culminacion_registro==0)
									<a href="{{route('certificar.matriz',$sujeto->id)}}" alt="Certificar Matriz"><span class="fa fa-edit"></span></a>
									@else
									<a href="{{url('certificado-matriz/'.$sujeto->id.'/pdf ')}}" alt="Certificar Matriz"><span class="fa fa-file-pdf"></span></a>
									@endif
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection