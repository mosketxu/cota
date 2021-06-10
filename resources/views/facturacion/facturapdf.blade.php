<!doctype html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <title>Factura {{$factura->serie}}/{{ $factura->numfactura }}</title>
        <link rel="stylesheet" href="{{ asset('css/pdf.css')}}">

    </head>
    <body class="text-sm">
        <!-- Define header and footer blocks before your content -->
        <header>
            {{-- cabecera del formulario --}}
            <div>
                <table width="60%" style="margin:0 auto" cellspacing="0">
                    <tbody>
                        <tr>
                            <td width="24%"></td>
                            <td width="30%"><img src="{{asset('img/LOGOSUMA_2.jpg')}}"  width="200"></td>
                            <td width="36%"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </header>

        <footer>
            <div>
                <table width="60%" style="margin:0 auto" cellspacing="0">
                    <tbody>
                        <tr>
                            <td width="10%"></td>
                            <td width="30%"><img src="{{asset('img/PieSUMA.jpg')}}" width="500"/></td>
                            <td width="36%"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </footer>

    <!-- Wrap the content of your PDF inside a main tag -->
        <main style="margin-top:140px; margin-right: 20px;">
            {{-- datos cliente  --}}
            <table width="100%" style="text-align:left;margin-left:40px" cellspacing="0">
                <tbody>
                    <tr>
                        <td width="49%"></td>
                        <td width="49%">{{ $factura->entidad->entidad  }}</td>
                    </tr>
                    <tr>
                        <td width="49%"></td>
                        <td width="49%">{{ $factura->entidad->direccion  }}</td>
                    </tr>
                    <tr>
                        <td width="49%"></td>
                        <td width="49%">{{ $factura->entidad->codpostal }} {{ $factura->entidad->localidad }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><br></td>
                    </tr>
                    <tr>
                        <td width="49%"></td>
                        <td width="49%">{{ $factura->entidad->nif  }}</td>
                    </tr>

                </tbody>
            </table>

            {{-- detalle de la factura --}}

                <aside style="float:left; margin-left: -20 px; padding-left: 0px;">
                    <img src="{{asset('img/Reg mercantilSUMAVER2.jpg')}}" width="55"/>
                </aside>
                <section style="float:right; text-align: left; margin-left: 100px">
                    <div style="margin-top:50px; ">
                    {{-- Fecha y Factura --}}
                        <div>FECHA: {{ $factura->fechafactura->format('d-m-Y') }}</div>
                        <div>FACTURA: {{ $factura->serie }}/{{ $factura->numfactura }}</div>
                    </div>
                    <div style="margin-top:50px; ">
                        @if(count($factura->facturadetalles)>0)
                            {{-- Detalles  --}}
                            <table width="90%">
                                @foreach($factura->facturadetalles as $detalle)
                                <tr>
                                    <td width="69%">{{ $detalle->tipo=='1' ? 'Suplidos:' :'' }} {{$detalle->concepto}}</td>
                                    <td width="29%" style="text-align: right" width="50%">{{number_format($detalle->base,2,',','.')}} <span style="font-family: Arial">€</span> </td>
                                </tr>
                                @endforeach
                            </table>
                            {{-- totales --}}
                            <table style="margin-top: 20px;" width="90%">
                                <tr>
                                    <td width="69%"  style="padding-left: 30px">Base imponible:</td>
                                    <td width="29%" style="text-align: right; " width="50%">{{number_format($base,2,',','.')}} <span style="font-family: Arial">€</span></td>
                                </tr>
                                @if($suplidos)
                                <tr>
                                    <td width="69%" style="padding-left: 30px">Suplidos:</td>
                                    <td width="29%" style="text-align: right" width="50%">{{number_format($suplidos,2,',','.')}} <span style="font-family: Arial">€</span></td>
                                </tr>
                                @endif
                                <tr>
                                    <td width="69%" style="padding-left: 30px">IVA 21%:</td>
                                    <td width="29%" style="text-align: right" width="50%">{{number_format($totaliva,2,',','.')}} <span style="font-family: Arial">€</span></td>
                                </tr>
                                <tr>
                                    <td width="69%" style="padding-left: 30px">Total:</td>
                                    <td width="29%" style="text-align: right" width="50%">{{number_format($total,2,',','.')}} <span style="font-family: Arial">€</span></td>
                                </tr>
                            </table>


                            <div style="margin-top:40px">
                                <div class="">Condiciones de pago: {{ $factura->metodopago->metodopago }}</div>
                                <div class="">Vencimiento: {{ $factura->fechavencimiento? $factura->fechavencimiento->format('d-m-Y') : 'A la vista'}}</div>
                            </div>
                        @endif
                    </div>
                </section>
            </div>
        </main>

    </body>
</html>

