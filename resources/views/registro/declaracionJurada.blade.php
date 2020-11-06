@extends('layouts.home')
@section('css')
<style type="text/css">
</style>

@endsection
@section('content')
<div class="content">
	<div class="row">
		<div class="row text-center" style="margin-bottom: 4%">
			<h3 class="text-center">DECLARACIÓN JURADA</h3>
			
		</div>
		<div class="row text-justify" style="margin-left: 20%; margin-right: 20%; margin-bottom: 2%	">
			"La Superintendencia Nacional para la Defensa de los Derechos Socioeconómicos informa a todos los Sujetos de Aplicación que, de conformidad a los dispositivos legales previstos en los artículos 16 y 70 del Decreto Presidencial N° 1.423 con Rango, Valor y Fuerza de Ley de Simplificación de Trámites Administrativos, Gaceta Extraordinaria N° 6.149, de fecha martes 18 de noviembre de 2.014, la información suministrada al Registro Único de Personas que Desarrollan Actividades Económicas se considerará cierta, no obstante, la Superintendencia Nacional para la Defensa de los Derechos Socioeconómicos en ejercicio de sus atribuciones y actuando de conformidad a lo establecido en el artículo 13 numerales 2, 5, 6 y 18, y artículos 25, 26 del Decreto con Rango, Valor y Fuerza de Ley Orgánica de Precios Justos vigente, se reserva el derecho de verificar la información aportada a los fines de determinar su existencia y conformidad, así como la aplicación de las sanciones prescritas en dichos instrumentos legales en caso de determinarse inexactitud en la declaración u ocultamiento de información en los supuestos de infracción allí señalados."			
		</div>
		<div class="row text-justify" style="margin-left: 20%; margin-right: 20%">Para poder avanzar se requiere que escriba la frase "ESTOY DE ACUERDO", de lo contrario deberá escribir la frase "NO ESTOY DE ACUERDO".
			<form action="{{route('declaracionjurada')}}" method="post">
				@csrf
				<div class="col-sm-12">
					<div class="input-group">

						<input type="text" name="texto" class="form-control">
						<button type="submit" class="btn btn-primary" placeholder="Escriba su Desición">Guardar</button>

					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection