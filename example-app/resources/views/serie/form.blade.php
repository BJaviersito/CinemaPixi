<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Titulo_serie') }}
            {{ Form::text('Titulo_serie', $serie->Titulo_serie, ['class' => 'form-control' . ($errors->has('Titulo_serie') ? ' is-invalid' : ''), 'placeholder' => 'Titulo Serie']) }}
            {!! $errors->first('Titulo_serie', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('N_Episodio') }}
            {{ Form::text('N_Episodio', $serie->N_Episodio, ['class' => 'form-control' . ($errors->has('N_Episodio') ? ' is-invalid' : ''), 'placeholder' => 'N Episodio']) }}
            {!! $errors->first('N_Episodio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('N_Temporada') }}
            {{ Form::text('N_Temporada', $serie->N_Temporada, ['class' => 'form-control' . ($errors->has('N_Temporada') ? ' is-invalid' : ''), 'placeholder' => 'N Temporada']) }}
            {!! $errors->first('N_Temporada', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Imagen', 'Imagen') }}
            {{ Form::file('Imagen', ['class' => 'form-control-file' . ($errors->has('Imagen') ? ' is-invalid' : ''), 'accept' => 'image/*']) }}
            {!! $errors->first('Imagen', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Descripcion') }}
            {{ Form::text('Descripcion', $serie->Descripcion, ['class' => 'form-control' . ($errors->has('Descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('Descripcion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Ano_Lanzamiento') }}
            {{ Form::text('Ano_Lanzamiento', $serie->Ano_Lanzamiento, ['class' => 'form-control' . ($errors->has('Ano_Lanzamiento') ? ' is-invalid' : ''), 'placeholder' => 'Ano Lanzamiento']) }}
            {!! $errors->first('Ano_Lanzamiento', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Clasificacion') }}
            {{ Form::text('Clasificacion', $serie->Clasificacion, ['class' => 'form-control' . ($errors->has('Clasificacion') ? ' is-invalid' : ''), 'placeholder' => 'Clasificacion']) }}
            {!! $errors->first('Clasificacion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('URL') }}
            {{ Form::text('URL', $serie->URL, ['class' => 'form-control' . ($errors->has('URL') ? ' is-invalid' : ''), 'placeholder' => 'Url']) }}
            {!! $errors->first('URL', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>