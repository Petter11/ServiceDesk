<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        //
    }
    
    public function create()
    {
        return view('users.form');  
    }

    public function show() 
    {
        //
    }
    
    public function store(User $user, UserRequest $request)
    {
        $dados = $request->all();          
        User::create($dados);
    
        return redirect()->back()->with(['mensagem'=> 'Registro criado com sucesso!']);
    }
    
    public function edit(User $user)
    {
        return view('users.form', [
            'user' => $user
        ]); 
    }
    
    public function update(User $user, Request $request)
    {
        $dados = $request->all();
        $user->update($dados);
        // return redirect()->back()->with('mensagem', 'Registro atualizado com sucesso!');
        return redirect()->back()->with('mensagem', 'Registro atualizado com sucesso!');

    }
    
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with('mensagem', 'Registro atualizado com sucesso!');
    }

}
