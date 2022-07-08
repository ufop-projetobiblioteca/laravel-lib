function validaData() {
    var data = new Date();
    var dia = String(data.getDate()).padStart(2, "0");
    var mes = String(data.getMonth() + 1).padStart(2, "0");
    var ano = data.getFullYear();

    dataAtual = ano + '-' + mes + '-' + dia;
    min = dia + '/' + mes + '/' + ano;

    document.getElementById("devolver").setAttribute("min", min);
    var input = document.getElementById("devolver").value;

    if(input < dataAtual) {
        alert("Insira uma data válida!");
        return false;
    }
    else {
        return true;
    }
}

function validaCadastro() {
    var data = new Date();
    var dia = String(data.getDate()).padStart(2, "0");
    var mes = String(data.getMonth() + 1).padStart(2, "0");
    var ano = data.getFullYear();

    dataAtual = ano + '-' + mes + '-' + dia;
    min = dia + '/' + mes + '/' + ano;

    document.getElementById("devolucao").setAttribute("min", min);
    var input = document.getElementById("devolucao").value;

    if(input < dataAtual) {
        alert("Insira uma data válida!");
        return false;
    }
    else {
        return true;
    }
}





