@extends('adminapp')

@section('content')

<script type="text/javascript">
    function deletardados(e) {
        if (!(window.confirm("Tem certeza que deseja excluir esse {{$titulo}} ?")))
            e.returnValue = false;
    }
</script>
<section class="content">
    <div class="box box-primary">

        <div class="box-header with-border">
            <h3 class="box-title"> {{$titulo}} </h3>


        </div>

        <div class="box-header">
            <a href="{{url('/periodos/cadastrar')}}" class="btn btn-danger">
                <span class="fa fa-plus">

                </span> Adicionar {{$titulo}} </a>
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
                <h4><i class="icon fa fa-ban"></i> Atenção o Cliente possui dados associados a ele não foi possivel concluir a ação!!</h4>

            </div>

            @endif
        </div>

        <table class="table table-striped table-bordered" id="example1">
            <thead>
                <tr>

                    <th>
                        Periodo
                    </th>

                    <th>
                        Valor
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
                @foreach ($periodos as $periodo)
                @if($periodo->id_user === auth()->user()->id)
                <tr>


                    <td>
                        {{$periodo->nome}}
                    </td>
                    <td>
                        R$ {{number_format( $periodo->valor, 2)}}
                    </td>

                    <td>
                        @can('Edit_periodo')
                        <a href="{{url('periodos/editar/'.$periodo->id)}}" class="btn btn-primary" hidden="{{$periodo->id_user}}"><span class="glyphicon glyphicon-pencil"></span> Editar</a>
                        @else
                        No edit
                        @endcan
                    </td>
                    <td>
                        <input type="hidden" name="id_user" value="{{$periodo->id_user}}">
                        <a href="{{url('periodos/deletar/'.$periodo->id)}}"  class="btn btn-danger" onclick="return deletardados(event)"><span class="glyphicon glyphicon-remove"></span> Deletar</a>
                    </td>
                </tr>
                @endif

                @endforeach
            </tbody>
        </table>



    </div>
</section>
@endsection
