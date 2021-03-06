<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <style>
        *{
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            font-size: 11px;
        }
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        table {
            width: 100%;
        }
        .text-center{
            text-align: center;
        }
        .text-right{
            text-align: right;
        }
        .blanco{
            color: #fff;
        }
        tr.success {
            background-color: #4CAF50;
            color: white;
        }
        .small {
            font-size: 10px;
        }
        .medium {
            font-size: 20px;
        }
        .big {
            font-size: 30px;
        }
    </style>
</head>
<body>
    <!-- Encabezado -->
    <table>
        <thead>
            <tr>
                <th colspan="4" class="text-center medium">SHIPMENT CONFIRMATION</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Date:</td>
                <td>{{ $load_current->date }}</td>
                <td>PCS</td>
                <td>100 manual</td>
            </tr>
            <tr>
                <td>Client:</td>
                <td>FRESH FLOWER CARGO</td>
                <td>Carrier:</td>
                <td>MARITIMO</td>
            </tr>
            <tr>
                <td colspan="2">DOLE:</td>
                <td colspan="2">{{ $load_current->bl }}</td>
            </tr>
        </tbody>
    </table>
    <!-- End Encabezado -->

    <table>
        @php
            $quantity = 0;
            $hb = 0;
            $qb = 0;
            $eb = 0;
            $full = 0;
            $quantity_total = 0;
            $hb_total = 0;
            $qb_total = 0;
            $eb_total = 0;
            $full_total = 0;
        @endphp
        @foreach($clients_all as $client)
        
            <thead>
                <tr>
                    <th class="text-center">Awb:</th>
                    <th colspan="6" class="text-center">FRESH FLOWER CARGO - {{ strtoupper($client->name) }}</th>
                </tr>
                <tr class="success">
                    <th class="text-center">Exporter</th>
                    <th class="text-center">Hawb</th>
                    <th class="text-center">PCS</th>
                    <th class="text-center">BXS</th>
                    <th class="text-center">HB</th>
                    <th class="text-center">QB</th>
                    <th class="text-center">EB</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pallet_items as $item)
                    @if($item->id_client == $client->id)
                        <tr>
                            <td>
                                @foreach ($farms as $item_farm)
                                    @if ($item->id_farm == $item_farm->id)
                                        {{ $item_farm->name }}
                                    @endif
                                @endforeach
                            </td>
                            <td class="text-center">
                                @foreach ($hawb as $hawbs)
                                    @if ($hawbs->id_client == $item->id_client & $hawbs->id_farm == $item->id_farm)
                                        {{ $hawbs->hawb }}
                                    @endif
                                @endforeach
                            </td>
                            <td class="text-center">{{ $item->quantity }}</td>
                            <td class="text-center">{{ number_format($item->fulls, 2, '.','') }}</td>
                            <td class="text-center">{{ $item->hb }}</td>
                            <td class="text-center">{{ $item->qb }}</td>
                            <td class="text-center">{{ $item->eb }}</td>
                        </tr>
                        @php
                            $quantity += $item->quantity;
                            $hb += $item->hb;
                            $qb += $item->qb;
                            $eb += $item->eb;
                            $full += $item->fulls;
                        @endphp
                    @endif
                @endforeach
            </tbody>
            <tfoot>
                <tr class="success">
                    <th colspan="2" class="text-right">Total:</th>
                    <th class="text-center">{{ $quantity }}</th>
                    <th class="text-center">{{ number_format($full, 2, '.','') }}</th>
                    <th class="text-center">{{ $hb }}</th>
                    <th class="text-center">{{ $qb }}</th>
                    <th class="text-center">{{ $eb }}</th>
                </tr>
            </tfoot>
            <tfoot>
                <tr>
                    <td colspan="7" class="blanco">-</td>
                </tr>
            </tfoot>
            @php
                $quantity_total += $quantity;
                $hb_total += $hb;
                $qb_total += $qb;
                $eb_total += $eb;
                $full_total += $full;
            @endphp
            @php
                $quantity = 0;
                $hb = 0;
                $qb = 0;
                $eb = 0;
                $full = 0;
            @endphp
        @endforeach
        <tfoot>
            <tr class="success">
                <th colspan="2" class="text-right">Total Global:</th>
                <th class="text-center">{{ $quantity_total }}</th>
                <th class="text-center">{{ number_format($full_total, 2, '.','') }}</th>
                <th class="text-center">{{ $hb_total }}</th>
                <th class="text-center">{{ $qb_total }}</th>
                <th class="text-center">{{ $eb_total }}</th>
            </tr>
        </tfoot>
    </table>
</body>
</html>