<div class="form-group">
    {{ Form::label('pieces', 'Pcs', ['class' => 'col-sm-4 control-label']) }}
    <div class="col-sm-6">
        {{ Form::text('pieces', null, ['class' => 'form-control']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('id_farm', 'Finca', ['class' => 'col-sm-4 control-label']) }}
    <div class="col-sm-6">
        {{ Form::select('id_farm', $farms, null, ['class' => 'form-control', 'placeholder' => 'Seleccione finca']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('id_client', 'Cliente', ['class' => 'col-sm-4 control-label']) }}
    <div class="col-sm-6">
        {{ Form::select('id_client', $clients, null, ['class' => 'form-control', 'placeholder' => 'Seleccione cliente']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('description', 'Descripción', ['class' => 'col-sm-4 control-label']) }}
    <div class="col-sm-6">
        {{ Form::text('description', null, ['class' => 'form-control']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('hawb', 'HAWB', ['class' => 'col-sm-4 control-label']) }}
    <div class="col-sm-6">
        {{ Form::text('hawb', null, ['class' => 'form-control']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('stems', 'Tallos', ['class' => 'col-sm-4 control-label']) }}
    <div class="col-sm-6">
        {{ Form::text('stems', null, ['class' => 'form-control']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('bunches', 'Bonches', ['class' => 'col-sm-4 control-label']) }}
    <div class="col-sm-6">
        {{ Form::text('bunches', null, ['class' => 'form-control']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('price', 'Precio', ['class' => 'col-sm-4 control-label']) }}
    <div class="col-sm-6">
        {{ Form::text('price', null, ['class' => 'form-control']) }}
    </div>
</div>