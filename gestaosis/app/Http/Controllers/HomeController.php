<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Permission;
use App\Role;
use Carbon\Carbon;
use App\Empresa;
use App\Locador;
use App\Equipamento;
use App\Iten;
use Gate;
use Illuminate\Support\Facades\Auth;
use App\notice;

class HomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        return view('home');
    }

    public function erro() {
        return view('erro');
    }

    public function sem() {
        return view('sem');
    }

    public function dashboard() {


        if (Gate::allows('menu_empresa')) {
            $locadors = Locador::all();

            $equipamentos = Equipamento::all();
            $mytime = Carbon::now();
            $timeConvert1 = strtotime($mytime);
            $mesAtual = $mytime->format('m');

            if ($mesAtual == 1) {
                $from = date('Y-m-1');
                $to = date('Y-m-31');
                $resultado = Iten::whereBetween('vencimento', [$from, $to])->get();
                $resultado1 = Iten::whereBetween('vencimento', [$from, $to])->get();

                $rest = date('Y-m-d', $timeConvert1);
                //   dd('no if');
            } else if ($mesAtual == 2) {
                $from = date('Y-m-1');
                $to = date('Y-m-28');
                $resultado = Iten::whereBetween('vencimento', [$from, $to])->get();
                $resultado1 = Iten::whereBetween('vencimento', [$from, $to])->get();
                $rest = date('Y-m-d', $timeConvert1);
            } else if ($mesAtual == 3) {
                $from = date('Y-m-1');
                $to = date('Y-m-31');
                $resultado = Iten::whereBetween('vencimento', [$from, $to])->get();
                $resultado1 = Iten::whereBetween('vencimento', [$from, $to])->get();
                $rest = date('Y-m-d', $timeConvert1);
            } else if ($mesAtual == 4) {
                $from = date('Y-m-1');
                $to = date('Y-m-30');
                $resultado = Iten::whereBetween('vencimento', [$from, $to])->get();
                $resultado1 = Iten::whereBetween('vencimento', [$from, $to])->get();
                $rest = date('Y-m-d', $timeConvert1);
            } else if ($mesAtual == 5) {
                $from = date('Y-m-1');
                $to = date('Y-m-31');
                $resultado = Iten::whereBetween('vencimento', [$from, $to])->get();
                $resultado1 = Iten::whereBetween('vencimento', [$from, $to])->get();
                $rest = date('Y-m-d', $timeConvert1);
            } else if ($mesAtual == 6) {
                $from = date('Y-m-1');
                $to = date('Y-m-30');
                $resultado = Iten::whereBetween('vencimento', [$from, $to])->get();
                $resultado1 = Iten::whereBetween('vencimento', [$from, $to])->get();
                $rest = date('Y-m-d', $timeConvert1);
            } else if ($mesAtual == 7) {
                $from = date('Y-m-1');
                $to = date('Y-m-31');
                $resultado = Iten::whereBetween('vencimento', [$from, $to])->get();
                $resultado1 = Iten::whereBetween('vencimento', [$from, $to])->get();
                $rest = date('Y-m-d', $timeConvert1);
            } else if ($mesAtual == 8) {
                $from = date('Y-m-1');
                $to = date('Y-m-31');
                $resultado = Iten::whereBetween('vencimento', [$from, $to])->get();
                $resultado1 = Iten::whereBetween('vencimento', [$from, $to])->get();
                $rest = date('Y-m-d', $timeConvert1);
            } else if ($mesAtual == 9) {

                $from = date('Y-m-1');
                $to = date('Y-m-30');
                $resultado = Iten::whereBetween('vencimento', [$from, $to])->get();
                $resultado1 = Iten::whereBetween('vencimento', [$from, $to])->get();
                $rest = date('Y-m-d', $timeConvert1);
            } else if ($mesAtual == 10) {

                $from = date('Y-m-1');
                $to = date('Y-m-31');
                $resultado = Iten::whereBetween('vencimento', [$from, $to])->get();
                $resultado1 = Iten::whereBetween('vencimento', [$from, $to])->get();
                $rest = date('Y-m-d', $timeConvert1);
            } else if ($mesAtual == 11) {
                $from = date('Y-m-1');
                $to = date('Y-m-30');
                $resultado = Iten::whereBetween('vencimento', [$from, $to])->get();
                $resultado1 = Iten::whereBetween('vencimento', [$from, $to])->get();
                $rest = date('Y-m-d', $timeConvert1);
            } else if ($mesAtual == 12) {
                $from = date('Y-m-1');
                $to = date('Y-m-31');
                $resultado = Iten::whereBetween('vencimento', [$from, $to])->get();
                $resultado1 = Iten::whereBetween('vencimento', [$from, $to])->get();
                $rest = date('Y-m-d', $timeConvert1);
            }
            $empresas = Empresa::all();
            $lat;
            $lng;
            foreach ($empresas as $empresa) {
                if ($empresa->user_id === auth()->user()->id) {
                    $lat = $empresa->lat;
                    $lng = $empresa->lng;
                }
            }

            $dados = array(
                'titulo' => 'Dashboard',
                'locadors' => $locadors,
                'equipamentos' => $equipamentos,
                'itens' => Iten::all(),
                'rest' => $rest,
                'resultado1' => $resultado1,
                'resultado' => $resultado,
                'from' => $from,
                'to' => $to,
                'lat' => $lat,
                'lng' => $lng
            );

            return view('dashboard', $dados);
        } else {
            $dados = array(
                'titulo' => 'Dashboard',
                'total_user' => User::count(),
                'total_permissions' => Permission::count(),
                'total_roles' => Role::count(),
                'total_empresas' => Empresa::count(),
            );
            return view('dashboard', $dados);
        }
    }

}
