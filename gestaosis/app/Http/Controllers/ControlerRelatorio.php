<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Equipamento;
use App\Iten;
use Gate;
use Carbon\Carbon;
use DB;

class ControlerRelatorio extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index2() {
        $equipamentos = Equipamento::all();

        return \PDF::loadView('pdf.relatorio', compact('equipamentos'))
                        // Se quiser que fique no formato a4 retrato: ->setPaper('a4', 'landscape')
                        ->stream();
        ('nome-arquivo-pdf-gerado.pdf');
    }

    public function faturamentoEquip() {
        if (Gate::allows('View_relatorio')) {
            $equipamento = Equipamento::all();
            $dados = array('titulo' => 'Relatorio de Faturamento Por Equipamento ',
                'equipamentos' => $equipamento
            );
            return view('relatorios.porequipamento', $dados);
        } else {
            return view('erro');
        }
    }

    public function emitirfaturamentoEquipamento(Request $request) {
        $inicial = $request->inicial;
        $final = $request->final;
        $equipamento = Equipamento::findOrFail($request->equipamento_id);

        $inicialConvert1 = strtotime($inicial);
        $finalConvert = strtotime($final);

        $inicalC = date('Y-m-d', $inicialConvert1);
        $finalC = date('Y-m-d', $finalConvert);
        $itens = Iten::whereBetween('vencimento', [$inicalC, $finalC])->get();


        $dados = array('inicial' => $inicial,
            'final' => $final,
            'itens' => $itens,
            'equipamento' => $equipamento);

        return view('pdf.balancoEquipamento', $dados);
        // Se quiser que fique no formato a4 retrato: ->setPaper('a4', 'landscape')
//                        ->stream();
//        ('nome-arquivo-pdf-gerado.pdf');
    }

    public function faturamento() {
        if (Gate::allows('View_relatorio')) {

            $dados = array('titulo' => 'Relatorio de Faturamento Por periodo ',);
            return view('relatorios.balanco', $dados);
        } else {
            return view('erro');
        }
    }

    public function emitirfaturamento(Request $request) {
        $inicial = $request->inicial;
        $final = $request->final;

        $inicialConvert1 = strtotime($inicial);
        $finalConvert = strtotime($final);

        $inicalC = date('Y-m-d', $inicialConvert1);
        $finalC = date('Y-m-d', $finalConvert);

        $resultado = Iten::whereBetween('vencimento', [$inicalC, $finalC])->get();

        $dados = array('referencia' => $inicial,
            'referencia2' => $final,
        );


        return \PDF::loadView('pdf.relatorio', compact('resultado'), $dados)
                        // Se quiser que fique no formato a4 retrato: ->setPaper('a4', 'landscape')
                        ->stream();
        ('nome-arquivo-pdf-gerado.pdf');
    }

    public function emitirEquipamento(Request $request) {
        if (Gate::allows('View_peca')) {
            //consulta retorna detalhes do reparo relacionado ao usuario logado 
            $servico = DB::select('SELECT e.id, e.user_id, e.codigo, e.descricao, e.aquisicao, e.nome as nomes, s.data, s.id, s.totalpecas, s.maodeobra, s.valorFinal, sp.quantidade, sp.valorSomaIten, s.itens, ps.nome, ps.descricao as descricaopeca, ps.preco
                                        FROM equipamentos AS e  
                                        JOIN servicos AS s ON s.equipamento_id = e.id 
                                        JOIN servico_pecas as sp ON sp.servico_id = s.id 
                                        JOIN pecas AS ps ON ps.id = sp.peca_id
                                        WHERE  sp.servico_id =?', [$request->id]);
            $dados = array(
                'servico' => $servico
            );
           
            return \PDF::loadView('pdf.reparo', compact('resultado'), $dados)
                            // Se quiser que fique no formato a4 retrato: ->setPaper('a4', 'landscape')
                            ->stream();
            ('nome-arquivo-pdf-gerado.pdf');
        } else {
            return view('erro');
        }
    }

    public function mensal() {
        if (Gate::allows('View_relatorio')) {

            $dados = array('titulo' => 'Relatorio por Periodos',);
            return view('relatorios.formulario', $dados);
        } else {
            return view('erro');
        }
    }

    public function emitirmensal(Request $request) {
        $inicial = $request->inicial;
        $final = $request->final;

        $inicialConvert1 = strtotime($inicial);
        $finalConvert = strtotime($final);

        $inicalC = date('Y-m-d', $inicialConvert1);
        $finalC = date('Y-m-d', $finalConvert);
        $equipamento = Iten::whereBetween('vencimento', [$inicalC, $finalC])->get();


        $dados = array('inicial' => $inicial,
            'final' => $final,
            'equipamento' => $equipamento);

        return view('pdf.balanco', $dados);
        // Se quiser que fique no formato a4 retrato: ->setPaper('a4', 'landscape')
//                        ->stream();
//        ('nome-arquivo-pdf-gerado.pdf');
    }

}
