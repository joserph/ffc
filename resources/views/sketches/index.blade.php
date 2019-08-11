@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fas fa-map-marked-alt"></i> Croquis Contenedor
                </div>
                <div class="panel-body">
                    @can('sketches.create')
                        {{ Form::open(['route' => 'sketches.store']) }}
                            {!! Form::hidden('code', $code) !!}
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-plus-circle"></i> Generar espacios</button>
                        {{ Form::close() }}
                    @endcan
                    <hr>
                    <ol class="breadcrumb">
                        <li><a href="{{ url('/home') }}">Inicio</a></li>
                        <li class="active">Contenedores</li>
                    </ol>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center" width="10px">ID</th>
                                    <th class="text-center">Nombre</th>
                                    <th class="text-center">Código DOL</th>
                                    <th class="text-center">Fecha</th>
                                    <th colspan="3" class="text-center">Aciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
