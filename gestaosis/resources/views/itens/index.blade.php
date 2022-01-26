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
            <h3 class="box-title">{{$titulo}}</h3>


        </div>

        <div class="box-header">
            <a href="{{url('/locarEquipamento/cadastrar')}}" class="btn btn-danger">
                <span class="fa fa-plus">

                </span> Adicionar {{$titulo}}</a>
            <br/><hr/>
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
        </div>

        <table class="table table-striped table-bordered" id="example1">
            <thead>
                <tr>
                    <th style="text-align: center">
                        Aluguel 
                    </th>
                    <th style="text-align: center">
                        Vencimento  
                    </th>
                    <th style="text-align: center">
                        Locador
                    </th>
                     <th style="text-align: center">
                        Observações
                    </th>
                    <th style="text-align: center">
                        Telefone
                    </th>
                    <th style="text-align: center">
                        Equipamento
                    </th>
                    <th style="text-align: center">
                        COD
                    </th>
                    <th style="text-align: center">
                        Endereço
                    </th>

                    <th style="text-align: center">
                        Status
                    </th>
                    <th style="text-align: center">
                        Prorrogar
                    </th>
                    <th style="text-align: center">

                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($itens as $iten)

                @if($iten->locador->user_id === auth()->user()->id)

                <tr >
                    <td >

                        {{date( 'd/m/Y' , strtotime($iten->data_aluguel))}}
                    </td>
                    <td>
                        {{date( 'd/m/Y' , strtotime($iten->vencimento))}}
                    </td>
                    <td>
                        {{$iten->locador->nome}}
                    </td>
                    <td>
                        {{$iten->locador->obs}}
                    </td>
                    <td>
                        {{$iten->locador->telefone}}
                    </td>
                    <td>
                        {{$iten->equipamento->nome}}
                    </td>
                    <td>
                        {{$iten->equipamento->codigo}}
                    </td>
                    <td>
                        {{$iten->endereco}}
                    </td>

                    <td>
                        @if($iten->status == 1)
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-finaliza-{{$iten->id}}">
                            Finalizar
                        </button>


                        {!! Form::model($iten, ['method' => 'PATCH', 'url' => 'equipamentosItens/update/'.$iten->equipamento->id]) !!}

                        <div class="modal fade" id="modal-finaliza-{{$iten->id}}" style="display: none;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span></button>
                                        <h4 class="modal-title">Finalizar Locação </h4>
                                    </div>
                                    <div class="modal-body">
                                        Deseja Realmente Finalizar está Locação do Equipamento  {{$iten->equipamento->nome}}
                                        <input type="hidden"  name="status" value="0">
                                        <input type="hidden"  name="idIten" value="{{$iten->id}}">
                                        <input type="hidden"  name="status" value="0">
                                        <input type="hidden"  name="vencimento" value="{{ $iten->vencimento}}">
                                        <input type="hidden"  name="data_aluguel" value="{{ $iten->data_aluguel}}">

                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit"  class="btn btn-primary pull-left">Sim </button>
                                        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Não </button>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        {!! Form::close() !!}
                        @else
                        Locação Finalizada 
                        {!! Form::close() !!}
                        @endif
                    </td>
                    <td>


                        @if($iten->status == 1)
                        <button type="button" class=" btn btn-default " data-toggle="modal" data-target="#modal-info-{{$iten->id}}"  >
                            Prorrogar
                        </button>
                        {!! Form::model($iten, ['method' => 'PATCH', 'url' => 'equipamentosItens/update/'.$iten->equipamento->id]) !!}
                        <div class="modal fade centered" id="modal-info-{{$iten->id}}" style="display: none;">
                            <div class="  modal-dialog ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span></button>
                                        <h4 class="modal-title">Informações da Locação </h4>
                                    </div>



                                    <div class="col-md-12">
                                        <div class="input-group"  style="width:100%;">
                                            <label>Periodo </label>
                                            <select class="form-control select2 select2-hidden-accessible" name="periodo_id" style="width: 100%;" tabindex="-1" aria-hidden="true"  required="true">
                                                @foreach ($periodos as $periodo)
                                                @if($periodo->id_user === auth()->user()->id)
                                                <option selected="selected"  value="{{$periodo->id}}">{{$periodo->nome}}--R${{$periodo->valor}},00</option>
                                                @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12" >
                                        <label  style="width:100%;">Data Aluguel</label>
                                        <div class="input-group"  style="width:100%;">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control" id="datepicker" data-inputmask="'alias': 'dd-mm-yyyy'" data-mask="" name="data_aluguel" required="true" value="{{date( 'd/m/Y' , strtotime($iten->data_aluguel))}}">
                                        </div>               
                                    </div>
                                    <div class="col-md-12"  style="width:100%;">
                                        <label>Data Vencimento</label>
                                        <div class="input-group"  style="width:100%;">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control" id="datepicker1" data-inputmask="'alias': 'dd-mm-yyyy'" data-mask="" name="vencimento"  required="true" value="{{date( 'd/m/Y' , strtotime($iten->vencimento))}}">
                                        </div>                                                    
                                    </div>

                                    <div class="col-md-12"  style="width:100%;">
                                        <label>Endereço de Locação</label>
                                        <div class="input-group"  style="width:100%;">
                                            <input type="text" class="form-control"  placeholder="Rua Avenida e o Número" name="endereco" required="true" value="{{$iten->endereco}}"> 
                                        </div>
                                    </div>
                                    
                                    <!--                                    <div class="col-md-12">
                                                                            <label>CEP</label>
                                    
                                                                            <input type="text" name="cep" class="form-control" id="cep" placeholder="Digite o do local." required="true" value="{{$iten->cep}}">
                                    
                                                                        </div>-->
                                    <input type="hidden"  name="status" value="1">
                                    <input type="hidden"  name="equipamento_id" value="{{$iten->equipamento_id}}">
                                    <input type="hidden"  name="locador_id" value="{{$iten->locador_id}}">
                                    <input type="hidden"  name="forma_pagamento_id" value="{{$iten->forma_pagamento_id}}">
                                    <input type="hidden"  name="idIten" value="{{$iten->id}}">
                                    <input type="hidden"  name="status" value="1">

                                    <div class="modal-footer">


                                        <button type="submit"  class="btn btn-primary pull-left">Sim </button>
                                        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Não </button>

                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        {!! Form::close() !!}
                        @endif
                        </div>




                    </td>
                    <td>
                        @if($iten->status == 1)
                        <button type="button" class=" btn btn-danger " data-toggle="modal" data-target="#modal-delete-{{$iten->id}}"  >
                            Cancelar
                        </button>
                        {!! Form::model($iten, ['method' => 'PATCH', 'url' => 'locados/deletar/'.$iten->id]) !!}
                        <div class="modal fade centered" id="modal-delete-{{$iten->id}}" style="display: none;">
                            <div class="  modal-dialog ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span></button>
                                        <h4 class="modal-title">Cancelar Locação </h4>
                                    </div>


                                    <h5>Tem certeza que deseja cancelar a locação ??</h5>
                                    <input type="hidden"  name="equipamento_id" value="{{$iten->equipamento_id}}">
                                    <input type="hidden"  name="status" value="0">
                                    <div class="modal-footer">


                                        <button type="submit"  class="btn btn-primary pull-left">Sim </button>
                                        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Não </button>

                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        {!! Form::close() !!}
                        @endif
                    </td>

                </tr>
                @endif
                @endforeach
            </tbody>

        </table>


    </div>

</section>
@endsection
