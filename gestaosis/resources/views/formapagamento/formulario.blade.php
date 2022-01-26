@extends('adminapp')

@section('content')
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">{{$titulo}}</h3>


            <!--            <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                        </div>-->
        </div>
        @can('View_user')
        <div class="box-header">
            <a href="{{url('/formaPagamentos')}}" class="btn btn-danger">
                <span class="glyphicon  glyphicon-arrow-left">

                </span> Voltar </a>
        </div>
        @endcan
        <!-- /.box-header -->
        <div class="box-body">

            <div class="row">
                <div class="col-sm-12">
                    @if(Request::is('*/editar/*'))
                    {!! Form::model($formaPagamento, ['method' => 'PATCH', 'url' => 'formaPagamentos/update/'.$formaPagamento->id]) !!}
                    @else
                    {!! Form::open(['url' => 'formaPagamentos/insert']) !!}
                    @endif
                    <div class="form-group">

                        <label>Tipo de Pagamento</label>
                        <input type="text" name="tipoPagamento" placeholder="Digite uma forma de pagamento" class="form-control" placeholder="" 
                               @if(Request::is('*/editar/*')) value="{{$formaPagamento->tipoPagamento}}" @endif required="">
                             
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
