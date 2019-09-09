<div class="form-group">
    {{ Form::label('bl', 'BL N°', ['class' => 'col-sm-4 control-label']) }}
    <div class="col-sm-6">
        {{ Form::text('bl', null, ['class' => 'form-control']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('carrier', 'Carrier', ['class' => 'col-sm-4 control-label']) }}
    <div class="col-sm-6">
        {{ Form::text('carrier', null, ['class' => 'form-control']) }}
    </div>
</div>
<div class="form-group">
{{ Form::label('invoice', 'Country INVOICE N°', ['class' => 'col-sm-4 control-label']) }}
    <div class="col-sm-6">
        {{ Form::text('invoice', null, ['class' => 'form-control']) }}
    </div>
</div>