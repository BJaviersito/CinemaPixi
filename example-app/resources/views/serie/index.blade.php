@extends('layouts.app')

@section('template_title')
    Serie
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Serie') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('serie.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
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
                                        
										<th>Titulo Serie</th>
										<th>N Episodio</th>
										<th>N Temporada</th>
										<th>Imagen</th>
										<th>Descripcion</th>
										<th>Ano Lanzamiento</th>
										<th>Clasificacion</th>
										<th>Url</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($series as $serie)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $serie->Titulo_serie }}</td>
											<td>{{ $serie->N_Episodio }}</td>
											<td>{{ $serie->N_Temporada }}</td>
											<td><img src="{{ asset('image_path/' . $serie->Imagen) }}" alt="{{ $serie->Titulo_serie }}" style="max-width: 300px; max-height: 300px;">
                                            </td>
											<td>{{ $serie->Descripcion }}</td>
											<td>{{ $serie->Ano_Lanzamiento }}</td>
											<td>{{ $serie->Clasificacion }}</td>
											<td>{{ $serie->URL }}</td>

                                            <td>
                                                <form action="{{ route('serie.destroy',$serie->id) }}" method="POST">
                                                    <a class="btn eye" href="{{ route('serie.show',$serie->id) }}"><i class="eye"></i> {{ __('') }}<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-bookmark" viewBox="0 0 16 16">
                                                        <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1z"/>
                                                      </svg></a>
                                                    <a class="btn edit" href="{{ route('serie.edit',$serie->id) }}"><i class="edit"></i> {{ __('') }}<svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                                                        <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001"/>
                                                      </svg></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn trash"><i class="trash"></i> {{ __('') }}<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                                                      </svg></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $series->links() !!}
            </div>
        </div>
    </div>
@endsection
