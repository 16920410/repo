@extends('layouts.app')

@section('template_title')
Create Materias Plan
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">

            @includeif('partials.errors')

            <div class="card card-default">
                <div class="card-header">
                    <span class="card-title">Añadir materia</span>
                </div>
                <div class="card-body">

                    <form method="POST" action="{{ route('plan-estudios.materias-plan.store', ['plan_estudio'=>$plan])}}" role="form" enctype="multipart/form-data">
                        @csrf

                        @include('materias-plan.form')

                    </form>


                </div>
            </div>
            <div class="card card-default">
                <div class="card-header">
                    <span class="card-title">Materias</span>
                </div>
                <div class="card-body">
                    @foreach ($planes as $planE)
                    {{$planE->id}}
                    <form method="POST" action="{{ route('plan-estudios.materias-plan.destroy', ['materias_plan'=>$planE->materia_id,'plan_estudio'=>$plan]) }}" role="form" enctype="multipart/form-data">
                        @method('DELETE')
                        @csrf
                        <div class="row">
                            <div class="col-2">
                                <div class="form-group">
                                    {{ Form::label('plan_id') }}
                                    {{ Form::hidden('plan_id',$planE->plan_id) }}
                                    {{ Form::select('plan_nom',$planesEstudio, $planE->plan_id, ['class' => 'form-control' . ($errors->has('plan_id') ? ' is-invalid' : ''), 'placeholder' =>'nombre','disabled'=>true]) }}
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    {{ Form::label('materia_id') }}
                                    {{ Form::text('materia_id',$planE->materia->clave." - ".$planE->materia->nombre , ['class' => 'form-control' . ($errors->has('materia_id') ? ' is-invalid' : ''), 'placeholder' => 'Materia Id','disabled'=>true]) }}
                                </div>
                            </div>
                            <div class="col d-flex align-items-end">
                                <button type="submit" class="btn btn-danger mb-3"><i class="fa fa-fw fa-trash"></i> Delete</button>
                            </div>

                        </div>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endsection