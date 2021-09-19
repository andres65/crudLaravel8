@extends('layouts.app')

@section('template_title')
    Tb Ep
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('EPS') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('tb-eps.create') }}" class="btn btn-warning btn-lg float-right"  data-placement="left">
                                  {{ __('CREAR NUEVA EPS') }}
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
										<th>Estado</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tbEps as $tbEp)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $tbEp->nombre }}</td>
											<td>{{ $tbEp->estado }}</td>

                                            <td>
                                                <form action="{{ route('tb-eps.destroy',$tbEp->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('tb-eps.show',$tbEp->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('tb-eps.edit',$tbEp->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
                {!! $tbEps->links() !!}
            </div>
        </div>
    </div>
@endsection
