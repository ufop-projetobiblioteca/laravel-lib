function validaData() {
    var dataDevolucao = Date.parse(formDevolucao.devolucao.value);
    var dataAtual = new Date();
    dataAtual.setDate(dataAtual.getDate() + 7);

    if (dataDevolucao > dataAtual.getTime()) {
        alert("Escolha uma data válida!");
    } else {
        formDevolucao.submit();
    }
}