@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Permiso
                </div>

                <div class="panel-body">
                    <p><strong>Nombre</strong> {{ $permission->name }}</p>
                    <p><strong>Slug</strong> {{ $permission->slug }}</p>
                    <p><strong>Descripcion</strong> {{ $permission->description }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
