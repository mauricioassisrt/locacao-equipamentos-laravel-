<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Iten;
use App\Equipamento;
use App\Periodo;
use App\Locador;
use App\FormaPagamento;
use Redirect;
use Gate;
use App\Empresa;
use Carbon\Carbon;
use DateTime;

class ControlerIten extends Controller {

    //  private $pagination = 8;
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {

        if (Gate::allows('View_Iten')) {
            $equipamento = Equipamento::all();
            $periodo = Periodo::all();
            $locador = Locador::all();
            $forma = FormaPagamento::all();
            $dados = array(
                'titulo' => 'Locações ',
                'itens' => Iten::orderBy('vencimento', 'desc')->get(),
                'equipamentos' => $equipamento,
                'periodos' => $periodo,
                'locadors' => $locador,
                'formas' => $forma);
            return view('itens.index', $dados);
        } else {
            return view('erro');
        }
    }

    public function cadastrar() {
        if (Gate::allows('Insert_locacao')) {
            $equipamento = Equipamento::all();
            $periodo = Periodo::all();
            $locador = Locador::all();
            $forma = FormaPagamento::all();
            $empresas = Empresa::all();

            foreach ($empresas as $empresa) {
                if ($empresa->user_id === auth()->user()->id) {
                    $lat = $empresa->lat;
                    $lng = $empresa->lng;
                }
            }
            $dados = array('titulo' => 'Adicionar nova Locação ',
                'equipamentos' => $equipamento,
                'periodos' => $periodo,
                'locadors' => $locador,
                'formas' => $forma,
                'lat' => $lat,
                'lng' => $lng);
            return view('itens.formulario', $dados);
        } else {
            return view('erro');
        }
    }

    public function insert(Request $request) {

        $iten = new Iten();
        $dataAlguel = $request->data_aluguel;
        $vencimento = $request->vencimento;

        $timeConvert1 = strtotime($dataAlguel);
        $timeConvert1Vencimento = strtotime($vencimento);

        $data_aluguel = date('Y/m/d', $timeConvert1);
        $vencimento1 = date('Y/m/d', $timeConvert1Vencimento);
        $lat = (float) $request->lat;
        $lng = (float) $request->lon;

        $dados = array('equipamento_id' => $request->equipamento_id, 'periodo_id' => $request->periodo_id, 'locador_id' => $request->locador_id,
            'forma_pagamento_id' => $request->forma_pagamento_id, 'data_aluguel' => $data_aluguel, 'lat' => $lat, 'lng' => $lng, 'status' => $request->status, 'vencimento' => $vencimento1, 'endereco' => $request->endereco, 'cep' => $request->cep,);

        $equipamento = Equipamento::findOrFail($request->equipamento_id);
        $equipamento->update($request->all());

        $iten = $iten->create($dados);

        return Redirect::to('locados');
    }

    public function update($id, Request $request) {

        $equipamento = Equipamento::findOrFail($id);
        $dataAlguel = $request->data_aluguel;
        $vencimento = $request->vencimento;

        $timeConvert1 = strtotime($dataAlguel);
        $timeConvert1Vencimento = strtotime($vencimento);
        $itens = Iten::findOrFail($request->idIten);

        $data_aluguel = date('Y-m-d', $timeConvert1);
        $vencimento1 = date('Y-m-d', $timeConvert1Vencimento);
        $dados = array('equipamento_id' => $equipamento->id, 'periodo_id' => $itens->periodo_id, 'locador_id' => $itens->locador_id,
            'forma_pagamento_id' => $itens->forma_pagamento_id, 'data_aluguel' => $data_aluguel, 'status' => $request->status, 'vencimento' => $vencimento1, 'endereco' => $itens->endereco, 'cep' => $itens->cep,);





        $itens->update($dados);

        $equipamento->update($request->all());
        \Session::flash('update_ok', 'Locação Atualizada com Sucesso, o Equipamento está disponivel para uma nova locação!!');

        return Redirect::to('locados');
    }

    public function deletar($id, Request $request) {
        // atribui o ID vindo e busca no banco o registro com o id correspondente,
        $iten = Iten::findOrFail($id);
        //verifica se o User Logado é igual ao User relacionado ao registro ao banco
        if (Gate::allows('Delete_periodo') && $iten->periodo->id_user === auth()->user()->id) {
            $equipamento = Equipamento::findOrFail($request->equipamento_id);
            $equipamento->update($request->all());
            $iten->delete();
            \Session::flash('delete_ok', 'Locação Cancelada excluido com sucesso!');
            return Redirect::to('locados');
        } else {

            return view('erro');
        }
    }

}
