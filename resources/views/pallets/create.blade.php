{{ Form::open(['route' => 'pallets.store', 'class' => 'form-horizontal']) }}
    {!! Form::hidden('id_user', \Auth::user()->id) !!}
    {!! Form::hidden('update_user', \Auth::user()->id) !!}
    @include('pallets.partials.form')
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-plus-circle"></i> Agregar</button>
        </div>
    </div>
{{ Form::close() }}