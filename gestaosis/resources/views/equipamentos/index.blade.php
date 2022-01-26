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
            <h3 class="box-title"></h3>


        </div>

        <div class="box-header">
            <a href="{{url('/equipamentos/cadastrar')}}" class="btn btn-danger">
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
                        Codigo 
                    </th>

                    <th>
                        Status
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


                <!--percore todos os equipamentos cadastrado em banco -->
                @foreach ($equipamentos as $equipamento)
                <!--verifica se o equipamento cadastrado está relacionado a empresa logada-->
                @if(auth()->user()->id  === $equipamento->user_id )
                <!---->
                <tr>
                    <td>
                        {{$equipamento->nome}}
                    </td>
                    <td>
                        {{$equipamento->descricao}}
                    </td>
                    <td>
                        {{$equipamento->codigo}}
                    </td>
                    <td>
                        @if($equipamento->status == 0)
                        Não alugado
                        @else
                        Alugado
                        @endif
                    </td>

                    <td>
                        @can('Edit_equipamento')
                        <a href="{{url('equipamentos/editar/'.$equipamento->id)}}" class="btn btn-primary"><span class="glyphicon glyphicon-pencil" ></span> Editar</a>
                        @else
                        No edit
                        @endcan
                    </td>
                    <td>
                        <a href="{{url('equipamentos/deletar/'.$equipamento->id)}}" class="btn btn-danger" onclick="return deletardados(event)"><span class="glyphicon glyphicon-remove"></span> Deletar</a>
                    </td>

                </tr>

                @endif
                @endforeach



            </tbody>
        </table>
    </div>

</section>
@endsection
