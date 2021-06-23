@extends('layouts.app')

@section('template_title')
    {{ $materiasPlan->name ?? 'Show Materias Plan' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Materias Plan</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('materias-plans.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Plan Id:</strong>
                            {{ $materiasPlan->plan_id }}
                        </div>
                        <div class="form-group">
                            <strong>Materia Id:</strong>
                            {{ $materiasPlan->materia_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
