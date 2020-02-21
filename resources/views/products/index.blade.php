@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Productos
                    @can('products.create')
                        <a href="{{ route('products.create') }}" class="btn btn-xs btn-primary pull-right"><i class="fas fa-plus-circle"></i> Crear</a>
                    @endcan
                </div>

                <div class="panel-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>Nombre</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td width="10px">
                                        @can('products.show')
                                            <a href="{{ route('products.show', $item->id) }}" class="btn btn-xs btn-info"><i class="fas fa-eye"></i> Ver</a>
                                        @endcan
                                    </td>
                                    <td width="10px">
                                        @can('products.edit')
                                            <a href="{{ route('products.edit', $item->id) }}" class="btn btn-xs btn-warning"><i class="fas fa-edit"></i> Editar</a>
                                        @endcan
                                    </td>
                                    <td width="10px">
                                        @can('products.destroy')
                                            {!! Form::open(['route' => ['products.destroy', $item->id], 'method' => 'DELETE']) !!}
                                                <button class="btn btn-xs btn-danger"><i class="fas fa-trash-alt"></i> Eliminar</button>
                                            {!! Form::close() !!}
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $products->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
