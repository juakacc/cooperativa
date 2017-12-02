$(document).ready(function() {
    $(".form-dados").validate({
        rules:{
            rua:{
                required:true
            },
            numero:{
                required:true, digits: true
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
            }
        },
        messages:{
            rua:{
                required: "Rua é obrigatória"
            },
            numero:{
                required: "Esse campo é obrigatório",
                digits: "Apenas dígitos"
            },
            bairro:{
                required: "Bairro é obrigatório"
            },
            cidade:{
                required: "Cidade é obrigatória"
            },
            descricao:{
                required: "Esse campo é obrigatório",
                minlength: "Descrição insuficiente"
            },

            funcao:{
                required: "Esse campo é obrigatório",
                minlength: "Tamanho mínimo é 4"
            },

            cnpj:{
                required: "O CNPJ é obrigatório"
            },
            razao:{
                required: "A razão é obrigatória"
            }
        }
    });
});