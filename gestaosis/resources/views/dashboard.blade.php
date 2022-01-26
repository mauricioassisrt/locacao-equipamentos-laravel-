@can('menu_empresa')
@php
//total de locacoes mes realizado
$totalMes =0;
foreach($resultado as $resultados){
if($resultados->equipamento->user_id == Auth::user()->id)
$totalMes++;
}
//locacoes sem finalizar
$semFinalizar = 0;
foreach ($itens as $iten) {
if ($iten->equipamento->user_id == Auth::user()->id && $iten->status ==1) 

$semFinalizar++;
}
$valorTotal = 0;
foreach($resultado1 as $resultados1){
if ($resultados1->periodo->id_user == Auth::user()->id ) {

$valorTotal = $valorTotal+$resultados1->periodo->valor;
}

}
//total de equipamentos por cliente
$totalEqui = 0;
foreach ($equipamentos as $equipamento) {
if ($equipamento->user_id == Auth::user()->id) 

$totalEqui++;
}
$totaLocadores = 0;
foreach ($locadors as $locador) {
if ($locador->user_id == Auth::user()->id) 

$totaLocadores++;
}

@endphp
@endcan
@extends('adminapp')

@section('content')
<style type="text/css">
    #mymap {

        width: 100%;
        height: 500px;
    }
</style>



<section class="content">

    <div class="box box-primary">

        <div class="box-header with-border">
            <span class="glyphicon glyphicon-scale">
                <h3 class="box-title ">Painel Principal </h3>
            </span>

        </div>

        <div class="box-header">
            <div class="row">
                <div class="col-md-12">
                    @if($errors->any())
                    <div class="alert alert-warning">
                        <strong>ATENÇÃO!</strong> {{$errors->first()}}
                    </div>

                    @endif
                    <div class="row">
                        @if(Session::has('autentica_ok'))
                        <div class="col-md-12">

                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-check"></i> Autenticado!</h4>
                                {{Session::get('autentica_ok')}}
                            </div>

                        </div>
                        @endif
                        @can('View_user')
                        <div class="col-md-6">
                            <div class="panel panel-default">


                                <div class="panel-body">
                                    <span class="glyphicon glyphicon-user gi-4x pull-left"></span>

                                    <h2 class="text-center">Usuarios <span class="label label-info">
                                            {{$total_user}}</span></h2>
                                </div>
                                <div class="panel-footer text-center">
                                    <a href="{{url('/users')}}" class="link_chamada">Ver usuarios <span class="glyphicon glyphicon-circle-arrow-right"></span></a>
                                </div>
                            </div>
                        </div>
                        @endcan

                        @can('View_permission')
                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <span class="glyphicon glyphicon-check gi-4x pull-left"></span><h2 class="text-center">Permissões <span class="label label-info">{{$total_permissions}}</span></h2>
                                </div>
                                <div class="panel-footer text-center">
                                    <a href="{{url('acl/permissions')}}" class="link_chamada">Ver Permissões <span class="glyphicon glyphicon-circle-arrow-right"></span></a>
                                </div>
                            </div>
                        </div>
                        @endcan
                        @can('View_role')
                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <span class="glyphicon glyphicon-file gi-4x pull-left"></span><h2 class="text-center">Funções <span class="label label-info">{{$total_roles}}</span></h2>
                                </div>
                                <div class="panel-footer text-center">
                                    <a href="{{url('acl/roles')}}" class="link_chamada">Ver Funções <span class="glyphicon glyphicon-circle-arrow-right"></span></a>
                                </div>
                            </div>
                        </div>
                        @endcan
                        @can('View_empresa')
                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <span class="glyphicon glyphicon glyphicon-home"></span><h2 class="text-center">Empresas <span class="label label-info">{{$total_empresas}}</span></h2>
                                </div>
                                <div class="panel-footer text-center">
                                    <a href="{{url('empresas')}}" class="link_chamada">Ver Empreas<span class="glyphicon glyphicon-circle-arrow-right"></span></a>
                                </div>
                            </div>
                        </div>
                        @endcan


                    </div>
                    @can('menu_empresa')
                    <div class="col-md-3">

                        <div class="info-box ">
                            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Locadores </span>
                                <span class="info-box-number">
                                    {{$totaLocadores}}
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="info-box">
                            <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Equipamentos</span>
                                <span class="info-box-number">
                                    {{$totalEqui}}
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <div class="col-md-3">
                        <div class="info-box">
                            <span class="info-box-icon bg-red"><i class="fa fa-calendar"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Locações Mês</span>
                                <span class="info-box-number">
                                    {{$totalMes}}
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>

                    <div class="col-md-3">
                        <div class="info-box">
                            <span class="info-box-icon bg-blue"><i class="fa  fa-money"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Lucro Mês</span>
                                <span class="info-box-number">
                                    R$ {{$valorTotal}},00
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>

                    <div class="col-md-12">
<!--                        @if($semFinalizar >=1)
                        <div class="alert alert-warning alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4><i class="icon fa fa-warning"></i> Atenção!</h4>
                            Contém  {{$semFinalizar}}, Locações sem Finalizar! <a href="{{url('locados')}}" class="link_chamada">Ir Para Locações!</a>
                        </div>
                        @endif-->
                        <div  class="col-md-12" >
                            <div id="mymap" class="form-group"></div>
                        </div>
                    </div>

<!--                    <table class="table table-striped table-bordered" style="text-align: center">
                        <thead>
                            <tr>
                                <th style="text-align: center">
                                    Aluguel 
                                </th>
                                <th style="text-align: center">
                                    Vencimento  
                                </th>
                                <th style="text-align: center">
                                    Locador
                                </th>
                                <th style="text-align: center">
                                    Equipamento
                                </th>
                                <th style="text-align: center">
                                    COD
                                </th>
                                <th style="text-align: center">
                                    Endereço
                                </th>

                                <th style="text-align: center">
                                    Status
                                </th>
                                <th style="text-align: center">
                                    Info
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($itens as $iten)

                            @if($iten->locador->user_id === auth()->user()->id && $iten->vencimento==$rest )

                            <tr >
                                <td >

                                    {{date( 'd/m/Y' , strtotime($iten->data_aluguel))}}
                                </td>
                                <td>
                                    {{date( 'd/m/Y' , strtotime($iten->vencimento))}}
                                </td>
                                <td>
                                    {{$iten->locador->nome}}
                                </td>
                                <td>
                                    {{$iten->equipamento->nome}}
                                </td>
                                <td>
                                    {{$iten->equipamento->codigo}}
                                </td>
                                <td>
                                    {{$iten->endereco}}
                                </td>

                                <td>
                                    @if($iten->status == 1)
                                    <a href="{{url('/locados')}}" class="btn btn-danger">


                                        </span>Finalizar </a>


                                    @else
                                    Locação Finalizada 
                                    {!! Form::close() !!}
                                    @endif
                                </td>
                                <td>
                                    <button type="button" class=" btn btn-default " data-toggle="modal" data-target="#modal-info-{{$iten->id}}"  >
                                        Detalhes
                                    </button>

                                    <div class="modal fade" id="modal-info-{{$iten->id}}" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span></button>
                                                    <h4 class="modal-title">Informações da Locação </h4>
                                                </div>
                                                <div class="modal-body">
                                                    <label  class="col-sm-4 control-label">Data de Aluguel</label>   {{date( 'd/m/Y' , strtotime($iten->data_aluguel))}}<br/>

                                                </div>
                                                <div class="modal-body">
                                                    <label  class="col-sm-4 control-label">Vencimento</label>   {{date( 'd/m/Y' , strtotime($iten->vencimento))}}<br/>
                                                </div>
                                                <div class="modal-body">

                                                    <label  class="col-sm-4 control-label">Cliente </label>  {{$iten->locador->nome}}<br/>

                                                </div>
                                                <div class="modal-body">

                                                    <label  class="col-sm-4 control-label">Localização </label>  {{$iten->endereco}}<br/>
                                                </div>
                                                <div class="modal-footer">

                                                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Fechar  </button>
                                                </div>
                                            </div>
                                             /.modal-content 
                                        </div>
                                         /.modal-dialog 
                                    </div>
                                    {!! Form::close() !!}
                                </td>

                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>-->
                    <script type="text/javascript">

                              
                        var locations =  <?php foreach  ($itens as $iten){
                            
                                 if($iten->locador->user_id === auth()->user()->id && $iten->vencimento==$rest && $iten->status==1 ){
                                     $todLocacoes[$iten->id] = array( 
                                        'nome' =>$iten->locador->nome,
                                        'lat' => $iten->lat,
                                        'lng' => $iten->lng,
                                        'endereco' => $iten->endereco,
                                      'vencimento' =>  date( 'd/m/Y' , strtotime($iten->vencimento)));
                           
                            }
                        } 
                       if(!empty($todLocacoes)){
                        print_r(json_encode($todLocacoes)); 
                           
                       }else{
                             print_r(json_encode($tes='')); 
                       }
                       
                        ?>;
                                
                                    
                     
                        //consuta com todos os clientes ai comparar o id do cliente é igual o id do cliente na locação 
                        
                        var mymap = new GMaps({
                            el: '#mymap',
                            lat:<?php print_r(json_encode($lat))?>,
                            lng:<?php print_r(json_encode($lng))?>,
                            zoom: 15

                        });


                        $.each(locations, function (index, value) {
                          
                            mymap.addMarker({
                                lat: value.lat,
                                lng: value.lng,
                                title: value.city,
                                infoWindow: {
                                content:'Cliente: '+ value.nome + '<br/> Endereço ' + value.endereco+' <br/> Vence na data '+value.vencimento+'<br/> <a href="{{url('locados')}}" class="link_chamada">Ir Para Locações!</a>'
                                }
                           
                            });
                        });




                    </script>
                    @endcan




                </div>
            </div>
        </div>

    </div>
</section>
@endsection
