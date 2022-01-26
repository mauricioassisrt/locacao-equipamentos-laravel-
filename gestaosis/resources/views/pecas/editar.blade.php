@extends('adminapp')

@section('content')

<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">{{$titulo}}</h3>



        </div>
        @can('Edit_peca')
        <div class="box-header">
            <a href="{{url('/pecas')}}" class="btn btn-danger">
                <span class="fa  fa-arrow-left">

                </span> Voltar </a>
        </div>
        @endcan

        <!-- /.box-header -->
        <div class="box-body">
            
            @if(auth()->user()->id  === $user_id && $peca->empresa_id === $empresa_id )

            @can('Edit_peca')
            <div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-info"></i> Informe a Peça a ser Cadastrada !</h4>
                Informe todos os dados necessarios para realizar o cadastro !!
            </div>
            @endcan
            <!--            update-->
            <div class="row">

                <div class="col-md-12">



                    {!! Form::model($peca, ['method' => 'PATCH', 'url' => 'pecas/update/'.$peca->id]) !!}
                 
                    <div class="col-md-12">
                        <label>Nome da Peça </label>
                        <input type="text" name="nome" class="form-control" placeholder="Digite o nome da Peça." 
                               @if(Request::is('*/editar/*')) value="{{$peca->nome}}"
                               @endif required="">

                    </div>


                    <div class="col-md-6">
                        <label>Descrição</label>
                        <input type="text" name="descricao" class="form-control" placeholder="Digite uma Descricação ." @if(Request::is('*/editar/*')) value="{{$peca->descricao}}" @endif required="">

                    </div>

                    <div class="col-md-6">
                        <label>Valor </label>
                        <div class="input-group">
                            <input  type=number step=0.01 name="preco" class="form-control" placeholder="R$ 1.200 ." @if(Request::is('*/editar/*')) value="{{$peca->preco}}" @endif required="">

                        </div>               
                    </div>

                    <input type="hidden"  name="empresa_id" value="{{$empresa_id}}">
                    <div class="col-md-12">
                        <hr/>

                        <button type="submit" class="btn btn-success">Alterar</button>

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
                Vizualizar Todos as  <a href="{{url('pecas')}}" >Peças </a>
            </div>
            @endcan
        </div>
</section>
@endsection
