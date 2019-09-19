<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>
    <h1>COMERCIAL INVOICE</h1>
    <table>
        <thead>
            <tr>
                <th>Fulls</th>
                <th>Pcs</th>
                <th>farms</th>
                <th>Desciption</th>
                <th>Hawb</th>
                <th>Stems</th>
                <th>Bunch</th>
                <th>Price</th>
                <th>Total USD</th>
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
                    <td>{{ $item->fulls }}</td>
                    <td>{{ $item->pieces }}</td>
                    <td>
                        @foreach ($farms_all as $farm)
                            @if($item->id_farm == $farm->id)
                                {{ strtoupper($farm->name) }}
                            @endif
                        @endforeach
                    </td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->hawb }}</td>
                    <td>{{ $item->stems }}</td>
                    <td>{{ $item->bunches }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->total }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th class="text-center">{{ $fulls }}</th>
                <th class="text-center">{{ $pcs }}</th>
                <th colspan="3" class="text-center"></th>
                <th class="text-center">{{ $stems }}</th>
                <th colspan="3" class="text-right">${{ $total }}</th>
            </tr>
        </tfoot>
    </table>
</body>
</html>