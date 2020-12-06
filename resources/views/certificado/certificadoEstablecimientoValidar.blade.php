@extends("certificado.certificadoLayout")

@section('certificados')
@isset($cierre)
@if($cierre==1)

<div class="row">
	<div class="col-md-4">
		<strong>Código RUPDAE:</strong>
	</div>
	<div class="col-md-8">{!! $establecimiento->codigo_certificado !!}</div>

</div> 

<div class="row">
	<div class="col-md-4">
		<strong>RIF:</strong>
	</div>
	<div class="col-md-8">{!! $establecimiento->sujetos->rif  !!}</div>

</div> 
<div class="row">
	<div class="col-md-4">
		<strong>Razón Social:</strong>
	</div>
	<div class="col-md-8">{!! $establecimiento->sujetos->sujeto !!}</div>

</div> 
<div class="row">
	<div class="col-md-4">
		<strong>Actividad Económica (CIIU):</strong>
	</div>
	<div class="col-md-8">{!! $establecimiento->sujetos->clase->clase  !!}</div>

</div> 
<div class="row">
	<div class="col-md-4">
		<strong>Tipología:</strong>
	</div>
	<div class="col-md-8">{!! $establecimiento->sujetos->tipologias->nom_tipologia  !!}</div>

</div> 
<div class="row">
	<div class="col-md-4">
		<strong>Nombre Establecimiento:</strong>
	</div>
	<div class="col-md-8">
		{!! $establecimiento->establecimiento  !!}
	</div>
</div>
<div class="row">
	<div class="col-md-4">
		<strong>Fecha Registro:</strong>
	</div>
	<div class="col-md-8">
		{!! \Carbon\Carbon::createFromTimestamp($establecimiento->fecha_creacion)->format("d-m-Y")  !!}
	</div>
</div>
@else
<div class="">
	@include('flash::message')
</div>
@endif
@endisset 


@endsection