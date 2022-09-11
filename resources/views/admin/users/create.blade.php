@extends('layouts.app')

@section('content')
    <div class="card mt-3" style="height: 80vh">

        <div class="card-header" style="background-color: #DDD">
            USUÁRIOS - Cadastrar Usuário
        </div>

        <div class="card-body">

            <form action="{{route('users.store')}}" method="post">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nome</label>
                    <input type="text" class="form-control" placeholder="Nome" name="name" value="{{ old('name') }}" />
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" placeholder="Email" name="email"
                        value="{{ old('email') }}" />
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Senha</label>
                    <input type="password" class="form-control" placeholder="Senha" name="password"/>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Função</label>
                    <select class="form-select" name="role_id">
                        <option value="">Selecione uma opção</option>
                        @foreach ($roles as $role)
                        <option value="{{$role->id}}">{{$role->name}}</option>
                        @endforeach
                      </select>
                    @error('role_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-sm btn-success">Cadastrar</button>
                <a href="{{route('users.index')}}" class="btn btn-sm btn-secondary">Voltar</a>

            </form>

        </div>

    </div>

@endsection
