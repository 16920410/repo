@extends('layouts.app')

@section('template_title')
    Create Tecnologico
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Nuevo Tecnologico</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('tecnologicos.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('tecnologico.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
