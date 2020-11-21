<div class="row">
	<div class="col-sm-2">
		<div class="form-group">
			<label>Servicios</label>
			<span class="control-obligatorio">*</span>
			<div class="form-group clearfix">
				<div class="icheck-primary d-inline">
					<input type="radio" id="servicios1" name="servicios" value="1" required @if(isset($sujeto))
					@if($sujeto->servicios==1)
					checked
					@endif
					@endif
					>
					<label for="servicios1">
						Sí
					</label>
				</div>
				<div class="icheck-primary d-inline">
					<input type="radio" id="servicios0" name="servicios" value="0" @if(isset($sujeto))
					@if($sujeto->servicios==0)
					checked
					@endif
					@endif>
					<label for="servicios0">
						No
					</label>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-2">
		<div class="form-group">
			<label>Comercializadora</label>
			<span class="control-obligatorio">*</span>
			<div class="form-group clearfix">
				<div class="icheck-primary d-inline">
					<input type="radio" id="comercializadora1" name="comercializadora" value="1" required @if(isset($sujeto))
					@if($sujeto->comercializadora==1)
					checked
					@endif
					@endif
					>
					<label for="comercializadora1">
						Sí
					</label>
				</div>
				<div class="icheck-primary d-inline">
					<input type="radio" id="comercializadora0" name="comercializadora" value="0" @if(isset($sujeto))
					@if($sujeto->comercializadora==0)
					checked
					@endif
					@endif
					>
					<label for="comercializadora0">
						No
					</label>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-2">
		<div class="form-group">
			<label>Productora</label>
			<span class="control-obligatorio">*</span>
			<div class="form-group clearfix">
				<div class="icheck-primary d-inline">
					<input type="radio" id="productora1" name="productora" value="1" required 
					@if(isset($sujeto))
					@if($sujeto->productora==1)
					checked
					@endif
					@endif
					>
					<label for="productora1">
						Sí
					</label>
				</div>
				<div class="icheck-primary d-inline">
					<input type="radio" id="productora0" name="productora" value="0" 
					@if(isset($sujeto))
					@if($sujeto->productora==0)
					checked
					@endif
					@endif>
					<label for="productora0">
						No
					</label>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-2">
		<div class="form-group">
			<label>Distribuidora</label>
			<span class="control-obligatorio">*</span>
			<div class="form-group clearfix">
				<div class="icheck-primary d-inline">
					<input type="radio" id="distribuidora1" name="distribuidora" value="1" required 
					@if(isset($sujeto))
					@if($sujeto->distribuidora==1)
					checked
					@endif
					@endif
					>
					<label for="distribuidora1">
						Sí
					</label>
				</div>
				<div class="icheck-primary d-inline">
					<input type="radio" id="distribuidora0" name="distribuidora" value="0" 
					@if(isset($sujeto))
					@if($sujeto->distribuidora==0)
					checked
					@endif
					@endif
					>
					<label for="distribuidora0">
						No
					</label>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-2">
		<div class="form-group">
			<label>Exportadora</label>
			<span class="control-obligatorio">*</span>
			<div class="form-group clearfix">
				<div class="icheck-primary d-inline">
					<input type="radio" id="exportadora1" name="exportadora" value="1" required 
					@if(isset($sujeto))
					@if($sujeto->exportadora==1)
					checked
					@endif
					@endif
					>
					<label for="exportadora1">
						Sí
					</label>
				</div>
				<div class="icheck-primary d-inline">
					<input type="radio" id="exportadora0" name="exportadora" value="0" 
					@if(isset($sujeto))
					@if($sujeto->exportadora==0)
					checked
					@endif
					@endif
					>
					<label for="exportadora0">
						No
					</label>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-2">
		<div class="form-group">
			<label>Importadora</label>
			<span class="control-obligatorio">*</span>
			<div class="form-group clearfix">
				<div class="icheck-primary d-inline">
					<input type="radio" id="importadora1" name="importadora" value="1" required 
					@if(isset($sujeto))
					@if($sujeto->importadora==1)
					checked
					@endif
					@endif
					>
					<label for="importadora1">
						Sí
					</label>
				</div>
				<div class="icheck-primary d-inline">
					<input type="radio" id="importadora0" name="importadora" value="0" 
					@if(isset($sujeto))
					@if($sujeto->importadora==0)
					checked
					@endif
					@endif
					>
					<label for="importadora0">
						No
					</label>
				</div>
			</div>
		</div>
	</div>
</div>