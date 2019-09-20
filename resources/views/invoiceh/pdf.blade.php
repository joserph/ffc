<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
        }
        .text-center{
            text-align: center;
        }
        .text-right{
            text-align: right;
        }
        .text-left{
            text-align: left;
        }
        table {
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
            height: 20px;
        }
        table{
            width: 100%;
        }
        .small-letter{
            font-size: 10px;
        }
        .medium-letter{
            font-size: 13px;
        }
        .farms{
            width: 300px;
        }
    </style>
</head>
<body>
    <h1>COMERCIAL INVOICE</h1>
    <table>
        <thead>
            <tr>
                <th class="text-center medium-letter">Grower Name & Address / Nombre y Dirección de Cultivo</th>
                <th class="text-center medium-letter">Foreign Purchaser / Comprador Extranjero</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="small-letter">
                    SIERRA CARGO S.A. RUC: 1791330056001 <br>
                    DE LOS ROSALES N45-14 Y DE LOS TULIPANES <br>
                    PH: 5932277776 ZIP: 170184 <br>
                    QUITO-ECUADOR
                </td>
                <td class="small-letter">
                    FRESH FLOWER CARGO <br>
                    741 SAN PEDRO ST LOS ANGELES, CA 90014 <br>
                    LOS ANGELES CALIFORNIA US <br>
                    PH: 2134894061
                </td>
            </tr>
        </tbody>
    </table>
    <table>
        <thead>
            <tr>
                <th>Farm</th>
                <th>Date / Fecha</th>
                <th colspan="2">Country INVOICE N°</th>
                <th>B/L N°</th>
                <th>Carrier</th>
            </tr>
        </thead>
        <br>
        <tbody>
            <tr>
                <td>VF</td>
                <td>{{ $date_load }}</td>
                <td>GYE</td>
                <td>190299</td>
                <td>DOLQ GYQY2633 SD</td>
                <td>DOLE NARCOTEC</td>
            </tr>
        </tbody>
    </table>

    <hr>
    <table>
        <thead>
            <tr>
                <th class="text-center medium-letter">Fulls</th>
                <th class="text-center medium-letter">Pcs</th>
                <th class="text-center farms medium-letter">Farms</th>
                <th class="text-center medium-letter">Desciption</th>
                <th class="text-center medium-letter">Hawb</th>
                <th class="text-center medium-letter">Stems</th>
                <th class="text-center medium-letter">Bunch</th>
                <th class="text-center medium-letter">Price</th>
                <th class="text-center medium-letter">Total USD</th>
            </tr>
        </thead>
        <tbody>
            @php
                $fulls = 0; $pcs = 0; $stems = 0; $total = 0;
            @endphp
            @foreach ($comercial_invoice_items as $item)
                @php
                    $fulls+= $item->fulls;
                    $pcs+= $item->pieces;
                    $stems+= $item->stems;
                    $total+= $item->total;
                @endphp
                <tr>
                    <td class="text-center small-letter">{{ number_format($item->fulls, 2, '.','') }}</td>
                    <td class="text-center small-letter">{{ $item->pieces }}</td>
                    <td class="text-left small-letter">
                        @foreach ($farms_all as $farm)
                            @if($item->id_farm == $farm->id)
                                {{ strtoupper($farm->name) }}
                            @endif
                        @endforeach
                    </td>
                    <td class="text-center small-letter">{{ $item->description }}</td>
                    <td class="text-center small-letter">{{ $item->hawb }}</td>
                    <td class="text-center small-letter">{{ number_format($item->stems, 0, '','.') }}</td>
                    <td class="text-center small-letter">{{ $item->bunches }}</td>
                    <td class="text-center small-letter">{{ number_format($item->price, 2, ',','') }}</td>
                    <td class="text-center small-letter">{{ number_format($item->total, 2, ',','.') }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th class="text-center small-letter">{{ number_format($fulls, 2, '.','') }}</th>
                <th class="text-center small-letter">{{ $pcs }}</th>
                <th colspan="3" class="text-right small-letter">TOTAL:</th>
                <th class="text-center small-letter">{{ number_format($stems, 0, '','.') }}</th>
                <th colspan="2" class="text-center small-letter"></th>
                <th class="text-center small-letter">{{ number_format($total, 2, ',','.') }}</th>
            </tr>
        </tfoot>
    </table>
</body>
</html>