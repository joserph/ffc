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
    {{ Form::label('id_farm', 'Finca', ['class' => 'col-sm-2 control-label']) }}
    <div class="col-sm-10">
        {{ Form::select('id_farm', $farms, null, ['class' => 'form-control select-farm', 'placeholder' => 'Seleccione finca']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('id_client', 'Cliente', ['class' => 'col-sm-2 control-label']) }}
    <div class="col-sm-6">
        {{ Form::select('id_client', $clients, null, ['class' => 'form-control select-client', 'placeholder' => 'Seleccione clente']) }}
    </div>
</div>

<input type="hidden" name="id_pallet" id="id_pallet" value="{{ $id_pallet }}">
<input type="hidden" name="id_load" id="id_load" value="{{ $palletitems->id_load }}">

<div class="form-group">
    {{ Form::label('hb', 'HB ', ['class' => 'col-sm-2 control-label']) }}
    <div class="col-sm-2">
        {{ Form::text('hb', $palletitems->hb, ['class' => 'form-control grupo', 'id' => 'hb']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('qb', 'QB', ['class' => 'col-sm-2 control-label']) }}
    <div class="col-sm-2">
        {{ Form::text('qb', $palletitems->qb, ['class' => 'form-control grupo', 'id' => 'qb']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('eb', 'EB', ['class' => 'col-sm-2 control-label']) }}
    <div class="col-sm-2">
        {{ Form::text('eb', $palletitems->eb, ['class' => 'form-control grupo', 'id' => 'eb']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('quantity', 'Total', ['class' => 'col-sm-2 control-label']) }}
    <div class="col-sm-2">
        {{ Form::number('quantity', $palletitems->quantity, ['class' => 'form-control', 'id' => 'total', 'readonly']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('piso', 'Piso', ['class' => 'col-sm-2 control-label']) }}
    <div class="col-sm-2">
        {{ Form::checkbox('piso', $palletitems->piso) }}
    </div>
</div>
@section('scripts')
<script>
    $(document).ready(function(){
        $(".grupo").keyup(function()
        {
            var hb = $('#hb').val();
            var qb = $('#qb').val();
            var eb = $('#eb').val();
            var total = parseFloat(hb) + parseFloat(qb) + parseFloat(eb);
            $('#total').val(parseFloat(total));
            console.log(total);
        });
    });
</script>
<!-- Chosen JavaScript -->
<!-- Chosen JavaScript -->
<script src="{{ asset('plugins/chosen/chosen.jquery.js') }}"></script>
<script>
    $('.select-farm').chosen();
    $('.select-client').chosen();
    $('#modal').on('shown.bs.modal', function () {
        $('.select-farm', this).chosen();
        $('.select-client', this).chosen();
    });
</script>
@endsection