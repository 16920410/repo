<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('fecha') }}
            {{ Form::date('fecha', $reunione->fecha? date('Y-m-d', strtotime($reunione->fecha)): '', ['class' => 'form-control' . ($errors->has('fecha') ? ' is-invalid' : ''), 'placeholder' => 'Fecha', 'value'=>date('d-m-Y', strtotime($reunione->fecha))]) }}
            {!! $errors->first('fecha', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('lugar') }}
            {{ Form::text('lugar', $reunione->lugar, ['class' => 'form-control' . ($errors->has('lugar') ? ' is-invalid' : ''), 'placeholder' => 'Lugar']) }}
            {!! $errors->first('lugar', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('orden') }}
            {{ Form::text('orden', $reunione->orden, ['class' => 'form-control' . ($errors->has('orden') ? ' is-invalid' : ''), 'placeholder' => 'Orden']) }}
            {!! $errors->first('orden', '<div class="invalid-feedback">:message</p>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('Asistentes') }}
            @foreach ($docentes as $docente)
            <div class="form-check">
            {{ Form::checkbox('asistentes[]', $docente->id, (array_search($docente->id, $listaAsistentes)!==false), ['class' => 'form-check-input' . ($errors->has('orden') ? ' is-invalid' : ''), 'placeholder' => 'Asistencia', 'id'=> $docente->id]) }}
            <label class="form-check-label" for="{{$docente->id}}"> {{$docente->nombre}}
            </div>
                
            @endforeach
            {!! $errors->first('orden', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>