@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fas fa-plus-circle"></i> Agregar Cliente
                </div>
                
                <div class="panel-body">
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
                    <ol class="breadcrumb">
                        <li><a href="{{ url('/home') }}">Home</a></li>
                        <li><a href="{{ route('clients.index') }}">Clientes</a></li>
                        <li class="active">Agregar Cliente</li>
                    </ol>
                    {{ Form::open(['route' => 'clients.store', 'class' => 'form-horizontal']) }}
                        @include('clients.partials.form')
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-plus-circle"></i> Agregar</button>
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
