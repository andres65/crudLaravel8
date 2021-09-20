<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    {{ Form::label('nombre') }}
                    {{ Form::text('nombre', $tbUsuario->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
                    {!! $errors->first('nombre', '<div class="invalid-feedback">:message</p>') !!}
                </div>
                <div class="form-group">
                    {{ Form::label('documento') }}
                    {{ Form::number('documento', $tbUsuario->documento, ['class' => 'form-control' . ($errors->has('documento') ? ' is-invalid' : ''), 'placeholder' => 'Documento']) }}
                    {!! $errors->first('documento', '<div class="invalid-feedback">:message</p>') !!}
                </div>

                @if(isset($tbUsuario->password))
                    <div class="form-group">
                        {{--  {{ Form::label('password') }}
                        <input class="form-control" type="password" id="password" name="password">  --}}
                        <input class="form-control" type="hidden" id="password_antiguo" name="password_antiguo" value="{{$tbUsuario->password}}">
                    </div>
                @endif

                <div class="form-group">
                    {{ Form::label('genero') }}
                    <select class="form-control" name="genero" id="genero">
                    @if(isset($genero))
                        <option value="{{$tbUsuario->genero}}">{{$genero}}</option>
                        <option disabled>------------------</option>
                    @endif
                        <option value="M">Masculino</option>
                        <option value="F">Femenino</option>
                        <option value="O">Otro</option>
                    </select>
                </div>
                <div class="form-group">
                    {{ Form::label('fecha_nacimiento') }}
                    {{ Form::date('fecha_nacimiento', $tbUsuario->fecha_nacimiento, ['class' => 'form-control' . ($errors->has('fecha_nacimiento') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Nacimiento']) }}
                    {!! $errors->first('fecha_nacimiento', '<div class="invalid-feedback">:message</p>') !!}
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    {{ Form::label('telefono') }}
                    {{ Form::number('telefono', $tbUsuario->telefono, ['class' => 'form-control' . ($errors->has('telefono') ? ' is-invalid' : ''), 'placeholder' => 'Telefono']) }}
                    {!! $errors->first('telefono', '<div class="invalid-feedback">:message</p>') !!}
                </div>

                <div class="form-group">
                    {{ Form::label('eps_id') }}
                    <select class="form-control" name="eps_id" id="eps_id">
                        @foreach($eps as $item)
                            @if(isset($tbUsuario->eps_id))
                                @if($tbUsuario->eps_id == $item->id)
                                    <option selected="true" value="{{$item->id}}">{{$item->nombre}}</option>
                                    @else
                                    <option value="{{$item->id}}">{{$item->nombre}}</option>
                                @endif
                            @else
                                <option value="{{$item->id}}">{{$item->nombre}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    {{ Form::label('rol_id') }}
                    <select class="form-control" name="rol_id" id="rol_id">
                        @foreach($roles as $item)
                            @if(isset($tbUsuario->rol_id))
                                @if($tbUsuario->rol_id == $item->id)
                                    <option selected="true" value="{{$item->id}}">{{$item->nombre}}</option>
                                    @else
                                    <option value="{{$item->id}}">{{$item->nombre}}</option>
                                @endif
                            @else
                                <option value="{{$item->id}}">{{$item->nombre}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    {{ Form::label('email') }}
                    {{ Form::email('email', $tbUsuario->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
                    {!! $errors->first('email', '<div class="invalid-feedback">:message</p>') !!}
                </div>

                <input class="form-control" type="hidden" id="estado" name="estado" value="1">
                
                {{--  @if(isset($tbUsuario->estado))
                    <div class="form-group">
                        {{ Form::label('estado') }}
                        <select class="form-control" name="estado" id="estado">
                            @if($tbUsuario->estado == 1)
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

        </div>
    </div>
    <hr>
    {{--  <div class="box-footer mt20">
        <button type="submit" class="btn btn-success">Submit</button>
    </div>  --}}

    <div class="form-group">
        <input class="btn btn-success" type="submit" value="{{ $formMode === 'edit' ? 'Editar' : 'Agregar' }}">
    </div>
    
</div>