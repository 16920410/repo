@extends('layouts.app')

@section('template_title')
    Convalidacione
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Convalidaciones') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('convalidaciones.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Nueva convalidación') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    @if ($message = Session::get('info'))
                        <div class="alert alert-success">
                            <p>{{ $message }} sdaaaaaaaaaaa</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

										<th>Nombre Alumno</th>
										<th>Plan Externo</th>
										<th>Plan Interno</th>
										<th>Tecnologico Procedente</th>
										<th>Tecnologico Receptor</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($convalidaciones as $convalidacione)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $convalidacione->nombre_alumno }}</td>
											<td>{{ $convalidacione->plan_externo }}</td>
											<td>{{ $convalidacione->plan_interno }}</td>
											<td>{{ $convalidacione->tecnologico_procedente }}</td>
											<td>{{ $convalidacione->tecnologico_receptor }}</td>

                                            <td>
                                                <form action="{{ route('convalidaciones.destroy',$convalidacione->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary" href="{{ URL::to('/pdfconvalidacion',$convalidacione->id) }}"><i class="fa fa-fw fa-file-pdf-o "></i> Imprimir-pdf</a>
                                                    <a class="btn btn-sm btn-primary " href="{{ route('convalidaciones.show',$convalidacione->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('convalidaciones.edit',$convalidacione->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
                {!! $convalidaciones->links() !!}
            </div>
        </div>
    </div>
@endsection
