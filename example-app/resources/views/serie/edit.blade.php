@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Serie
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Serie</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('series.update', $serie->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('serie.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
