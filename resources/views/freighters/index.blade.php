@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="far fa-building"></i> Mi empresa
                    @can('freighters.create')
                        <a href="{{ route('freighters.create') }}" class="btn btn-xs btn-primary pull-right" data-toggle="tooltip" data-placement="top" title="Agregar mi empresa"><i class="fas fa-plus-circle"></i> Agregar</a>
                    @endcan
                </div>

                <div class="panel-body">
                    <ol class="breadcrumb">
                        <li><a href="{{ url('/home') }}">Inicio</a></li>
                        <li class="active">Mi empresa</li>
                    </ol>
                    <div class="table-responsive">
                        <table class="table table-condensed table-hover">
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
                                @foreach ($freighter as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td class="text-center">{{ $item->name }}</td>
                                        <td class="text-center">{{ $item->phone }}</td>
                                        <td class="text-center">{{ $item->address }}</td>
                                        <td width="10px">
                                            @can('freighters.show')
                                                <a href="{{ route('freighters.show', $item->id) }}" class="btn btn-xs btn-info" data-toggle="tooltip" data-placement="top" title="Ver detalles de la finca"><i class="fas fa-eye"></i> Ver</a>
                                            @endcan
                                        </td>
                                        <td width="10px">
                                            @can('freighters.edit')
                                                <a href="{{ route('freighters.edit', $item->id) }}" class="btn btn-xs btn-warning" data-toggle="tooltip" data-placement="top" title="Editar detalles de la finca"><i class="fas fa-edit"></i> Editar</a>
                                            @endcan
                                        </td>
                                        <td width="10px">
                                            @can('freighters.destroy')
                                                {!! Form::open(['route' => ['freighters.destroy', $item->id], 'method' => 'DELETE']) !!}
                                                    {!! Form::button('<i class="fas fa-trash-alt"></i> ' . 'Eliminar', ['type' => 'submit', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Eliminar finca', 'class' => 'btn btn-xs btn-danger', 'onclick' => 'return confirm("¿Seguro de eliminar finca?")']) !!}
                                                {!! Form::close() !!}
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
