@foreach ($reportes as $key => $actividad)
<div class="row">
    <div class="col-6">
        {{ Form::hidden('actividad_id[]',$actividad->actividad_id) }}
        {{ Form::hidden('liberacion_id[]',$actividad->liberacion_id) }}
        {{ Form::hidden('reporte_id[]',$actividad->id) }}
        <p>{{$actividad->descripcion}}</p>
    </div>

    <div class="col-1">
        <div class="form-check">
            <input class="form-check-input" type="radio" value="2" id="si" name="evaluaciones[{{$key}}]" {{$actividad->evaluacion == 2? 'checked':''}}>
            <label class="form-check-label" for="si">
                Si
            </label>
        </div>
    </div>
    <div class="col-1">
        <div class="form-check">
            <input class="form-check-input" type="radio" value="1" id="no" name="evaluaciones[{{$key}}]" {{$actividad->evaluacion == 1? 'checked':''}}>
            <label class="form-check-label" for="no">
                No
            </label>
        </div>
    </div>
    <div class="col-2">
        <div class="form-check">
            <input class="form-check-input" type="radio" value="0" id="na" name="evaluaciones[{{$key}}]" {{$actividad->evaluacion == 0? 'checked':''}}>
            <label class="form-check-label" for="na">
                No aplica
            </label>
        </div>
    </div>
</div>
@endforeach
<div class="col">
    <button type="submit" class="btn btn-primary">Guardar evaluación</button>
</div>