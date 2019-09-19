@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fas fa-file-invoice-dollar"></i> Factura Comercial
                    @can('products.create')
                        @if($id_invoice)
                            <a href="{{ route('invoiceh.edit', $id_invoice) }}" class="btn btn-sm btn-warning pull-right"><i class="far fa-edit"></i> Editar</a>
                        @else
                            <button type="button" class="btn btn-sm btn-primary pull-right" data-toggle="modal" data-target="#myModal" data-toggle="tooltip" data-placement="top" title="Agregar nuevas paletas"><i class="fas fa-plus-circle"></i> Agregar</button>
                        @endif
                    @endcan
                    <a href="{{ route('comercial-invoice.pdf', $load) }}" class="btn btn-sm btn-info pull-right"><i class="far fa-file-pdf"></i></a>
                </div>
                <div class="panel-body">
                    <ol class="breadcrumb">
                        <li><a href="{{ url('/home') }}">Inicio</a></li>
                        <li><a href="{{ route('loads.index') }}">Contenedor {{ $code }}</a></li>
                        <li><a href="{{ route('loads.show', $load) }}">Paletas</a></li>
                        <li class="active">Factura Comercial</li>
                    </ol>
                    
                    <!-- List group -->
                    <ul class="list-group">
                        <li class="list-group-item"><strong>Fecha:</strong> {{ $date_load }}</li>
                        <li class="list-group-item"><strong>BL N°:</strong> {{ $bl }}</li>
                        <li class="list-group-item"><strong>Country INVOICE N°:</strong> {{ $invoice_n }}</li>
                        <li class="list-group-item"><strong>Carrier:</strong> {{ $carrier }}</li>
                    </ul>
                    @if($id_invoice)
                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal2" data-toggle="tooltip" data-placement="top" title="Agregar item de finca"><i class="fas fa-plus-circle"></i> Agregar item</button>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">Fulls</th>
                                    <th class="text-center">Pcs</th>
                                    <th class="text-center">farms</th>
                                    <th class="text-center">Desciption</th>
                                    <th class="text-center">Hawb</th>
                                    <th class="text-center">Stems</th>
                                    <th class="text-center">Bunch</th>
                                    <th class="text-center">Price</th>
                                    <th class="text-center">Total USD</th>
                                    <th colspan="2" class="text-center">Aciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $fulls = 0; $pcs = 0; $stems = 0; $total = 0;
                                @endphp
                                @foreach($comercial_invoice_items as $item)
                                    @php
                                        $fulls+= $item->fulls;
                                        $pcs+= $item->pieces;
                                        $stems+= $item->stems;
                                        $total+= $item->total;
                                    @endphp
                                    <tr>
                                        <td class="text-center">{{ $item->fulls }}</td>
                                        <td class="text-center">{{ $item->pieces }}</td>
                                        <td class="text-center">
                                            @foreach ($farms_all as $farm)
                                                @if($item->id_farm == $farm->id)
                                                    {{ strtoupper($farm->name) }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td class="text-center">{{ $item->description }}</td>
                                        <td class="text-center">{{ $item->hawb }}</td>
                                        <td class="text-center">{{ $item->stems }}</td>
                                        <td class="text-center">{{ $item->bunches }}</td>
                                        <td class="text-center">${{ $item->price }}</td>
                                        <td class="text-center">${{ $item->total }}</td>
                                        <td class="text-center" width="10px">
                                            <a href="{{ route('comercialinvoiveitem.edit', $item->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> Editar</a>
                                        </td>
                                        <td class="text-center" width="10px">
                                            {!! Form::open(['route' => ['comercialinvoiveitem.destroy', $item->id], 'method' => 'DELETE', 'onclick' => 'return confirm("¿Seguro de eliminar item?")']) !!}
                                                <button class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i> Eliminar</button>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="text-center">{{ $fulls }}</th>
                                    <th class="text-center">{{ $pcs }}</th>
                                    <th colspan="3" class="text-center"></th>
                                    <th class="text-center">{{ $stems }}</th>
                                    <th colspan="3" class="text-right">${{ $total }}</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    
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

                {{ Form::open(['route' => 'invoiceh.store', 'class' => 'form-horizontal']) }}
                    {!! Form::hidden('id_user', \Auth::user()->id) !!}
                    {!! Form::hidden('update_user', \Auth::user()->id) !!}
                    {!! Form::hidden('id_load', $load) !!}
                    @include('invoiceh.partials.form')
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


<!-- Modal Pallets -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Agregar item de finca</h4>
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
    
                    {{ Form::open(['route' => 'comercialinvoiveitem.store', 'class' => 'form-horizontal']) }}
                        {!! Form::hidden('id_user', \Auth::user()->id) !!}
                        {!! Form::hidden('update_user', \Auth::user()->id) !!}
                        {!! Form::hidden('id_load', $load) !!}
                        {!! Form::hidden('id_invoiceh', $id_invoice) !!}
                        @include('comercialiitems.partials.form')
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

