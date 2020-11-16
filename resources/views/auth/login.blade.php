@extends('layouts.inicio')

@section('css')
<style type="text/css">
    .content-wrapper {
        background: #FFFFFF;
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card bg-light">
                <div class="card-header text-right"><img src="{{asset('img/logoRupdae.png')}}" height="60px" class="float-left">{{ __('Iniciar Sesion') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">


                            <div class="col-md-12">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror input" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">


                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Contraseña">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 offset-md-0">
                                <button type="submit" class="btn btn-info btn-lg btn-block">
                                    {{ __('Iniciar Sesión') }}
                                </button>
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <div class="col-md-4">

                                @if (Route::has('password.request'))

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                 <i class="fa fa-unlock" aria-hidden="true"></i>
                             </a>
                             @endif
                         </div>
                         <div class="col-md-4">

                            @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('registro') }}">
                                <i class="fas fa-user-plus"></i>
                            </a>
                            @endif
                        </div>
                        <div class="col-md-4">
                            @if (Route::has('password.request'))

                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                <i class="fa fa-check-circle" aria-hidden="true"></i>

                            </a>
                            @endif
                        </div>

                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<div class="">
    @include('flash::message')
</div>
</div>
@endsection
