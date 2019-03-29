@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Agregar Cliente
                </div>

                <div class="panel-body">
                    {{ Form::open(['route' => 'clients.store', 'class' => 'form-horizontal']) }}
                        @include('clients.partials.form')
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
