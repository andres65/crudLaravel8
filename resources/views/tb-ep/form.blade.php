<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $tbEp->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</p>') !!}
        </div>

        <input class="form-control" type="hidden" id="estado" name="estado" value="1">
        {{--  @if(isset($tbEp->estado))
            <div class="form-group">
                {{ Form::label('estado') }}
                <select class="form-control" name="estado" id="estado">
                    @if($tbEp->estado == 1)
                        <option value="1">ACTIVO</option>
                        <option value="0">INACTIVO</option>
                    @else
                        <option value="0">INACTIVO</option>
                        <option value="1">ACTIVO</option>
                    @endif
                </select>
            </div>
        @endif  --}}

    </div>
    <div class="box-footer mt20">
        <input class="btn btn-success" type="submit" value="{{ $formMode === 'edit' ? 'Editar' : 'Agregar' }}">
    </div>
</div>