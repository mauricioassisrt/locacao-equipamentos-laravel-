
<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
</style>
</head>
<body>

<h2 style="text-align: center;">Teste de relatorios </h2>
<hr/>
<p>Testando relatorios Com DOMPDF</p>

<table style="width:100%">
    @foreach ($equipamentos as $equipamento)
                <!--verifica se o equipamento cadastrado está relacionado a empresa logada-->
                @if(auth()->user()->id  === $equipamento->user_id)
                <!---->
                <tr>
                    <td>
                        {{$equipamento->nome}}
                    </td>
                    <td>
                        {{$equipamento->descricao}}
                    </td>
                    <td>
                        {{$equipamento->codigo}}
                    </td>
                    <td>
                        @if($equipamento->status == 0)
                        Não alugado
                        @else
                        Alugado
                        @endif
                    </td>

                    <td>
                 

                </tr>

                @endif
                @endforeach

</table>

</body>
</html>
