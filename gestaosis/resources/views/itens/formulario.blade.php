@extends('adminapp')

@section('content')
<script type="text/javascript">

    var map;

    $(document).ready(function () {

        map = new GMaps({
            el: '#map',
            lat:<?php print_r(json_encode($lat)) ?>,
            lng:<?php print_r(json_encode($lng)) ?>,
        });
        map.setContextMenu({
            control: 'map',
            options: [{
                    title: 'Adicionar local',
                    name: 'add_marker',
                    action: function (e) {
                        this.addMarker({
                            lat: e.latLng.lat(),
                            lng: e.latLng.lng(),
                            title: 'Local Atual'
                        });
                        document.getElementById("lat").value = e.latLng.lat().toFixed(5);
                        document.getElementById("lon").value = e.latLng.lng().toFixed(5);
                    }
                }, {
                    title: 'Centralizar ',
                    name: 'center_here',
                    action: function (e) {
                        this.setCenter(e.latLng.lat(), e.latLng.lng());
                    }
                }]
        });
        $('#geocoding_form').submit(function (e) {
            e.preventDefault();

            GMaps.geocode({
                address: $('#address').val().trim(),
                callback: function (results, status) {
                    if (status == 'OK') {
                        var latlng = results[0].geometry.location;
                        map.setCenter(latlng.lat(), latlng.lng());
                        map.addMarker({
                            lat: latlng.lat(),
                            lng: latlng.lng()
                        });
                        document.getElementById("lat").value = latlng.lat().toFixed(5);
                        document.getElementById("lon").value = latlng.lng().toFixed(5);
                        var x = document.getElementById("address").value;
                        document.getElementById("endereco").value = x;
                    }
                }
            });

        });
    });
</script>
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">{{$titulo}}</h3>



        </div>

        <div class="box-header">
            <a href="{{url('/locados')}}" class="btn btn-danger">
                <span class="fa fa-arrow-left">

                </span> Voltar </a>


        </div>

        {!! Form::open(['url' => 'locarEquipamento/insert']) !!}

        <div class="box-body">
            <div class="callout callout-success" translate="true">

                <h4 >Atenção!</h4>

                <h5>Nesta página pode-se realizar a locação de um iten.   </h5>
            </div>

            <div class="row">

                <div class="col-md-3">
                    <div class="form-group">
                        <label>Equipamento</label>
                        <select class="form-control select2 select2-hidden-accessible" name="equipamento_id"  style="width: 100%;" tabindex="-1" aria-hidden="true" required="true">
                            @foreach($equipamentos as $equipamento)
                            @if($equipamento->user_id === auth()->user()->id &&  $equipamento->status ==0)
                            <option   value="{{$equipamento->id}}"  >{{$equipamento->nome}}-{{$equipamento->codigo}}</option>
                            @endif
                            @endforeach

                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Locador </label>
                        <select class="form-control select2 select2-hidden-accessible" name="locador_id" style="width: 100%;" tabindex="-1" aria-hidden="true"  required="true">
                            @foreach($locadors as $locador)
                            @if($locador->user_id === auth()->user()->id)
                            <option value="{{$locador->id}}">{{$locador->nome}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-group">
                        <label></label><br/>  
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-novo">
                            <span class="fa fa-plus"></span> 
                        </button>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Periodo </label>
                        <select class="form-control select2 select2-hidden-accessible" name="periodo_id"  style="width: 100%;" tabindex="-1" aria-hidden="true"  required="true">
                            @foreach($periodos as $periodo)
                            @if($periodo->id_user === auth()->user()->id)
                            <option   value="{{$periodo->id}}">{{$periodo->nome}}--R${{$periodo->valor}},00</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Forma de Pagamento </label>
                        <select class="form-control select2 select2-hidden-accessible" name="forma_pagamento_id" style="width: 100%;" tabindex="-1" aria-hidden="true"  required="true">
                            @foreach($formas as $forma)

                            <option   value="{{$forma->id}}">{{$forma->tipoPagamento}}</option>

                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <label>Data Aluguel</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control"  id="datepicker" data-inputmask="'alias': 'dd-mm-yyyy'" data-mask=""name="data_aluguel" required="true" >
                    </div>               
                </div>
                <div class="col-md-6">
                    <label>Data Vencimento</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control"  id="datepicker1"   data-inputmask="'alias': 'dd-mm-yyyy'" data-mask="" name="vencimento"  required="true">
                    </div>               
                </div>

                <div class="col-md-12">
                    <label>Endereço de Locação</label>
                    <input type="text" class="form-control"  placeholder="Rua Avenida e o Número" name="endereco"  id="endereco"  required="true"> 
                    <input type="hidden"  name="status" value="1">
                    <input type="hidden"  name="user_id" value="{{auth()->user()->id}}">
                </div>
                <!--                <div class="col-md-2">
                                    <label>CEP</label>
                
                                    <input type="text" name="cep" class="form-control" id="cep" placeholder="Digite o do local." required="true" >
                                   
                                </div>-->
                <div class="col-md-6">

                    Lat: <input type="text"   class="form-control" id='lat' name="lat">

                </div>
                <div class="col-md-6">

                    Lon: <input type="text" class="form-control" id='lon' name="lon">


                </div>
                <div class="col-md-10">
                    <br/>
                    <button type="submit" class="btn btn-success"> Locar Equipamento 
                    </button>

                </div>
            </div>

            <hr>
            {!! Form::close() !!}   
            <div class="callout callout-danger" translate="true">

                <h4 >Atenção!</h4>

                <h5>Após digitar a localização tecle ENTER e Informe o endereço do cliente o mais exato possivel, se não for possivel encontrar a localização digitada clique com o botão direito do mouse e selecione Adicionar local !.   </h5>
            </div>
            <form method="post" id="geocoding_form">



                <div  class="col-md-12" >

                    <label></label>    
                    <input type="search" id="address" class="form-control"  name="endereco" placeholder="Digite nome da rua número " />


                </div>




                <!-- REFERENCES -->



            </form>

            <div  class="col-md-12" >
                <label></label>
            </div>
            <div id="map"></div>


        </div>
    </div>


</div>

<!-- /.row -->

<!-- /.box-body -->
<div class="modal fade" id="modal-novo" style="display: none;">
    <div class="modal-dialog primary">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Novo Locador</h4>
            </div>
            <div class="modal-body">




                <div class="box-body">
                    @can('Edit_locador')
                    <div class="alert alert-info alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-info"></i> Informe o Novo Cliente de sua Empresa a ser Cadastrado !</h4>
                        Informe todos os dados necessarios para realizar o cadastro !!
                    </div>
                    @endcan

                    <div class="row">
                        <div class="col-md-12">
                            @if(Request::is('*/editar/*'))
                            {!! Form::model($locador, ['method' => 'PATCH', 'url' => 'locadors/update/'.$locador->id]) !!}
                            @else
                            {!! Form::open(['url' => 'locadors/insertIten']) !!}
                            @endif
                            <div class="form-group">
                                <label>Nome do Locador </label>
                                <input type="text" name="nome" class="form-control" placeholder="Digite o nome ou Razão Social ." 
                                       @if(Request::is('*/editar/*')) value="{{$locador->nome}}"
                                       @endif required="">

                            </div>
                            <div class="form-group">
                                <label>Observações </label>
                                <input type="text" name="obs" class="form-control" placeholder="Alguma informação que seja necessario anotar." 
                                       @if(Request::is('*/editar/*')) value="{{$locador->obs}}"
                                       @endif required="">

                            </div>
                            @can('Edit_locador')
                            <div class="alert alert-success alert-info">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-info"></i> Utilize ou CNPJ ou CPF  !</h4>
                                <h5> Informe na Opção Tipo de Empresa como opção desejada !!</h5>
                            </div>
                            @endcan
                            <div class="form-group">
                                <label class="control-label">Tipo de Empresa</label>
                                <label class="radio-inline">

                                    <input type="radio" name="tipoempresa" id="tipoempresa" checked="checked" value="cpf"> CPF
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="tipoempresa" id="tipoempresa" value="cnpj"> CNPJ
                                </label>
                            </div>
                            <div class="form-group ">

                                <div class="row">


                                    <div class="col-md-12" id="cpf" style="display: block;">
                                        <div class="form-group ">
                                            <label class="control-label" >CPF</label>
                                            <input type="text"  name="cpf" id="cpf1" class="form-control" placeholder="Digite o cpf da empresa." @if(Request::is('*/editar/*')) value="{{$locador->cpf}}" @endif>

                                        </div>
                                        <div class="form-group">
                                            <label>RG</label>
                                            <input type="text" name="rg" id="rg1" class="form-control" placeholder="Digite o RG da empresa." @if(Request::is('*/editar/*')) value="{{$locador->rg}}" @endif >

                                        </div>
                                    </div>

                                    <div class="col-md-12" id="cnpj" style="display: none;">
                                        <div class="form-group ">
                                            <label class="control-label" >CNPJ</label>
                                            <input type="text"  name="cnpj" id="cnpj1"  maxlength="150" class="form-control" data-inputmask=""mask": "(999) 999-9999"" placeholder="Digite o CNPJ empresa." @if(Request::is('*/editar/*')) value="{{$locador->nome}}" @endif >
                                        </div>
                                        <div class="form-group">
                                            <label>Inscrição Estadual </label>
                                            <input type="text" name="ie" class="form-control" placeholder="Digite a Inscrição estadual caso houver!." @if(Request::is('*/editar/*')) value="{{$locador->ie}}" @endif >

                                        </div>
                                    </div>


                                </div>
                            </div>


                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control" placeholder="Digite o Email ." @if(Request::is('*/editar/*')) value="{{$locador->email}}" @endif >

                            </div>
                            <div class="input-group">

                                <div class="input-group-addon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <input type="text" class="form-control" data-inputmask="&quot;mask&quot;: &quot;(99) 99999-9999&quot;" data-mask="" placeholder="Telefone" name="telefone" @if(Request::is('*/editar/*')) value="{{$locador->telefone}}" @endif>
                            </div>

                            <div class="form-group">
                                <label>Endereço</label>
                                <input type="text" name="endereco" class="form-control" placeholder="Digite o Endereço da empresa." @if(Request::is('*/editar/*')) value="{{$locador->endereco}}" @endif required="">

                            </div>
                            <div class="form-group">
                                <label>Cidade</label>
                                <input type="text" name="cidade" class="form-control" placeholder="Digite a cidade da empresa." value="Paranavaí" @if(Request::is('*/editar/*')) value="{{$locador->cidade}}" @endif required="">

                            </div>


                            <div class="form-group">
                                <label>Estado</label>

                                <select name="estado" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true"  @if(Request::is('*/editar/*')) value="{{$locador->estado}}" @endif required="">
                                        <option value="PR">Paraná</option> 
                                    <option value="AC">Acre</option>
                                    <option value="AL">Alagoas</option>
                                    <option value="AP">Amapá</option>
                                    <option value="AM">Amazonas</option>
                                    <option value="BA">Bahia</option>
                                    <option value="CE">Ceará</option>
                                    <option value="DF">Distrito Federal</option>
                                    <option value="ES">Espirito Santo</option>
                                    <option value="GO">Goiás</option>
                                    <option value="MA">Maranhão</option>
                                    <option value="MS">Mato Grosso do Sul</option>
                                    <option value="MT">Mato Grosso</option>
                                    <option value="MG">Minas Gerais</option>
                                    <option value="PA">Pará</option>
                                    <option value="PB">Paraíba</option>

                                    <option value="PE">Pernambuco</option>
                                    <option value="PI">Piauí</option>
                                    <option value="RJ">Rio de Janeiro</option>
                                    <option value="RN">Rio Grande do Norte</option>
                                    <option value="RS">Rio Grande do Sul</option>
                                    <option value="RO">Rondônia</option>
                                    <option value="RR">Roraima</option>
                                    <option value="SC">Santa Catarina</option>
                                    <option value="SP">São Paulo</option>
                                    <option value="SE">Sergipe</option>
                                    <option value="TO">Tocantins</option>
                                </select>        
                            </div>
                            <div class="form-group">
                                <label>Cep</label>
                                <input type="text" name="cep" class="form-control" id="cep" placeholder="Digite o Cep da empresa." @if(Request::is('*/editar/*')) value="{{$locador->cep}}" @endif >

                            </div>



                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <div class="modal-footer">
                                @if(Request::is('*/editar/*'))
                                <button type="submit" class="btn btn-success">Alterar</button>
                                @else
                                <button type="submit" class="btn btn-success">Salvar</button>
                                @endif
                            </div>
                            {!! Form::close() !!}
                            <!-- /.form-group -->
                        </div>

                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.row -->

        </div>

    </div>
</div>

</section>
@endsection
