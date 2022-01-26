@extends('adminapp')

@section('content')

<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Usuários</h3>


            <!--            <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                        </div>-->
        </div>
        @can('View_user')
        <div class="box-header">
            <a href="{{url('/users')}}" class="btn btn-danger">
                <span class="glyphicon  glyphicon-arrow-left">

                </span> Voltar </a>
        </div>
        @endcan
        <!-- /.box-header -->
        <div class="box-body">

            <div class="row">
                <div class="col-sm-12">
                    @if(Request::is('*/editar/*'))
                    {!! Form::model($user, ['method' => 'PATCH', 'url' => 'users/update/'.$user->id]) !!}
                    @else
                    {!! Form::open(['url' => 'users/insert']) !!}
                    @endif
                    <div class="form-group">
                        <label>Nome</label>
                        <input type="text" class="form-control" id="name" placeholder="Digite o nome do usuário." name="name" @if(Request::is('*/editar/*')) value="{{$user->name}}" @endif required>

                    </div>
                    <div class="form-group">
                        <label>E-mail</label>
                        <input type="email" class="form-control" placeholder="Digite o e-mail do usuario." id="email" name="email" @if(Request::is('*/editar/*')) value="{{$user->email}}" @endif required>

                    </div>
                    <div class="form-group">
                        <label>Senha</label>
                        <input type="password" class="form-control" placeholder="Digite a senha do usuario." id="password" name="password" required>

                    </div>
                    <div class="form-group">
                        <label>Confirmar a senha</label>
                        <input type="password" class="form-control" id="password-confirm" name="password-confirm" required placeholder="Comfirme a senha.">

                    </div>
                    @if(Request::is('*/editar/*'))
                    <button type="submit" class="btn btn-success">Alterar</button>
                    @else
                    <button type="submit" class="btn btn-success">Salvar</button>
                    @endif
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
</section>
@endsection
