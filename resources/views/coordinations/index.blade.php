@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fas fa-spa"></i> Coordinacones
                    @can('products.create')
                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal2" data-toggle="tooltip" data-placement="top" title="Agregar coordinación"><i class="fas fa-plus-circle"></i> Agregar item</button>
                    @endcan
                </div>

                <div class="panel-body">
                    <ol class="breadcrumb">
                        <li><a href="{{ url('/home') }}">Inicio</a></li>
                        <li class="active">Fincas</li>
                    </ol>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center"></th>
                                    <th class="text-center"></th>
                                    <th class="text-center"></th>
                                    <th class="text-center" colspan="5">COORDINADO</th>
                                    <th class="text-center"></th>
                                    <th class="text-center" colspan="5">RECIBIDO</th>
                                    <th colspan="3" class="text-center"></th>
                                </tr>
                                <tr>
                                    <th class="text-center">Hawb</th>
                                    <th class="text-center">Finca</th>
                                    <th class="text-center">Cliente</th>
                                    <th class="text-center">FB</th>
                                    <th class="text-center">HB</th>
                                    <th class="text-center">QB</th>
                                    <th class="text-center">EB</th>
                                    <th class="text-center">Total</th>
                                    <th class="text-center">|</th>
                                    <th class="text-center">FB</th>
                                    <th class="text-center">HB</th>
                                    <th class="text-center">QB</th>
                                    <th class="text-center">EB</th>
                                    <th class="text-center">Total</th>
                                    <th class="text-center">Faltantes</th>
                                    <th colspan="3" class="text-center">Aciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($coordinations as $item)
                                    <tr>
                                        <td class="text-center">{{ $item->hawb }}</td>
                                        <td class="text-center">
                                            @foreach ($farms_all as $farm)
                                                @if($item->id_farm == $farm->id)
                                                    {{ strtoupper($farm->name) }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td class="text-center">
                                            @foreach ($clients_all as $client)
                                                @if($item->id_client == $client->id)
                                                    {{ strtoupper($client->name) }}
                                                @endif
                                            @endforeach
                                        <td class="text-center">{{ $item->fb }}</td>
                                        <td class="text-center">{{ $item->hb }}</td>
                                        <td class="text-center">{{ $item->qb }}</td>
                                        <td class="text-center">{{ $item->eb }}</td>
                                        <td class="text-center">{{ $item->pieces }}</td>
                                        <td class="text-center">|</td>
                                        <td class="text-center">{{ $item->fb_r }}</td>
                                        <td class="text-center">{{ $item->hb_r }}</td>
                                        <td class="text-center">{{ $item->qb_r }}</td>
                                        <td class="text-center">{{ $item->eb_r }}</td>
                                        <td class="text-center">{{ $item->pieces_r }}</td>
                                        <td class="text-center">{{ $item->missing }}</td>
                                        <td width="10px">
                                            @can('coordinations.show')
                                                <a href="{{ route('coordinations.show', $item->id) }}" class="btn btn-xs btn-info" data-toggle="tooltip" data-placement="top" title="Ver detalles de la finca"><i class="fas fa-eye"></i></a>
                                            @endcan
                                        </td>
                                        <td width="10px">
                                            @can('coordinations.edit')
                                                <a href="{{ route('coordinations.edit', $item->id) }}" class="btn btn-xs btn-warning" data-toggle="tooltip" data-placement="top" title="Editar detalles de la finca"><i class="fas fa-edit"></i></a>
                                            @endcan
                                        </td>
                                        <td width="10px">
                                            @can('coordinations.destroy')
                                                {!! Form::open(['route' => ['coordinations.destroy', $item->id], 'method' => 'DELETE']) !!}
                                                    {!! Form::button('<i class="fas fa-trash-alt"></i> ' . '', ['type' => 'submit', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Eliminar finca', 'class' => 'btn btn-xs btn-danger', 'onclick' => 'return confirm("¿Seguro de eliminar finca?")']) !!}
                                                {!! Form::close() !!}
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    {{ $coordinations->render() }}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Pallets -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Agregar coordinación</h4>
            </div>
            <div class="modal-body">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong><i class="fa fa-exclamation-triangle fa-fw"></i></strong> Por favor corrige los siguentes errores:<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{ Form::open(['route' => 'coordinations.store', 'class' => 'form-horizontal']) }}
                    {!! Form::hidden('id_user', \Auth::user()->id) !!}
                    {!! Form::hidden('update_user', \Auth::user()->id) !!}
                    {!! Form::hidden('id_load', $load) !!}
                    @include('coordinations.partials.form')
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-plus-circle"></i> Agregar</button>
                        </div>
                    </div>
                {{ Form::close() }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
@endsection
