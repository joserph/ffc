<div class="form-group">
    <div class="col-sm-4">
        {{ Form::label('id_farm', 'Finca', ['class' => 'control-label']) }}
        {{ Form::select('id_farm', $farms, null, ['class' => 'form-control', 'placeholder' => 'Seleccione finca']) }}
    </div>
    <div class="col-sm-4">
        {{ Form::label('id_client', 'Cliente', ['class' => 'control-label']) }}
        {{ Form::select('id_client', $clients, null, ['class' => 'form-control', 'placeholder' => 'Seleccione cliente']) }}
    </div>
    <div class="col-sm-4">
        {{ Form::label('description', 'Descripción', ['class' => 'control-label']) }}
        {{ Form::select('description', $products, null, ['class' => 'form-control', 'placeholder' => 'Seleccione tipo']) }}
    </div>
</div>
<div class="form-group">
    
    <div class="col-sm-2">
        {{ Form::label('hb', 'HB', ['class' => 'control-label']) }}
        {{ Form::number('hb', null, ['class' => 'form-control']) }}
    </div>
    <div class="col-sm-2">
        {{ Form::label('qb', 'QB', ['class' => 'control-label']) }}
        {{ Form::number('qb', null, ['class' => 'form-control']) }}
    </div>
    <div class="col-sm-2">
        {{ Form::label('eb', 'EB', ['class' => 'control-label']) }}
        {{ Form::number('eb', null, ['class' => 'form-control']) }}
    </div>
    <div class="col-sm-3">
        {{ Form::label('hawb', 'HAWB', ['class' => 'control-label']) }}
        {{ Form::text('hawb', null, ['class' => 'form-control']) }}
    </div>
    
    <div class="col-sm-3">
        {{ Form::label('stems_p_bunches', 'Tallos por bonches', ['class' => 'control-label']) }}
        {{ Form::select('stems_p_bunches', [
            '12' => '12',
            '25' => '25',
            ], '25', ['class' => 'form-control grupo', 'id' => 'stems_p_bunches']) }}
    </div>
</div>
<div class="form-group">
    <div class="col-sm-3">
        {{ Form::label('stems', 'Tallos', ['class' => 'control-label']) }}
        {{ Form::number('stems', null, ['class' => 'form-control grupo', 'id' => 'stems']) }}
    </div>
    <div class="col-sm-3">
        {{ Form::label('bunches', 'Bonches', ['class' => 'control-label']) }}
        {{ Form::number('bunches', null, ['class' => 'form-control', 'id' => 'bunches']) }}
    </div>
    <div class="col-sm-3">
        {{ Form::label('price', 'Precio', ['class' => 'control-label']) }}
        {{ Form::text('price', null, ['class' => 'form-control']) }}
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
            console.log(bunches);
        });
    });
</script>
@endsection
