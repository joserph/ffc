<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <style>
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
    </style>
</head>
<body>
    <table>
        @php
            $quantity = 0;
        @endphp
        @foreach($clients_all as $client)
        
            <thead>
                <tr class="success">
                    <th class="text-center">Awb:</th>
                    <th colspan="6" class="text-center">{{ strtoupper($client->name) }}</th>
                </tr>
                <tr>
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
                            <td class="text-center">123456</td>
                            <td class="text-center">{{ $item->quantity }}</td>
                            <td class="text-center">22.50</td>
                            <td class="text-center">{{ $item->hb }}</td>
                            <td class="text-center">{{ $item->qb }}</td>
                            <td class="text-center">{{ $item->eb }}</td>
                        </tr>
                        @php
                            $quantity += $item->quantity;
                        @endphp
                    @endif
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2" class="text-right">Total:</td>
                    <td class="text-center">{{ $quantity }}</td>
                    <td class="text-center">{{ $quantity }}</td>
                    <td class="text-center">{{ $quantity }}</td>
                    <td class="text-center">{{ $quantity }}</td>
                    <td class="text-center">{{ $quantity }}</td>
                </tr>
            </tfoot>
            <tfoot>
                <tr>
                    <td colspan="7" class="blanco">-</td>
                </tr>
            </tfoot>
            @php
                $quantity = 0;
            @endphp
        @endforeach
        
    </table>
</body>
</html>