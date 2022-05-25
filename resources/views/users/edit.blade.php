@extends('layouts.app')

@section('title', 'Novo usuário')
    
@section('content')
    <h1>
        Edição de usuário {{ $user->name }}
    </h1>
    
    @include('includes.validations-form')

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        {{-- <input type="hidden" name="_method" value="PUT"> --}}
        @method('PUT')
        @include('users._partials.form')
    </form>
@endsection