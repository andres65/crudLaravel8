@extends('layouts.app')

@section('template_title')
    Update Tb Ep
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Editar EPS</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('tb-eps.update', $tbEp->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('tb-ep.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
