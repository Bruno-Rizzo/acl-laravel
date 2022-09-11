@extends('layouts.app')

@section('content')
    <div class="card mt-3" style="height: 30vh">

        <div class="card-header" style="background-color: #DDD">
            FUNÇÕES - Editar Função
        </div>

        <div class="card-body">

            <form action="{{ route('roles.update', $role->id) }}" method="post">
                @csrf
                @method('put')

                <div class="mb-3">
                    <label class="form-label">Nome</label>
                    <input type="text" class="form-control" name="name" value="{{ $role->name }}" />
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-sm btn-success">Editar</button>

            </form>

        </div>

    </div>

    <div class="card mt-3 col-12" style="height: 50vh">

        <div class="card-header" style="background-color: #DDD">
            FUNÇÕES - Associar Permissão
        </div>

        <div class="card-body">

            <form action="{{route('roles.permissions',$role->id)}}" method="post">
                @csrf

                <div class="d-flex row">

                    @foreach ($permissions as $permission)

                        <div class="col-sm-3 mb-3">

                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="{{ $permission->id }}"
                                       name="permissions[]" value="{{ $permission->id }}" @checked($role->hasPermission($permission->name))>
                                <label class="form-check-label" for="{{ $permission->id }}">{{ $permission->name }}</label>
                            </div>

                        </div>

                    @endforeach

                </div>

                <button type="submit" class="btn btn-sm btn-success">Associar</button>
                <a href="{{ route('roles.index') }}" class="btn btn-sm btn-secondary">Voltar</a>

            </form>

        </div>

    </div>
@endsection
