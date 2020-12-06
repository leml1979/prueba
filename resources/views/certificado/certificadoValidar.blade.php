@extends("certificado.certificadoLayout")

@section('certificados')
@isset($cierre)
@if($cierre==1)

<div class="row">
	<div class="col-md-4">
		<strong>Código RUPDAE:</strong>
	</div>
	<div class="col-md-8">{!! $sujeto->codigo_certificado !!}</div>

</div> 

<div class="row">
	<div class="col-md-4">
		<strong>RIF:</strong>
	</div>
	<div class="col-md-8">{!! $sujeto->rif  !!}</div>

</div> 
<div class="row">
	<div class="col-md-4">
		<strong>Razón Social:</strong>
	</div>
	<div class="col-md-8">{!! $sujeto->sujeto !!}</div>

</div> 
<div class="row">
	<div class="col-md-4">
		<strong>Actvidad Económica (CIIU):</strong>
	</div>
	<div class="col-md-8">{!! $sujeto->clase->clase  !!}</div>

</div> 
<div class="row">
	<div class="col-md-4">
		<strong>Tipología</strong>
	</div>
	<div class="col-md-8">{!! $sujeto->tipologias->nom_tipologia  !!}</div>

</div> 
<div class="row">
	<div class="col-md-4">
		<strong>Fecha Registro:</strong>
	</div>
	<div class="col-md-8">
		{!! \Carbon\Carbon::createFromTimestamp($sujeto->fecha_registro_sundde)->format("d-m-Y")  !!}
	</div>
</div>
@else
<div class="">
	@include('flash::message')
</div>
@endif
@endisset 


@endsection