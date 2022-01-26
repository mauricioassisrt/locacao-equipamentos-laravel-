@extends('adminapp')

@section('content')
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Permissões</h3>


            <!--            <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                        </div>-->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-info"></i> Atenção!</h4>
                No campo nome digite a regra criada no Sistema ex:View_post -> Vizualiza os Posts, no campo descrição descreva as respectivas caracteristicas desta Permissão !!
            </div>
            <div class="row">
                <div class="col-sm-12">
                    @if(Request::is('*/role_cadastrar'))
                    {!! Form::open(['url' => 'acl/role_insert']) !!}
                    @else
                    {!! Form::open(['url' => 'acl/permission_insert']) !!}
                    @endif
                    <div class="form-group">
                        <label>Nome</label>
                        <input type="text" class="form-control" id="name" name="name"  required="true" placeholder="Digite o nome.">

                    </div>
                    <div class="form-group">
                        <label>Descrição</label>
                        <input type="text" class="form-control" id="label" name="label" placeholder="Digite a descrição desejada." required="true">

                    </div>

                    <button type="submit" class="btn btn-success">Salvar</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
</section>
@endsection
