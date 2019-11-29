<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Exporter</th>
                <th>Hawb</th>
                <th>PCS</th>
                <th>BXS</th>
                <th>FB</th>
                <th>HB</th>
                <th>QB</th>
                <th>EB</th>
            </tr>
        </thead>
        @foreach($clients_all as $client)
            <thead>
                <tr class="success">
                    <th colspan="8" class="text-center">{{ strtoupper($client->name) }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pallet_items as $item)
                    @if($item->id_client == $client->id)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->counter }}</td>
                            <td>{{ $item->number }}</td>
                            <td>{{ $item->quantity }}</td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        @endforeach
    </table>
</body>
</html>