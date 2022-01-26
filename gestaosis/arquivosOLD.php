SMTP
https://stackoverflow.com/questions/27721120/laravel-connection-could-not-be-established-with-host-smtp-gmail-com-0
// verifico o ID vindo pela URL está no banco de dados e verifico se o id do user auth é igual ao id vindo
if ($id == $empresas->user_id && auth()->user()->id == $id) {

Messagem de email alterar e alterar porta localhost
arquivo .en altera APP URL
https://stackoverflow.com/questions/39327954/laravel-5-3-redefine-reset-email-blade-template

GITHUB do projeto pronto de ACL simples

https://github.com/DutraLucas/Laravel_acl

novo projeto

composer install
php -r "copy('.env.example', '.env');
php artisan key:generate


caso de problema a hr que for dar php artisan serve  rodar esse comando

composer require barryvdh/laravel-dompdf


APP_NAME='Gestão de Equipamentos '
APP_ENV=local
APP_KEY=base64:Ss9BlkNMMzQvLXjwg5yH/M+/71DN1AgHLzICeiucLjY=
APP_DEBUG=true
APP_URL=http://localhost:8000

LOG_CHANNEL=stack

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=aclteste
DB_USERNAME=root
DB_PASSWORD=

BROADCAST_DRIVER=log
CACHE_DRIVER=file
SESSION_DRIVER=file
SESSION_LIFETIME=120
QUEUE_DRIVER=sync

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_DRIVER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=465
MAIL_USERNAME=evento.tads@gmail.com
MAIL_PASSWORD=tads2016
MAIL_ENCRYPTION=ssl
name=TESTE

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"


insert into `itens` (`equipamento_id`, `periodo_id`, `locador_id`, `forma_pagamento_id`, `data_aluguel`, `status`, `vencimento`, `endereco`, `cep`, `created_at`, `updated_at`)
values ('6', '11', '4', '3', '2018-08-27', '0', '2018-08-27', 'rua doutor josé de matos filho, 200', '87711350', NULL, NULL)

insert into `itens` (`equipamento_id`, `periodo_id`, `locador_id`, `forma_pagamento_id`, `data_aluguel`, `status`, `vencimento`, `endereco`, `cep`, `updated_at`, `created_at`) 
values ('6', '11', '4', '12,' '2018/09/01', '0', '2018/09/12', 'rua doutor josé de matos filho, 200', '87711350', '2018-08-29 13:09:55','2018-08-29 13:09:55')

DB_CONNECTION=mysql
DB_HOST=db4free.net
DB_PORT=3306
DB_DATABASE=id5810964projeto    
DB_USERNAME=id5810964_root
DB_PASSWORD=12345678




$equipamento = Equipamento::findOrFail($id);

$itens = new Iten();
$dataAlguel = $request->data_aluguel;
$vencimento = $request->vencimento;

$timeConvert1 = strtotime($dataAlguel);
$timeConvert1Vencimento = strtotime($vencimento);

$data_aluguel = date('Y/m/d', $timeConvert1);
$vencimento1 = date('Y/m/d', $timeConvert1Vencimento);

$dados = array('equipamento_id' => $request->equipamento_id, 'periodo_id' => $request->periodo_id, 'locador_id' => $request->locador_id,
'forma_pagamento_id' => $request->forma_pagamento_id, 'data_aluguel' => $data_aluguel, 'status' => $request->status, 'vencimento' => $vencimento1, 'endereco' => $request->endereco, 'cep' => $request->cep,);

$equipamento = Equipamento::findOrFail($request->equipamento_id);
$equipamento->update($request->all());

$itens = Iten::findOrFail($request->idIten);

dd($itens);
$itens->update($dados);

$equipamento->update($request->all());
\Session::flash('update_ok', 'Locação Finalizada com Sucesso, o Equipamento está disponivel para uma nova locação!!');

return Redirect::to('locados');
,





<td>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-finaliza-{{$peca->id}}">
        Finalizar
    </button>




    <div class="modal fade" id="modal-finaliza-{{$peca->id}}" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Adicionar quantidade </h4>
                </div>
                <div class="modal-body">
                    <input type="text" name="campos[]" />
                    <input type="hidden"  name="idIten" value="{{$peca->id}}">
                    <input type="hidden"  name="vencimento" value="{{ $iten->vencimento}}">
                    <input type="hidden"  name="data_aluguel" value="{{ $iten->data_aluguel}}">

                </div>
                <div class="modal-footer">
                    <button type="submit"  class="btn btn-primary pull-left">Sim </button>
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Não </button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

</td>


<?php
$res = array(
    'peca' => $peca->id,
    'nome' => $peca->nome,
);
print_r(json_encode($res))
?>


public function insertReparo(Request $request) {
$dado[count($request->quantidade)] = array();


for ($i = 0; $i <= count($request->quantidade); $i++) {
$dado = array(
'quantidade' => $request->quantidade,
'peca'=> $request->pecaid,
'equipamento' => $request->equipamento_id,
);

}

return view('reparos.formulario', $dado);
}


SELECT *
FROM equipamentos AS e 
JOIN servicos AS s ON s.equipamento_id = e.id WHERE user_id = 13

//consulta retorna detalhes do reparo relacionado ao usuario logado 
//        $servico = DB::table('equipamentos')
//                ->select()
//                ->join('servicos', 'servicos.equipamento_id', '=', 'equipamentos.id')
//                ->where('user_id', auth()->user()->id)
//                ->get();
//->join('servicos', 'servicos.equipamento_id', '=', 'equipamentos.id')
                ->join('servico_pecas', 'servico_pecas.servico_id', '=', 'servicos.id')
                ->join('pecas', 'pecas.id', '=', 'servico_pecas.peca_id')
                ->where('user_id', auth()->user()->id)
                
                
                SELECT e.id, e.user_id, e.codigo, e.descricao, e.aquisicao, e.nome as nomes, s.data, s.totalpecas, s.maodeobra, s.valorFinal, sp.quantidade, sp.valorSomaIten, s.itens, ps.nome, ps.descricao, ps.preco
                                        FROM equipamentos AS e  
                                        JOIN servicos AS s ON s.equipamento_id = e.id 
                                        JOIN servico_pecas as sp ON sp.servico_id = s.id 
                                        JOIN pecas AS ps ON ps.id = sp.peca_id
                                        WHERE user_id = ?', [auth()->user()->id], ' ORDER BY s.data ASC
                                        
                                        
                                        SELECT e.id, e.user_id, e.codigo, e.descricao, e.aquisicao, e.nome as nomes, s.data, s.totalpecas, s.maodeobra, s.valorFinal, sp.quantidade, sp.valorSomaIten, s.itens, ps.nome, ps.descricao, ps.preco FROM equipamentos AS e JOIN servicos AS s ON s.equipamento_id = e.id
                                       	JOIN servico_pecas as sp ON sp.servico_id = s.id 
                                        JOIN pecas AS ps ON ps.id = sp.peca_id
                                        WHERE sp.servico_id =123
                                        
                                        //retorna um reparo feito pela detererminada ordem de serviço 
                                        
                                        SELECT e.id, e.user_id, e.codigo, e.descricao, e.aquisicao, e.nome as nomes, s.data, s.totalpecas, s.maodeobra, s.valorFinal, sp.quantidade, sp.valorSomaIten, s.itens, ps.nome, ps.descricao, ps.preco
                                        FROM equipamentos AS e  
                                        JOIN servicos AS s ON s.equipamento_id = e.id 
                                        JOIN servico_pecas as sp ON sp.servico_id = s.id 
                                        JOIN pecas AS ps ON ps.id = sp.peca_id
                                        WHERE  sp.servico_id =121
                                        
                                        
                                      