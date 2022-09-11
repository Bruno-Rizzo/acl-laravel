@extends('layouts.app')

@section('content')

<div class="card mt-3" style="height: 80vh">

    <div class="card-header" style="background-color: #DDD">
        FUNÇÃO - Cadastrar Função
    </div>

    <div class="card-body">

        <form action="{{route('roles.store')}}" method="post">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nome</label>
                <input type="text" class="form-control" placeholder="Nome" name="name" value="{{ old('name') }}" />
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-sm btn-success">Cadastrar</button>
            <a href="{{route('roles.index')}}" class="btn btn-sm btn-secondary">Voltar</a>

        </form>


    </div>
</div>

@endsection
