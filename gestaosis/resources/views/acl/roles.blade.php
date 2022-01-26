@extends('adminapp')

@section('content')

<script type="text/javascript">
    function deletardados(e) {
        if (!(window.confirm("Tem certeza que deseja excluir esse role?")))
            e.returnValue = false;
    }
</script>
<section class="content">
    <div class="box box-primary">

        <div class="box-header with-border">
            <h3 class="box-title">Roles </h3>


        </div>

        <div class="box-header">
            <a href="{{url('/acl/role_cadastrar')}}" class="btn btn-danger">
                <span class="glyphicon glyphicon-plus">

                </span> Adicionar Role</a>
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
                        Name
                    </th>
                    <th>
                        Label
                    </th>
                    <th>
                        Data
                    </th>
                    <th>
                        Permissions
                    </th>
                    <th>
                        Deletar
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                <tr>
                    <td>
                        {{$role->name}}
                    </td>
                    <td>
                        {{$role->label}}
                    </td>
                    <td>
                        {{$role->created_at}}
                    </td>
                    <td>
                        <a href="role_view/{{$role->id}}" class="btn btn-info"><span class="glyphicon glyphicon-link"></span> Permissions</a>
                    </td>
                    <td>
                        <a href="role_delete/{{$role->id}}" class="btn btn-danger" onclick="return deletardados(event)"><span class="glyphicon glyphicon-remove"></span> Deletar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
</section>   
@endsection
