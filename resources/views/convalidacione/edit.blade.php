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
                                        {{ Form::label('Materia cursada') }}
                                        {{ Form::select('materia_cursada', $materias_cursadas, $materia->materia_cursada, ['class' => 'form-control' . ($errors->has('materia_cursada') ? ' is-invalid' : ''), 'placeholder' => 'Materia Cursada']) }}
                                        {!! $errors->first('materia_cursada', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        {{ Form::label('Materia convalidada') }}
                                        {{ Form::select('materia_convalidada', $materias_convalidar, $materia->materia_convalidada, ['class' => 'form-control' . ($errors->has('materia_convalidada') ? ' is-invalid' : ''), 'placeholder' => 'Materia Cursada']) }}
                                        {!! $errors->first('materia_convalidada', '<div class="invalid-feedback">:message</div>') !!}
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
                                    <div class="col">
                                        <div class="form-group">
                                            {{ Form::label('Materia cursada') }}
                                            {{ Form::select("materia_cursada_$key", $materias_convalidar, $convalidada->materia_cursada, ['placeholder' => 'Materia Cursada','disabled'=> true]) }}
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            {{ Form::label('Materia convalidada') }}
                                            {{ Form::select('materia_convalidada', $materias_convalidar, $convalidada->materia_convalidada, ['placeholder' => 'Materia Cursada','disabled'=> true]) }}
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
            if (e.target.value == $('[name="materia_convalidada"]')[0].selectedOptions[0].value) {
                $('[name="porcentaje"]')[0].value = 100
                $('[name="porcentaje"]')[0].disabled = true
                console.log('same');
                return
            }
            $('[name="porcentaje"]')[0].disabled = false
            $('[name="porcentaje"]')[0].value = ''
            getPorcentajes(cursada, convalidada)
        })
        window.$('[name="materia_convalidada"]').on('change', (e) => {
            console.log('ch ch ch changes', e.target.value, $('[name="materia_cursada"]')[0].selectedOptions[0].value);
            let cursada = $('[name="materia_cursada"]')[0].selectedOptions[0].value
            let convalidada = e.target.value
            if (convalidada == cursada) {
                $('[name="porcentaje"]')[0].value = 100
                $('[name="porcentaje"]')[0].disabled = true
                console.log('same');
                return
            }
            $('[name="porcentaje"]')[0].disabled = false
            $('[name="porcentaje"]')[0].value = ''
            getPorcentajes(cursada, convalidada)


        })
        return 0

    }

    let getPorcentajes = function (cursada, convalidada){
        base = 'http://127.0.0.1:8000/materias-convalidadas'
        fetch(`${base}/${cursada}/${convalidada}`).then(e => console.log(e))
    }
    defer(init)
</script>
@endsection