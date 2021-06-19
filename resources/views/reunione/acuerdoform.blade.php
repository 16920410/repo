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
                        <span class="card-title">Acuerdos</span>
                    </div>
                    <div class="card-body">
                        <div class="box box-info padding-1">
                            <div class="box-body">
                                <form method="POST" action="{{ route('reuniones.acuerdos.store',['reunione'=>$reunione->id]) }}" role="form" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-2">
                                            <div class="form-group">
                                                {{ Form::label('Orden') }}
                                                {{ Form::number('orden_id', $reunione->orden, ['class' => 'form-control' . ($errors->has('lugar') ? ' is-invalid' : ''), 'placeholder' => 'Num.']) }}
                                                {!! $errors->first('orden_id', '<p class="invalid-feedback">:message</p>') !!}
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-group">
                                                {{ Form::label('Acuerdo') }}
                                                {{ Form::text('acuerdo', $reunione->orden, ['class' => 'form-control' . ($errors->has('acuerdo') ? ' is-invalid' : ''), 'placeholder' => 'Acuerdo']) }}
                                                {!! $errors->first('orden', '<p class="invalid-feedback">:message</p>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                            <div class="box-footer mt-4">
                                <a class="btn btn-secondary" href="{{ route('reuniones.index') }}">Terminar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection