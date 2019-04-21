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

{{ Form::open(['route' => 'pallets.store', 'class' => 'form-horizontal']) }}
    {!! Form::hidden('id_user', \Auth::user()->id) !!}
    {!! Form::hidden('update_user', \Auth::user()->id) !!}
    <div class="form-group">
        {{ Form::label('number', 'Número', ['class' => 'col-sm-2 control-label']) }}
        <div class="col-sm-8">
            {{ Form::text('number', null, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-plus-circle"></i> Agregar</button>
        </div>
    </div>
{{ Form::close() }}