@extends('layouts.app')

@section('template_title')
    {{ $serie->name ?? "{{ __('Show') Serie" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Serie</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('serie.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Titulo Serie:</strong>
                            {{ $serie->Titulo_serie }}
                        </div>
                        <div class="form-group">
                            <strong>N Episodio:</strong>
                            {{ $serie->N_Episodio }}
                        </div>
                        <div class="form-group">
                            <strong>N Temporada:</strong>
                            {{ $serie->N_Temporada }}
                        </div>
                        <div class="form-group">
                            <strong>Imagen:</strong>
                            <img src="{{ asset('image_path/' . $serie->Imagen) }}" alt="{{ $serie->Titulo_serie }}" style="max-width: 300px; max-height: 300px;">
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $serie->Descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Ano Lanzamiento:</strong>
                            {{ $serie->Ano_Lanzamiento }}
                        </div>
                        <div class="form-group">
                            <strong>Clasificacion:</strong>
                            {{ $serie->Clasificacion }}
                        </div>
                        <div class="form-group">
                            <strong>Url:</strong>
                            {{ $serie->URL }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
