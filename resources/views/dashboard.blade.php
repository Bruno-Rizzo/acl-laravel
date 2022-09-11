@extends('layouts.app')

@section('content')

<div class="card mt-3" style="height: 80vh">
    <div class="card-header" style="background-color: #DDD">
        DASHBOARD
    </div>
    <div class="card-body">
        Bem vindo, <strong>{{Auth::user()->name}}</strong> - {{Auth::user()->role->name}}
    </div>
</div>

@endsection
