<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('liberacion_id') }}
            {{ Form::text('liberacion_id', $reporteActividade->liberacion_id, ['class' => 'form-control' . ($errors->has('liberacion_id') ? ' is-invalid' : ''), 'placeholder' => 'Liberacion Id']) }}
            {!! $errors->first('liberacion_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('actividad_id') }}
            {{ Form::text('actividad_id', $reporteActividade->actividad_id, ['class' => 'form-control' . ($errors->has('actividad_id') ? ' is-invalid' : ''), 'placeholder' => 'Actividad Id']) }}
            {!! $errors->first('actividad_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('evaluacion') }}
            {{ Form::text('evaluacion', $reporteActividade->evaluacion, ['class' => 'form-control' . ($errors->has('evaluacion') ? ' is-invalid' : ''), 'placeholder' => 'Evaluacion']) }}
            {!! $errors->first('evaluacion', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>