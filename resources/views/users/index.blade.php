@extends('layouts.app')

@section('title', 'Listagem dos Usuários')
    
@section('content')
    <h1 class="py-3 px-5 font-serif">
        Listagem de usuários |
    </h1>
    <form action="{{ route('users.index') }} " class="py-2 px-3" method="GET">
        <input type="text" name="search" placeholder="Search">
        <button class="font-mono shadow bg-purple-400 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">
            Search garotinhoo
        </button>
        <button  class="bg-green-500 rounded py-2 px-3">
            <a href="{{ route('users.create') }}"> Criar usuário</a>
        </button>
    </form>
    <table class="min-w-full leading-normal shadow-md rounded-lg overflow-hidden">
        <thead>
            <tr>
              <th
                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-400 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider"
              >
                Nome
              </th>
              <th
                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-400 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider"
              >
                E-mail
              </th>
              <th
                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-400 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider"
              >
                Editar
              </th>
              <th
                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-400 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider"
              >
                Detalhes
              </th>
            </tr>
          </thead>
        <ul>
            @foreach ($users as $user)
                <tr>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        {{ $user->name }} 
                    </td>                    
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        {{ $user->email }}
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm"> 
                        <a href="{{ route('users.show', ['id' => $user->id]) }}"> Ver detalhe desse usuário </a>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm"> 
                        <a href="{{ route('users.edit', $user->id) }}"> Editar usuário</a> 
                    </td>
                </tr>
            @endforeach
        </ul>
    </table>
@endsection