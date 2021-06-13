<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    {{-- <link rel="stylesheet" href="{{ mix('css/app.css') }}"> --}}

    <title>Factura</title>
</head>
<body>

    <p>Te envío nuestra factura de este mes. </p>
    <p>Factura nº :{{ $factura->factura5 }} </p>
    <p>Atentamente, <p>
    <p>Suma Apoyo Empresarial, S.L. </p>

    <div  style="width: 200px">
		<img src="{{ $message->embed(asset('img/LOGOSUMA_mail.jpg')) }}" width="20px">
    </div>
</body>
</html>
