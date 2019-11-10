@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
            <ol class="breadcrumb">
                <li><a href="{{ url('/home') }}">Inicio</a></li>
                <li><a href="{{ route('loads.index') }}">Contenedores </a></li>
                <li class="active">Contenedor {{ $load->code }}</li>
            </ol>
        <div class="col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fas fa-pallet fa-6x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <h4>PALETAS</h4>
                        </div>
                    </div>
                </div>
                <a href="{{ route('pallets.index', $load->code) }}" data-toggle="tooltip" data-placement="bottom" title="Distribución de pallets">
                    <div class="panel-footer">
                        <span class="pull-left"><i class="fa fa-eye fa-fw"></i> Ver Detalles</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fas fa-map-marked-alt fa-6x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <h4>CROQUIS CONTENEDOR</h4>
                        </div>
                    </div>
                </div>
                <a href="{{ route('sketches.index', $load->code) }}" data-toggle="tooltip" data-placement="bottom" title="Distribución de pallets">
                    <div class="panel-footer">
                        <span class="pull-left"><i class="fa fa-eye fa-fw"></i> Ver Detalles</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fas fa-file-invoice-dollar fa-6x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <h4>FACTURA COMERCIAL</h4>
                        </div>
                    </div>
                </div>
                <a href="{{ route('invoiceh.index', $load->code) }}" data-toggle="tooltip" data-placement="bottom" title="Factura Comercial">
                    <div class="panel-footer">
                        <span class="pull-left"><i class="fa fa-eye fa-fw"></i> Ver Detalles</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fas fa-cogs fa-6x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <h4>COORDINACIÓN</h4>
                        </div>
                    </div>
                </div>
                <a href="{{ route('coordinations.index', $load->code) }}" data-toggle="tooltip" data-placement="bottom" title="Factura Comercial">
                    <div class="panel-footer">
                        <span class="pull-left"><i class="fa fa-eye fa-fw"></i> Ver Detalles</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
