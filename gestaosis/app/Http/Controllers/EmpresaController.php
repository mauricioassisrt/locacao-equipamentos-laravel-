<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Empresa;
use Redirect;
use Gate;
use App\Http\Requests;

class EmpresaController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {

        if (Gate::allows('View_empresa')) {
            $dados = array(
                'titulo' => 'Notices',
                'empresas' => empresa::all()
            );
            return view('empresas.index', $dados);
        } else if (Gate::allows('Edit_empresa_logado')) {
            $dados = array(
                'titulo' => 'Notices',
                'empresas' => empresa::all()
            );
            return view('empresas.editar', $dados);
        } else {
            return view('erro');
        }
    }

    public function cadastrar() {
        if (Gate::allows('Insert_empresa')) {
            $user = User::all();
            $dados = array('titulo' => 'Adicionar empresa');
            return view('empresas.formulario', $dados, compact('user'));
        } else {
            return view('erro');
        }
    }

    public function insert(Request $request) {
        $empresa = new empresa();
        $empresa = $empresa->create($request->all());
        \Session::flash('insert_ok', 'empresa cadastrado com sucesso!');
        return Redirect::to('empresas');
    }

    public function editar($id) {

        //obtem todas as empresas no banco de dados 
        $empresa = Empresa::all();

        foreach ($empresa as $empresas) {
            //verifica se o id do usuario logado é o mesmo registrado na empresa

            if (Gate::allows('Edit_empresa')) {
                $empresa = Empresa::find($id);
                $user = User::all();
                $dados = array(
                    'empresa' => Empresa::findOrFail($id),
                    'titulo' => 'Editar Empresa',
                );

                return view('empresas.formulario', compact('user'), $dados);
            } elseif (Gate::allows('Edit_empresa_logado') && auth()->user()->id == $empresas->user_id) {

                $empresa = $empresas::find($empresas->id);
                $user = User::all();
                $dados = array(
                    'empresa' => Empresa::findOrFail($empresas->id),
                    'titulo' => 'Editar Locador',
                );

                return view('empresas.formulario', compact('user'), $dados);
            }   
        }
    }

    public function update($id, Request $request) {
        if (Gate::allows('Edit_empresa')) {
            $empresa = empresa::findOrFail($id);

            $empresa->update($request->all());
            \Session::flash('update_ok', 'empresa atualizado com sucesso!');
            return Redirect::to('empresas');
        } else if (Gate::allows('Edit_empresa_logado')) {
            $empresa = empresa::findOrFail($id);
           
            $empresa->update($request->all());
            \Session::flash('empresa_alterada', 'Empresa Alterada com sucesso!');
            return Redirect::to('empresas');
        } else {
            return view('erro');
        }
    }

    public function deletar($id) {
        if (Gate::allows('Delete_empresa')) {
            $empresa = empresa::findOrFail($id);
            $empresa->delete();
            \Session::flash('delete_ok', 'empresa excluido com sucesso!');
        }
        return Redirect::to('empresas');
    }

}
