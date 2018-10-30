<!DOCTYPE html>
<html>

<head>
    <style>
        html {
            margin: 0;
        }

        * {
            font-size: 7pt;
        }

        td,
        th,
        tr,
        table {
            border-top: 1px solid black;
            border-bottom: 1px solid black;
            border-collapse: collapse;
        }

        .centrado {
            text-align: center;
            align-content: center;
        }

        .izquerda {
            text-align: left;
            align-content: left;
        }

        .centro {
            text-align: center;
            align-content: center;
        }

        .derecha {
            text-align: right;
            align-content: right;
        }

        .Titulo {
            font-size: 18px;
            text-align: center;
            align-content: center;
            font-weight: bold;
            border-bottom: 1px solid black;

        }

        .nota {
            text-align: center;
            align-content: center;
            font-weight: bold;
        }

        .fecha {
            text-align: right;
            align-content: right;
            font-weight: bold;
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
    </style>

</head>

<body>
<div class="ticket">
    <img src="..\public\assets\img\logo\logo-arp.jpg" width="200" height="200" align="middle" vspace="30">
    <p class="centrado">
        <label class="Titulo">ARPEMAR S.A.C</label>
        <br>
        <br>PARCELA NRO. 32B FUNDO SANTO TOMAS(ALTURA POSTA SAN PEDRO DE CARABAYLLO) LIMA-LIMA.
        <br>RUC : 20602872182
        ********************************************************
        <br><label class="nota">FACTURA NRO: </label>
        <br>{{$pedido[0]->id}}
        ********************************************************
    </p>
    <p class="izquerda">
        <label class="raya"><label class="fecha">FECHA IMPRESION : </label><label>{{$pedido[0]->fechaimpre}}
            </label>

        </label>
        <br> <label class="nota">CLIENTE :</label>{{$pedido[0]->clie}}
        <br><label class="nota">DIRECCION : </label>{{$pedido[0]->direccion}}&nbsp;
        <br><label class="nota">RUC O DNI : </label>{{$pedido[0]->dni}}&nbsp;
    </p>
    <table>
        <thead>
        <tr>
            <th align="center">COD</th>
            <th align="center">DESCRIPCION</th>
            <th align="center">CANT</th>
            <th align="center">PRE</th>
            <th align="center">TOT</th>

        </tr>
        </thead>
        <tbody>

        @foreach($productos as $producto)
            <tr>
                <td align="center">{{$producto->id}}</td>
                <td>{{$producto->nombre}} X PAQUETE</td>
                <td align="center">{{$producto->cantidadPaquetes}}</td>
                <td align="center">{{$producto->precioVenta}}</td>
                <td align="center">{{$producto->cantidadPaquetes*$producto->precioVenta}}</td>
            </tr>
            @if($producto->cantidadUnidades!=0)
                <tr>
                    <td align="center">{{$producto->id}}</td>
                    <td>{{$producto->nombre}} X UNIDAD</td>
                    <td align="center">{{$producto->cantidadUnidades}}</td>
                    <td align="center">{{$producto->precioVentaUnidad}}</td>
                    <td align="center">{{$producto->cantidadUnidades*$producto->precioVentaUnidad}}</td>
                </tr>
            @endif
        @endforeach
        </tbody>
    </table>
    <p class="derecha">
        <label class="nota">OP.GRAVADA : </label>{{$impuestos[0]->opgrav}}
        <br><label class="nota">I.G.V : </label>{{$impuestos[0]->igv}}
        <br><label class="nota">TOTAL : </label>{{$impuestos[0]->tot}}
    </p>
    <p class="centrado">
        <label>ARPEMAR S.A.C AGRADECE SU PREFERENCIA</label>
        <br> <label><label class="nota">NOTA:</label>ESTA ES UNA FACTURA ELECTRONICA
        </label>
    </p>
    <p class="derecha">
        <label class="nota">ATENDIDO POR :</label>{{$pedido[0]->usu}}
    </p>
</div>
</body>

</html>