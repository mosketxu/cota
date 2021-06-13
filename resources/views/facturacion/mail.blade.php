<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Factura</title>
</head>
<body>

    <p>Te envío nuestra factura de este mes. </p>
    <p>Factura nº:{{ $factura->factura5 }} </p>
    <p>Atentamente, <p>
    <p>Suma Apoyo Empresarial, S.L. </p>

    <div class="">
        <img src="{{ $message->embed(asset('img/LOGOSUMA_2.jpg')) }}" width="20px">
    </div>
</body>
</html>
