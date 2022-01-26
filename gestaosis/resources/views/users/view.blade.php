@extends('adminapp')

@section('content')
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Adicionar novas Permissões ao Usuario </h3>


        </div>
        <div class="box-header">
            <a href="{{url('/users')}}" class="btn btn-danger">
                <span class="glyphicon  glyphicon-arrow-left">

                </span> Voltar </a>
        </div>
        <div class="row">
            <div class="col-md-6 ">
                <h4 style="text-align: center">Informações</h4>
                <table class="table table-striped table-bordered">
                    <thead>
                    <th>
                        Nome de usuario:  
                    </th>
                    <th>
                        E-mail:
                    </th>
                    <th>
                        Criado em: 
                    </th>
                    <th>
                        Roles: 
                    </th>
                    </thead>
                    <tbody>
                    <td>
                        {{$user->name}}
                    </td>
                    <td>
                        {{$user->email}}
                    </td>
                    <td>
                        {{date( 'd/m/Y' , strtotime($user->created_at))}} 
                    </td>
                    <td>
                        @foreach ($roles_check as $role)
                        <ul> 
                            <li>
                                {{$role->label}} 
                            </li>
                        </ul>
                        @endforeach
                    </td>
                    </tbody>

                </table>


            </div>

            <div class="col-md-6">
                <h4 style="text-align: center">Selecione as Roles desejadas </h4>
                {!! Form::open(['url' => 'users/user_role']) !!}

                <input type="hidden" name="user_id" value="{{$user_id}}">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th width='50px'></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $r)
                        @foreach ($roles_check as $role)
                        @if ($r->id == $role->id)
                        <tr>
                            <td align='right'><input type="checkbox" name="roles[]" value="{{$r->id}}" checked></td>
                            <td>{{$r->name}}</td>
                        </tr>
                        @php
                        $role_id = $r->id;
                        break;
                        @endphp
                        @endif
                        @endforeach
                        @if ($r->id != $role_id)
                        <tr>
                            <td align='right'><input type="checkbox" name="roles[]" value="{{$r->id}}"></td>
                            <td>{{$r->name}}</td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                    <tr>
                        <td colspan="2">
                            <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-link"></span> Alterar</button>
                        </td>
                    </tr>
                </table>
                {!! Form::close() !!}

            </div>
        </div>

    </div>
</section>




@endsection
