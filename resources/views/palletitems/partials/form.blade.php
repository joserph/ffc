<div class="form-group">
    {{ Form::label('id_farm', 'Finca', ['class' => 'col-sm-2 control-label']) }}
    <div class="col-sm-6">
        {{ Form::select('id_farm', $farms, null, ['class' => 'form-control', 'placeholder' => 'Seleccione finca']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('id_client', 'Cliente', ['class' => 'col-sm-2 control-label']) }}
    <div class="col-sm-6">
        {{ Form::select('id_client', $clients, null, ['class' => 'form-control', 'placeholder' => 'Seleccione finca']) }}
    </div>
</div>
<input type="hidden" name="id_pallet" value="{{ $id_pallet }}">
<div class="form-group">
    {{ Form::label('quantity', 'Cantidad', ['class' => 'col-sm-2 control-label']) }}
    <div class="col-sm-2">
        {{ Form::number('quantity', null, ['class' => 'form-control']) }}
    </div>
</div>