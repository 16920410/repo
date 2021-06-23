<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombre_alumno') }}
            {{ Form::text('nombre_alumno', $convalidacione->nombre_alumno, ['class' => 'form-control' . ($errors->has('nombre_alumno') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Alumno']) }}
            {!! $errors->first('nombre_alumno', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('plan_externo') }}
            {{ Form::text('plan_externo', $convalidacione->plan_externo, ['class' => 'form-control' . ($errors->has('plan_externo') ? ' is-invalid' : ''), 'placeholder' => 'Plan Externo']) }}
            {!! $errors->first('plan_externo', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('plan_interno') }}
            {{ Form::text('plan_interno', $convalidacione->plan_interno, ['class' => 'form-control' . ($errors->has('plan_interno') ? ' is-invalid' : ''), 'placeholder' => 'Plan Interno']) }}
            {!! $errors->first('plan_interno', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tecnologico_procedente') }}
            {{ Form::text('tecnologico_procedente', $convalidacione->tecnologico_procedente, ['class' => 'form-control' . ($errors->has('tecnologico_procedente') ? ' is-invalid' : ''), 'placeholder' => 'Tecnologico Procedente']) }}
            {!! $errors->first('tecnologico_procedente', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tecnologico_receptor') }}
            {{ Form::text('tecnologico_receptor', $convalidacione->tecnologico_receptor, ['class' => 'form-control' . ($errors->has('tecnologico_receptor') ? ' is-invalid' : ''), 'placeholder' => 'Tecnologico Receptor']) }}
            {!! $errors->first('tecnologico_receptor', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>