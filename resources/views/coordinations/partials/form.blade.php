@section('css')
    <!-- Plugin Chosen -->
    <link rel="stylesheet" href="{{ asset('plugins/chosen/chosen.css') }}">
    <style>
    .chosen-container{
        width: 100% !important;
    }
    </style>
@endsection
<div class="form-group">
    <div class="col-sm-4">
        {{ Form::label('id_farm', 'Finca', ['class' => 'control-label']) }}
        {{ Form::select('id_farm', $farms, null, ['class' => 'form-control select-farm', 'placeholder' => 'Seleccione finca', 'style' => 'width: 200px']) }}
    </div>
    <div class="col-sm-4">
        {{ Form::label('id_client', 'Cliente', ['class' => 'control-label']) }}
        {{ Form::select('id_client', $clients, null, ['class' => 'form-control select-client', 'placeholder' => 'Seleccione cliente']) }}
    </div>
    <div class="col-sm-4">
        {{ Form::label('description', 'Descripción', ['class' => 'control-label']) }}
        {{ Form::select('description', $products, null, ['class' => 'form-control select-product', 'placeholder' => 'Seleccione tipo']) }}
    </div>
</div>
<div class="form-group">
    
    <div class="col-sm-2">
        {{ Form::label('fb', 'FB', ['class' => 'control-label']) }}
        {{ Form::number('fb', 0, ['class' => 'form-control']) }}
    </div>
    <div class="col-sm-2">
        {{ Form::label('hb', 'HB', ['class' => 'control-label']) }}
        {{ Form::number('hb', 0, ['class' => 'form-control']) }}
    </div>
    <div class="col-sm-2">
        {{ Form::label('qb', 'QB', ['class' => 'control-label']) }}
        {{ Form::number('qb', 0, ['class' => 'form-control']) }}
    </div>
    <div class="col-sm-2">
        {{ Form::label('eb', 'EB', ['class' => 'control-label']) }}
        {{ Form::number('eb', 0, ['class' => 'form-control']) }}
    </div>
    <div class="col-sm-3">
        {{ Form::label('hawb', 'HAWB', ['class' => 'control-label']) }}
        {{ Form::text('hawb', null, ['class' => 'form-control']) }}
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