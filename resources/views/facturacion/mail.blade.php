<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Factura</title>
</head>
<body>
    <p>Nueva Factura {{ $factura->numfactura }}.</p>
    <p>Estos son los datos del usuario que ha realizado la denuncia:</p>
    <ul>
        <li>Entidad: {{ $factura->entidad }}</li>
    </ul>
    {{-- <img src="{{asset('img/LOGOSUMA_2.jpg')}}" width="200"/> --}}
    <img src="{{ $message->embed(asset('img/LOGOSUMA_2.jpg')) }}">
</body>
</html>
