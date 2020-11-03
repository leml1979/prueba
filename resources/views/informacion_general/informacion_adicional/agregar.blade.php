@extends('layouts.home')

@section('css')
<link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
<style>
	.control-obligatorio {
		margin: 3px;
		vertical-align: middle;
		font-weight: bold;
		font-size: 20px;
		color: #c0273c;
	}
</style>
@endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class="pull-right text-danger"><span>*</span>Campos Obligatorios</div>

		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<div class="form-group">
				<label>Posse usted registro mercantil</label>
				<span class="control-obligatorio">*</span>
				<div class="form-group clearfix">
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="radioPrimary1" name="posse" checked value="si">
                        <label for="radioPrimary1">
                          Sí
                        </label>
                      </div>
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="radioPrimary2" name="posse" value="no">
                        <label for="radioPrimary2">
                          No
                        </label>
                      </div>
                      
                    </div>
			</div>
		</div>
	</div>
	<div class="row" id="registro_mercantil">
		<div class="col-sm-12">
			<fieldset class="fieldset-collapse">
				<legend><span class="glyphicon glyphicon-check"></span>Registro Mercantil</legend>
				<div class="row">
					<div class="col-sm-3">
						<div class="form-group">
							<label>Numero de Expediente</label>
							<span class="control-obligatorio">*</span>
							<input type="text" name="numero_expediente" class="form-control" placeholder="Expediente">
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<label>Fecha Registro</label>
							<span class="control-obligatorio">*</span>
							<input type="text" name="fecha_registro" class="form-control" placeholder="Fecha Registro">
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<label>Tomo</label>
							<span class="control-obligatorio">*</span>
							<input type="text" name="tomo" class="form-control" placeholder="Tomo" required="true">
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<label>Folio</label>
							<span class="control-obligatorio">*</span>
							<input type="text" name="folio" class="form-control" placeholder="Folio" required="true">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<label>Nombre Comercial</label>
							<input type="text" name="nombre_comercial" class="form-control" placeholder="Nombre Comercial">
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label>Capital Suscrito</label>
							<span class="control-obligatorio">*</span>
							<input type="text" name="capital_suscrito" class="form-control" placeholder="Capital Suscrito">
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label>Capital Pagado</label>
							<span class="control-obligatorio">*</span>
							<input type="text" name="capital_pagado" class="form-control" placeholder="Capital Pagado">
						</div>
					</div>
					
				</div>
			</fieldset>

		</div>
	</div>
	<div class="row" id="estatus_empresa">
		<div class="col-sm-12">
			<fieldset class="fieldset-collapse">
				<legend><span class="glyphicon glyphicon-check"></span>Estatus de Empresa</legend>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label>Fecha desde:</label>
							<span class="control-obligatorio">*</span>
							<input type="text" name="fecha_desde" class="form-control" placeholder="Fecha Desde" readonly="" required="true">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label>Estatus</label>
							<span class="control-obligatorio">*</span>
							<select name="estatus_empresa" class="form-control" placeholder="introduca">
								<option value="A">Activa</option>
							</select>
						</div>
					</div>

				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<label>Explicación del Estatus</label>
							<span class="control-obligatorio">*</span>
							<textarea name="explicacion" rows="4"  class="form-control"></textarea>
						</div>
					</div>
				</div>
			</fieldset>
		</div>
	</div>
	<div class="row" id="actividad_economica">
		<div class="col-sm-12">
			<fieldset class="fieldset-collapse">
				<legend><span class="glyphicon glyphicon-check"></span>Clasificación Industrial (Actividad Económica de la Empresa según CIIU Rev. 4)</legend>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label>Sección</label>
							<span class="control-obligatorio">*</span>
							<select name="estatus_empresa" class="form-control" placeholder="introduca">
								<option value="A">Activa</option>
							</select>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label>División</label>
							<span class="control-obligatorio">*</span>
							<select name="estatus_empresa" class="form-control" placeholder="introduca">
								<option value="A">Activa</option>
							</select>
						</div>
					</div>

				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label>Grupo</label>
							<span class="control-obligatorio">*</span>
							<select name="estatus_empresa" class="form-control" placeholder="introduca">
								<option value="A">Activa</option>
							</select>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label>Clase</label>
							<span class="control-obligatorio">*</span>
							<select name="estatus_empresa" class="form-control" placeholder="introduca">
								<option value="A">Activa</option>
							</select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<label>Descripción específica</label>
							<span class="control-obligatorio">*</span>
							<textarea name="explicacion" rows="4"  class="form-control"></textarea>
						</div>
					</div>
				</div>
			</fieldset>
		</div>
	</div>
	<div class="row" id="direccion_fiscal">
		<div class="col-sm-12">
			<fieldset class="fieldset-collapse">
				<legend><span class="glyphicon glyphicon-check"></span>Dirección Fiscal</legend>
				<div class="row">
					<div class="col-sm-3">
						<div class="form-group">
							<label>Estado</label>
							<span class="control-obligatorio">*</span>
							<select name="estado" class="form-control" placeholder="introduca">
								<option value="A">Activa</option>
							</select>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<label>Municipio</label>
							<span class="control-obligatorio">*</span>
							<select name="municipio" class="form-control" placeholder="introduca">
								<option value="A">Activa</option>
							</select>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<label>Parroquia</label>
							<span class="control-obligatorio">*</span>
							{!! Form::select('parroquia', ['L' => 'Large', 'S' => 'Small'], null, ['placeholder' => 'Pick a size...','class'=>'form-control']) !!}
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<label>ciudad</label>
							<span class="control-obligatorio">*</span>
							<input type="text" name="ciudad" class="form-control" placeholder="Ciudad">
						</div>
					</div>

				</div>
				<div class="row">
					<div class="col-sm-3">
						<div class="form-group">
							<label>Zona Postal</label>
							<span class="control-obligatorio">*</span>
							<select name="estatus_empresa" class="form-control" placeholder="introduca">
								<option value="A">Activa</option>
							</select>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<label>Latitud</label>
							<span class="control-obligatorio">*</span>
							<select name="estatus_empresa" class="form-control" placeholder="introduca">
								<option value="A">Activa</option>
							</select>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<label>Longitud</label>
							<span class="control-obligatorio">*</span>
							<select name="estatus_empresa" class="form-control" placeholder="introduca">
								<option value="A">Activa</option>
							</select>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<label>Avenida</label>
							<span class="control-obligatorio">*</span>
							<select name="estatus_empresa" class="form-control" placeholder="introduca">
								<option value="A">Activa</option>
							</select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label>Calle</label>
							<span class="control-obligatorio">*</span>
							<select name="estatus_empresa" class="form-control" placeholder="introduca">
								<option value="A">Activa</option>
							</select>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label>Carrera</label>
							<span class="control-obligatorio">*</span>
							<select name="estatus_empresa" class="form-control" placeholder="introduca">
								<option value="A">Activa</option>
							</select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<label>Urbanización</label>
							<input type="text" name="urbanizacion" class="form-control" placeholder="Urbanización">
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label>Transversal</label>
							<span class="control-obligatorio">*</span>
							<input type="text" name="transversal" class="form-control" placeholder="Transversal">
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label>Esquina</label>
							<span class="control-obligatorio">*</span>
							<input type="text" name="esquina" class="form-control" placeholder="Esquina">
						</div>
					</div>
					
				</div>
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<label>Callejón</label>
							<input type="text" name="callejon" class="form-control" placeholder="Callejón">
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label>Ruta</label>
							<span class="control-obligatorio">*</span>
							<input type="text" name="ruta" class="form-control" placeholder="Ruta">
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label>Vereda</label>
							<span class="control-obligatorio">*</span>
							<input type="text" name="vereda" class="form-control" placeholder="Vereda">
						</div>
					</div>
					
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label>Teléfono</label>
							<input type="text" name="telefono" class="form-control" placeholder="Teléfono">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label>Fax</label>
							<span class="control-obligatorio">*</span>
							<input type="text" name="fax" class="form-control" placeholder="Fax">
						</div>
					</div>
				</div>
			</fieldset>
		</div>
	</div>
	<div class="row" id="sitio_internet">
		<div class="col-sm-12">
			<fieldset class="fieldset-collapse">
				<legend><span class="glyphicon glyphicon-check"></span>Sitio de Internet</legend>
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<label>Sitio de Internet</label>
							<span class="control-obligatorio">*</span>
							<input type="text" name="sitio_internet" class="form-control" placeholder="Página WEB">
						</div>
					</div>
				</div>
			</fieldset>
		</div>
	</div>
	<div class="row" id="tipologia_empresa">
		<div class="col-sm-12">
			<fieldset class="fieldset-collapse">
				<legend><span class="glyphicon glyphicon-check"></span>Tipología de la Empresa</legend>
				<div class="row">
					<div class="col-sm-3">
						<div class="form-group">
							<label>Servicios</label>
							<span class="control-obligatorio">*</span>
							<select name="estatus_empresa" class="form-control" placeholder="introduca">
								<option value="A">Activa</option>
							</select>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<label>Comercializadora</label>
							<span class="control-obligatorio">*</span>
							<select name="estatus_empresa" class="form-control" placeholder="introduca">
								<option value="A">Activa</option>
							</select>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<label>Productora</label>
							<span class="control-obligatorio">*</span>
							<select name="estatus_empresa" class="form-control" placeholder="introduca">
								<option value="A">Activa</option>
							</select>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<label>Importadora</label>
							<span class="control-obligatorio">*</span>
							<select name="estatus_empresa" class="form-control" placeholder="introduca">
								<option value="A">Activa</option>
							</select>
						</div>
					</div>
				</div>
			</fieldset>
		</div>
	</div>
</div>
<div class="">
	@include('flash::message')
</div>
@endsection

@section('js')
<script type="text/javascript">
	$( document ).ready(function(){
		alert("paso");
	});
</script>
@endsection