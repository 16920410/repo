@extends('layouts.app')

@section('template_title')
    {{ $materiacursada->name ?? 'Show Materiacursada' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Materiacursada</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('materiacursadas.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $materiacursada->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Clave:</strong>
                            {{ $materiacursada->clave }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
