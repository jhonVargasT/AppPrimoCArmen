<!DOCTYPE html>
<html>

<head>
    <style>
        html {
            margin: 1px;
        }

        * {
            font-size: 7pt;
        }

        .Titulo {
            font-size: 18px;
            text-align: center;
            align-content: center;
            font-weight: bold;
            border-bottom: 1px solid black;

        }

        .rayaarr {
            border-top: 1px solid black;
        }

        img {
            max-width: inherit;
            width: inherit;
        }

        body {
            font-family: 'DejaVu Sans Mono';
        }

        .tabla {
            border-top: 1px solid black;
            border-bottom: 1px solid black;
            border-collapse: collapse;
        }

        .lineaarriba {
            border-top: 1px solid black;
        }
    </style>

</head>

<body>
<div>

    <table>
        <thead>

        </thead>
        <tbody>
        <tr>
            <th colspan="8" class="Titulo" align="center"><img src="..\public\assets\img\logo\logo-arp.jpg" width="100"
                                                               height="100" align="middle" vspace="30"></th>
        </tr>
        <tr>
            <th colspan="8" class="Titulo" align="center"> ARPEMAR S.A.C</th>
        </tr>
        <tr>
            <th colspan="8" align="center"> PARCELA NRO. 32B FUNDO SANTO TOMAS(ALTURA POSTA SAN PEDRO DE
                CARABAYLLO) LIMA-LIMA.
            </th>
        </tr>
        <tr>
            <th colspan="8" align="center"> RUC Nro 20602872182</th>
        </tr>
        <tr>
            <th colspan="2" align="left" valign="top">FECHA</th>
            <th colspan="1" align="left" valign="top">:</th>
            <th colspan="5" align="left" valign="top"> {{$pedido[0]->fechaimpre}}</th>
        </tr>
        <tr>
            <th colspan="2" align="left" valign="top">CLIENTE</th>
            <th colspan="1" align="left" valign="top">:</th>
            <th colspan="5" align="left" valign="top"> {{$pedido[0]->clie}}</th>
        </tr>
        <tr>
            <th colspan="2" align="left" valign="top">RUC O DNI</th>
            <th colspan="1" align="left" valign="top">:</th>
            <th colspan="5" align="left" valign="top"> {{$pedido[0]->dni}}&nbsp;</th>
        </tr>
        <tr>
            <th colspan="2" align="left" valign="top">DIRECCION</th>
            <th colspan="1" align="left" valign="top">:</th>
            <th colspan="5" align="left" valign="top"> {{$pedido[0]->direccion}}&nbsp;</th>
        </tr>

        </tbody>
    </table>
    <br><br>
    <table>
        <thead class="tabla">
        <tr>
            <th align="center">CODIGO</th>
            <th align="center">DESCRIPCIO</th>
            <th align="center">CANTIDAD</th>
            <th align="center">PRECIO</th>
            <th align="center">TOTAL</th>

        </tr>
        </thead>
        <tbody>

        @foreach($productos as $producto)
            @if($producto->cantidadPaquetes!=0)
                <tr>
                    <td align="center">{{$producto->id}}</td>
                    <td colspan="4" align="left">{{$producto->nombre}} X {{$producto->tipoPaquete}}</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td align="center">{{$producto->cantidadPaquetes}}</td>
                    <td align="center">{{$producto->precioVentapaque}}</td>
                    <td align="center">{{$producto->totpaque}}</td>
                </tr>
            @endif
            @if($producto->id_Promocion!=null && $producto->DescuentoPaquetes!=0)
                <tr>
                    <td colspan="3" align="right">{{$producto->descpro}}</td>
                    <td align="right">DESC</td>
                    <td align="center">-{{$producto->DescuentoPaquetes}}</td>
                </tr>
            @endif
            @if($producto->cantidadUnidades!=0)
                <tr>
                    <td align="center">{{$producto->id}}</td>
                    <td colspan="4" align="left">{{$producto->nombre}} X UNIDAD</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td align="center">{{$producto->cantidadUnidades}}</td>
                    <td align="center">{{$producto->precioVentaUnidad}}</td>
                    <td align="center">{{$producto->totuni}}</td>
                </tr>
            @endif
            @if($producto->id_Promocion!=null && $producto->DescuentoUnidades!=0)
                <tr>
                    <td colspan="3" align="right">{{$producto->descpro}}</td>
                    <td align="right">DESC</td>
                    <td align="center">-{{$producto->DescuentoUnidades}}</td>
                </tr>
            @endif
        @endforeach
        <tr>

            <td class="lineaarriba" colspan="3" align="right">OP.GRAVADA</td>
            <td class="lineaarriba" align="center">:</td>
            <td class="lineaarriba" align="center">{{$impuestos[0]->costoBruto}}</td>
        </tr>
        <tr>

            <td colspan="3" align="right">I.G.V</td>
            <td align="center">:</td>
            <td align="center">{{$impuestos[0]->impuesto}}</td>
        </tr>
        <tr>

            <td colspan="3" align="right">DESCUENTO</td>
            <td align="center">:</td>
            <td align="center">-{{$impuestos[0]->descuento}}</td>
        </tr>
        <tr>

            <td colspan="3" align="right">TOTAL</td>
            <td align="center">:</td>
            <td align="center">{{$impuestos[0]->totalPago}}</td>
        </tr>
        </tbody>
    </table>
    <br><br>
    <table>
        <thead></thead>
        <tbody>
        <tr>
            <th colspan="8" align="center">ARPEMAR S.A.C AGRADECE SU PREFERENCIA
            </th>
        </tr>
        <tr>
            <th colspan="1" align="left" valign="top">NOTA:
            </th>
            <th colspan="7" align="left"  valign="top">ESTA ES UNA NOTA DE VENTA QUE PUEDE SER CANJEADA POR UNA FACTURA O
                BOLETA
            </th>
        </tr>
        <tr>
            <th colspan="3" align="right">ATENDIDO POR :
            </th>
            <th colspan="5" align="left">{{$pedido[0]->usu}}
            </th>
        </tr>
        </tbody>
    </table>

</div>
</body>

</html>