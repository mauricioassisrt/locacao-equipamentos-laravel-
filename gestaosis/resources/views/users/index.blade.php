@extends('adminapp')

@section('content')


<script type="text/javascript">
    function deletardados(e) {
        if (!(window.confirm("Tem certeza que deseja excluir esse usuario?")))
            e.returnValue = false;
    }
</script>
<section class="content">
    <div class="box box-primary">

        <div class="box-header with-border">
            <h3 class="box-title">Usuário </h3>


        </div>

        <div class="box-header">
            <a href="{{url('/users/cadastrar')}}" class="btn btn-danger">
                <span class="glyphicon glyphicon-plus">

                </span> Adicionar Usuário</a>
        </div>
        @if(Session::has('insert_ok'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Inserido!</h4>
            {{Session::get('insert_ok')}}
        </div>
        @endif
        @if(Session::has('autentica_ok'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> ATENÇÂO USUÁRIO!</h4>
            {{Session::get('autentica_ok')}}
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
                    @can('Autentica_user')
                    <th>
                        Autenticar
                    </th>
                    @endcan
                    <th>
                        Nome
                    </th>
                    <th>
                        email
                    </th>
                    <th>
                        Ver / Roles
                    </th>
                    <th>
                        Editar
                    </th>
                    <th>
                        Excluir
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    @can('Autentica_user')
                    <td>

                        <a href="{{url('autenticar/'.$user->id)}}" class="btn btn-success"><span class="fa fa-key"> </span> </a>

                    </td>
                    @endcan
                    <td>
                        {{$user->name}}
                    </td>
                    <td>
                        {{$user->email}}
                    </td>
                    <td>
                        <a href="{{url('users/visualizar/'.$user->id)}}" class="btn btn-success"><span class="glyphicon glyphicon-eye-open"></span> visualizar</a>
                    </td>
                    <td>
                        <a href="{{url('users/editar/'.$user->id)}}" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"> </span> Editar</a>
                    </td>
                    <td>
                        <a href="{{url('users/deletar/'.$user->id)}}" class="btn btn-danger" onclick="return deletardados(event)"><span class="glyphicon glyphicon-remove" ></span> Deletar</a>
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection
