@section('css')
    <!-- Plugin Chosen -->
    <link rel="stylesheet" href="{{ asset('plugins/chosen/chosen.css') }}">
@endsection
<div class="form-group">
    <div class="col-sm-4">
        {{ Form::label('id_farm', 'Finca', ['class' => 'control-label']) }}
        {{ Form::select('id_farm', $farms, $c_i_item->id_farm, ['class' => 'form-control select-farm', 'placeholder' => 'Seleccione finca']) }}
    </div>
    
    <div class="col-sm-4">
        {{ Form::label('id_client', 'Cliente', ['class' => 'control-label']) }}
        {{ Form::select('id_client', $clients, $c_i_item->id_client, ['class' => 'form-control select-client', 'placeholder' => 'Seleccione cliente']) }}
    </div>
    
    <div class="col-sm-4">
        {{ Form::label('description', 'Descripción', ['class' => 'control-label']) }}
        {{ Form::select('description', $product, $c_i_item->description, ['class' => 'form-control select-product']) }}
    </div>
</div>
<div class="form-group">
    <div class="col-sm-2">
        {{ Form::label('hb', 'HB', ['class' => 'control-label']) }}
        {{ Form::number('hb', $c_i_item->hb, ['class' => 'form-control']) }}
    </div>
    
    <div class="col-sm-2">
        {{ Form::label('qb', 'QB', ['class' => 'control-label']) }}
        {{ Form::number('qb', $c_i_item->qb, ['class' => 'form-control']) }}
    </div>
    
    <div class="col-sm-2">
        {{ Form::label('eb', 'EB', ['class' => 'control-label']) }}
        {{ Form::number('eb', $c_i_item->eb, ['class' => 'form-control']) }}
    </div>
    
    <div class="col-sm-3">
        {{ Form::label('hawb', 'HAWB', ['class' => 'control-label']) }}
        {{ Form::text('hawb', $c_i_item->hawb, ['class' => 'form-control']) }}
    </div>
    <div class="col-sm-3">
        {{ Form::label('stems_p_bunches', 'Tallos por bonches', ['class' => 'control-label']) }}
        {{ Form::select('stems_p_bunches', [
            '10' => '10',
            '12' => '12',
            '25' => '25',
            ], $c_i_item->stems_p_bunches, ['class' => 'form-control grupo', 'id' => 'stems_p_bunches']) }}
    </div>
</div>
<div class="form-group">
    <div class="col-sm-3">
        {{ Form::label('stems', 'Tallos', ['class' => 'control-label']) }}
        {{ Form::number('stems', $c_i_item->stems, ['class' => 'form-control grupo', 'id' => 'stems']) }}
    </div>
    <div class="col-sm-3">
        {{ Form::label('bunches', 'Bonches', ['class' => 'control-label']) }}
        {{ Form::number('bunches', $c_i_item->bunches, ['class' => 'form-control', 'id' => 'bunches']) }}
    </div>
    
    <div class="col-sm-3">
        {{ Form::label('price', 'Precio', ['class' => 'control-label']) }}
        {{ Form::text('price', $c_i_item->price, ['class' => 'form-control grupo']) }}
    </div>
    <div class="col-sm-3">
        {{ Form::label('total', 'Total', ['class' => 'control-label']) }}
        {{ Form::text('total', $c_i_item->total, ['class' => 'form-control', 'id' => 'total']) }}
        <span id="helpBlock" class="help-block">En caso de que el total no coincida con la factura "Colocar manualmente".</span>
    </div>
</div>

@section('scripts')
<script>
    $(document).ready(function(){
        $(".grupo").keyup(function()
        {
            var stems = $('#stems').val();
            var stems_p_bunches = $('#stems_p_bunches').val();
            var bunches = parseFloat(stems) / parseFloat(stems_p_bunches);
            $('#bunches').val(parseFloat(bunches));
            // Total
            var price = $('#price').val();
            var total = parseFloat(stems) * parseFloat(price);
            $('#total').val(parseFloat(total));
            console.log(bunches);
        });
    });
</script>
<!-- Chosen JavaScript -->
<script src="{{ asset('plugins/chosen/chosen.jquery.js') }}"></script>
<script>
    $('.select-farm').chosen();
    $('.select-client').chosen();
    $('.select-product').chosen();
    $('#modal').on('shown.bs.modal', function () {
        $('.select-farm', this).chosen();
        $('.select-client', this).chosen();
        $('.select-product', this).chosen();
    });
</script>
@endsection