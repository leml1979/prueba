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
            <div class="card  bg-light">
                <div class="card-header text-right"><img src="{{asset('img/logoRupdae.png')}}" height="60px" class="float-left img-circle elevation-2">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-12 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group{{ $errors->has('CaptchaCode') ? ' has-error' : '' }}">
                              <label class="col-md-4 control-label"></label>

                              <div class="col-md-12">
                                {!! captcha_image_html('ResetPasswordCaptcha') !!}
                                <input type="text" class="form-control" name="CaptchaCode" id="CaptchaCode">

                                @if ($errors->has('CaptchaCode'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('CaptchaCode') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-12 offset-md-0">
                            <button type="submit" class="btn btn-success">
                                {{ __('Send Password Reset Link') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
