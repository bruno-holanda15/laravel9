<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateUserFormRequest;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search ?? '';

        $users = User::where(function ($query) use ($search) {
            if (!empty($search)) {
                $query->where('name','LIKE',"%{$search}%");
                $query->orWhere('name',$search);
            }
        })->get();

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

    public function store(StoreUpdateUserFormRequest $request)
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

    public function edit($id)
    {
        if (!$user = User::find($id)) {
            return redirect()->route('users.index');
        }
    
        return view('users.edit', compact('user'));
    }

    public function update(StoreUpdateUserFormRequest $request, $id)
    {
        if (!$user = User::find($id)) {
            return redirect()->route('users.index');
        }
        
        $inputs = $request->only('name', 'email');

        if ($request->password) {
            $inputs['password'] = bcrypt($request->password);
        }

        $user->update($inputs);

        return redirect()->route('users.index');
    }
}
