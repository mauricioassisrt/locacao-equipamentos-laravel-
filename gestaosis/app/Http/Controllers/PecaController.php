<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;
use App\Peca;
use App\User;
use App\Equipamento;
use App\Servico;
use App\ServicoPeca;
use Gate;
use Redirect;
use DB;
use App\Quotation;

class PecaController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {

        if (Gate::allows('View_peca')) {
            $empresa_id;
            $user_id;
            $empresas = Empresa::all();
            foreach ($empresas as $empresa) {
                if ($empresa->user_id == auth()->user()->id) {
                    $empresa_id = $empresa->id;
                    $user_id = $empresa->user_id;
                }
            }
            $dados = array(
                'titulo' => 'Peças',
                'pecas' => Peca::all(),
                'empresa_id' => $empresa_id,
                'user_id' => $user_id
            );
            return view('pecas.index', $dados);
        } else {
            return view('erro');
        }
    }

    public function cadastrar() {
        if (Gate::allows('Insert_peca')) {
            $empresa_id;
            $user_id;
            $empresas = Empresa::all();


            foreach ($empresas as $empresa) {
                if ($empresa->user_id == auth()->user()->id) {

                    $dados = array('titulo' => 'Adicionar Peça',
                        'empresa_id' => $empresa->id,
                        'user_id' => $empresa->user_id,
                        'peca' => 0);
                }
            }

            return view('pecas.formulario', $dados);
        } else {
            return view('erro');
        }
    }

    public function insert(Request $request) {
        $peca = new Peca();
        $empresas = Empresa::all();
        foreach ($empresas as $empresa) {
            if ($empresa->user_id == auth()->user()->id) {
                $peca = $peca->create($request->all());
            }
        }

        \Session::flash('insert_ok', 'Peça cadastrado com sucesso!');
        return Redirect::to('pecas');
    }

    public function editar($id) {

        $empresa_id;
        $user_id;
        $empresas = Empresa::all();
        foreach ($empresas as $empresa) {
            if ($empresa->user_id === auth()->user()->id && Gate::allows('Edit_peca')) {
                $empresa_id = $empresa->id;
                $user_id = $empresa->user_id;

                $dados = array(
                    'peca' => Peca::findOrFail($id),
                    'titulo' => 'Editar Peca',
                    'empresa_id' => $empresa->id,
                    'user_id' => $empresa->user_id,
                );


                return view('pecas.editar', $dados);
            }
        }
    }

    public function update($id, Request $request) {
        $peca = Peca::findOrFail($id);
        $peca->update($request->all());
        \Session::flash('update_ok', 'Peça atualizada com sucesso!');
        return Redirect::to('pecas');
    }

    public function deletar($id, $ids, $empr) {
        $peca = Peca::findOrFail($id);

        $empresas = Empresa::all();
        foreach ($empresas as $empresa) {
            if (Gate::allows('Delete_peca') && auth()->user()->id == $ids && $empresa->id == $empr) {
                try {
                    $peca->delete();
                    \Session::flash('delete_ok', 'Peça excluida com sucesso!');
                    return Redirect::to('pecas');
                } catch (QueryException $e) {
                    \Session::flash('errors', 'O produto possui dados associados a ele !');
                    return view('pecas/index')->with(['titulo' => 'Peca', 'pecas' => Peca::all()]);
                }
            }
        }
    }

    //REPAROS 
    public function cadastrarReparo() {

        $empresa_id;
        $user_id;
        $empresas = Empresa::all();
        $equipamentos = Equipamento::all();
        foreach ($empresas as $empresa) {
            if ($empresa->user_id === auth()->user()->id && Gate::allows('Edit_peca')) {
                $empresa_id = $empresa->id;
                $user_id = $empresa->user_id;

                $dados = array(
                    'titulo' => 'Editar Peca',
                    'empresa_id' => $empresa->id,
                    'user_id' => $empresa->user_id,
                    'equipamentos' => $equipamentos,
                    'pecas' => Peca::all(),
                );


                return view('reparos.realizarReparo', $dados);
            }
        }
    }

    public function insertReparo(Request $request) {
        // $dado[count($request->quantidade)] = array();
        //pegar o objeto equipamento pelo id equipamento findid depois passar no array para exibir ele no resumo, colocar tbm na o valor da mão de obra 

        $equipamento = Equipamento::findOrFail($request->equipamento_id);

        $dataOs = date('d-m-Y', strtotime($request->dataOs));

        $dado = array(
            'quantidade' => $request->quantidade,
            'peca2' => $request->pecaid,
            'pecas' => Peca::all(),
            'equipamento' => $equipamento,
            'dataOs' => $dataOs,
            'maodeobra' => $request->maodeobra
        );

        return view('reparos.formulario', $dado);
    }

    public function concluir(Request $request) {

        $dataOs = date('Y-m-d', strtotime($request->data));
//        dd($dataOs, $request->data);

        $dados = array(
            'equipamento_id' => $request->equipamento,
            'data' => $dataOs,
            'totalpecas' => $request->totalpecas,
            'maodeobra' => $request->maodeobra,
            'valorFinal' => $request->valorFinal,
            'itens' => $request->itens
        );

        $servico = new Servico();
        // pegar o ultimo ID inserido 
        $servico->create($dados);
        $dados = array();
        $servicoID = 0;
        $servicoID = DB::select('SELECT id FROM servicos ORDER BY id DESC LIMIT 1');
        $var = $servicoID[0];

        $pecaidTotal = count($request->pecaid);

        for ($i = 0; $i < $pecaidTotal; $i++) {


            $servicosPecas = array(
                'servico_id' => $var->id,
                'peca_id' => $request->pecaid[$i],
                'quantidade' => $request->quantidade[$i],
                'valorSomaIten' => $request->valorSomaIten[$i]
            );

            $servicoItens = new ServicoPeca();
            $servicoItens->create($servicosPecas);
            $servicosPecas = array();
        }


        return Redirect::to('reparos');
    }

    public function reparos() {
        if (Gate::allows('View_peca')) {
            //consulta retorna detalhes do reparo relacionado ao usuario logado 
            $servico = DB::select('SELECT e.id, e.user_id, e.codigo, e.descricao, e.aquisicao, e.nome as nomes, s.data, s.totalpecas, s.maodeobra, s.valorFinal, s.itens, s.id as idItens
                                        FROM equipamentos AS e  
                                        JOIN servicos AS s ON s.equipamento_id = e.id 
                                        WHERE user_id = ?', [auth()->user()->id], ' ORDER BY s.data ASC');
            $dado = array(
                'servico' => $servico
            );
            return view('reparos.index', $dado);
        } else {
            return view('erro');
        }
    }

    public function detalhesReparo(Request $request) {
      
        if (Gate::allows('View_peca')) {
            //consulta retorna detalhes do reparo relacionado ao usuario logado 
            $servico = DB::select('SELECT e.id, e.user_id, e.codigo, e.descricao, e.aquisicao, e.nome as nomes, s.data, s.id, s.totalpecas, s.maodeobra, s.valorFinal, sp.quantidade, sp.valorSomaIten, s.itens, ps.nome, ps.descricao as descricaopeca, ps.preco
                                        FROM equipamentos AS e  
                                        JOIN servicos AS s ON s.equipamento_id = e.id 
                                        JOIN servico_pecas as sp ON sp.servico_id = s.id 
                                        JOIN pecas AS ps ON ps.id = sp.peca_id
                                        WHERE  sp.servico_id =?', [$request->idIten]);
            $dado = array(
                'servico' => $servico
            );
            
            return view('reparos.detalhes', $dado);
        } else {
            return view('erro');
        }
    }

}
