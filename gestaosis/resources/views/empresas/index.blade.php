@extends('adminapp')

@section('content')
@if($errors->any())
<div class="alert alert-warning">
    <strong>ATENÇÃO!</strong> {{$errors->first()}}
</div>

@endif


<script type="text/javascript">
    function deletardados(e) {
        if (!(window.confirm("Tem certeza que deseja excluir esse usuario?")))
            e.returnValue = false;
    }
</script>
<section class="content">
    <div class="box box-primary">

        <div class="box-header with-border">
            <h3 class="box-title">Empresas</h3>


        </div>

        <div class="box-header">
            <a href="{{url('/empresas/cadastrar')}}" class="btn btn-danger">
                <span class="glyphicon glyphicon-plus">

                </span> Adicionar empresa</a>
        </div>
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
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>
                        Razão Social
                    </th>
                    <th>
                        CNPJ
                    </th>
                    <th>
                        Usuário Responsavel 
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
                @foreach ($empresas as $empresa)
                <tr>
                    <td>
                        {{$empresa->nome}}
                    </td>
                    <td>
                        {{$empresa->cnpj}}
                    </td>
                    <td>
                        {{$empresa->user->name}}
                    </td>

                    <td>
                        @can('Edit_empresa')
                        <a href="{{url('empresas/editar/'.$empresa->id)}}" class="btn btn-primary"><span class="glyphicon glyphicon-pencil" ></span> Editar</a>
                        @else
                        No edit
                        @endcan
                    </td>
                    <td>
                        <a href="{{url('empresas/deletar/'.$empresa->id)}}" class="btn btn-danger" onclick="return deletardados(event)"><span class="glyphicon glyphicon-remove"></span> Deletar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</section>
@endsection
