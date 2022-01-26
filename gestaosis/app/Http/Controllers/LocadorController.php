<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Locador;
use Redirect;
use Gate;
use Illuminate\Database\QueryException;

class LocadorController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {

        if (Gate::allows('View_locador')) {
            $dados = array(
                'titulo' => 'Locador',
                'locadors' => Locador::all()
            );
            return view('locadors.index', $dados);
        } else {
            return view('erro');
        }
    }

    public function cadastrar() {
        if (Gate::allows('Insert_locador')) {
            $user = User::all();
            $dados = array('titulo' => 'Adicionar Locador');
            return view('locadors.formulario', $dados, compact('user'));
        } else {
            return view('erro');
        }
    }

    

    public function insertIten(Request $request) {
        $locador = new Locador();
        $locador = $locador->create($request->all());
        \Session::flash('insert_ok', 'locador cadastrado com sucesso!');
        return Redirect::to('locarEquipamento/cadastrar');
    }

    public function insert(Request $request) {
        $locador = new Locador();
        $locador = $locador->create($request->all());
        \Session::flash('insert_ok', 'locador cadastrado com sucesso!');
        return Redirect::to('locadors');
    }

    public function editar($id) {

        //obtem todas as locadors no banco de dados
        $locador = Locador::all();

        foreach ($locador as $locadors) {
            //verifica se o id do usuario logado é o mesmo registrado na locador

            if (Gate::allows('Edit_locador')) {
                $locador = Locador::find($id);
                $user = User::all();
                $dados = array(
                    'locador' => Locador::findOrFail($id),
                    'titulo' => 'Editar Locador',
                );

                return view('locadors.formulario', compact('user'), $dados);
            } elseif (Gate::allows('Edit_locador_logado') && auth()->user()->id == $id) {

                $locador = $locadors::find($locadors->id);
                $user = User::all();
                $dados = array(
                    'locador' => Locador::findOrFail($locadors->id),
                    'titulo' => 'Editar Locador',
                );

                return view('locadors.formulario', compact('user'), $dados);
            } else {
                return view('sem');
            }
        }
    }

    public function update($id, Request $request) {
        $locador = Locador::findOrFail($id);

        $locador->update($request->all());
        \Session::flash('update_ok', 'locador atualizado com sucesso!');
        return Redirect::to('locadors');
    }

    public function deletar($id) {
       $locador = Locador::findOrFail($id);
        if (Gate::allows('Delete_locador') && $locador->user_id === auth()->user()->id) {
            try {

                $locador->delete();
                \Session::flash('delete_ok', 'locador excluido com sucesso!');
                return Redirect::to('locadors');
            } catch (QueryException $e) {
                \Session::flash('errors', 'O Locador possui dados associados a ele !');
                return view('locadors/index')->with(['titulo' => 'Locador', 'locadors' => Locador::all()]);
            }
        } else {
            return view('sem');
        }
    }

}
