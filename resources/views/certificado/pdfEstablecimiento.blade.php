<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>PDF Demo in Laravel 8</title>
  <link rel="stylesheet" href="{{public_path('dist/css/adminlte.min.css')}}">
  <style>
    /** 
    set the margins of the page to 0, so the footer and the header
    can be of the full height and width !
    **/
    @page {
      margin: 0cm 0cm;
    }

    /** Define now the real margins of every page in the PDF **/
    body {
      margin-top: 4cm;
      margin-left: 4cm;
      margin-right: 3cm;
      margin-bottom: 3cm;
    }

    /** Define the header rules **/
    header {
      position: fixed;
      top: 1cm;
      left: 0cm;
      right: 0cm;
      height: 2cm;
      margin-left: 4cm;
    }

    /** Define the footer rules **/
    footer {
      position: fixed; 
      bottom: 0cm; 
      left: 0cm; 
      right: 0cm;
      height: 2cm;
    }
    #qrcode{

    }
  </style>
</head>
<body>
  <header><img src="{{ public_path('img/banner.png') }}" width="40%" height="50%"/></header>
  <footer></footer>
  <main>
    <p class="text-right">Caracas, a los Veintiseis({!! $fecha->day!!}) Días del mes de {!! $fecha->locale("es")->monthName !!} de {!! $fecha->year !!}</p>
    <p style="margin-bottom: 10%">
      <img id="qrcode" class="float-right" src="data:image/png;base64, {!! $qrcode !!}">
    </p>
    <p class="text-center" style="margin-top: 30%">
      <b>CERTIFICADO DE INSCRIPCIÓN<br />
      EN EL REGISTRO ÚNICO DE PERSONAS QUE DESARROLLAN <br />ACTIVIDADES ECONÓMICAS (RUPDAE)</b>
    </p>
    
    <p class="text-justify">Quien suscribe, ENEIDA LAYA LUGO, titular de la cédula de identidad N° V-11.366.874, actuando en mi carácter de SUPERINTENDENTE NACIONAL PARA LA DEFENSA DE LOS DERECHOS SOCIO ECONÓMICOS, designación efectuada mediante Decreto N° 4.016 de fecha 29 de Octubre de 2019, publicado en la Gaceta Oficial de la República Bolivariana de Venezuela Nº 41.748, de fecha 29 de Octubre de 2019; por medio del presente instrumento, actuando de conformidad con la atribución prevista en el artículo 11, numeral 10 del Decreto con Rango, Valor y Fuerza de Ley Orgánica de Precios Justos, certifica la inscripción ante el Registro Único de Personas que Desarrollan Actividades Económicas del Sujeto de Aplicación CONSORCIO SYSNET R.J. TECNOLOGIA, C.A. {!! $establecimiento->establecimiento !!} en fecha 29-09-2014 con el certicado Nº M1, que desarrolla las siguiente acividad economica principal <b>$CLASE</b>.</p>
    <p class="text-justify">
      La validez del presente certificado electrónico puede ser consultada en el registro principal de RUPDAE, en la opción Validar Registro. No obstante, sin perjuicio de lo declarado en el presente instrumento, la información suministrada por el Sujeto de Aplicación a través del Registro Único de Personas que Desarrollan Actividades Económicas estará sujeta a verificación y evaluación por parte de la Superintendencia Nacional para la Defensa de los Derechos Socioecónomicos de conformidad con lo previsto en el Decreto con Rango, Valor y Fuerza de Ley de Costos y Precios Justos, el Reglamento Parcial sobre la Superintendencia Nacional de Costos y Precios y El Sistema Nacional Integrado de Administración de Precios y demás normativas aplicables.
    </p>
    <p class="text-center">
      ENEIDA LAYA LUGO<br />
      SUPERINTENDENTA NACIONAL
      PARA LA DEFENSA DE LOS DERECHOS SOCIO ECONÓMICOS<br />
      Decreto Nº 4.016, de fecha 29-10-2019<br />
      Gaceta Oficial Nº 41.748, de fecha 29-10-2019
    </p>
  </main>
</body>
</html>