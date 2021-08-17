<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('fecha') }}
            {{ Form::date('fecha', $liberacion->fecha? date('Y-m-d', strtotime($liberacion->fecha)): '', ['class' => 'form-control' . ($errors->has('fecha') ? ' is-invalid' : ''), 'placeholder' => 'Fecha', 'value'=>date('d-m-Y', strtotime($liberacion->fecha))]) }}
            {!! $errors->first('fecha', '<p class="invalid-feedback">:message</p>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('Docente') }}
                            <select class="form-control" name="docente_id">
                                @foreach ($docentes as $docente)
                                <option value="{{$docente->id}}">{{$docente->nombre}}
                                </option>
                                @endforeach
                            </select>
            {!! $errors->first('docente_id', '<p class="invalid-feedback">:message</p>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('semestre') }}
            {{ Form::text('semestre', $liberacion->semestre, ['class' => 'form-control' . ($errors->has('semestre') ? ' is-invalid' : ''), 'placeholder' => 'Semestre']) }}
            {!! $errors->first('semestre', '<div class="invalid-feedback">:message</p>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('Elaboró') }}
                            <select class="form-control" name="elaboro_id">
                                @foreach ($docentes as $docente)
                                <option value="{{$docente->id}}">{{$docente->nombre}}
                                </option>
                                @endforeach
                            </select>
            {!! $errors->first('elaboro_id', '<p class="invalid-feedback">:message</p>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('Da fe:') }}
                            <select class="form-control" name="valido_id">
                                @foreach ($docentes as $docente)
                                <option value="{{$docente->id}}">{{$docente->nombre}}
                                </option>
                                @endforeach
                            </select>
            {!! $errors->first('valido_id', '<p class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar datos</button>
    </div>
</div>
