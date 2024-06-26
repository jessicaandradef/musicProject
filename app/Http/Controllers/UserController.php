<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    /**Função teste para usuarios, não foi utilizada, apenas para teste
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function users()
    {
        $allUsers = User::get()->all();
        return view('users.all_users', compact('allUsers'));
    }

    public function createUser() {
        return view('users.create_user'); //vai retornar a view com a pagina e com o formulário;
    }

    /** Método para verificar na view os dados do usuario e testar se os dados que estão sendo inseridos na BD estão corretos;
     * função apenas para teste.
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function viewUser($id)
    {
        $user = User::where('id', $id) ->first();

        return view('users.user_view', compact('user'));
    }

    public function storeUser(Request $request)
    {
        //se já existir o usuario será um update, se não existir será um create;

        if (isset($request->id)){
            $request->validate([
                'name' => 'string|max:50',
                'email' => 'string', //email tem que ser unico na tabela de users;
            ]);

            User::where('id', $request->id)
                ->update([
                    'name' => $request->name,
                ]);

            return redirect() -> route('users.dashboard_user')
                ->with('message', 'User' . $request->name.'atualizado com sucesso!');
        } else{

            $request->validate([
                'name' => 'string|max:50',
                'email' => 'required|email|unique:users', //email único na tabela de USERS;
                'password' => 'required'
            ]);

            User::insert([
                'name' => $request->name,
                'email' => $request ->email,
                'password' => Hash::make($request -> password),
            ]);
            return redirect() -> route('login') -> with('msg', 'Nova conta criada com sucesso');
        }
    }
}
