@extends('layouts.app')

@section('template_title')
    Tb Role
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('ROLES DEL USUARIO') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('tb-roles.create') }}" class="btn btn-warning btn-lg float-right"  data-placement="left">
                                  {{ __('CREAR NUEVO ROL') }}
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
                                    @foreach ($tbRoles as $tbRole)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $tbRole->nombre }}</td>
											<td>{{ $tbRole->estado }}</td>

                                            <td>
                                                <form action="{{ route('tb-roles.destroy',$tbRole->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('tb-roles.show',$tbRole->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('tb-roles.edit',$tbRole->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
                {!! $tbRoles->links() !!}
            </div>
        </div>
    </div>
@endsection
