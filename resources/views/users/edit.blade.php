@extends('layouts.app')

@section('title', 'Novo usuário')
    
@section('content')
    <h1>
        Edição de usuário {{ $user->name }}
    </h1>
    @if ($errors->any())   
    <ul>
        @foreach ($errors->all() as $error)
        <li>
            {{$error}}
        </li>
        @endforeach
    </ul>       
    @endif

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        {{-- <input type="hidden" name="_method" value="PUT"> --}}
        @method('PUT')
        @csrf
        <input type="text" name="name"  placeholder="Nome:" value="{{ $user->name }}">
        <input type="email" name="email"  placeholder="E-mail:" value="{{ $user->email }}">
        <input type="password" name="password"  placeholder="Senha:">
        <button type="submit">
            Criar
        </button>
    </form>
@endsection