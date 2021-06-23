<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('plan_id') }}
            {{ Form::text('plan_id', $plan, ['class' => 'form-control' . ($errors->has('plan_id') ? ' is-invalid' : ''), 'placeholder' => $planEstudio->nombre]) }}
            {!! $errors->first('plan_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('materia_id') }}
            {{ Form::select('materia_id', $materias, null, ['class' => 'form-control' . ($errors->has('materia_id') ? ' is-invalid' : ''), 'placeholder' => 'Materia Id']) }}
            {!! $errors->first('materia_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <a class="btn btn-secondary" href="{{route('plan-estudios.index')}}">Terminar</a>
        <button type="submit" class="btn btn-primary">Aceptar</button>
    </div>
</div>