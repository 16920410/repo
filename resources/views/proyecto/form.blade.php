<div class="box box-info padding-1">
    <div class="box-body">

        <table class="table">
        <thead>
            <tr>
                <th scope="col">
                    <div class="form-group">
                        {{ Form::label('nombre') }}
                        {{ Form::text('nombre', $proyecto->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
                        {!! $errors->first('nombre', '<div class="invalid-feedback">:message</p>') !!}
                    </div>
                </th>
                <th scope="col">
                    <div class="form-group">
                        {{ Form::label('descripcion') }}
                        {{ Form::text('descripcion', $proyecto->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
                        {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</p>') !!}
                    </div>
                </th>
                <th scope="col">
                    <div class="form-group">
                        {{ Form::label('departamento') }}
                        {{ Form::text('departamento', $proyecto->departamento, ['class' => 'form-control' . ($errors->has('departamento') ? ' is-invalid' : ''), 'placeholder' => 'Departamento']) }}
                        {!! $errors->first('departamento', '<div class="invalid-feedback">:message</p>') !!}
                    </div>
                </th>
            </tr>

            <tr>
                <th scope="col">
                    <div class="form-group">
                        {{ Form::label('responsable') }}
                        {{ Form::text('responsable', $proyecto->responsable, ['class' => 'form-control' . ($errors->has('responsable') ? ' is-invalid' : ''), 'placeholder' => 'Responsable']) }}
                        {!! $errors->first('responsable', '<div class="invalid-feedback">:message</p>') !!}
                    </div>
                </th>
                <th scope="col">
                    <div class="form-group">
                        {{ Form::label('numero residentes') }}
                        {{ Form::number('nresidente', $proyecto->nresidente, ['class' => 'form-control' . ($errors->has('nresidente') ? ' is-invalid' : ''), 'placeholder' => 'Numero residentes', 'min'=> '0']) }}
                        {!! $errors->first('nresidente', '<div class="invalid-feedback">:message</p>') !!}
                    </div>
                </th>
                <th scope="col">
                    <div class="form-group">
                        {{ Form::label('alumno(s)') }}
                        {{ Form::text('alumno', $proyecto->alumno, ['class' => 'form-control' . ($errors->has('alumno') ? ' is-invalid' : ''), 'placeholder' => 'Alumno(s)']) }}
                        {!! $errors->first('alumno', '<div class="invalid-feedback">:message</p>') !!}
                    </div>
                </th>
            </tr>

            <tr>
                <th scope="col">
                    <div class="form-group">
                        {{ Form::label('docente') }}
                        <!-- {{ Form::text('docente_id', $proyecto->docente_id, ['class' => 'form-control' . ($errors->has('docente_id') ? ' is-invalid' : ''), 'placeholder' => 'Docente Id']) }} -->
                        {{ Form::select('docente_id', $listaDocentes, $proyecto->docente_id, ['class' => 'form-control' . ($errors->has('docente_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione Docente ']) }}
                        {!! $errors->first('docente_id', '<div class="invalid-feedback">:message</p>') !!}
                    </div>
                </th>
                <th scope="col">
                    <div class="form-group">
                        {{ Form::label('carrera') }}
                        {{ Form::select('carrera_id', $listaCarreras, $proyecto->carrera_id, ['class' => 'form-control' . ($errors->has('carrera_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione Carrera']) }}
                        {!! $errors->first('carrera_id', '<div class="invalid-feedback">:message</p>') !!}
                    </div>
                </th>

                <th scope="col">
                <div class="box-footer mt20" align="right">
        <button type="submit" class="btn btn-outline-success">Guardar</button>
    </div>
                </th>
            </tr>
        </thead>

    </table>

    </div>

</div>
