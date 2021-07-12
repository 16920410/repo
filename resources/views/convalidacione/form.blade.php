<div class="box box-info padding-1">
    <div class="box-body">

    <table style="border: 1px; width: 60%; height: 200px;  border-collapse: collapse; ">
        <tr>
            <th>
                    <div class="form-group">
                        {{ Form::label('nombre_alumno') }}
                        {{ Form::text('nombre_alumno', $convalidacione->nombre_alumno, ['class' => 'form-control' . ($errors->has('nombre_alumno') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Alumno']) }}
                        {!! $errors->first('nombre_alumno', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="form-group">
                        {{ Form::label('plan_externo') }}
                        {{ Form::select('plan_externo',$planes, $convalidacione->plan_externo, ['class' => 'form-control' . ($errors->has('plan_externo') ? ' is-invalid' : ''), 'placeholder' => 'Plan Externo']) }}
                        {!! $errors->first('plan_externo', '<div class="invalid-feedback">:message</div>') !!}
                     </div>
                    <div class="form-group">
                        {{ Form::label('plan_interno') }}
                        {{ Form::select('plan_interno',$planes, $convalidacione->plan_interno, ['class' => 'form-control' . ($errors->has('plan_interno') ? ' is-invalid' : ''), 'placeholder' => 'Plan Interno']) }}
                        {!! $errors->first('plan_interno', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
            </th>

            <th>
                <div class="form-group">
                    {{ Form::label('fecha') }}
                    {{ Form::date('fecha', $convalidacione->fecha? date('d-m-Y', strtotime($convalidacione->fecha)): '', ['class' => 'form-control' . ($errors->has('fecha') ? ' is-invalid' : ''), 'placeholder' => 'Fecha', 'value'=>date('d-m-Y', strtotime($convalidacione->fecha))]) }}
                    {!! $errors->first('fecha', '<p class="invalid-feedback">:message</p>') !!}
                </div>


                <div class="form-group">
                    {{ Form::label('tecnologico_procedente') }}
                    {{ Form::select('tecnologico_procedente',$tecnologicos, $convalidacione->tecnologico_procedente, ['class' => 'form-control' . ($errors->has('tecnologico_procedente') ? ' is-invalid' : ''), 'placeholder' => 'Tecnologico Procedente']) }}
                    {!! $errors->first('tecnologico_procedente', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group">
                    {{ Form::label('tecnologico_receptor') }}
                    {{ Form::select('tecnologico_receptor',$tecnologicos, $convalidacione->tecnologico_receptor, ['class' => 'form-control' . ($errors->has('tecnologico_receptor') ? ' is-invalid' : ''), 'placeholder' => 'Tecnologico Receptor']) }}
                    {!! $errors->first('tecnologico_receptor', '<div class="invalid-feedback">:message</div>') !!}
                </div>


            </th>
        </tr>
    </table>




    </div>
    <div class="box-footer mt20" align="center">
        <button type="submit" class="btn btn-primary">Guardar Datos</button>
    </div>
</div>
