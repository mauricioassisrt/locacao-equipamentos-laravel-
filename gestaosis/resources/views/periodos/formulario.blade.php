@extends('adminapp')

@section('content')
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">{{$titulo}}</h3>


            <!--            <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                        </div>-->
        </div>
        @can('Edit_periodo')
        <div class="box-header">
            <a href="{{url('/periodos')}}" class="btn btn-danger">
                <span class="fa fa-arrow-left">

                </span> Voltar </a>
        </div>
        @endcan
        <!-- /.box-header -->
        <div class="box-body">

            <div class="row">
                @if(empty($periodo->id_user))

                <div class="col-sm-12">
                    @if(Request::is('*/editar/*'))
                    {!! Form::model($periodo, ['method' => 'PATCH', 'url' => 'periodos/update/'.$periodo->id]) !!}
                    @else
                    {!! Form::open(['url' => 'periodos/insert']) !!}
                    @endif
                    <div class="form-group">

                        <label>Nome</label>
                        <input type="text" name="nome" placeholder="Digite um nome para o Periodo " class="form-control" placeholder=""
                               required="">


                    </div>
                    <div class="form-group">

                        <label>Tipo</label>
                        <input type="text" name="tipo" placeholder="Semana, Mês, Dia  " class="form-control" placeholder=""
                               required="">


                    </div>
                    <label>Valor</label>
                    <div class="input-group">


                        <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                        <input type="number" name="valor"  placeholder="Digite um valor " class="form-control"
                               required="">
                        <input type="hidden" id="id_user" name="id_user" value="{{auth()->user()->id}}">

                    </div>
                    <br/>

                    <button type="submit" class="btn btn-success">Salvar</button>

                    {!! Form::close() !!}
                </div>
                @elseif($periodo->id_user ==auth()->user()->id )
                
                <div class="col-sm-12">
                    @if(Request::is('*/editar/*'))
                    {!! Form::model($periodo, ['method' => 'PATCH', 'url' => 'periodos/update/'.$periodo->id]) !!}
                    @else
                    {!! Form::open(['url' => 'periodos/insert']) !!}
                    @endif
                    <div class="form-group">

                        <label>Nome</label>
                        <input type="text" name="nome" placeholder="Digite um nome para o Periodo " class="form-control" placeholder=""
                               @if(Request::is('*/editar/*')) value="{{$periodo->nome}}" @endif required="">


                    </div>
                    <div class="form-group">

                        <label>Tipo</label>
                        <input type="text" name="tipo" placeholder="Semana, Mês, Dia  " class="form-control" placeholder=""
                               @if(Request::is('*/editar/*')) value="{{$periodo->tipo}}" @endif required="">


                    </div>
                    <label>Valor</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                        <input type="number" name="valor"  placeholder="Digite um valor " class="form-control"
                               @if(Request::is('*/editar/*')) value="{{$periodo->valor}}" @endif required="">
                               <input type="hidden" id="id_user" name="id_user" value="{{$periodo->id_user}}">


                    </div>
                    <br/>
                    @if(Request::is('*/editar/*'))
                    <button type="submit" class="btn btn-success">Alterar</button>
                    @else
                    <button type="submit" class="btn btn-success">Salvar</button>
                    @endif
                    {!! Form::close() !!}
                </div>

                @else

                <section class="content">
                    <div class="error-page">
                        <h3 class="headline text-yellow"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> 404</font></font></h3>

                        <div class="error-content">
                            <h3><i class="fa fa-warning text-yellow"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Opa! </font><font style="vertical-align: inherit;">Página não encontrada.</font></font></h3>

                            <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                Não foi possível encontrar a página que você estava procurando. </font><font style="vertical-align: inherit;">Enquanto isso, você pode </font></font><a href="{{url('/dashboard')}}"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">retornar ao painel</font></font></a><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> ou tentar usar o formulário de pesquisa.
                                </font></font></p>

                        </div>
                        <!-- /.error-content -->
                    </div>
                </section>

                @endif
            </div>
        </div>
</section>
@endsection
