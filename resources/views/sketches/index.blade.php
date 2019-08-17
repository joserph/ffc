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
                            <button type="submit" class="btn btn-sm btn-primary" @if($space == 1) disabled @endif><i class="fas fa-plus-circle"></i> Generar espacios</button>
                        {{ Form::close() }}
                    @endcan
                    <hr>
                    <ol class="breadcrumb">
                        <li><a href="{{ url('/home') }}">Inicio</a></li>
                        <li class="active">Contenedores</li>
                    </ol>
                    <hr>
                    <div class="row">
                        @foreach ($sketchs as $item)
                            <div class="col-md-6">
                                <div class="list-group">
                                    <a href="#" class="list-group-item active">
                                        <h4 class="list-group-item-heading">Pos {{ $item->position }}</h4>
                                        <p class="list-group-item-text">...</p>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
