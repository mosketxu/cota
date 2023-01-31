<!doctype html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        {{-- <title>Nº Oferta: {{ $oferta->id }}</title> --}}
        <title>Factura </title>
        <link rel="stylesheet" href="{{ asset('css/app.css')}}">


        {{-- sobreescribo margenes de app.css --}}
        <style>
            @page {margin: 0px 0px 0px 0px;}
            .page-break {page-break-after: always;}
        </style>

    </head>
    <body>
        <!-- Define header and footer blocks before your content -->
        <header >
            <table width="90%" style="margin-top:40px; " class="mx-auto">
                <tr>
                    <td class="" style="text-align: left"  width=50%>
                        <img src="{{asset('img/logo.png')}}" class="mt-2 ml-8" width="120px">
                    </td>
                    <td style="text-align: right; padding-right:40px; font-size: 2em; color: red" width=50%>
                        FACTURA
                    </td>
                </tr>
            </table>
            <div style="margin:0 auto; width: 650px; border-top: 1px solid gray;"></div>
        </header>
        <footer style="position:fixed;left:0px;bottom:0px;height:80px;width:100%">
            <div>
                <div style="margin:0 auto;font-size: 0.7rem;text-align: center;">
                        <p>Cota 2 Mixtura, S.L.P // B67358606</p>
                </div>
                <div style="margin:0 auto; width: 650px; border-top: 1px solid gray;"></div>
                <div class="margin:0 auto; text-center " style="font-size: 0.7rem">
                    <p>Carrer de Sant Joan de la Salle, 42, MF3.11, Barcelona (08022)</p>
                    <p>www.mixturaa.com / www.c2tecnics.com / 671770677 / info@c2tecnics.com</p>
                </div>
            </div>
        </footer>

    <!-- Wrap the content of your PDF inside a main tag -->
        <main style="margin-top:10px; width:100%">
            <div class="">
                <div class="flex py-0 space-y-2">
                    <table width=80% class="mx-auto mt-1 text-sm " style="color:rgb(30, 27, 27);">
                        <tr>
                            <td width=21% >
                                <p style="border-bottom: 0.1px">Factura nº: F.{{ $factura->serie }}.{{ substr($factura->numfactura,-3) }} </p>
                                <p style="border-bottom: 0.1px">Data: {{ $factura->datefra }} </p>
                            </td>
                            <td width=79% style="text-align: right; ">
                                <span style="font-weight: bold"> Client </span> <br>
                                {{ $factura->entidad->entidad }} <br>
                                {{ $factura->entidad->nif }} <br>
                                {{ $factura->entidad->direccion }} <br>
                                {{ $factura->entidad->localidad }} ({{ $factura->entidad->codpostal }}) {{ ucfirst(strtolower($factura->entidad->provincia->provincia)) ?? ''}}
                            </td>
                        </tr>
                    </table>

                    <div style="margin-top:60px;  ">
                        @if(count($facturadetalles)>0)
                            {{-- Detalles  --}}
                            <table style="font-size: 0.7em; margin:0 auto;" width="80%">
                                <tr style="border-bottom: 0.1px;">
                                    <td width="40%" style="text-align: left; font-weight: bold;">CONCEPTE</td>
                                    <td width="20%" style="text-align: right; font-weight: bold;">PREU</td>
                                    <td width="20%" style="text-align: right; font-weight: bold;">UNITATS</td>
                                    <td width="20%" style="text-align: right; font-weight: bold;">SUBTOTAL</td>
                                </tr>
                                @foreach($facturadetalles as $detalle)
                                <tr>
                                    <td width="40%" >
                                        <span style="font-weight: bold;">{{ $detalle->tipo=='1' ? 'Suplerts:' :'' }} {{$detalle->concepto}}</span>
                                        @if($detalle->periodo!='')
                                        <br>{{ $detalle->periodo }}
                                        @endif
                                    </td>
                                    <td width="10%" style="text-align: right">{{ number_format($detalle->importe,2,',','.') }} <img src="{{asset('img/euro.png')}}" class="mt-1" width="8px"></td>
                                    <td width="10%" style="text-align: right">{{ number_format($detalle->unidades,2,',','.') }}</td>
                                    <td width="10%" style="text-align: right">
                                        {{ $detalle->tipo=='1' ? number_format($detalle->exenta,2,',','.') : ($detalle->iva=='0' ? number_format($detalle->exenta,2,',','.') : number_format($detalle->base,2,',','.')) }}
                                        <img src="{{asset('img/euro.png')}}" class="mt-1 ml-1 " width="8px">
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                            {{-- totales --}}
                            <table style="font-size: 0.7em; margin:20 auto;" width="80%">
                                <tr style="border-bottom: 0.1px;">
                                    <td width="85%"  style="text-align: right;">BASE IMPOSABLE</td>
                                    @if($totaliva>0)
                                        <td width="15%" style="text-align: right; ">{{number_format($base,2,',','.')}} <img src="{{asset('img/euro.png')}}" class="mt-2 " width="8px"></td>
                                    @elseif ($detalle->tipo=='0')
                                        <td width="15%" style="text-align: right; ">{{number_format($exenta,2,',','.')}} <img src="{{asset('img/euro.png')}}" class="mt-2 " width="8px"></td>
                                    @endif
                                </tr>
                                @if($suplidos)
                                <tr style="border-bottom: 0.1px;">
                                    <td width="85%"  style="text-align: right;">SUPLERTS</td>
                                    <td width="15%" style="text-align: right; ">{{number_format($suplidos,2,',','.')}} <img src="{{asset('img/euro.png')}}" class="mt-2 " width="8px"> </td>
                                </tr>
                                @endif
                                <tr style="border-bottom: 0.1px;">
                                    @if($totaliva>0)
                                    <td width="85%" style="text-align: right;">IVA 21%</td>
                                    <td width="15%" style="text-align: right" width="50%">{{number_format($totaliva,2,',','.')}} <img src="{{asset('img/euro.png')}}" class="mt-2 " width="8px"></td>
                                    @else
                                    <td width="69%" style="text-align: right;">IVA 0%</td>
                                    <td width="29%" style="text-align: right" width="50%">0.00 <img src="{{asset('img/euro.png')}}" class="mt-2 " width="8px"></td>
                                    @endif
                                </tr>
                                <tr style="border-bottom: 0.1px;">
                                    <td width="85%"  style="text-align: right;">TOTAL</td>
                                    <td width="15%" style="text-align: right; ">{{number_format($total,2,',','.')}} <img src="{{asset('img/euro.png')}}" class="mt-2 " width="8px"></td>
                                </tr>
                            </table>
                            {{-- resumeN --}}
                            <table style="font-size: 0.8em; border-collapse: separate; border-spacing: 0 12px; margin:20 auto;" width="80%">
                                <tr style="margin-top: 20px;">
                                    <td width="20%"  style="text-align: left;">REFERÈNCIA:</td>
                                    <td width="80%" style="text-align: left; ">{{$factura->refcliente}} </td>
                                </tr>
                                @if($suplidos)
                                <tr style="margin-top: 20px;">
                                    <td width="20%"  style="text-align: left;">IMPORT:</td>
                                    <td width="80%" style="text-align: left; ">{{number_format($total,2,',','.')}} <img src="{{asset('img/euro.png')}}" class="mt-2 " width="8px"></td>
                                </tr>
                                @endif
                                <tr style="margin-top: 20px;">
                                    <td width="20%"  style="text-align: left;">PAGAMENT:</td>
                                    <td width="80%" style="text-align: left; ">{{ $factura->metodopago->metodopago }}</td>
                                </tr>
                                <tr style="margin-top: 20px;">
                                    <td width="20%"  style="text-align: left;">CONCEPTE:</td>
                                    <td width="80%" style="text-align: left; ">F.{{ $factura->serie }}.{{ substr($factura->numfactura,-3) }}</td>
                                </tr>
                            </table>

                        @endif
                    </div>


                    {{-- <div class="py-0 space-y-2">
                        <table width="90%" style="margin-top:30px; " cellspacing="0" cellpadding="0" class="mx-auto text-sm">
                            <tr>
                                <td width=51% class="pl-2 font-bold " style="border-style: solid;border-width: .6;border-color: gray" colspan="2">Opciones</td>
                                <td width=17% class="pr-2 font-bold text-right " style="border-style: solid;border-width: .6;border-color: gray">Cantidad</td>
                                <td width=17% class="pr-2 font-bold text-right" style="border-style: solid;border-width: .6;border-color: gray">Precio unitario</td>
                                <td width=17% class="pr-2 font-bold text-right" style="border-style: solid;border-width: .6;border-color: gray">Precio total</td>
                            </tr>
                            @foreach($oferta->ofertadetalles as $odetalle)
                            <tr>
                                <td width=51% class="pl-2" style="border-style: solid;border-width: .6;border-color: gray" colspan="2"><span class="font-bold">{{ $odetalle->titulo }}</span> {{ $odetalle->concepto }}</td>
                                <td width=17% class="pr-2 text-right" style="border-style: solid;border-width: .6;border-color: gray">{{ $odetalle->cantidad }}</td>
                                <td width=17% class="pr-2 text-right" style="border-style: solid;border-width: .6;border-color: gray">{{ $odetalle->importe }}</td>
                                <td width=17% class="pr-2 text-right" style="border-style: solid;border-width: .6;border-color: gray">{{ $odetalle->total }}</td>
                            </tr>
                            @endforeach
                        </table>
                    </div> --}}
                </div>
            </div>
        </main>
    </body>
</html>

