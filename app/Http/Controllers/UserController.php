<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();

        return view('users.index', compact('users'));
    }

    public function show($id)
    {
        // $user = User::where('id', $id)->first();
        $user = User::find($id);

        if (empty($user)) {
            return redirect()->route('users.index');
        }

        return view('users.show', compact('user'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        // $inputs = $request->only([
        //     'name',
        //     'email',
        //     'password'
        // ]);
        // poderia inserir criando um objeto do User , setando os valores 
        // e o method save, porém essa é menos verbosa
        $inputs = $request->all();
        
        $inputs['password'] = bcrypt($inputs['password']);

        $user = User::create($inputs);

        return redirect()->route('users.index');
        // return redirect()->route('users.show', $user->id);
    }
}
