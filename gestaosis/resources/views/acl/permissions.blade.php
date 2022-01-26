@extends('adminapp')

@section('content')
<section class="content">
    <div class="box box-primary">

        <div class="box-header with-border">
            <h3 class="box-title">Permissões </h3>


        </div>

        <div class="box-header">

            <div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-info"></i> Atenção!</h4>
                Ao Admistrador só é permitido Adicionar novas permissões não é possivel excluir ou edita-las !!
            </div>
            <a href=" {{url('/acl/permission_cadastrar')}}" class="btn btn-danger">
                <span class="glyphicon glyphicon-plus">

                </span> Adicionar Permissão</a>
        </div>
        @if(Session::has('insert_ok'))
        <div class="alert alert-success">{{Session::get('insert_ok')}}</div>
        @endif
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>
                       Nome
                    </th>
                    <th>
                        Permission
                    </th>
                    <th>
                        Data
                    </th>
                </tr>
            </thead>
            <tbody >
                @foreach ($permissions as $permission)
                <tr>
                    <td>
                        {{$permission->name}}
                    </td>
                    <td>
                        {{$permission->label}}
                    </td>
                    <td>
                        {{date( 'd/m/Y' , strtotime($permission->created_at))}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection
