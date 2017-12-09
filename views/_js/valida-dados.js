$(document).ready(function() {

    var str = "Este campo é obrigatório";

    $(".form-dados").validate({
        rules:{
            rua:{
                required:true
            },
            numero:{
                digits: true
            },
            bairro:{
                required:true
            },
            cidade:{
                required:true
            },
            descricao:{
                required:true, minlength: 4
            },

            cpf:{
                required:true
            },
            nome:{
                required:true
            },
            senha:{
                required:true, minlength: 6
            },

            funcao:{
                required:true, minlength: 4
            },

            cnpj:{
                required:true
            },
            razao:{
                required:true
            },
            data:{
                required:true
            },

            ide:{
                required:true
            }
        },
        messages:{
            rua:{
                required: str
            },
            numero:{
                digits: "Apenas dígitos"
            },
            bairro:{
                required: str
            },
            cidade:{
                required: str
            },
            descricao:{
                required: str,
                minlength: "Descrição insuficiente"
            },

            funcao:{
                required: str,
                minlength: "Tamanho mínimo é 4"
            },

            cnpj:{
                required: str
            },
            cpf:{
                required: str
            },
            nome:{
                required: str
            },
            razao:{
                required: str
            },
            senha:{
                required: str,
                minlength: "Tamanho mínimo é 6"
            },
            data:{
                required: str
            },

            ide:{
                required: str
            }
        }
    });
});