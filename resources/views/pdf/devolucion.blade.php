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

        .todo {
            border-top: 1px solid black;
            border-bottom: 1px solid black;
            border-right: 1px solid black;
            border-left: 1px solid black;
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
<div class="ticket">
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
        <tr >
            <th colspan="8" align="center" valign="top" class="todo">DEVOLUCION NRO: {{$devolucion[0]->codigo}}</th>
        </tr>
        </tbody>
    </table>
    <br>
    <table WIDTH="100%">
        <thead class="tabla">
        <tr>
            <th align="center" width="20px">CODIDO</th>
            <th align="center" width="30px">DESCRIP</th>
            <th align="center" width="30px">CANTI</th>
            <th align="center" width="30px">PRECIO</th>
            <th align="right" width="50px">TOTAL</th>

        </tr>
        </thead>
        <tbody>
        @foreach($devolucion as $devo)
                <tr>
                    <td align="center">{{$devo->codigo}}</td>
                    <td colspan="4" align="left">{{$devo->nombre}} X UNIDAD</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td align="center">{{$devo->cantidadUnidades}}</td>
                    <td align="center">{{$devo->precio}}</td>
                    <td align="center">{{$devo->total}}</td>
                </tr>
               @endforeach
        </tbody>
    </table>
    <br>
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
            <th colspan="7" align="left"  valign="top">ESTA ES UNA NOTA DE CAMBIO DE PRODUCTOS
                </label>
            </th>
        </tr>

        </tbody>
    </table>
</div>
</body>

</html>