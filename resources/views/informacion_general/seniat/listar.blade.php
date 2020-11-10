@extends('layouts.home')

@section('titulo')
Información Seniat
@endsection

@section('breadcrumb')
Información Seniat
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
@endsection

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header"><h1>{{ __('Información Seniat') }}</h1></div>

        <div class="card-body">
          <table class="table table-responsive">
            <thead>
              <th>RIF</th>
              <th>RAZÓN SOCIAL</th>
              <th>CORREO</th>
            </thead>
            <tbody>
              <tr>
                <td>{{ $datosseniat[0]['rif']}}</td>
                <td>{{ $datosseniat[0]['razon_social']}}</td>
                <td>{{ $datosseniat[0]['email']}}</td>
              </tr>
            </tbody>
          </table>
          <form action="{{url('seniat/guardar')}}" method="post" id="seniat-form">
            @csrf
            <table class="table table-responsive">
              <thead>
                <th></th>

              </thead>
              <tbody>
                <tr>
                  <td>
                    ¿Esta usted de acuerdo con la información mostrada? <br /> 
                    <div class="form-group clearfix">
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="radioPrimary1" name="acuerdo" value="si">
                        <label for="radioPrimary1">
                          Sí
                        </label>
                      </div>
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="radioPrimary2" name="acuerdo" value="no">
                        <label for="radioPrimary2">
                          No
                        </label>
                      </div>
                    </div></td>
                    <td><input type="submit" name="guardar" value="Guardar" class="btn btn-primary"></td>

                  </tr>
                </tbody>
              </table>
            </form>
            <div class="">
              @include('flash::message')
            </div>
          </div>
        </div>
      </div>

    </div>
    
  </div>
  @endsection

  @section('js')
  <script type="text/javascript">
    $(document).ready(function(){
     // $("input")

    });
  </script>
  @endsection