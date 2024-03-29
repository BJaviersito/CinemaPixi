@extends('layouts.app')

@section('template_title')
    {{ $categoria->name ?? "{{ __('Show') Categoria" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Categoria</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('categoria.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre Categoria:</strong>
                            {{ $categoria->Nombre_Categoria }}
                        </div>
                        <div class="form-group">
                            <strong>Pelicula Id:</strong>
                            {{ $categoria->Pelicula_id }}
                        </div>
                        <div class="form-group">
                            <strong>Serie Id:</strong>
                            {{ $categoria->Serie_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
