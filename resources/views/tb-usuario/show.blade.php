@extends('layouts.app')

@section('template_title')
    {{ $tbUsuario->name ?? 'Show Tb Usuario' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title"><strong>Informacion del Usuario</strong></span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('tb-usuarios.index') }}"> Atrás</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $tbUsuario->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Documento:</strong>
                            {{ $tbUsuario->documento }}
                        </div>
                        <div class="form-group">
                            <strong>Genero:</strong>
                            {{ $tbUsuario->genero }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Nacimiento:</strong>
                            {{ $tbUsuario->fecha_nacimiento }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono:</strong>
                            {{ $tbUsuario->telefono }}
                        </div>
                        <div class="form-group">
                            <strong>Eps Id:</strong>
                            {{ $tbUsuario->eps_id }}
                        </div>
                        <div class="form-group">
                            <strong>Rol Id:</strong>
                            {{ $tbUsuario->rol_id }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $tbUsuario->estado }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $tbUsuario->email }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
