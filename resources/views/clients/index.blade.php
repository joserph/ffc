@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Clientes
                    @can('products.create')
                        <a href="{{ route('clients.create') }}" class="btn btn-sm btn-primary pull-right"><i class="fas fa-plus-square"></i> Agregar</a>
                    @endcan
                </div>

                <div class="panel-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="text-center" width="10px">ID</th>
                                <th class="text-center">Nombre</th>
                                <th class="text-center">Teléfono</th>
                                <th class="text-center">Dirección</th>
                                <th colspan="3" class="text-center">Aciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clients as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td class="text-center">{{ $item->name }}</td>
                                    <td class="text-center">{{ $item->phone }}</td>
                                    <td class="text-center">{{ $item->address }}</td>
                                    <td width="10px">
                                        @can('clients.show')
                                            <a href="{{ route('clients.show', $item->id) }}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i> Ver</a>
                                        @endcan
                                    </td>
                                    <td width="10px">
                                        @can('clients.edit')
                                            <a href="{{ route('clients.edit', $item->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> Editar</a>
                                        @endcan
                                    </td>
                                    <td width="10px">
                                        @can('clients.destroy')
                                            {!! Form::open(['route' => ['clients.destroy', $item->id], 'method' => 'DELETE']) !!}
                                                <button class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i> Eliminar</button>
                                            {!! Form::close() !!}
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $clients->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
