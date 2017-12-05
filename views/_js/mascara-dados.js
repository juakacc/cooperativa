$(document).ready(function () {
    $("input[name=cpf]").mask("999.999.999-99");

    $("input[name=cnpj]").mask("99.999.999/9999-99");

    $("input[name=data]").mask("99/99/9999");

    $("input[name=telefone]").mask("(99) 9999-9999?9").on("focusout", function () {
        var len = this.value.replace(/\D/g, '').length;
        $(this).mask(len > 10 ? "(99) 99999-999?9" : "(99) 9999-9999?9");
    });
});