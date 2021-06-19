@extends('layouts.app')

@section('template_title')
Create Reunione
@endsection

@section('content')
<div>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Orden del Día</span>
                    </div>
                    <div class="card-body">
                        <div class="box box-info padding-1">
                            <div class="box-body">
                                <form method="POST" action="{{ route('reuniones.ordenes.store',['reunione'=>$reunion->id]) }}" role="form" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-2">
                                            <div class="form-group">
                                                {{ Form::label('Num. orden') }}
                                                {{ Form::number('num_orden', $num_orden, ['class' => 'form-control' . ($errors->has('num_orden') ? ' is-invalid' : ''), 'placeholder' => 'num. orden']) }}
                                                {!! $errors->first('num_orden', '<p class="invalid-feedback">:message</p>') !!}
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                {{ Form::label('Descripción') }}
                                                {{ Form::text('descripcion', null, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Orden']) }}
                                                {!! $errors->first('descripcion', '<p class="invalid-feedback">:message</p>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary ">Submit</button>
                                </form>
                            </div>
                            <div class="box-footer mt20">
                                @foreach ($ordenes as $orden)
                                div class="col-2">
                                <div class="col-2">
                                    <div class="form-group">
                                        {{ Form::label('Num. orden') }}
                                        {{ Form::number('num_orden', $orden->num_orden, ['class' => 'form-control' . ($errors->has('num_orden') ? ' is-invalid' : ''), 'placeholder' => 'Lugar']) }}
                                        {!! $errors->first('num_orden', '<p class="invalid-feedback">:message</p>') !!}
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        {{ Form::label('orden') }}
                                        {{ Form::text('orden', $reunione->decripcion, ['class' => 'form-control' . ($errors->has('orden') ? ' is-invalid' : ''), 'placeholder' => 'Orden']) }}
                                        {!! $errors->first('orden', '<p class="invalid-feedback">:message</p>') !!}
                                    </div>
                                </div>

                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection