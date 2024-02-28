@extends('layouts.app')

@section('template_title')
    {{ $perfil->name ?? "{{ __('Show') Perfil" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Perfil</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('perfils.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Tipoperfil:</strong>
                            {{ $perfil->TipoPerfil }}
                        </div>
                        <div class="form-group">
                            <strong>Nombreperfil:</strong>
                            {{ $perfil->NombrePerfil }}
                        </div>
                        <div class="form-group">
                            <strong>Usuario Id:</strong>
                            {{ $perfil->Usuario_id }}
                        </div>
                        <div class="form-group">
                            <strong>Id Lista:</strong>
                            {{ $perfil->id_Lista }}
                        </div>
                        <div class="form-group">
                            <strong>Resena Id:</strong>
                            {{ $perfil->Resena_id }}
                        </div>
                        <div class="form-group">
                            <strong>Imagen:</strong>
                            {{ $perfil->Imagen }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
