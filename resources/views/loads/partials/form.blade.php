<div class="form-group">
    {{ Form::label('name', 'Nombre', ['class' => 'col-sm-2 control-label']) }}
    <div class="col-sm-8">
        {{ Form::text('name', null, ['class' => 'form-control']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('code', 'Código', ['class' => 'col-sm-2 control-label']) }}
    <div class="col-sm-5">
        {{ Form::text('code', null, ['class' => 'form-control']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('bl', 'BL N°', ['class' => 'col-sm-2 control-label']) }}
    <div class="col-sm-5">
        {{ Form::text('bl', null, ['class' => 'form-control']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('carrier', 'Carrier', ['class' => 'col-sm-2 control-label']) }}
    <div class="col-sm-5">
        {{ Form::text('carrier', null, ['class' => 'form-control']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('invoice', 'Invoice N°', ['class' => 'col-sm-2 control-label']) }}
    <div class="col-sm-5">
        {{ Form::text('invoice', null, ['class' => 'form-control']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('date', 'Fecha', ['class' => 'col-sm-2 control-label']) }}
    <div class="col-sm-4">
        {{ Form::date('date', null, ['class' => 'form-control']) }}
    </div>
</div>