@extends('layouts.app')

@section('template_title')
    {{ $liberacion->name ?? 'Show Liberacion' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Liberacion</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('liberacions.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $liberacion->fecha }}
                        </div>
                        <div class="form-group">
                            <strong>Docente Id:</strong>
                            {{ $liberacion->docente_id }}
                        </div>
                        <div class="form-group">
                            <strong>Semestre:</strong>
                            {{ $liberacion->semestre }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
