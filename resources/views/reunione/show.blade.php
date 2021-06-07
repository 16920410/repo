@extends('layouts.app')

@section('template_title')
    {{ $reunione->name ?? 'Show Reunione' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Reunione</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('reuniones.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $reunione->fecha }}
                        </div>
                        <div class="form-group">
                            <strong>Lugar:</strong>
                            {{ $reunione->lugar }}
                        </div>
                        <div class="form-group">
                            <strong>Orden:</strong>
                            {{ $reunione->orden }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
