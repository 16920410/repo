@extends('layouts.app')

@section('template_title')
    {{ $tecnologico->name ?? 'Show Tecnologico' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Tecnologico</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('tecnologicos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $tecnologico->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Correo:</strong>
                            {{ $tecnologico->correo }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
