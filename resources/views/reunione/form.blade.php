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
                        <br>
                        <input type="checkbox" name="selectAll" id="selectAll">
                        <label for="selectAll">Seleccionar todos</label>
                        <br>
                        <br>

                        @foreach ($docentes as $docente)
                        <div class="form-check">
                            {{ Form::checkbox('asistentes[]', $docente->id, (array_search($docente->id, $listaAsistentes)!==false), ['class' => 'form-check-input' . ($errors->has('orden') ? ' is-invalid' : ''), 'placeholder' => 'Asistencia', 'id'=> $docente->id]) }}
                            <label class="form-check-label" for="{{$docente->id}}"> {{$docente->nombre}}
                        </div>

                        @endforeach
                        {!! $errors->first('docente_id', '<div class="invalid-feedback">:message</p>') !!}
                        </div>
                        <a class="btn btn-sm btn-success" href="{{ route('acuerdos.index',$reunione->id) }}"><i class="fa fa-fw fa-edit"></i> Editar Acuerdos</a>
                        @foreach ($acuerdos as $acuerdo)
                        <div class="form-group">
                            {{ Form::label('Acuerdo') }}
                            {{ Form::text('descripcion', $acuerdo->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Acuerdo']) }}
                            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</p>') !!}
                            </div>
                            @endforeach


                        </div>
                        <div class="box-footer mt20">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script defer>
        function defer(method) {
            if (window.jQuery)
                method();
            else
                setTimeout(function() {
                    defer(method)
                }, 50);
        }
        let selectAll = () => window.$('#selectAll').click((e) => {
            console.log();

            $('[name="asistentes[]"]').prop('checked', e.target.checked)
        })
        defer(selectAll)
    </script>
</div>