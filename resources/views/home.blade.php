@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @can('freighters.index')
            <div class="col-md-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="far fa-building fa-6x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <h3>MI EMPRESA</h3>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('freighters.index') }}" data-toggle="tooltip" data-placement="bottom" title="Mi empresa">
                        <div class="panel-body">
                            <span class="pull-left"><i class="fa fa-eye fa-fw"></i> Ver Detalles</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        @endcan
        @can('logisticscompany.index')
        <div class="col-md-4">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fas fa-warehouse fa-6x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <h3>LOGÍSTICA</h3>
                        </div>
                    </div>
                </div>
                <a href="{{ route('logisticscompany.index') }}" data-toggle="tooltip" data-placement="bottom" title="Empresas de logística">
                    <div class="panel-body">
                        <span class="pull-left"><i class="fa fa-eye fa-fw"></i> Ver Detalles</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        @endcan
        @can('clients.index')
        <div class="col-md-4">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fas fa-handshake fa-6x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <h3>CLIENTES</h3>
                        </div>
                    </div>
                </div>
                <a href="{{ route('clients.index') }}" data-toggle="tooltip" data-placement="bottom" title="Clientes">
                    <div class="panel-body">
                        <span class="pull-left"><i class="fa fa-eye fa-fw"></i> Ver Detalles</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        @endcan
        @can('farms.index')
        <div class="col-md-4">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fas fa-spa fa-6x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <h3>FINCAS</h3>
                        </div>
                    </div>
                </div>
                <a href="{{ route('farms.index') }}" data-toggle="tooltip" data-placement="bottom" title="Fincas">
                    <div class="panel-body">
                        <span class="pull-left"><i class="fa fa-eye fa-fw"></i> Ver Detalles</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        @endcan
        @can('products.index')
        <div class="col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fas fa-boxes fa-6x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <h3>PRODUCTOS</h3>
                        </div>
                    </div>
                </div>
                <a href="{{ route('products.index') }}" data-toggle="tooltip" data-placement="bottom" title="Fincas">
                    <div class="panel-body">
                        <span class="pull-left"><i class="fa fa-eye fa-fw"></i> Ver Detalles</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        @endcan
        @can('loads.index')
        <div class="col-md-4">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fas fa-truck-loading fa-6x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <h3>CARGUERA</h3>
                        </div>
                    </div>
                </div>
                <a href="{{ route('loads.index') }}" data-toggle="tooltip" data-placement="bottom" title="Fincas">
                    <div class="panel-body">
                        <span class="pull-left"><i class="fa fa-eye fa-fw"></i> Ver Detalles</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        @endcan
    </div>
</div>
@endsection
