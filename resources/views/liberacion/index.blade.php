@extends('layouts.app')

@section('template_title')
Liberacion
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Liberación') }}
                        </span>

                        <div class="float-right">
                            <a href="{{ route('actividades.index') }}" class="btn btn-success btn-sm mr-2" data-placement="left">
                                {{ __('Actividades') }}
                            </a>
                            <a href="{{ route('liberacions.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                                {{ __('Create New') }}
                            </a>

                        </div>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead">
                                <tr>
                                    <th>No</th>

                                    <th>Fecha</th>
                                    <th>Docente</th>
                                    <th>Semestre</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($liberacions as $liberacion)
                                <tr>
                                    <td>{{ ++$i }}</td>

                                    <td>{{ $liberacion->fecha }}</td>
                                    <td>{{ $liberacion->Docente->nombre }}</td>
                                    <td>{{ $liberacion->semestre }}</td>

                                    <td>
                                        <form action="{{ route('liberacions.destroy',$liberacion->id) }}" method="POST">

                                            <a class="btn btn-sm btn-success" href="{{ route('liberacions.edit',$liberacion->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                            <a href="{{URL::to('/pdfliberacion',$liberacion->id) }}" class="btn btn-sm btn-primarybtn btn-primary">Descargar PDF</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {!! $liberacions->links() !!}
        </div>
    </div>
</div>
@endsection
