<div class="form-group">
    {{ Form::label('name', 'Nombre') }}
    {{ Form::text('name', null, ['class' => 'form-control']) }}
</div>
<hr>
<h3>Lista de Roles</h3>
<div class="form-group">
    <ul class="list-unstyled">
        @foreach ($roles as $item)
            <li>
                <label>
                    {{ Form::checkbox('roles[]', $item->id, null) }}
                    {{ $item->name }}
                    <em>({{ $item->description ?: 'N/A' }})</em>
                </label>
            </li>
        @endforeach
    </ul>
</div>

<div class="form-group">
    {{ Form::submit('Guardar', ['class' => 'btn btn-sm btnprimary']) }}
</div>