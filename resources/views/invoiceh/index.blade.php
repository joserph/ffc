@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
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
                </div>
                <div class="panel-body">
                    <ol class="breadcrumb">
                        <li><a href="{{ url('/home') }}">Inicio</a></li>
                        <li><a href="{{ route('loads.index') }}">Contenedor {{ $code }}</a></li>
                        <li><a href="{{ route('loads.show', $load) }}">Paletas</a></li>
                        <li class="active">Factura Comercial</li>
                    </ol>
                    <hr>
                    <!-- List group -->
                    <ul class="list-group">
                        <li class="list-group-item"><strong>Fecha:</strong> {{ $date_load }}</li>
                        <li class="list-group-item"><strong>BL N°:</strong> {{ $bl }}</li>
                        <li class="list-group-item"><strong>Country INVOICE N°:</strong> {{ $invoice_n }}</li>
                        <li class="list-group-item"><strong>Carrier:</strong> {{ $carrier }}</li>
                    </ul>
                    
                    
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

@endsection

