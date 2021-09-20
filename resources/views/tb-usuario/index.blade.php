@extends('layouts.app')

@section('template_title')
    Tb Usuario
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('USUARIOS') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('tb-usuarios.create') }}" class="btn btn-warning btn-lg float-right"  data-placement="left">
                                  {{ __('CREAR NUEVO USUARIO') }}
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
                            <table class="table table-hover">
                                <thead class="thead">
                                    <tr>
                                        
										<th>NOMBRE</th>
										<th>DOCUMENTO</th>
										<th>GENERO</th>
										<th>EDAD</th>
										<th>TELÉFONO</th>
										<th>EPS</th>
										<th>ROL</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tbUsuarios as $tbUsuario)
                                        
                                        @if($tbUsuario->calcularedad($tbUsuario->fecha_nacimiento) <= 17)
                                            <tr bgcolor="#4caf50">
                                        @elseif ($tbUsuario->calcularedad($tbUsuario->fecha_nacimiento) >= 50)
                                            <tr bgcolor="#f05545">
                                        @else
                                           <tr>  
                                        @endif
                                            
											<td>{{ $tbUsuario->nombre }}</td>
											<td>{{ $tbUsuario->documento }}</td>
											<td>{{ $tbUsuario->genero }}</td>
                                            <td>{{ $tbUsuario->calcularedad($tbUsuario->fecha_nacimiento) }}</td>
											<td>{{ $tbUsuario->telefono }}</td>
                                            @foreach($eps as $item)
                                                @if($tbUsuario->eps_id == $item->id)
											        <td>{{ $item->nombre }}</td>
                                                @endif
                                            @endforeach
                                            @foreach($roles as $item)
                                                @if($tbUsuario->rol_id == $item->id)
											        <td>{{ $item->nombre }}</td>
                                                @endif
                                            @endforeach

                                            <td>
                                                <form method="POST" action="{{ route('tb-usuarios.destroy',$tbUsuario->id) }}" >
                                                    <a class="btn btn-sm btn-primary " href="{{ route('tb-usuarios.show',$tbUsuario->id) }}" title="Ver más información"><i class="fa fa-eye"></i></a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('tb-usuarios.edit',$tbUsuario->id) }}" title="Editar"><i class="fa fa-fw fa-edit"></i></a>
                                                    
                                                    
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Desea eliminar el Usuario: {{ $tbUsuario->nombre }}?');" title="Eliminar"><i class="fa fa-trash-o"></i></button>
                                                    {{--  <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash" onclick="return confirm('Borrar?');"></i> Eliminar</button>  --}}
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $tbUsuarios->links() !!}
            </div>
        </div>
    </div>
@endsection
