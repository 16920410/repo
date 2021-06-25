<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('plan_id') }}
            {{ Form::select('plan_id',$planesEstudio, $plan, ['class' => 'form-control' . ($errors->has('plan_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccionar Plan', 'disabled'=>'true']) }}
            {!! $errors->first('plan_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('materia_id') }}
            <select class="form-control {{($errors->has('materia_id') ? ' is-invalid' : '')}}" name="materia_id" id="materia_id">
                <option value="">Seleccionar Materia</option>
                @foreach ($materias as $materia)
                <option value="{{$materia->id}}">{{"$materia->clave - $materia->nombre"}}</option>
                @endforeach
            </select>
            @if ($errors)
            {!! $errors->first('materia_id','<div class="invalid-feedback">:message</div>') !!}

            @endif
        </div>

    </div>
    <div class="box-footer mt20">
        <a class="btn btn-secondary" href="{{route('plan-estudios.index')}}">Terminar</a>
        <button type="submit" class="btn btn-primary">Aceptar</button>
    </div>
</div>