@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Permisos
                    @can('permissions.create')
                        <a href="{{ route('permissions.create') }}" class="btn btn-xs btn-primary pull-right"><i class="fas fa-plus-circle"></i> Crear</a>
                    @endcan
                </div>

                <div class="panel-body">
                    <table class="table table-condensed table-hover">
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
                                            <a href="{{ route('permissions.show', $item->id) }}" class="btn btn-xs btn-default"><i class="fas fa-eye"></i> Ver</a>
                                        @endcan
                                    </td>
                                    <td width="10px">
                                        @can('permissions.edit')
                                            <a href="{{ route('permissions.edit', $item->id) }}" class="btn btn-xs btn-warning"><i class="fas fa-edit"></i> Editar</a>
                                        @endcan
                                    </td>
                                    <td width="10px">
                                        @can('permissions.destroy')
                                            {!! Form::open(['route' => ['permissions.destroy', $item->id], 'method' => 'DELETE']) !!}
                                                <button class="btn btn-xs btn-danger"><i class="fas fa-trash-alt"></i> Eliminar</button>
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
