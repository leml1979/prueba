@extends('layouts.inicio')

@section('css')
<style type="text/css">
    .content-wrapper {
        background: #FFFFFF;
    }
    .help-block{
        color:#dc3545;
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-right"><img src="{{asset('img/logoRupdae.png')}}" height="60px" class="float-left"> {{ __('Registro') }}</div>

                <div class="card-body">
                    {!! Form::open(['route' => 'registro.validar', 'method' => 'post']) !!}
                    <!-- <form method="POST" action="{{ route('registro.validar') }}">-->
                        @csrf

                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input id="rif" type="text" class="form-control @error('rif') is-invalid @enderror" name="rif" value="{{ old('rif') }}" required autocomplete="rif" autofocus placeholder="RIF" maxlength="10" style='text-transform:uppercase;' pattern="[JGVEPN]{1}[0-9]{9}" title="Debe contener el formato valido para un RIF. ej. J0000000001">
                                @error('rif')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="EMAIL">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('CaptchaCode') ? ' has-error' : '' }}">
                          <label class="col-md-4 control-label"></label>

                          <div class="col-sm-12">
                            {!! captcha_image_html('RegisterCaptcha') !!}
                            <input type="text" class="form-control" name="CaptchaCode" id="CaptchaCode">

                            @if ($errors->has('CaptchaCode'))
                            <span class="help-block">
                                <strong>{{ $errors->first('CaptchaCode') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-12 offset-md-0">
                            <button type="submit" class="btn btn-info btn-lg btn-block">
                                {{ __('Registrar') }}
                            </button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                    <!--</form>-->
                </div>
            </div>
        </div>
    </div>
    <div class="">
        @include('flash::message')
    </div>
</div>
@endsection
@section('js')
<script src="{{asset('plugins/inputmask/jquery.inputmask.min.js')}}"></script>
<script src="{{asset('plugins/inputmask/inputmask/inputmask.extensions.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function(){
      //$('#rif').inputmask('V1111111');
    //  $('#rif').inputmask('Regex', { regex: "^[0-9]{2}:[0-5][0-9]:[0-5][0-9]$" }); 
});
</script>
@endsection