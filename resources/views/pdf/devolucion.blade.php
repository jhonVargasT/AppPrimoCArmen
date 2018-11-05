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
        <br><label class="nota">DEVOLUCION NRO: </label>{{$devolucion[0]->codigo}}
        <br>
        ********************************************************
    </p>
    <p class="izquerda">
        <label class="raya"><label class="fecha">FECHA DEVOLUCION : {{$devolucion[0]->fechaCreacion}} </label><label>
            </label>

        </label>
    </p>
    <table>
        <thead>
        <tr>
            <th align="center">COD</th>
            <th align="center">NOMBRE</th>
            <th align="center">CANT</th>
            <th align="center">PRE</th>
            <th align="center">TOT</th>

        </tr>
        </thead>
        <tbody>

        @foreach($devolucion as $devo)
            <tr>
                <td align="center">{{$devo->codigo}}</td>
                <td>{{$devo->nombre}} X UNIDAD</td>
                <td align="center">{{$devo->cantidadUnidades}}</td>
                <td align="center">{{$devo->precio}}</td>
                <td align="center">{{$devo->total}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <p class="centrado">
        <label>ARPEMAR S.A.C AGRADECE SU PREFERENCIA</label>
        <br> <label><label class="nota">NOTA : </label>ESTA ES UNA NOTA DE CAMBIO DE PRODUCTOS
        </label>
    </p>
    <p class="derecha">
        <label class="nota">ATENDIDO POR :</label>
    </p>
</div>
</body>

</html>