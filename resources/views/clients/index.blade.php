@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Clientes
                    @can('products.create')
                        <a href="{{ route('clients.create') }}" class="btn btn-sm btn-primary pull-right">Crear</a>
                    @endcan
                </div>

                <div class="panel-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>Nombre</th>
                                <th>Teléfono</th>
                                <th>Dirección</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clients as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td width="10px">
                                        @can('clients.show')
                                            <a href="{{ route('clients.show', $item->id) }}" class="btn btn-sm btn-default">Ver</a>
                                        @endcan
                                    </td>
                                    <td width="10px">
                                        @can('clients.edit')
                                            <a href="{{ route('clients.edit', $item->id) }}" class="btn btn-sm btn-warning">Editar</a>
                                        @endcan
                                    </td>
                                    <td width="10px">
                                        @can('clients.destroy')
                                            {!! Form::open(['route' => ['clients.destroy', $item->id], 'method' => 'DELETE']) !!}
                                                <button class="btn btn-sm btn-danger">Eliminar</button>
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
