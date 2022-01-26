<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Equipamento;
use Redirect;
use Gate;
use Illuminate\Database\QueryException;

class EquipamentoController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index2() {
        $equipamentos = Equipamento::all();

        return \PDF::loadView('equipamentos.relatorio', compact('equipamentos'))
                        // Se quiser que fique no formato a4 retrato: ->setPaper('a4', 'landscape')
                        ->stream();
        ('nome-arquivo-pdf-gerado.pdf');
    }

    public function index() {

        if (Gate::allows('View_equipamento')) {
            $dados = array(
                'titulo' => 'Equipamento',
                'equipamentos' => Equipamento::all()
            );
            return view('equipamentos.index', $dados);
        } else {
            return view('erro');
        }
    }

    public function cadastrar() {
        if (Gate::allows('Insert_equipamento')) {
            $user = User::all();
            $dados = array('titulo' => 'Adicionar Equipamento');
            return view('equipamentos.formulario', $dados, compact('user'));
        } else {
            return view('erro');
        }
    }

    public function insert(Request $request) {
        $equipamento = new Equipamento();
        $aquisicao = $request->aquisicao;

        $timeConvert1 = strtotime($aquisicao);
        $request->aquisicao = date('Y-m-d', $timeConvert1);
        $dados = array(
            'aquisicao' => $request->aquisicao,
            'valor' => $request->valor,
            'codigo' => $request->codigo,
            'descricao' => $request->descricao,
            'nome' => $request->nome,
            'user_id' => $request->user_id,
            'status' => $request->status
        );

        $equipamento = $equipamento->create($dados);
        \Session::flash('insert_ok', 'equipamento cadastrado com sucesso!');
        return Redirect::to('equipamentos');
    }

    public function editar($id) {

        //obtem todas as equipamentos no banco de dados
        $equipamento = Equipamento::all();

        foreach ($equipamento as $equipamentos) {
            //verifica se o id do usuario logado é o mesmo registrado na equipamento

            if (Gate::allows('Edit_equipamento')) {
                $equipamento = Equipamento::find($id);
                $user = User::all();
                $dados = array(
                    'equipamento' => Equipamento::findOrFail($id),
                    'titulo' => 'Editar Equipamento',
                );

                return view('equipamentos.formulario', compact('user'), $dados);
            } else {
                return view('sem');
            }
        }
    }

    public function update($id, Request $request) {
        $equipamento = Equipamento::findOrFail($id);

        $aquisicao = $request->aquisicao;

        $timeConvert1 = strtotime($aquisicao);
        $request->aquisicao = date('Y-m-d', $timeConvert1);
        $dados = array(
            'aquisicao' => $request->aquisicao,
            'valor' => $request->valor,
            'codigo' => $request->codigo,
            'descricao' => $request->descricao,
            'nome' => $request->nome,
            'user_id' => $request->user_id,
            'status' => $request->status
        );
        $equipamento->update($dados);
        \Session::flash('update_ok', 'equipamento atualizado com sucesso!');
        return Redirect::to('equipamentos');
    }

    public function deletar($id) {
        $equipamento = Equipamento::findOrFail($id);
        if (Gate::allows('Delete_equipamento') && $equipamento->user_id === auth()->user()->id) {
            try {

                $equipamento->delete();
                \Session::flash('delete_ok', 'equipamento excluido com sucesso!');
                return Redirect::to('equipamentos');
            } catch (QueryException $e) {
                \Session::flash('errors', 'O produto possui dados associados a ele !');
                return view('equipamentos/index')->with(['titulo' => 'Equipamento', 'equipamentos' => Equipamento::all()]);
            }
        } else {
            return view('sem');
        }
    }

}
