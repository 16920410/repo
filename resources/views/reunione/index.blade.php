@extends('layouts.app')

@section('template_title')
    Reunione
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Reunione') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('reuniones.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
										<th>Lugar</th>
										<th>Orden</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reuniones as $reunione)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $reunione->fecha }}</td>
											<td>{{ $reunione->lugar }}</td>
											<td>{{ $reunione->orden }}</td>

                                            <td>
                                                <form action="{{ route('reuniones.destroy',$reunione->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('reuniones.show',$reunione->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('reuniones.edit',$reunione->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    <a class="btn btn-sm btn-primarybtn btn-primary" href="{{ URL::to('/docentepdf') }}">Descargar PDF</a>


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
                {!! $reuniones->links() !!}
            </div>
        </div>
    </div>
@endsection
