@extends('layouts.app')

@section('content')
    <div class="card mt-3" style="height: 80vh">
        <div class="card-header" style="background-color: #DDD">
            CLIENTES - Lista de Clientes
        </div>
        <div class="card-body">

            @if(session('msg'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="background-color: #188653 ; color:#EEE">
                {{session('msg')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @can('create', App\Models\Customer::class)
                <a href="{{ route('customers.create') }}" class="btn btn-sm btn-primary"> + Novo Cliente</a>
            @endcan
            <table class="table mt-2">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Celular</th>
                        @can('update', App\Models\Customer::class)
                        <th scope="col">Editar</th>
                        @endcan
                        @can('delete', App\Models\Customer::class)
                        <th scope="col">Excluir</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $customer)
                        <tr>
                            <th scope="row">{{ $customer->id }}</th>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->mobile }}</td>
                            <td>
                                @can('update', App\Models\Customer::class)
                                    <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-sm btn-success">
                                        Editar
                                    </a>
                                @endcan
                            </td>
                            <td>
                                <form action="{{ route('customers.destroy', $customer->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    @can('delete', App\Models\Customer::class)
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Deseja excluir este cliente?')">
                                            Excluir
                                        </button>
                                    @endcan
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>
@endsection
