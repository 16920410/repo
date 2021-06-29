@extends('layouts.app')

@section('template_title')
Create Reporte Actividade
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">

            @includeif('partials.errors')

            <div class="card card-default">
                <div class="card-header">


                    <span class="card-title"> Docente: {{$liberacion->docente->nombre}}</span>
                </div>
                <div class="card-body">
                    <div class="box box-info padding-1">
                        <div class="box-body">
                            <div class="col mt-4">
                                <h4>Evaluación</h4>
                            </div>
                            <div class="form-group mt-4">
                                <div class="row">
                                    <div class="col">
                                        <h5>Descripción de actividad</h5>
                                    </div>
                                    <div class="col">
                                        <h5>Cumplimiento</h5>
                                    </div>
                                </div>


                                    @include('reporte-actividade.form')


                            </div>

                        </div>
                        <div class="box-footer mt20">
                            <a href="{{route('liberacions.index')}}" class="btn btn-primary" >salir</a>
                            <a class="btn  btn-primary" href="{{ URL::to('/pdfliberacion',$liberacion->id) }}"><i class="fa fa-fw fa-file-pdf-o "></i> Imprimir-pdf</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
