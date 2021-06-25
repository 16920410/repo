@extends('layouts.app')

@section('template_title')
    Update Reporte Actividade
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Reporte Actividade</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('reporte-actividades.update', $reporteActividade->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('reporte-actividade.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
