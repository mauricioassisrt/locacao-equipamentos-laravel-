<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Redirect;
use Gate;
use App\User;
use App\Periodo;
use Illuminate\Database\QueryException;
class ControllerPeriodo extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {

        if (Gate::allows('View_periodo')) {
            $dados = array(
                'titulo' => 'Periodo ',
                'periodos' => Periodo::all()
            );
            return view('periodos.index', $dados);
        } else {
            return view('erro');
        }
    }

    public function cadastrar() {
        if (Gate::allows('Insert_periodo')) {
            $dados = array('titulo' => 'Adicionar Periodo ');
            return view('periodos.formulario', $dados);
        } else {
            return view('erro');
        }
    }

    public function insert(Request $request) {
        $periodo = new Periodo();
        $periodo = $periodo->create($request->all());

        return Redirect::to('periodos');
    }

    public function editar($id) {
        //obtem todas as periodos no banco de dados
        $periodo = Periodo::all();

        foreach ($periodo as $periodos) {
            //verifica se o id do usuario logado é o mesmo registrado na periodo

            if (Gate::allows('Edit_periodo')) {
                $periodo = Periodo::find($id);
                $user = User::all();
                $dados = array(
                    'periodo' => Periodo::findOrFail($id),
                    'titulo' => 'Editar Periodo',
                );

                return view('periodos.formulario', compact('user'), $dados);
            } else {
                return view('sem');
            }
        }
    }

    public function update($id, Request $request) {
      //verifica se o id vindo na request via Hidden é o mesmo ID do usuario logado
        if ($request->id_user == auth()->user()->id) {
            $periodo = Periodo::findOrFail($id);

            $periodo->update($request->all());

            return Redirect::to('periodos');
        } else {
            return view('erro');
        }
    }

   public function deletar($id) {
        $periodo = Periodo::findOrFail($id);
        if (Gate::allows('Delete_periodo') && $periodo->id_user === auth()->user()->id) {
            try {

                $periodo->delete();
                \Session::flash('delete_ok', 'periodo excluido com sucesso!');
                return Redirect::to('periodos');
            } catch (QueryException $e) {
                \Session::flash('errors', 'O Periodo possui dados associados a ele !');
                return view('periodos/index')->with(['titulo' => 'Locador', 'periodos' => Periodo::all()]);
            }
        } else {
            return view('sem');
        }
    }

}
