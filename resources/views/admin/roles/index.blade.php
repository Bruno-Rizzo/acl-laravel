@extends('layouts.app')

@section('content')
    <div class="card mt-3" style="background-color: #DDD ; height: 80vh">
        <div class="card-header">
            FUNÇÕES - Lista de Funções
        </div>
        <div class="card-body">

            @if(session('msg'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="background-color: #188653 ; color:#EEE">
                {{session('msg')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <a href="{{ route('roles.create') }}" class="btn btn-sm btn-primary"> + Nova Função</a>

            <table class="table mt-2">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <th scope="row">{{ $role->id }}</th>
                            <td>{{ $role->name }}</td>
                            <td>
                                <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-sm btn-success">
                                    Editar
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('roles.destroy', $role->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Deseja excluir esta função?')">
                                        Excluir
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>
@endsection
