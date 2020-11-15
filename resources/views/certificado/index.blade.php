@extends("layouts.home")

@section('css')

@endsection
@section('breadcrumb')
Listar
@endsection

@section('titulo')
Listado de Representante Legal
@endsection

@section('content')
<a href="{{route('pdf.matriz')}}" class="link">PDF</a>
@endsection