<div class="col-sm-4">
	<div class="form-group">
		<label>Código</label>
		{!! Form::text('codigo',null, ["class"=>"form-control","placeholder"=>"Código"]) !!}						
	</div>
</div>
<div class="col-sm-4">
	<div class="form-group">
		<label>Nombre del Proveedor</label>
		<span class="control-obligatorio">*</span>
		{!! Form::text('nombre_proveedor',null, ["class"=>"form-control","placeholder"=>"Nombre del Proveedor"]) !!}						
	</div>
</div>
<div class="col-sm-4">
	<div class="form-group">
		<label>País</label>
		<span class="control-obligatorio">*</span> 
		{!! Form::select('pais',$paises,null, ["id"=>"pais","class"=>"form-control input-lg select2","style"=>"width: 100%; height: calc(2.25rem + 2px);","placeholder"=>"Seleccione...."]) !!}
	</div>
</div>