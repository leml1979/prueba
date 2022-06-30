@extends('layouts.home')

@section('css')

@endsection
@section('breadcrumb')
Inventario
@endsection

@section('titulo')
Inventario

@endsection

@section('content')
<div class="content">
	<div class="row">
		@include('flash::message')
	</div>
	<div class="row">
		<div class="table-responsive bg-white round_table">
			<table class="table table-hover">
				<thead>
					<th></th>
					<th>Categoria</th>
					<th>Producto</th>
					<th>Monto</th>
					<th>Monto en Petros</th>
					<th>Exento</th>
					<th>Fecha</th>
					<th>Estatus</th>
					<th>Acciones</th>
				</thead>
				<tbody>
					@foreach($inventario as $inventario)
					<tr>
						<td>{!! $loop->iteration !!}</td>
						<td>{!! $inventario->producto->categoria->nombre !!}</td>
						<td>{!! $inventario->producto->nombre !!}</td>
						<td>{!! $inventario->monto !!}</td>
						<td>{!! $inventario->monto !!}</td>
						<td>{!! $inventario->producto->exento?'SI':'NO' !!}</td>
						<td>{!! $inventario->fecha !!}</td>
						<td>{!! $inventario->producto->estatus?'Activo':'Inactivo' !!}</td>
						<td>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection
@section('js')
 <script type="text/javascript">

$(document).ready(function(){

let route = 'https://petroapp-price.petro.gob.ve/price'
                $.ajax({
                        url: route,
                        type: "POST",
                        contentType: "application/x-www-form-urlencoded",
                        dataType: 'json',
                        timeout: 2000,
                        data: {
                                'coins': ["PTR"],
                                'fiats': ["BS"],
},
                        success: function (data) {
                        alert(data["data"]["PTR"]["BS"]);
                        //$("#valorPetro").val(data["data"]["PTR"]["BS"]);
                        },
                               error: function(error) {
 				alert(error.status);
                        }
                });
        });

 
       </script>                         


@endsection
