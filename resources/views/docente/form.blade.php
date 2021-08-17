<div class="box box-info padding-1">
    <div class="box-body">


        <table style="border: 1px; width: 80%; height: 200px;  border-collapse: collapse; ">

            <tr >
                <th>
                    <div class="form-group">
                        {{ Form::label('nombre') }}
                        {{ Form::text('nombre_solo', $docente->nombre_solo, ['class' => 'form-control' . ($errors->has('nombre_solo') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
                        {!! $errors->first('nombre', '<div class="invalid-feedback">:message</p>') !!}
                    </div>
                    <div class="form-group">
                        {{ Form::label('Apellido materno') }}
                        {{ Form::text('apellido_p', $docente->apellido_p, ['class' => 'form-control' . ($errors->has('apellido_p') ? ' is-invalid' : ''), 'placeholder' => 'Apellido paterno']) }}
                        {!! $errors->first('Apellido paterno', '<div class="invalid-feedback">:message</p>') !!}
                    </div>
                    <div class="form-group">
                        {{ Form::label('telefono') }}
                        {{ Form::text('telefono', $docente->telefono, ['class' => 'form-control' . ($errors->has('telefono') ? ' is-invalid' : ''), 'placeholder' => 'Telefono']) }}
                        {!! $errors->first('telefono', '<div class="invalid-feedback">:message</p>') !!}
                    </div>
                </th>

                <th>
                <div class="form-group">
                    {{ Form::label('Apellido paterno') }}
                    {{ Form::text('apellido_m', $docente->apellido_m, ['class' => 'form-control' . ($errors->has('apellido_m') ? ' is-invalid' : ''), 'placeholder' => 'Apellido materno']) }}
                    {!! $errors->first('apellido materno', '<div class="invalid-feedback">:message</p>') !!}
                </div>
                 <div class="form-group">
                    {{ Form::label('rfc') }}
                    {{ Form::text('rfc', $docente->rfc, ['class' => 'form-control' . ($errors->has('rfc') ? ' is-invalid' : ''), 'placeholder' => 'Rfc']) }}
                    {!! $errors->first('rfc', '<div class="invalid-feedback">:message</p>') !!}
                </div>
                <div class="form-group">
                    {{ Form::label('puesto') }}
                            <select class="form-control {{$errors->has('puesto_id') ? ' is-invalid' : ''}}" name="puesto_id">
                                @foreach ($puestos as $puesto)
                                <option value="{{$puesto->id}}">{{$puesto->cargo}}
                                </option>
                                @endforeach
                            </select>
                            {!! $errors->first('puesto_id', '<div class="invalid-feedback">:message</p>') !!}
                </div>




                </th>

            </tr>


        </table>

        <!-- <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $docente->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</p>') !!}
        </div> -->







    </div>
        <div class="box-footer mt20" align="right">
        <button type="submit" class="btn btn-outline-success">Guardar</button>
            <!--<button type="submit" class="btn btn-primary">Agregar</button>-->
        </div>
</div>
