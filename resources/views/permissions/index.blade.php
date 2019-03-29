@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Permisos
                    @can('permissions.create')
                        <a href="{{ route('permissions.create') }}" class="btn btn-sm btn-primary pull-right">Crear</a>
                    @endcan
                </div>

                <div class="panel-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>Nombre</th>
                                <th>Slug</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->slug }}</td>
                                    <td width="10px">
                                        @can('permissions.show')
                                            <a href="{{ route('permissions.show', $item->id) }}" class="btn btn-sm btn-default">Ver</a>
                                        @endcan
                                    </td>
                                    <td width="10px">
                                        @can('permissions.edit')
                                            <a href="{{ route('permissions.edit', $item->id) }}" class="btn btn-sm btn-warning">Editar</a>
                                        @endcan
                                    </td>
                                    <td width="10px">
                                        @can('permissions.destroy')
                                            {!! Form::open(['route' => ['permissions.destroy', $item->id], 'method' => 'DELETE']) !!}
                                                <button class="btn btn-sm btn-danger">Eliminar</button>
                                            {!! Form::close() !!}
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $permissions->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
