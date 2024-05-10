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
            {{-- <div style="margin:0 auto; width: 650px; border-top: 1px solid gray;"></div> --}}
            <div class="mt-16 ml-10 text-3xl">
                <div class="">Factura nº: F.{{ $factura->serie }}.{{ substr($factura->numfactura,-3) }}</div>
                <div class="">Data: {{ $factura->datefra }}</div>
            </div>

            <div class="ml-10 text-xs mt-14">
                <div class="" style="float:left;width: 55%;">
                    <div class="font-bold">CLIENT</div>
                    <div class="">&nbsp;</div>
                    <div class="">{{ $factura->entidad->entidad }} </div>
                    <div class="">{{ $factura->entidad->nif }} </div>
                    <div class="">{{ $factura->entidad->direccion }} </div>
                    <div class="">{{ $factura->entidad->localidad }} ({{ $factura->entidad->codpostal }}) {{ ucfirst(strtolower($factura->entidad->provincia->provincia)) ?? ''}}</div>
                </div>
                <div class="mr-10 text-right" style="float:left;width: 33%;">
                    <div class="">&nbsp;</div>
                    <div class="">&nbsp;</div>
                    <div class="">CLAUDA ARQUITECTURA I TÈCNICA S.L.P.</div>
                    <div class="">B67358606</div>
                    <div class="">C/ Sant Joan de la Salle 42, MF 3º 11ª</div>
                    <div class="">(08022) Barcelona</div>
                </div>
            </div>
            <div style="clear:both"></div>
        </header>
        <footer style="position:fixed;left:0px;bottom:0px;height:110px;width:100%">
            <div class="">
                <div class="py-0 my-0" style="float:left;width: 50%;">
                    <img src="{{asset('img/logo.png')}}" class="ml-8" width="120px">
                </div>
                <div class="py-0 my-0 " style="float:right;width: 30%; font-size: 0.65em">
                    <div class="py-0 my-0">C/ Sant Joan de la Salle 42,</div>
                    <div class="py-0 my-0">MF 3º 11ª, 08022, BCN</div>
                    <div class="py-0 my-0">
                        <div class="py-0 my-0" style="float:left;width: 10%;">
                            <div class="py-0 my-0">T ¬</div>
                            <div class="py-0 -my-1">E ¬</div>
                            <div class="py-0 -my-1">W ¬</div>
                        </div>
                        <div class="py-0 my-0 text-right" style="float:left;width: 55%;">
                            <div class="py-0 ">+34 93 609 74 30</div>
                            <div class="py-0 -my-1 ">info@clauda.eu</div>
                            <div class="py-0 -my-1 "><a href="https://www.clauda.eu/">www.clauda.eu</a></div>
                        </div>
                    </div>
                    <div style="clear:both"></div>
                </div>
                <div style="clear:both"></div>
            </div>

            {{-- <div style="margin:0 auto; width: 650px; border-top: 1px solid gray;"></div> --}}
            <div class="ml-10 text-xs mt-14">
                <div class="" style="float:left;width: 60%;">
                    <div class="font-bold">CLIENT</div>
                    <div class="">&nbsp;</div>
                    <div class="">{{ $factura->entidad->entidad }} </div>
                    <div class="">{{ $factura->entidad->nif }} </div>
                    <div class="">{{ $factura->entidad->direccion }} </div>
                    <div class="">{{ $factura->entidad->localidad }} ({{ $factura->entidad->codpostal }}) {{ ucfirst(strtolower($factura->entidad->provincia->provincia)) ?? ''}}</div>
                </div>
                <div class="mr-10 text-right" style="float:left;width: 28%;">
                    <div class="">&nbsp;</div>
                    <div class="">&nbsp;</div>
                    <div class="">CLAUDA ARQUITECTURA I TÈCNICA S.L.P.</div>
                    <div class="">B67358606</div>
                    <div class="">C/ Sant Joan de la Salle 42, MF 3º 11ª</div>
                    <div class="">(08022) Barcelona</div>
                </div>
            </div>
            <div style="clear:both"></div>
        </footer>

    <!-- Wrap the content of your PDF inside a main tag -->
        <main style="margin-top:10px; width:100%">
            <div class="mt-20 ml-10">
                @if(count($facturadetalles)>0)
                    {{-- Detalles  --}}
                    <table style="font-size: 0.7em; " width="88%">
                        <tr style="border-bottom: 0.1px;border-top: 0.1px;">
                            <td class="py-1" width="45%" style="text-align: left; font-weight: bold;">CONCEPTE</td>
                            <td width="18%" style="text-align: right; font-weight: bold;">PREU</td>
                            <td width="18%" style="text-align: right; font-weight: bold;">UNITATS</td>
                            <td width="19%" style="text-align: right; font-weight: bold;">SUBTOTAL</td>
                        </tr>
                        @foreach($facturadetalles as $detalle)
                        <tr>
                            <td width="45%" >
                                <span style="font-weight: bold;">{{ $detalle->tipo=='1' ? 'Suplerts:' :'' }} {{$detalle->concepto}}</span>
                                @if($detalle->periodo!='')
                                <br>{{ $detalle->periodo }}
                                @endif
                            </td>
                            <td width="18%" style="text-align: right">{{ number_format($detalle->importe,2,',','.') }} <img src="{{asset('img/euro.png')}}" class="mt-1" width="8px"></td>
                            <td width="18%" style="text-align: right">{{ number_format($detalle->unidades,2,',','.') }}</td>
                            <td width="19%" style="text-align: right">
                                {{ $detalle->tipo=='1' ? number_format($detalle->exenta,2,',','.') : ($detalle->iva=='0' ? number_format($detalle->exenta,2,',','.') : number_format($detalle->base,2,',','.')) }}
                                <img src="{{asset('img/euro.png')}}" class="mt-1 ml-1 " width="8px">
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    {{-- totales --}}
                    <table style="font-size: 0.7em; margin:20 0 0 0;" width="88%">
                        <tr style="border-bottom: 0.1px;">
                            <td width="85%"  style="text-align: right;">BASE IMPOSABLE</td>
                            @if($totaliva!=0)
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
                            @if($totaliva!=0)
                            <td width="85%" style="text-align: right;">IVA 21%</td>
                            <td width="15%" style="text-align: right" width="50%">{{number_format($totaliva,2,',','.')}} <img src="{{asset('img/euro.png')}}" class="mt-2 " width="8px"></td>
                            @else
                            <td width="69%" style="text-align: right;">IVA 0%</td>
                            <td width="29%" style="text-align: right" width="50%">0.00 <img src="{{asset('img/euro.png')}}" class="mt-2 " width="8px"></td>
                            @endif
                        </tr>
                        <tr style="border-bottom: 0.1px;">
                            <td width="85%"  style="text-align: right;color: green ;font-weight: bold">TOTAL</td>
                            <td width="15%" style="text-align: right;color: green ;font-weight: bold ">{{number_format($total,2,',','.')}} <img src="{{asset('img/euro.png')}}" class="mt-2 " width="8px"></td>
                        </tr>
                    </table>

                    {{-- obs --}}
                    @if($factura->observaciones!='')
                    <div class="mt-10 text-xs italic font-bold">
                        {{ $factura->observaciones }}
                    </div>
                    @endif
                    {{-- resumen --}}
                    <div class="mt-10 text-xs">
                        <div class="" style="float:left;width: 10%;">
                            <div class="">[Referència]</div>
                            <div class="mt-2">[Pagament]</div>
                            <div class="mt-2">[Concepte]</div>
                        </div>
                        <div style="float:left;width: 80%;">
                            <div class="">{{$factura->refcliente}}</div>
                            <div class="mt-2">{{ $factura->metodopago->metodopago }}</div>
                            <div class="mt-2">F.{{ $factura->serie }}.{{ substr($factura->numfactura,-3) }} </div>
                        </div>
                    </div>
                    <div style="clear:both"></div>
                @endif
            </div>
        </main>
    </body>
</html>

