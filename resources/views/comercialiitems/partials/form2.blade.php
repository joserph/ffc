<div class="form-group">
    {{ Form::label('hb', 'HB', ['class' => 'col-sm-4 control-label']) }}
    <div class="col-sm-6">
        {{ Form::text('hb', $c_i_item->hb, ['class' => 'form-control']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('qb', 'QB', ['class' => 'col-sm-4 control-label']) }}
    <div class="col-sm-6">
        {{ Form::text('qb', $c_i_item->qb, ['class' => 'form-control']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('eb', 'EB', ['class' => 'col-sm-4 control-label']) }}
    <div class="col-sm-6">
        {{ Form::text('eb', $c_i_item->eb, ['class' => 'form-control']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('id_farm', 'Finca', ['class' => 'col-sm-4 control-label']) }}
    <div class="col-sm-6">
        {{ Form::select('id_farm', $farms, $c_i_item->id_farm, ['class' => 'form-control', 'placeholder' => 'Seleccione finca']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('id_client', 'Cliente', ['class' => 'col-sm-4 control-label']) }}
    <div class="col-sm-6">
        {{ Form::select('id_client', $clients, $c_i_item->id_client, ['class' => 'form-control', 'placeholder' => 'Seleccione cliente']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('description', 'Descripción', ['class' => 'col-sm-4 control-label']) }}
    <div class="col-sm-6">
        {{ Form::text('description', $c_i_item->description, ['class' => 'form-control']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('hawb', 'HAWB', ['class' => 'col-sm-4 control-label']) }}
    <div class="col-sm-6">
        {{ Form::text('hawb', $c_i_item->hawb, ['class' => 'form-control']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('stems', 'Tallos', ['class' => 'col-sm-4 control-label']) }}
    <div class="col-sm-6">
        {{ Form::text('stems', $c_i_item->stems, ['class' => 'form-control']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('bunches', 'Bonches', ['class' => 'col-sm-4 control-label']) }}
    <div class="col-sm-6">
        {{ Form::text('bunches', $c_i_item->bunches, ['class' => 'form-control']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('price', 'Precio', ['class' => 'col-sm-4 control-label']) }}
    <div class="col-sm-6">
        {{ Form::text('price', $c_i_item->price, ['class' => 'form-control']) }}
    </div>
</div>