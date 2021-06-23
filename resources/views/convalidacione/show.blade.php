@extends('layouts.app')

@section('template_title')
    {{ $convalidacione->name ?? 'Show Convalidacione' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Convalidacione</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('convalidaciones.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre Alumno:</strong>
                            {{ $convalidacione->nombre_alumno }}
                        </div>
                        <div class="form-group">
                            <strong>Plan Externo:</strong>
                            {{ $convalidacione->plan_externo }}
                        </div>
                        <div class="form-group">
                            <strong>Plan Interno:</strong>
                            {{ $convalidacione->plan_interno }}
                        </div>
                        <div class="form-group">
                            <strong>Tecnologico Procedente:</strong>
                            {{ $convalidacione->tecnologico_procedente }}
                        </div>
                        <div class="form-group">
                            <strong>Tecnologico Receptor:</strong>
                            {{ $convalidacione->tecnologico_receptor }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
