@extends('adminapp')

@section('content')

<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Resumo</h3>



        </div>
        {!! Form::open(['url' => 'relatorioEquipamento/relatorioEquipamento']) !!}
        @foreach($servico as $iten)
        @if($iten->user_id === auth()->user()->id)
        <div class="box-header">
            <a href="{{url('/reparos')}}" class="btn btn-danger">
                <span class="fa fa-arrow-left">

                </span> Voltar </a>


        </div>

        <div class="box-body">



            <div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-info"></i> Equipamento Selecionado </h4>
                @foreach($servico as $iten)
                Equipamento :  {{$iten->nomes}} Reparado em : {{date( 'd/m/Y' , strtotime($iten->data))}} 
                @break; 
                @endforeach
            </div>

            <table class="table table-striped table-bordered" id="example3">
                <thead>
                    <tr>
                        <th>
                            Peça
                        </th>
                        <th>
                            Descrição
                        </th>
                        <th>
                            Quantidade
                        </th>
                        <th>
                            Valor 
                        </th>
                        <th>
                            Valor Total 
                        </th>

                    </tr>
                </thead>
                <tbody>
                    <!--percore todos os pecas cadastrado em banco -->
                    @foreach($servico as $iten)
                    <tr>
                        <td>
                            {{$iten->nome}}
                        </td>
                        <td>
                            {{$iten->descricaopeca}} 
                        </td>
                        <td>
                            {{$iten->quantidade}} 
                        </td>
                        <td>
                            R$ {{$iten->valorSomaIten}} 
                        </td>
                        <td>
                            R$ {{$iten->preco}} 
                        </td>

                    </tr>
                    @endforeach


                </tbody>

            </table>

            @if(count($servico)>=1)
            <div class="row">
                <div class="col-sm-2 col-xs-6">
                    <div class="description-block">

                        <h5 class="description-header">{{date( 'd/m/Y' , strtotime($iten->data))}}</h5>
                        <span class="description-text">  DATA  </span>
                    </div>
                    <!-- /.description-block -->
                </div>
                <div class="col-sm-2 col-xs-6">
                    <div class="description-block border-right">

                        <h5 class="description-header" >{{$iten->totalpecas}}</h5>
                        <span class="description-text">  Total das peças</span>
                    </div>
                    <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-2 col-xs-6">
                    <div class="description-block border-right">

                        <h5 class="description-header" >  R${{$iten->maodeobra}}</h5>
                        <span class="description-text"> Total mão de obra </span>
                    </div>
                    <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-2 col-xs-6">
                    <div class="description-block border-right">

                        <h5 class="description-header">R$ {{$iten->valorFinal}}</h5>
                        <span class="description-text">Valor Final </span>
                    </div>
                    <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-xs-6">
                    <div class="description-block">

                        <h5 class="description-header">{{ $iten->itens}}</h5>
                        <span class="description-text">Quantidade de peças Reparadas</span>
                    </div>
                    <!-- /.description-block -->
                </div>
            </div>

             <input type="hidden"  name="id" value="{{$iten->id}} "> 
            @endif


            <div class="col-md-12">
                <hr/>

                <button type="submit" class="btn btn-success">Imprimir</button>


                <!-- /.form-group -->
            </div>
            

        </div>
        @break
        {!! Form::close() !!}
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
        @break
        @endif
        @endforeach
    </div>
</section>
@endsection
