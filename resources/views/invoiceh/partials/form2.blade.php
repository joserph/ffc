<div class="form-group">
    {{ Form::label('id_logistics_company', 'Empresa de Logística', ['class' => 'col-sm-4 control-label']) }}
    <div class="col-sm-6">
        {{ Form::select('id_logistics_company', $lcompanies, $invoiceh->id_logistics_company, ['class' => 'form-control', 'placeholder' => 'Seleccione cliente']) }}
    </div>
</div>
