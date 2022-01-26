@extends('adminapp')

@section('content')
<script type="text/javascript">

    var map;

    $(document).ready(function () {

        map = new GMaps({
            el: '#map',
            lat: -23.08212,
            lng: -52.46222
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
        @can('Edit_empresa')
        <div class="box-header">
            <a href="{{url('/empresas')}}" class="btn btn-danger">
                <span class="glyphicon  glyphicon-arrow-left">

                </span> Voltar </a>
        </div>
        @endcan

        <!-- /.box-header -->
        <div class="box-body">
            @can('Edit_empresa')
            <div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-info"></i> Informe a nova empresa a ser Cadastrada !</h4>
                Informe todos os dados necessarios para realizar o cadastro !!
            </div>
            @endcan

            <div class="row">
                <div class="col-md-12">
                    @if(Request::is('*/editar/*'))
                    {!! Form::model($empresa, ['method' => 'PATCH', 'url' => 'empresas/update/'.$empresa->id]) !!}
                    @else
                    {!! Form::open(['url' => 'empresas/insert']) !!}
                    @endif
                    <div class="form-group">
                        <label>Nome</label>
                        <input type="text" name="nome" class="form-control" placeholder="Digite da empresa." 
                               @if(Request::is('*/editar/*')) value="{{$empresa->nome}}"
                               @endif required="">

                    </div>
                    @can('Edit_empresa')
                    <div class="alert alert-success alert-info">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-info"></i> Utilize ou CNPJ ou CPF  !</h4>
                        <h5> Informe na Opção Tipo de Empresa a opção desejada !!</h5>
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
                                    <input type="text"  name="cpf" id="cpf1" class="form-control" placeholder="Digite o cpf da empresa." @if(Request::is('*/editar/*')) value="{{$empresa->cpf}}" @endif>

                                </div>
                                <div class="form-group">
                                    <label>RG</label>
                                    <input type="text" name="rg" id="rg1" class="form-control" placeholder="Digite o RG da empresa." @if(Request::is('*/editar/*')) value="{{$empresa->rg}}" @endif >

                                </div>
                            </div>

                            <div class="col-md-12" id="cnpj" style="display: none;">
                                <div class="form-group ">
                                    <label class="control-label" >CNPJ</label>
                                    <input type="text"  name="cnpj" id="cnpj1"  maxlength="150" class="form-control" data-inputmask=""mask": "(999) 999-9999"" placeholder="Digite o CNPJ empresa." @if(Request::is('*/editar/*')) value="{{$empresa->nome}}" @endif >
                                </div>
                                <div class="form-group">
                                    <label>Inscrição Estadual </label>
                                    <input type="text" name="ie" class="form-control" placeholder="Digite a Inscrição estadual caso houver!." @if(Request::is('*/editar/*')) value="{{$empresa->ie}}" @endif >

                                </div>
                            </div>


                        </div>
                    </div>


                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" placeholder="Digite o Email ." @if(Request::is('*/editar/*')) value="{{$empresa->email}}" @endif required="">

                    </div>
                    <div class="form-group">
                        <label>Endereço</label>
                        <input type="text" name="endereco"  class="form-control" placeholder="Digite o Endereço da empresa." @if(Request::is('*/editar/*')) value="{{$empresa->endereco}}" id="endereco" @endif required="" >

                    </div>
                    <div class="form-group">
                        <label>Cidade</label>
                        <input type="text" name="cidade" class="form-control" placeholder="Digite a cidade da empresa." @if(Request::is('*/editar/*')) value="{{$empresa->cidade}}" @endif required="">

                    </div>

                    <div class="form-group">
                        <label>Estado</label>

                        <select name="estado" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true"  @if(Request::is('*/editar/*')) value="{{$empresa->estado}}" @endif required="">
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
                        <input type="text" name="cep" class="form-control" id="cep" placeholder="Digite o Cep da empresa." @if(Request::is('*/editar/*')) value="{{$empresa->cep}}" @endif required="">

                    </div>



                    <input type="hidden"  id='lat' name="lat">




                    <input type="hidden" id='lon' name="lng">



                    @can('Edit_empresa')
                    <div class="form-group">
                        <label>Usuário </label>
                        <select name="user_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">

                            @foreach ($user as $users)
                            <option value="{{$users->id}}">  {{$users->name}}</option>
                            @endforeach

                        </select>

                    </div>
                    @endcan

                    @if(Request::is('*/editar/*'))
                    <button type="submit" class="btn btn-success">Alterar</button>
                    @else
                    <button type="submit" class="btn btn-success">Salvar</button>
                    @endif
                    {!! Form::close() !!}

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

                    <!-- /.form-group -->
                </div>

            </div>
            <!-- /.row -->
        </div>
        <!-- /.box-body -->
        @can('menu_cadastro')
        <div class="box-footer">
            Vizualizar Todos as   <a href="{{url('empresas')}}" >Empresas</a>
        </div>
        @endcan
    </div>
</section>
@endsection
