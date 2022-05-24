@extends('layouts.app')

@section('title', 'Listagem dos Usuários')
    
@section('content')
    <h1>
        Listagem de usuários |
        <a href="{{ route('users.create') }}"> Criar usuário</a>
    </h1>
    <form action="{{ route('users.index') }}" method="GET">
        <input type="text" name="search" placeholder="Search">
        <button type="submit">pesquise garotinhoo</button>
    </form>
    <ul>
        @foreach ($users as $user)
        
            <li>
                {{ $user->name }} - {{ $user->email }} | 
                <a href="{{ route('users.show', ['id' => $user->id]) }}"> Ver detalhe desse usuário </a>
                <a href="{{ route('users.edit', $user->id) }}"> Editar usuário</a> 
            </li>
        
        @endforeach
    </ul>
@endsection