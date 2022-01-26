<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Role;
use App\Role_user;
use Redirect;
use Gate;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        if (Gate::allows('Insert_user')) {
            $dados = array(
                'titulo' => 'Usuários',
                'users' => User::all()
            );
            return view('users.index', $dados);
        } else {
            return view('erro');
        }
    }

    public function cadastrar() {
        if (Gate::allows('Insert_user')) {
            $dados = array('titulo' => 'Adicionar Usuário');
            return view('users.formulario', $dados);
        } else {
            return view('erro');
        }
    }

    public function insert(Request $request) {
        $input = $request->all();
        $user = array(
            'remember_token' => $input['_token'],
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => bcrypt($input['password']),
            'password-confirm' => bcrypt($input['password-confirm'])
        );
        $new_user = new User();
        $new_user = $new_user->create($user);
        \Session::flash('insert_ok', 'Usuário cadastrado com sucesso!');
        return Redirect::to('users');
    }

    public function editar($id) {
        if (Gate::allows('Edit_user')) {
            $user = User::findOrFail($id);
            $dados = array(
                'user' => User::findOrFail($id),
                'titulo' => 'Editar usuário',
            );
            return view('users.formulario', $dados);
        } elseif (Gate::allows('Edit_user_logado') && auth()->user()->id == $id) {
            $user = User::findOrFail($id);
            $dados = array(
                'user' => User::findOrFail($id),
                'titulo' => 'Editar usuário',
            );
            return view('users.formulario', $dados);
        } else {

            return view('erro');
        }
    }

    public function update($id, Request $request) {
        if (Gate::allows('Edit_user')) {
            $new_user = User::findOrFail($id);
            $input = $request->all();
            $user = array(
                'remember_token' => $input['_token'],
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => bcrypt($input['password']),
                'password-confirm' => bcrypt($input['password-confirm'])
            );
            $new_user->update($user);
            \Session::flash('update_ok', 'Usuário atualizado com sucesso!');
            return Redirect::to('users');
        } elseif (Gate::allows('Edit_user_logado')) {
            $new_user = User::findOrFail($id);
            $input = $request->all();
            $user = array(
                'remember_token' => $input['_token'],
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => bcrypt($input['password']),
                'password-confirm' => bcrypt($input['password-confirm'])
            );
            $new_user->update($user);
            \Session::flash('update_ok', 'Usuário atualizado com sucesso!');
            return Redirect::to('dashboard');
        } else {
            return view('erro');
        }
    }

    public function autenticar($id, Request $request) {
        //verifico se o usuario possui a permissão de autenticação 
        if (Gate::allows('Autentica_user')) {
            if ($id == auth()->user()->id) {
                \Session::flash('autentica_ok', 'Usuário já está logado!');
                return Redirect::to('users');
            } else {
                //metodo nativo auth no qual passa o ID desejado 
                Auth::loginUsingId($id);
                //redireciona para a pagina 
                \Session::flash('autentica_ok', 'Seja bem vindo !!');
                return Redirect::to('dashboard');
            }
        } else {
            \Session::flash('autentica_ok', 'Erro Sem permissão!');
            return view('erros');
        }
    }

    public function view($id) {
        if (Gate::allows('View_user')) {
            $user = User::find($id);
            $dados = array(
                'titulo' => $user->name,
                'user' => User::findOrFail($id),
                'roles_check' => $user->roles,
                'roles' => Role::all(),
                'user_id' => $user->id,
                'role_id' => 0
            );
            return view('users.view', $dados);
        } else {
            return view('erro');
        }
    }

    public function user_role(Request $request) {
        $input = $request->all();
        $admin = User::find($input['user_id']);
        $roles = $input['roles'];
        $db_roles = Role_user::roles($input['user_id']);
        $remove_roles = Role_user::remove_roles_nocheck($input['user_id'], $input['roles']);
        $i = 0;
        foreach ($roles as $role_id) {
            foreach ($db_roles as $role) {
                if ($role->role_id == $role_id) {
                    $i = $role_id;
                    break;
                }
            }
            if ($role_id != $i) {
                $role_assign = Role::find($role_id);
                $admin->assign($role_assign);
            }
        }
        \Session::flash('permission_role_ok', 'Roles do ' . $admin->name . ' alteradas com sucesso!');
        return Redirect::to('users');
    }

    public function deletar($id) {
        if (Gate::allows('Delete_user')) {
            $user = User::findOrFail($id);
            $user->delete();
            \Session::flash('delete_ok', 'Usuario excluido com sucesso!');
            return Redirect::to('users');
        } else {
            return view('erro');
        }
    }

}
