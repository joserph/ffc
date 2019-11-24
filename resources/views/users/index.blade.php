@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Usuarios
                </div>

                <div class="panel-body">
                    <table class="table table-condensed table-hover">
                        <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>Nombre</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td width="10px">
                                        @can('users.show')
                                            <a href="{{ route('users.show', $item->id) }}" class="btn btn-xs btn-default">Ver</a>
                                        @endcan
                                    </td>
                                    <td width="10px">
                                        @can('users.edit')
                                            <a href="{{ route('users.edit', $item->id) }}" class="btn btn-xs btn-warning">Editar</a>
                                        @endcan
                                    </td>
                                    <td width="10px">
                                        @can('users.destroy')
                                            {!! Form::open(['route' => ['users.destroy', $item->id], 'method' => 'DELETE', 'onclick' => 'return confirm("¿Seguro de eliminar el usuario?")']) !!}
                                                <button class="btn btn-xs btn-danger">Eliminar</button>
                                            {!! Form::close() !!}
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $users->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
