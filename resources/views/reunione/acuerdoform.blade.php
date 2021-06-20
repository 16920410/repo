@extends('layouts.app')

@section('template_title')
Create Reunione
@endsection

@section('content')
<div>
    <section class="content container-fluid">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Orden del Día</span>
                    </div>
                    <div class="card-body">
                        <div class="box box-info padding-1">
                            <div class="box-body">
                                <form method="POST" class="mb-4" action="{{ route('reuniones.acuerdos.store',['reunione'=>$reunion->id]) }}" role="form" enctype="multipart/form-data" name="new">
                                    @csrf
                                    <div class="row">
                                        <div class="col-2">
                                            <div class="form-group">
                                                {{ Form::label('Num. orden') }}
                                                {{ Form::select('orden_id', $ordenes, $nacuerdo->orden_id , ['class' => 'form-control' . ($errors->has('orden_id') ? ' is-invalid' : '')]) }}
                                                {!! $errors->first('orden_id', '<p class="invalid-feedback">:message</p>') !!}
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                {{ Form::label('Descripción') }}
                                                {{ Form::text('descripcion', $nacuerdo->descripcion , ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Orden']) }}
                                                {!! $errors->first('descripcion', '<p class="invalid-feedback">:message</p>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mb-4">Submit</button>
                                </form>


                                @foreach ($acuerdos as $acuerdo)
                                <form method="POST" action="{{ route('reuniones.acuerdos.update',['acuerdo'=>$acuerdo->id ,'reunione'=>$acuerdo->reunion_id] ) }}" role="form" enctype="multipart/form-data" name="form2">
                                    {{ method_field('PATCH') }}
                                    @csrf

                                    <div class=" form-group">
                                        <div class="row">
                                            <div class="col-2">
                                                {{ Form::label('Num. orden') }}
                                                {{ Form::select('orden_id', $ordenes, $acuerdo->orden_id , ['class' => 'form-control' . ($errors->has('orden_id') ? ' is-invalid' : ''), 'placeholder' => 'orden']) }}
                                                {!! $errors->first('orden_id', '<p class="invalid-feedback">:message</p>') !!}
                                            </div>

                                            <div class="col-8">
                                                {{ Form::label('Acuerdo') }}
                                                {{ Form::text('descripcion', $acuerdo->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'descripcion']) }}
                                                {!! $errors->first('descripcion', '<p class="invalid-feedback">:message</p>') !!}
                                            </div>
                                            <div class="col-2 d-flex align-items-end justify-content-around">
                                                {{ Form::submit('Eliminar', array('class' => 'btn btn-danger', 'name' => 'submitbutton')) }}
                                                {{ Form::submit('Actualizar', array('class' => 'btn btn-info', 'name' => 'submitbutton')) }}

                                            </div>
                                        </div>

                                    </div>
                                </form>

                                @endforeach
                            </div>
                            <div class="box-footer mt-4">
                                <a class="btn btn-danger" href="{{ route('reuniones.ordenes.create',['reunione'=>$reunion->id]) }}">Atras</a>
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