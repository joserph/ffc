@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fas fa-file-invoice-dollar"></i> Editar Item de Factura Comenrcial
                    
                </div>
                <div class="panel-body">
                    {{ Form::model($coordination, ['route' => ['coordinations.update', $coordination->id], 'method' => 'PUT', 'class' => 'form-horizontal']) }}
                        {!! Form::hidden('update_user', \Auth::user()->id) !!}
                        @include('coordinations.partials.form2')
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-sm btn-warning"><i class="fas fa-sync-alt"></i> Actualizar</button>
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>




@endsection

