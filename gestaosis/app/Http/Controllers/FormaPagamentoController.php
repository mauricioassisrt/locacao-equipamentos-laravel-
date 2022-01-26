<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Redirect;
use Gate;
use App\FormaPagamento;

class FormaPagamentoController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {

        if (Gate::allows('View_formaPagamento')) {
            $dados = array(
                'titulo' => 'Forma de Pagamento',
                'formaPagamentos' => FormaPagamento::all()
            );
            return view('formapagamento.index', $dados);
        } else {
            return view('erro');
        }
    }

    public function cadastrar() {
        if (Gate::allows('Insert_formaPagamento')) {
            $dados = array('titulo' => 'Adicionar Forma de Pagamento');
            return view('formapagamento.formulario', $dados);
        } else {
            return view('erro');
        }
    }

    public function insert(Request $request) {
        $formaPagamento = new FormaPagamento();
        $formaPagamento = $formaPagamento->create($request->all());

        return Redirect::to('formaPagamentos');
    }

    public function editar($id) {
        if (Gate::allows('Edit_formaPagamento')) {
            $formaPagamento = FormaPagamento::find($id);
            $dados = array(
                'formaPagamento' => FormaPagamento::findOrFail($id),
                'titulo' => 'Editar formaPagamento',
            );
            return view('formapagamento.formulario', $dados);
        } else {
            return view('erro');
        }
    }

    public function update($id, Request $request) {

        $formaPagamento = FormaPagamento::findOrFail($id);

        $formaPagamento->update($request->all());

        return Redirect::to('formaPagamentos');
    }

    public function deletar($id) {
        if (Gate::allows('Delete_formaPagamento')) {
            $formaPagamento = FormaPagamento::findOrFail($id);
            $formaPagamento->delete();
            \Session::flash('delete_ok', 'formaPagamento excluido com sucesso!');
        }
        return Redirect::to('formaPagamentos');
    }

}
