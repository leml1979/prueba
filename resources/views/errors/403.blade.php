@extends('layouts.inicio')

@section('content')
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Pagina Prohibida') }}</div>

                <div class="card-body">
                    <p class="text-justify">Usted ha ingresado a un sitio no autorizado, regrese al sistema.
                    </p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
