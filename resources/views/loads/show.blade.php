@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
            <ol class="breadcrumb">
                    <li><a href="{{ url('/home') }}">Home</a></li>
                    <li><a href="{{ route('loads.index') }}">Contenedores</a></li>
                    <li class="active">Paletas</li>
                </ol>
        <div class="col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fas fa-pallet fa-7x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <h3>PALETAS</h3>
                        </div>
                    </div>
                </div>
                <a href="" data-toggle="tooltip" data-placement="bottom" title="Distribución de pallets">
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
