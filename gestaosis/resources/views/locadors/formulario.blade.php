@extends('adminapp')

@section('content')
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">{{$titulo}}</h3>



        </div>
        @can('Edit_locador')
        <div class="box-header">
            <a href="{{url('/locadors')}}" class="btn btn-danger">
                <span class="fa fa-arrow-left">

                </span> Voltar </a>
        </div>
        @endcan
        @if(empty($locador->user_id))
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
                    {!! Form::open(['url' => 'locadors/insert']) !!}
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

                    @if(Request::is('*/editar/*'))
                    <button type="submit" class="btn btn-success">Alterar</button>
                    @else
                    <button type="submit" class="btn btn-success">Salvar</button>
                    @endif
                    {!! Form::close() !!}
                    <!-- /.form-group -->
                </div>

            </div>
            <!-- /.row -->
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
            Vizualizar Todos os   <a href="{{url('locadors')}}" >Locadores</a>
        </div>

        @elseif($locador->user_id === auth()->user()->id)
        <!-- /.box-header -->
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
                    {!! Form::open(['url' => 'locadors/insert']) !!}
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

                    <div class="input-group">

                        <div class="input-group-addon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <input type="text" class="form-control" data-inputmask="&quot;mask&quot;: &quot;(99) 99999-9999&quot;" data-mask="" name="telefone" @if(Request::is('*/editar/*')) value="{{$locador->telefone}}" @endif>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" placeholder="Digite o Email ." @if(Request::is('*/editar/*')) value="{{$locador->email}}" @endif >

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

                    @if(Request::is('*/editar/*'))
                    <button type="submit" class="btn btn-success">Alterar</button>
                    @else
                    <button type="submit" class="btn btn-success">Salvar</button>
                    @endif
                    {!! Form::close() !!}
                    <!-- /.form-group -->
                </div>

            </div>
            <!-- /.row -->
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
            Vizualizar Todos os   <a href="{{url('locadors')}}" >Locadores</a>
        </div>
        @else
        <div class="error-page">
            <h2 class="headline text-red"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">500</font></font></h2>

            <div class="error-content">
                <h3><i class="fa fa-warning text-red"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Opa! </font><font style="vertical-align: inherit;">Você ainda não possui acesso a essa função !.</font></font></h3>

                <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                    Vamos trabalhar para consertar isso imediatamente. </font><font style="vertical-align: inherit;">Enquanto isso, você pode </font></font><a href="{{url('/dashboard')}}"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">retornar ao painel</font></font></a><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> ou tentar usar o formulário de pesquisa.
                    </font></font></p>


            </div>
        </div>
        @endif

    </div>
</section>
@endsection
