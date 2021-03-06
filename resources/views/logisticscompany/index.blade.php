@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fas fa-spa"></i> Empresas de Logística
                    @can('logisticscompany.create')
                        <a href="{{ route('logisticscompany.create') }}" class="btn btn-sm btn-primary pull-right" data-toggle="tooltip" data-placement="top" title="Agregar empresa de logística"><i class="fas fa-plus-circle"></i> Agregar</a>
                    @endcan
                </div>

                <div class="panel-body">
                    <ol class="breadcrumb">
                        <li><a href="{{ url('/home') }}">Inicio</a></li>
                        <li class="active">Empresas de Logística</li>
                    </ol>
                    <div class="table-responsive">
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
                                @foreach ($lcompanies as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td class="text-center">{{ $item->name }}</td>
                                        <td class="text-center">{{ $item->phone }}</td>
                                        <td class="text-center">{{ $item->address }}</td>
                                        <td width="10px">
                                            @can('logisticscompany.show')
                                                <a href="{{ route('logisticscompany.show', $item->id) }}" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="top" title="Ver detalles de la empresa"><i class="fas fa-eye"></i> Ver</a>
                                            @endcan
                                        </td>
                                        <td width="10px">
                                            @can('logisticscompany.edit')
                                                <a href="{{ route('logisticscompany.edit', $item->id) }}" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Editar detalles de la empresa"><i class="fas fa-edit"></i> Editar</a>
                                            @endcan
                                        </td>
                                        <td width="10px">
                                            @can('logisticscompany.destroy')
                                                {!! Form::open(['route' => ['logisticscompany.destroy', $item->id], 'method' => 'DELETE']) !!}
                                                    {!! Form::button('<i class="fas fa-trash-alt"></i> ' . 'Eliminar', ['type' => 'submit', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Eliminar empresa', 'class' => 'btn btn-sm btn-danger', 'onclick' => 'return confirm("¿Seguro de eliminar empresa?")']) !!}
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
