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
                <th>ID</th>
                <th>COUNTER</th>
                <th>NUMBER</th>
                <th>QUANTITY</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pallets as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->counter }}</td>
                    <td>{{ $item->number }}</td>
                    <td>{{ $item->quantity }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>