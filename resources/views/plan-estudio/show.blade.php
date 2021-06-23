@extends('layouts.app')

@section('template_title')
    {{ $planEstudio->name ?? 'Show Plan Estudio' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Plan Estudio</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('plan-estudios.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $planEstudio->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Clave:</strong>
                            {{ $planEstudio->clave }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
