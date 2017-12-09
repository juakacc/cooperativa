var tipo = document.getElementById("tipo").value;

if (tipo == "empresa") {
    document.getElementById("cnpj").setAttribute("onblur", "verificar()");
} else {
    document.getElementById("cpf").setAttribute("onblur", "verificar()");
}

function verificar() {

    try {
        var request = new XMLHttpRequest();
    } catch (falha) { }

    if (tipo == "empresa") {
        var identificador = document.getElementById("cnpj").value;
        identificador = identificador.replace("/", "-");
    } else {
        var identificador = document.getElementById("cpf").value;
    }

    request.open("GET", "verificar/"+tipo+"/"+identificador, true);
    request.send();

    request.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            if (request.responseText == true) {
                document.getElementById("div-msg").innerHTML = "CPF/CNPJ já cadastrado";
            } else {
                document.getElementById("div-msg").innerHTML = "";
            }
        }
    }
}