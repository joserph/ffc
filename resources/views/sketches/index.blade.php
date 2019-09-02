@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
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
                                <div class="panel panel-default">
                                    <div class="panel-heading">Pos {{ $item->position }}</div>
                                    <div class="panel-body">
                                        @if(!$item->id_pallet)
                                            {{ Form::model($sketchs, ['route' => ['sketches.update', $item->id], 'method' => 'PUT', 'class' => 'form-horizontal']) }}
                                                <div class="form-group">
                                                    <div class="col-md-4">
                                                        {!! Form::hidden('id_load', $item->id_load) !!}
                                                        {!! Form::hidden('id_load', $item->position) !!}
                                                        {!! Form::label('pallets', 'Paleta') !!}
                                                        {!! Form::select('id_pallet', $pallets, null, ['class' => 'form-control']) !!}
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-4">
                                                        <button type="submit" class="btn btn-sm btn-warning"><i class="fas fa-sync-alt"></i> Actualizar</button>
                                                    </div>
                                                </div>
                                            {{ Form::close() }}
                                        @else
                                            @foreach ($all_pallets as $key => $item2)
                                                @if($item->id_pallet == $item2->id)
                                                    <h4>Paleta #{{ $item2->counter }} <span class="pull-right">Total {{ $item2->quantity }}</span></h4>
                                                    
                                                    <div class="panel-group" id="accordion{{ $key }}" role="tablist" aria-multiselectable="false">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading" role="tab" id="headingOne{{ $key }}">
                                                                <h4 class="panel-title">
                                                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion{{ $key }}" href="#collapseOne{{ $key }}" aria-expanded="false" aria-controls="collapseOne{{ $key }}">
                                                                        Ver detalle
                                                                    </a>
                                                                </h4>
                                                            </div>
                                                            <div id="collapseOne{{ $key }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne{{ $key }}">
                                                                <div class="panel-body">
                                                                    <table class="table table-condensed">
                                                                        <thead>
                                                                            <tr>
                                                                                <th class="text-center"><small>Fincas</small></th>
                                                                                <th class="text-center"><small>HB</small></th>
                                                                                <th class="text-center"><small>QB</small></th>
                                                                                <th class="text-center"><small>EB</small></th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach ($pallet_items as $item3)
                                                                                @if($item2->id == $item3->id_pallet)
                                                                                    <tr>
                                                                                        <td class="text-left">
                                                                                            @foreach ($farm as $item4)
                                                                                                @if($item3->id_farm == $item4->id)
                                                                                                <small>{{ $item4->name }}</small>
                                                                                                @endif
                                                                                            @endforeach
                                                                                        </td>
                                                                                        <td class="text-center"><small>{{ $item3->hb }}</small></td>
                                                                                        <td class="text-center"><small>{{ $item3->qb }}</small></td>
                                                                                        <td class="text-center"><small>{{ $item3->eb }}</small></td>
                                                                                    </tr>
                                                                                @endif
                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                @endif
                                            @endforeach
                                        @endif
                                    </div>
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
