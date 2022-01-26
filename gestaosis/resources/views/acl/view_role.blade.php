@extends('adminapp')

@section('content')
<section class="content">
    <div class="box box-primary">

        <div class="box-header with-border">
            <h3 class="box-title">{{$label}} </h3>


        </div>



        <div class="alert alert-info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-info"></i> Atenção!</h4>
            Habilite e desabilite as permissões desejadas !
        </div>
        <div class="box-header">
            <a href="{{url('/acl/roles')}}" class="btn btn-danger">
                <span class="glyphicon glyphicon-plus">

                </span> Voltar</a>
        </div>
        <div class="row">
            <!--            <div class="col-md-6">
                            <h3>Permissions</h3>
                            <ul class="list-view">
                                @foreach ($permissions as $permission)
                                <li class="item-view">{{$permission->label}}</li>
                                @endforeach
                            </ul>
                        </div>-->
            <div class="col-md-12">
                <div class="divisa-esquerda">
                    {!! Form::open(['url' => 'acl/role_permissions']) !!}

                    <input type="hidden" name="role_id" value="{{$role_id}}">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th ></th>
                                <th>Nome</th>
                                <th>Nome</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pers_cadastro as $per)
                            @foreach ($permissions as $permission)
                            @if ($per->id == $permission->id)
                            <tr>
                                <td ><input type="checkbox" name="permissions[]" value="{{$per->id}}" checked></td>
                                <td> {{$per->name}}</td>
                                <td> {{$per->label}}</td>
                            </tr>
                            @php
                            $permission_numb = $per->id;
                            break;
                            @endphp
                            @endif
                            @endforeach
                            @if ($per->id != $permission_numb)
                            <tr>
                                <td><input type="checkbox" name="permissions[]" value="{{$per->id}}"></td>
                                <td> {{$per->name}}</td>
                                <td> {{$per->label}}</td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>


                    </table>
                    <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-link"></span> Alterar</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
</section>
@endsection
