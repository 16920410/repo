@extends('layouts.app')

@section('template_title')
    Plan Estudio
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Plan Estudio') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('plan-estudios.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Nuevo Plan') }}
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

										<th>Nombre</th>
										<th>Clave</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($planEstudios as $planEstudio)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $planEstudio->nombre }}</td>
											<td>{{ $planEstudio->clave }}</td>

                                            <td>
                                                <form action="{{ route('plan-estudios.destroy',$planEstudio->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('plan-estudios.show',$planEstudio->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('plan-estudios.edit',$planEstudio->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
                {!! $planEstudios->links() !!}
            </div>
        </div>
    </div>
@endsection
