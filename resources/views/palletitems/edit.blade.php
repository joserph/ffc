@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fas fa-plus-circle"></i> Agregar items paleta # {{ $palletitem }}
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
                        <li><a href="{{ url('/home') }}">Inicio</a></li>
                        <li><a href="{{ route('loads.index') }}">Contenedores</a></li>
                        <li><a href="{{ route('pallets.index', $id_load) }}">Paletas</a></li>
                        <li class="active">Agregar Contenedor</li>
                    </ol>
                    {{ Form::model($palletitems, ['route' => ['palletitems.update', $palletitems->id], 'method' => 'PUT', 'class' => 'form-horizontal']) }}
                        {!! Form::hidden('update_user', \Auth::user()->id) !!}
                        @include('palletitems.partials.form')
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
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
