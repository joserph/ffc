@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Cliente
                </div>

                <div class="panel-body">
                    <dl class="dl-horizontal">
                        <dt>Nombre:</dt>
                        <dd>{{ $client->name }}</dd>
                        <dt>Teléfono:</dt>
                        <dd>{{ $client->phone }}</dd>
                        <dt>Dirección:</dt>
                        <dd>{{ $client->address }}</dd>
                        <dt>Parroquia:</dt>
                        <dd>{{ $client->parish }}</dd>
                        <dt>Ciudad:</dt>
                        <dd>{{ $client->city }}</dd>
                        <dt>País:</dt>
                        <dd>{{ $client->country }}</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
