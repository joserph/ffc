@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Roles
                    @can('roles.create')
                        <a href="{{ route('roles.create') }}" class="btn btn-sm btn-primary pull-right">Crear</a>
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
                            @foreach ($roles as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td width="10px">
                                        @can('roles.show')
                                            <a href="{{ route('roles.show', $item->id) }}" class="btn btn-sm btn-default">Ver</a>
                                        @endcan
                                    </td>
                                    <td width="10px">
                                        @can('roles.edit')
                                            <a href="{{ route('roles.edit', $item->id) }}" class="btn btn-sm btn-warning">Editar</a>
                                        @endcan
                                    </td>
                                    <td width="10px">
                                        @can('roles.destroy')
                                            {!! Form::open(['route' => ['roles.destroy', $item->id], 'method' => 'DELETE']) !!}
                                                <button class="btn btn-sm btn-danger">Eliminar</button>
                                            {!! Form::close() !!}
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $roles->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
