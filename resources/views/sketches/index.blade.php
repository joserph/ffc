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
                                                    <h4>Paleta #{{ $item2->counter }}</h4>
                                                    <hr>
                                                    <div class="panel-group" id="accordion{{ $key }}" role="tablist" aria-multiselectable="false">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading" role="tab" id="headingOne{{ $key }}">
                                                                <h4 class="panel-title">
                                                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion{{ $key }}" href="#collapseOne{{ $key }}" aria-expanded="false" aria-controls="collapseOne{{ $key }}">
                                                                        Collapsible Group Item #1
                                                                    </a>
                                                                </h4>
                                                            </div>
                                                            <div id="collapseOne{{ $key }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne{{ $key }}">
                                                                <div class="panel-body">
                                                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center">Fincas</th>
                                                                <th class="text-center">Total</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($pallet_items as $item3)
                                                                @if($item2->id == $item3->id_pallet)
                                                                    <tr>
                                                                        <td class="text-center">
                                                                            @foreach ($farm as $item4)
                                                                                @if($item3->id_farm == $item4->id)
                                                                                    {{ $item4->name }}
                                                                                @endif
                                                                            @endforeach
                                                                        </td>
                                                                        <td class="text-center">{{ $item3->quantity }}</td>
                                                                    </tr>
                                                                @endif
                                                            @endforeach
                                                        </tbody>
                                                    </table>
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
