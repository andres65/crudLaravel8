@extends('layouts.app')

@section('template_title')
    Update Tb Usuario
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title"><strong>Editar Usuario</strong></span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('tb-usuarios.index') }}"> Atrás</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('tb-usuarios.update', $tbUsuario->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('tb-usuario.form', ['formMode' => 'edit'])

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
