@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fas fa-file-invoice-dollar"></i> Editar Factura Comercial
                    
                </div>
                <div class="panel-body">
                    {{ Form::model($invoiceh, ['route' => ['invoiceh.update', $invoiceh->id], 'method' => 'PUT', 'class' => 'form-horizontal']) }}
                        {!! Form::hidden('update_user', \Auth::user()->id) !!}
                        @include('invoiceh.partials.form2')
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-sm btn-warning"><i class="fas fa-sync-alt"></i> Actualizar</button>
                            </div>
                        </div>
                    {{ Form::close() }}
                    @can('invoiceh.destroy')
                        {!! Form::open(['route' => ['invoiceh.destroy', $invoiceh->id], 'method' => 'DELETE']) !!}
                            {!! Form::button('<i class="fas fa-trash-alt"></i> ' . 'Eliminar', ['type' => 'submit', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Eliminar factura', 'class' => 'btn btn-sm btn-danger pull-right', 'onclick' => 'return confirm("¿Seguro de eliminar factura?")']) !!}
                        {!! Form::close() !!}
                    @endcan
                </div>
            </div>
        </div>
    </div>
</div>




@endsection

