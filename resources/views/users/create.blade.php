@extends('layouts.app')

@section('title', 'Novo usuário')
    
@section('content')
    <h1 class="py-2 px-3">
        Criação de usuário
    </h1>

    @include('includes.validations-form')

    <form action="{{ route('users.store') }}" method="POST">
        @include('users._partials.form')
    </form>
@endsection