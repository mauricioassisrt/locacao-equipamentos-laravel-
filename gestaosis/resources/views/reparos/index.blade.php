@extends('adminapp')

@section('content')



<script type="text/javascript">
    function deletardados(e) {
        if (!(window.confirm("Tem certeza que deseja excluir esse ?")))
            e.returnValue = false;
    }
</script>
<section class="content">
    <div class="box box-primary">

        <div class="box-header with-border">
            <h3 class="box-title">Reparos realizados </h3>


        </div>

        <div class="box-header">
            <a href="{{url('/reparos/cadastrar')}}" class="btn btn-danger">
                <span class="fa fa-plus">

                </span> Adicionar </a>
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
                        Data da OS 
                    </th>
                    <th>
                        Nome
                    </th>
                    <th>
                        Valor Peças 
                    </th>
                    <th>
                        Peças Reparadas
                    </th>
                    <th>
                        Mão de Obra 
                    </th>
                    <th>
                        Valor Final 
                    </th>
                    <th>

                    </th>
                    <th>

                    </th>
                    <th>

                    </th>
                </tr>
            </thead>
            <tbody>



                @foreach($servico as $iten)
                <tr>
                    <td>
                        {{date( 'd/m/Y' , strtotime($iten->data))}} 
                    </td>
                    <td>
                        {{$iten->nomes}}-{{$iten->codigo}} 
                    </td>
                    <td>
                        R$ {{$iten->totalpecas}} 
                    </td>
                    <td>
                        {{$iten->itens}} 
                    </td>
                    <td>
                        R$ {{$iten->maodeobra}} 
                    </td>
                    <td>
                        R$ {{$iten->valorFinal}} 
                    </td>
                    <td>
                        {!! Form::model($iten, ['method' => 'get', 'url' => 'reparos/detalhes']) !!}
                        <button type="submit" class=" btn btn-default "  >
                            Detalhes
                        </button>
                        <input type="hidden"  name="idIten" value="{{$iten->idItens}}">
                        {!! Form::close() !!}
                    </td>
                    <td>

                    </td>
                    <td>

                    </td>
                </tr>
                @endforeach





            </tbody>
        </table>
    </div>

</section>
@endsection
