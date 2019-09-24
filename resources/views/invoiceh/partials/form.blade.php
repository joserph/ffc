<div class="form-group">
    {{ Form::label('id_logistics_company', 'Empresa de Logística', ['class' => 'col-sm-4 control-label']) }}
    <div class="col-sm-6">
        {{ Form::select('id_logistics_company', $lcompanies, null, ['class' => 'form-control', 'placeholder' => 'Seleccione cliente']) }}
    </div>
</div>
{!! Form::hidden('id_freighter', $freighter->id) !!}
{!! Form::hidden('id_load', $load) !!}
{!! Form::hidden('bl', $bl) !!}
{!! Form::hidden('carrier', $carrier) !!}
{!! Form::hidden('invoice', $invoice_n) !!}
{!! Form::hidden('id_user', \Auth::user()->id) !!}
{!! Form::hidden('update_user', \Auth::user()->id) !!}