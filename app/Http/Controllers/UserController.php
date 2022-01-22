<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        // $reports = Report::all();
        // return view('reports.index', [
        //     "reports" => $reports
        // ]);
    }
    
    public function create()
    {
        return view('users.form');  
    }

    public function show() 
    {
    //     $reports = Report::where('status', Report::STATUS_AGUARDANDO)->paginate(5);
    //     return view('reports.list', [
    //         "reports" => $reports
    // ]);
    }
    
    public function store(User $user, UserRequest $request)
    {
        $dados = $request->all();          //PEGANDO DADOS DO FORMULARIO
        User::create($dados);             //CADASTRANDO OS DADOS
    
        return redirect()->back()->with(['mensagem'=> 'Registro criado com sucesso!']);//REDIRECIONANDO A PAGINA, VAI VOLTAR PARA A LISTAGEM
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
