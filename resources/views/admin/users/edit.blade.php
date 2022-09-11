@extends('layouts.app')

@section('content')

<div class="card mt-3" style="height: 80vh">

    <div class="card-header" style="background-color: #DDD">
        USUÁRIOS - Editar Usuário
    </div>

    <div class="card-body">

        <form action="{{route('users.update',$user->id)}}" method="post">
            @csrf
            @method('put')

            <div class="mb-3">
                <label class="form-label">Nome</label>
                <input type="text" class="form-control" name="name" value="{{$user->name}}" />
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="{{$user->email}}" />
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Função</label>
                <select class="form-select" name="role_id">
                    @foreach ($roles as $role)
                    <option value="{{$role->id}}" @selected($role->id==$user->role->id) >{{$role->name}}</option>
                    @endforeach
                  </select>
                @error('role_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-sm btn-success">Editar</button>
            <a href="{{route('users.index')}}" class="btn btn-sm btn-secondary">Voltar</a>

        </form>

    </div>
</div>

@endsection
