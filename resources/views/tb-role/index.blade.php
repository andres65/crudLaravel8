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
										<th>Acciones</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tbRoles as $tbRole)
                                        <tr>
                                            <td>{{ ++$i }}</td>
											<td>{{ $tbRole->nombre }}</td>

                                            <td>
                                                <form action="{{ route('tb-roles.destroy',$tbRole->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('tb-roles.show',$tbRole->id) }}" title="Ver más información"><i class="fa fa-fw fa-eye"></i> </a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('tb-roles.edit',$tbRole->id) }}" title="Editar"><i class="fa fa-fw fa-edit"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Desea eliminar el Rol {{ $tbRole->nombre }} ?');" title="Eliminar"><i class="fa fa-trash-o"></i></button>
                                                    {{--  <button type="submit" class="btn btn-danger btn-sm" title="Eliminar"><i class="fa fa-fw fa-trash"></i></button>  --}}
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
