@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fas fa-pallet"></i> Paletas
                    @can('products.create')
                        <button type="button" class="btn btn-xs btn-primary pull-right" data-toggle="modal" data-target="#myModal" data-toggle="tooltip" data-placement="top" title="Agregar nuevas paletas"><i class="fas fa-plus-circle"></i> Agregar Paleta</button>
                    @endcan
                    <a href="{{ route('pallets.pdf', $code) }}" target="_blank" class="btn btn-xs btn-info pull-right"><i class="far fa-file-pdf"></i></a>
                </div>
                <div class="panel-body">
                    <ol class="breadcrumb">
                        <li><a href="{{ url('/home') }}">Inicio</a></li>
                        <li><a href="{{ route('loads.index') }}">Contenedor {{ $code }}</a></li>
                        <li><a href="{{ route('loads.show', $load) }}">Paletas</a></li>
                        <li class="active">Items de Paletas</li>
                    </ol>
                    
                    @foreach ($pallets as $indexKey =>$item)
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <i class="fas fa-pallet"></i> Paleta # {{ $item->number }}
                                <input type="hidden" name="prueba" id="prueba_{{ $indexKey }}" value="{{ $item->number }}">
                                @can('products.create')
                                    <a href="{{ route('palletitems.create', $item->number) }}" class="btn btn-xs btn-info pull-right" data-toggle="tooltip" data-placement="top" title="Agregar item de paleta"><i class="fas fa-plus-circle"></i> Agregar</a>
                                @endcan
                            </div>
                            
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-condensed table-hover">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Finca</th>
                                                <th class="text-center">Cliente</th>
                                                <th class="text-center">HB</th>
                                                <th class="text-center">QB</th>
                                                <th class="text-center">EB</th>
                                                <th class="text-center">Total</th>
                                                <th colspan="2" class="text-center">Aciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $hb = 0; $qb = 0; $eb = 0; $total = 0;
                                            @endphp
                                            @foreach ($palletItem as $item2)
                                                @if($item->id == $item2->id_pallet)
                                                @php 
                                                    $hb+=$item2->hb;
                                                    $qb+=$item2->qb;
                                                    $eb+=$item2->eb;
                                                    $total+=$item2->quantity;
                                                @endphp
                                                    <tr>
                                                        <td>
                                                            @foreach ($farms as $farm)
                                                                @if($item2->id_farm == $farm->id)
                                                                    {{ $farm->name }}
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                        <td class="text-center">
                                                            @foreach ($clients as $client)
                                                                @if($item2->id_client == $client->id)
                                                                    {{ strtoupper($client->name) }}
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                        <td class="text-center">{{ $item2->hb }}</td>
                                                        <td class="text-center">{{ $item2->qb }}</td>
                                                        <td class="text-center">{{ $item2->eb }}</td>
                                                        <td class="text-center">{{ $item2->quantity }}</td>
                                                        <td class="text-center" width="10px">
                                                            <a href="{{ route('palletitems.edit', $item2->id) }}" class="btn btn-xs btn-warning" data-toggle="tooltip" data-placement="top" title="Editar item de paleta"><i class="fas fa-edit"></i> Editar</a>
                                                        </td>
                                                        <td class="text-center" width="10px">
                                                            {!! Form::open(['route' => ['palletitems.destroy', $item2->id], 'method' => 'DELETE', 'onclick' => 'return confirm("¿Seguro de eliminar item de paleta?")']) !!}
                                                                <button class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top" title="Eliminar item de paleta"><i class="fas fa-trash-alt"></i> Eliminar</button>
                                                            {!! Form::close() !!}
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="2" class="text-center">Totales</th>
                                                <th class="text-center">{{ $hb }}</th>
                                                <th class="text-center">{{ $qb }}</th>
                                                <th class="text-center">{{ $eb }}</th>
                                                <th class="text-center">{{ $total }}</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>

                                
                                @if(($counter - 1) == $item->counter)
                                    @can('pallets.destroy')
                                        {!! Form::open(['route' => ['pallets.destroy', $item->id], 'method' => 'DELETE']) !!}
                                            {!! Form::button('<i class="fas fa-trash-alt"></i> ' . 'Eliminar', ['type' => 'submit', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Eliminar finca', 'class' => 'btn btn-xs btn-danger pull-right', 'onclick' => 'return confirm("¿Seguro de eliminar finca?")']) !!}
                                        {!! Form::close() !!}
                                    @endcan
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-body">
                    <button class="btn btn-default  " type="button">
                        Total HB <span class="badge">{{ $total_hb }}</span>
                    </button>
                    <button class="btn btn-primary" type="button">
                        Total QB <span class="badge">{{ $total_qb }}</span>
                    </button>
                    <button class="btn btn-info" type="button">
                        Total EB <span class="badge">{{ $total_eb }}</span>
                    </button>
                    <button class="btn btn-success" type="button">
                        Total Contenedor <span class="badge">{{ $total_container }}</span>
                    </button>
                </div>
            </div>
        </div>


    </div>
</div>

<!-- Modal Pallets -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Contenedor {{ $code }}</h4>
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

                {{ Form::open(['route' => 'pallets.store', 'class' => 'form-horizontal']) }}
                    {!! Form::hidden('id_user', \Auth::user()->id) !!}
                    {!! Form::hidden('update_user', \Auth::user()->id) !!}
                    {!! Form::hidden('id_load', $load) !!}
                    <div class="form-group">
                        {{ Form::label('number', 'Número', ['class' => 'col-sm-2 control-label']) }}
                        <div class="col-sm-4">
                            <div class="input-group">
                                <div class="input-group-addon">{{ $code }} - </div>
                                {!! Form::hidden('counter',$counter) !!}
                                {!! Form::hidden('number',$number) !!}
                                {{ Form::number('number1', $counter, ['class' => 'form-control', 'readonly']) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('usda', 'USDA', ['class' => 'col-sm-2 control-label']) }}
                        <div class="col-sm-2">
                            {{ Form::checkbox('usda', null, false) }}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
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

