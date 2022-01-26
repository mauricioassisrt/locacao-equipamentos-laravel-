<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\notice;
use App\User;
use Redirect;
use Gate;
use App\Http\Requests;

class NoticeController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        
        if (Gate::allows('View_notice')) {
            $dados = array(
                'titulo' => 'Notices',
                'notices' => notice::all()
            );
            return view('notices.index', $dados);
        } else {
            return Redirect::back()->withErrors(['Não Possui Autorização, Para acessar as Noticias!', '']);
        }
    }

    public function cadastrar() {
        if (Gate::allows('Insert_notice')) {
            $dados = array('titulo' => 'Adicionar notice');
            return view('notices.formulario', $dados);
        } else {
            return Redirect::back()->withErrors(['Não Possui Autorização !', '']);
        }
    }

    public function insert(Request $request) {
        $notice = new notice();
        $notice = $notice->create($request->all());
        \Session::flash('insert_ok', 'notice cadastrado com sucesso!');
        return Redirect::to('notices');
    }

    public function editar($id) {
        if (Gate::allows('Edit_notice')) {
            $notice = notice::find($id);
            $dados = array(
                'notice' => notice::findOrFail($id),
                'titulo' => 'Editar notice',
            );
            return view('notices.formulario', $dados);
        } else {
            return Redirect::to('notices');
        }
    }

    public function update($id, Request $request) {
        $notice = notice::findOrFail($id);

        $notice->update($request->all());
        \Session::flash('update_ok', 'notice atualizado com sucesso!');
        return Redirect::to('notices');
    }

    public function deletar($id) {
        if (Gate::allows('Delete_notice')) {
            $notice = notice::findOrFail($id);
            $notice->delete();
            \Session::flash('delete_ok', 'notice excluido com sucesso!');
        }
        return Redirect::to('notices');
    }

}
