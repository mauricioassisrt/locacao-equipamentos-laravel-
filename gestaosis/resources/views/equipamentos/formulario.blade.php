@extends('adminapp')

@section('content')
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">{{$titulo}}</h3>



        </div>
        @can('Edit_equipamento')
        <div class="box-header">
            <a href="{{url('/equipamentos')}}" class="btn btn-danger">
                <span class="fa  fa-arrow-left">

                </span> Voltar </a>
        </div>
        @endcan

        <!-- /.box-header -->
        <div class="box-body">


            @if(empty($equipamento->user_id))
            @can('Edit_equipamento')
            <div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-info"></i> Informe o novo equipamento a ser Cadastrado !</h4>
                Informe todos os dados necessarios para realizar o cadastro !!
            </div>
            @endcan

            <div class="row">

                <div class="col-md-12">


                    @if(Request::is('*/editar/*'))
                    {!! Form::model($equipamento, ['method' => 'PATCH', 'url' => 'equipamentos/update/'.$equipamento->id]) !!}
                    @else
                    {!! Form::open(['url' => 'equipamentos/insert']) !!}
                    @endif
                    <div class="col-md-12">
                        <label>Nome do equipamento </label>
                        <input type="text" name="nome" class="form-control" placeholder="Digite o nome do equipamento." 
                               @if(Request::is('*/editar/*')) value="{{$equipamento->nome}}"
                               @endif required="">

                    </div>


                    <div class="col-md-6">
                        <label>Descrição</label>
                        <input type="text" name="descricao" class="form-control" placeholder="Digite uma Descricação ." @if(Request::is('*/editar/*')) value="{{$equipamento->descricao}}" @endif required="">

                    </div>
                    <div class="col-md-2">
                        <label>Codigo do Equipamento</label>
                        <input type="text" name="codigo" class="form-control" placeholder="Número no qual identifica ." @if(Request::is('*/editar/*')) value="{{$equipamento->codigo}}" @endif required="">

                    </div>
                    <div class="col-md-1">
                        <label>Valor </label>
                        <div class="input-group">
                            <input type="number" name="valor" class="form-control" placeholder="R$ 1.200 ." @if(Request::is('*/editar/*')) value="{{$equipamento->valor}}" @endif required="">

                        </div>               
                    </div>
                    <div class="col-md-3">
                        <label>Data Aquisição</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control"  id="datepicker1"   data-inputmask="'alias': 'dd-mm-yyyy'" data-mask="" name="aquisicao"  required="true" @if(Request::is('*/editar/*')) value="{{  date( 'd/m/Y' , strtotime($equipamento->aquisicao))}}" @endif required="">
                        </div>               
                    </div>

                    <input type="hidden" name="status" value="0" @if(Request::is('*/editar/*')) value="{{$equipamento->status}}"@endif>
                           <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                    <div class="col-md-12">
                        <hr/>
                        @if(Request::is('*/editar/*'))
                        <button type="submit" class="btn btn-success">Alterar</button>
                        @else
                        <button type="submit" class="btn btn-success">Salvar</button>
                        @endif
                        {!! Form::close() !!}
                        <!-- /.form-group -->
                    </div>
                </div>
                @elseif($equipamento->user_id === auth()->user()->id)
                @can('Edit_equipamento')
                <div class="alert alert-info alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-info"></i> Informe o novo equipamento a ser Cadastrado !</h4>
                    Informe todos os dados necessarios para realizar o cadastro !!
                </div>
                @endcan

                <div class="row">

                    <div class="col-md-12">


                        @if(Request::is('*/editar/*'))
                        {!! Form::model($equipamento, ['method' => 'PATCH', 'url' => 'equipamentos/update/'.$equipamento->id]) !!}
                        @else
                        {!! Form::open(['url' => 'equipamentos/insert']) !!}
                        @endif
                        <div class="col-md-12">
                            <label>Nome do equipamento </label>
                            <input type="text" name="nome" class="form-control" placeholder="Digite o nome do equipamento." 
                                   @if(Request::is('*/editar/*')) value="{{$equipamento->nome}}"
                                   @endif required="">

                        </div>


                        <div class="col-md-6">
                            <label>Descrição</label>
                            <input type="text" name="descricao" class="form-control" placeholder="Digite uma Descricação ." @if(Request::is('*/editar/*')) value="{{$equipamento->descricao}}" @endif required="">

                        </div>
                        <div class="col-md-2">
                            <label>Codigo do Equipamento</label>
                            <input type="text" name="codigo" class="form-control" placeholder="Número no qual identifica ." @if(Request::is('*/editar/*')) value="{{$equipamento->codigo}}" @endif required="">

                        </div>
                        <div class="col-md-1">
                            <label>Valor </label>
                            <div class="input-group">
                                <input type="number" name="valor" class="form-control" placeholder="R$ 1.200 ." @if(Request::is('*/editar/*')) value="{{$equipamento->valor}}" @endif required="">

                            </div>               
                        </div>
                        <div class="col-md-3">
                            <label>Data Aquisição</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control"  id="datepicker1"   data-inputmask="'alias': 'dd-mm-yyyy'" data-mask="" name="aquisicao"  required="true" @if(Request::is('*/editar/*')) value="{{  date( 'd/m/Y' , strtotime($equipamento->aquisicao))}}" @endif disable="true" required="">

                            </div>               
                        </div>

                        <input type="hidden" name="status" value="0" @if(Request::is('*/editar/*')) value="{{$equipamento->status}}"@endif>
                               <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                        <div class="col-md-12">
                            <hr/>
                            @if(Request::is('*/editar/*'))
                            <button type="submit" class="btn btn-success">Alterar</button>
                            @else
                            <button type="submit" class="btn btn-success">Salvar</button>
                            @endif
                            {!! Form::close() !!}
                            <!-- /.form-group -->
                        </div>
                    </div>
                    @else
                    <div class="error-page">
                        <h2 class="headline text-red"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">500</font></font></h2>

                        <div class="error-content">
                            <h3><i class="fa fa-warning text-red"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Opa! </font><font style="vertical-align: inherit;">Você ainda não possui acesso a essa função !.</font></font></h3>

                            <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                Vamos trabalhar para consertar isso imediatamente. </font><font style="vertical-align: inherit;">Enquanto isso, você pode </font></font><a href="{{url('/dashboard')}}"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">retornar ao painel</font></font></a><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> ou tentar usar o formulário de pesquisa.
                                </font></font></p>

                            <form class="search-form">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control" placeholder="Search">

                                    <div class="input-group-btn">
                                        <button type="submit" name="submit" class="btn btn-danger btn-flat"><i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- /.input-group -->
                            </form>
                        </div>
                    </div>
                    <!-- /.error-page -->
                    @endif

                </div>
                <!-- /.row -->
            </div>
            <!-- /.box-body -->
            @can('menu_cadastro')
            <div class="box-footer">
                Vizualizar Todos os   <a href="{{url('equipamentos')}}" >Equipamentos</a>
            </div>
            @endcan
        </div>
</section>
@endsection
