@extends('layouts.app')

@section('template_title')
    {{ $reporteActividade->name ?? 'Show Reporte Actividade' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Reporte Actividade</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('reporte-actividades.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Liberacion Id:</strong>
                            {{ $reporteActividade->liberacion_id }}
                        </div>
                        <div class="form-group">
                            <strong>Actividad Id:</strong>
                            {{ $reporteActividade->actividad_id }}
                        </div>
                        <div class="form-group">
                            <strong>Evaluacion:</strong>
                            {{ $reporteActividade->evaluacion }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
