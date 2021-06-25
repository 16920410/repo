@extends('layouts.app')

@section('template_title')
Update Convalidacione
@endsection

@section('content')
<section class="content container-fluid">
    <div class="">
        <div class="col-md-12">

            @includeif('partials.errors')

            <div class="card card-default">
                <div class="card-header">
                    <span class="card-title">Update Convalidacione</span>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('convalidaciones.update', $convalidacione->id) }}" role="form" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        @csrf

                        @include('convalidacione.form')

                    </form>
                </div>
            </div>
            @if ($convalidacione->id)
            <div class="card card-default">
                <div class="card-header">
                    <span class="card-title">Convalidaciones</span>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('convalidaciones.convalidacion-materias.store', ['convalidacione'=>$convalidacione->id]) }}" role="form" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group">
                                        {{ Form::label('Materia Cursada') }}
                                        <select class="form-control {{$errors->has('materia_cursada')? 'is-invalid' : ''}}" name="materia_cursada" id="materia_cursada" placeholder="Materia Cursada">
                                            <option value="">Materia Cursada </option>
                                            @foreach ($materias_cursadas as $cursada)
                                            <option value="{{$cursada->id}}">{{"$cursada->clave - $cursada->nombre  $materia->materia_cursada"}} </option>
                                            @endforeach
                                        </select>

                                        @if ($errors)
                                        {!! $errors->first('materia_cursada','<div class="invalid-feedback">:message</div>') !!}

                                        @endif
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        {{ Form::label('Materia Convalidada') }}
                                        <select class="form-control {{$errors->has('materia_convalidada')? 'is-invalid' : ''}}" name="materia_convalidada" id="materia_convalidada" placeholder="Materia Convalidada">
                                            <option value="">Materia Convalidada </option>
                                            @foreach ($materias_convalidar as $convalidada)
                                            <option value="{{$convalidada->id}}">{{"$convalidada->clave - $convalidada->nombre "}} </option>
                                            @endforeach
                                        </select>

                                        @if ($errors)
                                        {!! $errors->first('materia_convalidada','<div class="invalid-feedback">:message</div>') !!}

                                        @endif
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        {{ Form::label('Calificación') }}
                                        {{ Form::text('calificacion', $materia->calificacion, ['class' => 'form-control' . ($errors->has('calificacion') ? ' is-invalid' : ''), 'placeholder' => 'Calificación']) }}
                                        {!! $errors->first('calificacion', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        {{ Form::label('porcentaje de validación') }}
                                        {{ Form::number('porcentaje', $materia->porcentaje, ['class' => 'form-control' . ($errors->has('porcentaje') ? ' is-invalid' : ''), 'placeholder' => '0','min'=>'0']) }}
                                        {!! $errors->first('porcentaje', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::hidden('convalidacion_id', $convalidacione->id, array('id' => 'invisible_id')) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer mt20">
                            <button type="submit" class="btn btn-success">Agregar</button>
                        </div>



                    </form>
                    <br><br><br>

                    @foreach ($materias_convalidadas as $key => $convalidada)
                    <div class="box box-info padding-1">
                        <form method="POST" action="{{ route('convalidaciones.convalidacion-materias.destroy', ['convalidacione'=>$convalidacione->id, 'convalidacion_materia'=>$convalidada->id]) }}" role="form" enctype="multipart/form-data">
                            {{ method_field('DELETE') }}
                            @csrf
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-group">
                                            {{ Form::label('Materia Cursada') }}
                                            <select class="form-control" placeholder="Materia Cursada" disabled>
                                                <option value="">Materia Cursada </option>
                                                @foreach ($materias_cursadas as $cursada)
                                                <option value="{{$cursada->id}}" {{$cursada->id == $convalidada->materia_cursada? 'selected':''}}>{{"$cursada->clave - $cursada->nombre  $materia->materia_cursada"}} </option>
                                                @endforeach
                                            </select>

                                            @if ($errors)
                                            {!! $errors->first('materia_cursada','<div class="invalid-feedback">:message</div>') !!}

                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            {{ Form::label('Materia convalida') }}
                                            <select class="form-control" placeholder="Materia convalidada" disabled>
                                                <option value="">Materia convalida </option>
                                                @foreach ($materias_convalidar as $convalida)
                                                <option value="{{$convalida->id}}" {{$convalida->id == $convalidada->materia_convalidada? 'selected':''}}>{{"$convalida->clave - $convalida->nombre "}} </option>
                                                @endforeach
                                            </select>

                                            @if ($errors)
                                            {!! $errors->first('materia_convalida','<div class="invalid-feedback">:message</div>') !!}

                                            @endif
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            {{ Form::label('Calificación') }}
                                            {{ Form::text('calificacion', $convalidada->calificacion, ['placeholder' => 'Materia Cursada','disabled'=> true]) }}
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            {{ Form::label('porcentaje') }}
                                            {{ Form::text('porcentaje', $convalidada->porcentaje, ['placeholder' => 'Materia Cursada','disabled'=> true]) }}
                                        </div>
                                    </div>
                                    <div class="col d-flex align-items-end">
                                        <button type="submit" class="btn btn-danger mb-3">Eliminar</button>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer mt20">
                            </div>
                        </form>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
</section>
<script defer>
    function defer(method) {
        if (window.jQuery)
            method();
        else
            setTimeout(function() {
                defer(method)
            }, 50);
    }
    let init = function() {
        window.$('[name="materia_cursada"]').on('change', (e) => {
            console.log('ch ch ch changes', e.target.value, $('[name="materia_convalidada"]')[0].selectedOptions[0].value);
            let cursada = e.target.value
            let convalidada = $('[name="materia_convalidada"]')[0].selectedOptions[0].value
            let porcentaje = $('[name="porcentaje"]')[0]
            if (!cursada || !convalidada) {
                return ''
            }
            if (e.target.value == $('[name="materia_convalidada"]')[0].selectedOptions[0].value) {
                $('[name="porcentaje"]')[0].value = 100
                $('[name="porcentaje"]')[0].disabled = true
                console.log('same');
                return
            }
            $('[name="porcentaje"]')[0].disabled = false
            $('[name="porcentaje"]')[0].value = ''
            console.log(getPorcentajes(cursada, convalidada).then(e => {
                porcentaje.value = e
                $('[name="porcentaje"]')[0].disabled = e != ''

            }))

        })
        window.$('[name="materia_convalidada"]').on('change', (e) => {
            console.log('ch ch ch changes', e.target.value, $('[name="materia_cursada"]')[0].selectedOptions[0].value);
            let cursada = $('[name="materia_cursada"]')[0].selectedOptions[0].value
            let convalidada = e.target.value
            let porcentaje = $('[name="porcentaje"]')[0]
            if (!cursada || !convalidada) {
                return ''
            }
            if (convalidada == cursada) {
                porcentaje.value = 100
                porcentaje.disabled = true
                console.log('same');
                return
            }
            porcentaje.disabled = false
            console.log(getPorcentajes(cursada, convalidada).then(e => {
                porcentaje.value = e

                $('[name="porcentaje"]').prop('readonly',true)
                console.log(porcentaje.attributes);

            }))


        })
        return 0

    }

    let getPorcentajes = function(cursada, convalidada) {


        let base = 'http://127.0.0.1:8000/materias-convalidadas'
        let url = `${base}/${cursada}/${convalidada}`
        console.log(url);
        return fetch(`${base}/${cursada}/${convalidada}`).then(e => {
                return e.json()
            }).then(e => {
                console.log(e);
                return e
            })
            .then(e => e.length ? e[0].porcentaje : '')
    }
    defer(init)
</script>
@endsection