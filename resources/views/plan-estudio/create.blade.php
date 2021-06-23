@extends('layouts.app')

@section('template_title')
    Create Plan Estudio
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Plan Estudio</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('plan-estudios.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('plan-estudio.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
