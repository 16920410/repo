@extends('layouts.app')

@section('template_title')
Docente
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Docente') }}
                        </span>

                        <div class="float-right">
                            <a href="{{ route('docentes.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                                {{ __('Nuevo Docente') }}
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
                    <a class="btn btn-primary" href="{{ URL::to('/docentepdf') }}">Descargar PDF</a>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead">
                                <tr>
                                    <th>No</th>

                                    <th>Nombre</th>
                                    <th>Rfc</th>
                                    <th>Telefono</th>
                                    <th>Puesto</th>



                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($docentes as $docente)
                                <tr>
                                    <td>{{ ++$i }}</td>

                                    <td>{{ $docente->nombre }}</td>
                                    <td>{{ $docente->rfc }}</td>
                                    <td>{{ $docente->telefono }}</td>
                                    <td>{{ $docente->Puesto->cargo }}</td>



                                    <td>
                                        <form action="{{ route('docentes.destroy',$docente->id) }}" method="POST">
                                            <a class="btn btn-sm btn-primary " href="{{ route('docentes.show',$docente->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                            <a class="btn btn-sm btn-success" href="{{ route('docentes.edit',$docente->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
            {!! $docentes->links() !!}
        </div>
    </div>
</div>
@endsection