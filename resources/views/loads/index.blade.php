@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fas fa-truck-loading"></i> Carguera
                    @can('loads.create')
                        <a href="{{ route('loads.create') }}" class="btn btn-xs btn-primary pull-right" data-toggle="tooltip" data-placement="top" title="Agregar nuevos contenedor"><i class="fas fa-plus-circle"></i> Agregar</a>
                    @endcan
                </div>

                <div class="panel-body">
                    <ol class="breadcrumb">
                        <li><a href="{{ url('/home') }}">Inicio</a></li>
                        <li class="active">Contenedores</li>
                    </ol>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center" width="10px">ID</th>
                                    <th class="text-center">Nombre</th>
                                    <th class="text-center">DOL</th>
                                    <th class="text-center">Código</th>
                                    <th class="text-center">Fecha</th>
                                    <th colspan="3" class="text-center">Aciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($loads as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td class="text-center">{{ $item->name }}</td>
                                        <td class="text-center">{{ $item->bl }}</td>
                                        <td class="text-center">{{ $item->code }}</td>
                                        <td class="text-center">{{ date('m-d-Y', strtotime($item->date)) }}</td>
                                        <td width="10px">
                                            @can('loads.show')
                                                <a href="{{ route('loads.show', $item->id) }}" class="btn btn-xs btn-info" data-toggle="tooltip" data-placement="top" title="Ver detalles del contenedor"><i class="fas fa-eye"></i> Ver</a>
                                            @endcan
                                        </td>
                                        <td width="10px">
                                            @can('loads.edit')
                                                <a href="{{ route('loads.edit', $item->id) }}" class="btn btn-xs btn-warning" data-toggle="tooltip" data-placement="top" title="Editar contenedor"><i class="fas fa-edit"></i> Editar</a>
                                            @endcan
                                        </td>
                                        <td width="10px">
                                            @can('loads.destroy')
                                                {!! Form::open(['route' => ['loads.destroy', $item->id], 'method' => 'DELETE']) !!}
                                                    {!! Form::button('<i class="fas fa-trash-alt"></i> ' . 'Eliminar', ['type' => 'submit', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Eliminar contenedor', 'class' => 'btn btn-xs btn-danger', 'onclick' => 'return confirm("¿Seguro de eliminar contenedor?")']) !!}
                                                {!! Form::close() !!}
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    {{ $loads->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
