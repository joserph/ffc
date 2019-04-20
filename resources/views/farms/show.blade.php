@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fas fa-eye"></i> Finca "{{ $farm->name }}"
                </div>
                <ol class="breadcrumb">
                    <li><a href="{{ url('/home') }}">Inicio</a></li>
                    <li><a href="{{ route('farms.index') }}">Fincas</a></li>
                    <li class="active">{{ $farm->name }}</li>
                </ol>

                <div class="panel-body">
                    <dl class="dl-horizontal">
                        <dt>Nombre:</dt>
                        <dd>{{ $farm->name }}</dd>
                        <dt>Teléfono:</dt>
                        <dd>{{ $farm->phone }}</dd>
                        <dt>Dirección:</dt>
                        <dd>{{ $farm->address }}</dd>
                        <dt>Parroquia:</dt>
                        <dd>{{ $farm->parish }}</dd>
                        <dt>Ciudad:</dt>
                        <dd>{{ $farm->city }}</dd>
                        <dt>País:</dt>
                        <dd>{{ $farm->country }}</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
