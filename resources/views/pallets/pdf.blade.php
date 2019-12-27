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
    </style>
</head>
<body>
    <table>
        @foreach($clients_all as $client)
            <thead>
                <tr class="success">
                    <th>Awb:</th>
                    <th colspan="6" class="text-center">{{ strtoupper($client->name) }}</th>
                </tr>
                <tr>
                    <th>Exporter</th>
                    <th>Hawb</th>
                    <th>PCS</th>
                    <th>BXS</th>
                    <th>HB</th>
                    <th>QB</th>
                    <th>EB</th>
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
                            <td>123456</td>
                            <td>{{ $item->quantity }}</td>
                            <td>22.50</td>
                            <td>{{ $item->hb }}</td>
                            <td>{{ $item->qb }}</td>
                            <td>{{ $item->eb }}</td>
                        </tr>
                    @endif
                @endforeach
                
            </tbody>
        @endforeach
    </table>
</body>
</html>