@extends('adminapp')

@section('content')

<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Resumo</h3>



        </div>
        <div class="box-header">
            <a href="{{url('/reparos/cadastrar')}}" class="btn btn-danger">
                <span class="fa fa-arrow-left">

                </span> Voltar </a>


        </div>

        <div class="box-body">

            {!! Form::open(['url' => 'reparos/concluir']) !!}
            <div class="callout callout-success">
                <h4>Detalhes do Reparo !</h4>

                <p>Aqui contém um resumo do reparo Realizado no Item   {{$equipamento->nome}}-{{ $equipamento->codigo}} na Data {{$dataOs}}</p>
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
                            Valor R$ 
                        </th>
                        <th>
                            Quantidade
                        </th>
                        <th>
                            Valor Total 
                        </th>

                    </tr>
                </thead>
                <tbody>
                    <!--percore todos os pecas cadastrado em banco -->
                    <?php
                    $qtdTotalItens = 0;
                    $valorFinal = 0;
                    $res = 0;
                    $res1 = 0;
                    $associativaServico = array();
                    for ($i = 0; $i <= count($peca2); $i++) {
                        if (array_key_exists($i, $peca2)) {
                            foreach ($pecas as $peca) {
                                if ($peca->id == $peca2[$i] && !empty($quantidade[$i])) {

                                    $qtdFloat = floatval($quantidade[$i]);
                                    $qtdTotalItens = $qtdTotalItens + $qtdFloat;

                                    $res = ($qtdFloat * $peca->preco);
                                    $res1 += ($qtdFloat * $peca->preco);
                                    //transformar string posição array em double 

                                    echo '<tr>'
                                    . '<td>' . $peca->nome . '</td>'
                                    . '<td>' . $peca->descricao . '</td>
                                        <td> R$' . $peca->preco . '</td>
                                        <td>' . $quantidade[$i] . '</td>
                                        <td>R$ ' . $res . '</td>
                            </tr>' . ' <input type="hidden"  name="quantidade[]" value="' . $quantidade[$i] . '"  ">'
                                    . '<input type="hidden"  name="valorSomaIten[]" value="' . $res . '"  ">'
                                    . '<input type="hidden"  name="pecaid[]" value="' . $peca->id . '"  ">';
                                }
                            }
                        }
                    }
                    $valorFinal = $maodeobra + $res1;
                    ?>
                <input type="hidden"  name="equipamento" value="{{$equipamento->id}} ">
                <input type="hidden"  name="data" value="{{$dataOs}} ">
                <input type="hidden"  name="totalpecas" value="{{$res1}} "> 
                <input type="hidden"  name="maodeobra" value="{{$maodeobra}} "> 
                <input type="hidden"  name="valorFinal" value="{{$valorFinal}} ">
                <input type="hidden"  name="itens" value="{{$qtdTotalItens}} ">


                </tbody>

            </table>
            <hr/>
            <div class="row">
                <div class="col-sm-3 col-xs-6">
                    <div class="description-block border-right">

                        <h5 class="description-header"> R${{$res1}}</h5>
                        <span class="description-text">  Total das peças</span>
                    </div>
                    <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-xs-6">
                    <div class="description-block border-right">

                        <h5 class="description-header" >  R${{$maodeobra}}</h5>
                        <span class="description-text"> Total mão de obra </span>
                    </div>
                    <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-xs-6">
                    <div class="description-block border-right">

                        <h5 class="description-header">R$ {{$valorFinal}}</h5>
                        <span class="description-text">Valor Final </span>
                    </div>
                    <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-xs-6">
                    <div class="description-block">

                        <h5 class="description-header">{{ $qtdTotalItens}}</h5>
                        <span class="description-text">Quantidade de peças Reparadas</span>
                    </div>
                    <!-- /.description-block -->
                </div>
            </div>
            <div class="col-md-12">
                <hr/>

                <button type="submit" class="btn btn-success">Finalizar Reparo</button>


                <!-- /.form-group -->
            </div>

            {!! Form::close() !!}
        </div>
    </div>
</section>
@endsection
