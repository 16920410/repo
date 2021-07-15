<div class="box box-info padding-1">
    <div class="box-body px-3">

        <div class="row justify-content-md-center">
            <div class="col-md-5">
                <div class="form-group">
                    {{ Form::label('fecha') }}
                    {{ Form::date('fecha', $reunione->fecha? date('Y-m-d', strtotime($reunione->fecha)): '', ['class' => 'form-control' . ($errors->has('fecha') ? ' is-invalid' : ''), 'placeholder' => 'Fecha', 'value'=>date('d-m-Y', strtotime($reunione->fecha))]) }}
                    {!! $errors->first('fecha', '<p class="invalid-feedback">:message</p>') !!}
                </div>
            </div>

        </div>
        <div class="row justify-content-md-center">
            <div class="col-md-5">
                <div class="form-group">
                    {{ Form::label('lugar') }}
                    {{ Form::text('lugar', $reunione->lugar, ['class' => 'form-control' . ($errors->has('lugar') ? ' is-invalid' : ''), 'placeholder' => 'Lugar']) }}
                    {!! $errors->first('lugar', '<p class="invalid-feedback">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-md-5">
                <div class="form-group">
                    {{ Form::label('Hora inicio') }}
                    {{ Form::time('hora_inicio', $reunione->hora_inicio , ['class' => 'form-control' . ($errors->has('hora_inicio') ? ' is-invalid' : ''), 'placeholder' => 'Hora de comienzo', 'value'=>date('d-m-Y', strtotime($reunione->hora_inicio))]) }}
                    {!! $errors->first('hora_inicio', '<p class="invalid-feedback">:message</p>') !!}
                </div>
            </div>

        </div>
        <div class="row justify-content-md-center">
            <div class="col-md-5">
                <div class="form-group">
                    {{ Form::label('Hora término') }}
                    {{ Form::time('hora_fin', $reunione->hora_fin , ['class' => 'form-control' . ($errors->has('hora_fin') ? ' is-invalid' : ''), 'placeholder' => 'Hora de finalización', 'value'=>date('d-m-Y', strtotime($reunione->hora_fin))]) }}
                    {!! $errors->first('hora_fin', '<p class="invalid-feedback">:message</p>') !!}
                </div>
            </div>

        </div>
        
        <div class="row justify-content-md-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Asistentes
                    </div>
                    <div class="card-body">
                        <div class="form-group">


                            <br>
                            <input type="checkbox" name="selectAll" id="selectAll">
                            <label for="selectAll">Seleccionar todos</label>
                            <br>
                            <br>

                            @foreach ($asistentes as $asistente)
                            <div class="form-check">
                                {{ Form::checkbox('asistentes[]', $asistente->id, $asistente->asistencia, ['class' => 'form-check-input' . ($errors->has('orden') ? ' is-invalid' : ''), 'placeholder' => 'Asistencia', 'id'=> $asistente->id]) }}
                                <label class="form-check-label" for="{{$asistente->id}}"> {{$asistente->nombre}}
                            </div>

                            @endforeach
                            {!! $errors->first('docente_id', '<p class="invalid-feedback">:message</p>') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="box-footer mt-4 px-3">
        <div class="form-group">
            <a class="btn btn-danger" href="{{ route('reuniones.index') }}">Cancelar</a>
            @if (!$reunione->id)
            <input type="submit" class="btn btn-secondary" name="continue" value="Terminar">

            @endif
            <input type="submit" class="btn btn-primary" name="continue" value="Continuar">

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