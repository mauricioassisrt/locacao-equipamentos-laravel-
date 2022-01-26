@extends('adminapp')

@section('content')



<script type="text/javascript">
    function deletardados(e) {
        if (!(window.confirm("Tem certeza que deseja excluir esse {{$titulo}}?")))
            e.returnValue = false;
    }
</script>
<section class="content">
    <div class="box box-primary">

        <div class="box-header with-border">
            <h3 class="box-title">{{$titulo}}</h3>


        </div>

        <div class="box-header">
            <a href="{{url('/pecas/cadastrar')}}" class="btn btn-danger">
                <span class="fa fa-plus">

                </span> Adicionar {{$titulo}}</a>
            <hr/>
            @if(Session::has('insert_ok'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Inserido!</h4>
                {{Session::get('insert_ok')}}
            </div>

            @endif
            @if(Session::has('update_ok'))
            <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-warning"></i> Alterado!</h4>
                {{Session::get('update_ok')}}
            </div>
            @endif
            @if(Session::has('delete_ok'))
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Apagado!</h4>
                {{Session::get('delete_ok')}}
            </div>

            @endif
            @if(Session::has('errors'))
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Atenção o Produto possui dados associados a ele não foi possivel concluir a ação!!</h4>

            </div>

            @endif
        </div>


        <table class="table table-striped table-bordered" id="example1">
            <thead>
                <tr>
                    <th>
                        Nome do Equipamento
                    </th>
                    <th>
                        Descrição
                    </th>
                    <th>
                        Valor R$ 
                    </th>



                    <th>
                        Editar
                    </th>
                    <th>
                        Deletar
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
                        @can('Edit_peca')
                        <a href="{{url('pecas/editar/'.$peca->id)}}" class="btn btn-primary"><span class="glyphicon glyphicon-pencil" ></span> Editar</a>
                        @else
                        No edit
                        @endcan
                    </td>
                    <td>
                        <a href="{{url('pecas/deletar/'.$peca->id.'/'.$user_id.'/'.$empresa_id)}}" class="btn btn-danger" onclick="return deletardados(event)"><span class="glyphicon glyphicon-remove"></span> Deletar</a>
                    </td>

                </tr>

                @endif
                @endforeach



            </tbody>
        </table>
    </div>

</section>
@endsection
