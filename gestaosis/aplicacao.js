// EMPRESA ***********************************************************

$("input[name='tipoempresa']").click(function () {
    var myRadio = $('input[name=tipoempresa]');

    if (myRadio.filter(':checked').val() == 'cpf') {
        $("#cnpj").hide();
        $('#cpf').show();
       
    }
    if (myRadio.filter(':checked').val() == 'cnpj') {
        $("#cnpj").show();
        $('#cpf').hide();
    }
});
$(document).ready(function ($) {
    $('#telefone').mask('(99) 9 9999-9999');
    
});
// FIM EMPRESA ***********************************************************
