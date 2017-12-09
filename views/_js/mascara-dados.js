$(document).ready(function () {
    $('input[name=cpf]').mask('000.000.000-00', {reverse: true});
    // $("input[name=cpf]").mask("999.999.999-99");
    $("input[name=ide]").mask("999.999.999-99");

    $("input[name=cnpj]").mask("99.999.999/9999-99");

    $("input[name=data]").mask("99/99/9999");

    // $("input[name=telefone]").mask("(99) 9999-9999?9").on("focusout", function () {
    //     var len = this.value.replace(/\D/g, '').length;
    //     $(this).mask(len > 10 ? "(99) 99999-999?9" : "(99) 9999-9999?9");
    // });

    var maskBehavior = function (val) {
        return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
        },
        options = {onKeyPress: function(val, e, field, options) {
            field.mask(maskBehavior.apply({}, arguments), options);
        }
    };

    $('input[name=telefone]').mask(maskBehavior, options);

    $("#senha").attr("placeholder", "Min: 6 símbolos");
});