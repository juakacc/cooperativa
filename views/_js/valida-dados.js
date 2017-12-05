$(document).ready(function() {
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
            }
        },
        messages:{
            rua:{
                required: "Rua é obrigatória"
            },
            numero:{
                digits: "Apenas dígitos"
            },
            bairro:{
                required: "Bairro é obrigatório"
            },
            cidade:{
                required: "Cidade é obrigatória"
            },
            descricao:{
                required: "Descrição é obrigatório",
                minlength: "Descrição insuficiente"
            },

            funcao:{
                required: "Função é obrigatória",
                minlength: "Tamanho mínimo é 4"
            },

            cnpj:{
                required: "O CNPJ é obrigatório"
            },
            cpf:{
                required: "O CPF é obrigatório"
            },
            nome:{
                required: "Nome é obrigatório"
            },
            razao:{
                required: "A razão é obrigatória"
            },
            senha:{
                required: "Senha é obrigatório",
                minlength: "Tamanho mínimo é 6"
            },
            data:{
                required: "Data é obrigatória"
            }
        }
    });
});