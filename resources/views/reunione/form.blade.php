<div class="box box-info padding-1">
    <div class="box-body">

    <table style="border: 1px; width: 50%; height: 50px;  border-collapse: collapse; ">
        <tr >
            <th>
                <div class="form-group">
                    {{ Form::label('fecha') }}
                    {{ Form::date('fecha', $reunione->fecha? date('Y-m-d', strtotime($reunione->fecha)): '', ['class' => 'form-control' . ($errors->has('fecha') ? ' is-invalid' : ''), 'placeholder' => 'Fecha', 'value'=>date('d-m-Y', strtotime($reunione->fecha))]) }}
                    {!! $errors->first('fecha', '<p class="invalid-feedback">:message</p>') !!}
                </div>
            </th>
            <th>
                <div class="form-group">
                    {{ Form::label('lugar') }}
                    {{ Form::text('lugar', $reunione->lugar, ['class' => 'form-control' . ($errors->has('lugar') ? ' is-invalid' : ''), 'placeholder' => 'Lugar']) }}
                    {!! $errors->first('lugar', '<p class="invalid-feedback">:message</p>') !!}
                </div>
            <th>



        </tr>
    </table>

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
            {!! $errors->first('docente_id', '<p class="invalid-feedback">:message</p>') !!}
        </div>
    </div>

    <div class="box-footer mt-4">
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
