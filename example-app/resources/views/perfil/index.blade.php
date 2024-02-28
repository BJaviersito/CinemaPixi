@extends('layouts.app')

@section('template_title')
    Perfil
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Perfil') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('perfil.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Tipoperfil</th>
										<th>Nombreperfil</th>
										<th>Usuario Id</th>
										<th>Id Lista</th>
										<th>Resena Id</th>
										<th>Imagen</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($perfils as $perfil)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $perfil->TipoPerfil }}</td>
											<td>{{ $perfil->NombrePerfil }}</td>
											<td>{{ $perfil->Usuario_id }}</td>
											<td>{{ $perfil->id_Lista }}</td>
											<td>{{ $perfil->Resena_id }}</td>
											<td>{{ $perfil->Imagen }}</td>

                                            <td>
                                                <form action="{{ route('perfil.destroy',$perfil->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('perfil.show',$perfil->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('perfil.edit',$perfil->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $perfils->links() !!}
            </div>
        </div>
    </div>
@endsection
