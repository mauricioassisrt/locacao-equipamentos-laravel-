@extends('adminapp')

@section('content')

<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Novo Reparo </h3>



        </div>
        

        <!-- /.box-header -->
        <div class="box-body">

            @if(auth()->user()->id  === $user_id )



            <div class="row">
                {!! Form::open(['url' => 'reparos/finalizar']) !!}
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Equipamento</label>
                        <select class="form-control select2 select2-hidden-accessible" name="equipamento_id"  style="width: 100%;" tabindex="-1" aria-hidden="true" required="true">
                            @foreach($equipamentos as $equipamento)
                            @if($equipamento->user_id === auth()->user()->id )
                            <option   value="{{$equipamento->id}}"  >{{$equipamento->nome}}-{{$equipamento->codigo}}</option>
                            @endif
                            @endforeach

                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <label>Data Do Serviço</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control"  id="datepicker" data-inputmask="'alias': 'dd-mm-yyyy'" data-mask="" name="dataOs" required="true" >
                    </div>               
                </div>
                <div class="col-md-4">
                    <label>Valor Mão de obra</label>
                    <div class="input-group">
                        
                        <input type="number" class="form-control" name="maodeobra" required="true" step="any" min="0" >
                    </div>               
                </div>
                <div class="col-md-12">

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
                                    Valor R$ 
                                </th>
                                <th>
                                    Quantidade
                                </th>

                            </tr>
                        </thead>
                        <tbody>


                            <!--percore todos os pecas cadastrado em banco -->
                            @foreach ($pecas as $peca)
                            <!--verifica se o peca cadastrado está relacionado a empresa logada-->
                            @if(auth()->user()->id  === $user_id && $peca->empresa_id === $empresa_id )
                            <!---->

                            <tr>
                                <td>
                                    {{$peca->nome}}
                                </td>
                                <td>
                                    {{$peca->descricao}}
                                </td>
                                <td>
                                    {{$peca->preco}}
                                </td>


                                <td>
                                    <input type="number" name="quantidade[]" min="0" max="100" value="0"/>
                                    <input type="hidden" name="pecaid[]" value="{{$peca->id}}" />

                                </td>


                            </tr>

                            @endif
                            @endforeach

                            <!--ARRAY FORA E FOR DENTRO--> 

                        </tbody>

                    </table>




                    <input type="hidden"  name="empresa_id" value="{{$empresa_id}}">
                    <div class="col-md-12">
                        <hr/>

                        <button type="submit" class="btn btn-success">Realizar Reparo</button>


                        <!-- /.form-group -->
                    </div>
                    {!! Form::close() !!}
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
            Vizualizar Todos as  <a href="{{url('reparos')}}" >Peças </a>
        </div>
        @endcan
    </div>
</section>
<script>
    $('#example3').DataTable({
        'paging': true,
        'lengthChange': false,
        'searching': false,
        'ordering': false,
        'info': false,
        'autoWidth': false
    })
    $('#example2').DataTable({
        'paging': true,
        'lengthChange': false,
        'searching': false,
        'ordering': true,
        'info': false,
        'autoWidth': false
    })
</script>
@endsection
