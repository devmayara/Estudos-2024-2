$(function (){
    $(".jquery_essentials").html("jQuery Essentials.");
    // var jquery_essentials = "ola, mundo!";
    // alert(jquery_essentials);

    console.group("Mensagens Gerais");
    console.log("jQuery Essentials");
    console.info("O jQuery Essentials foi carregado com sucesso!");
    console.warn("Um alerta!");
    console.error("Um erro!");
    console.groupEnd();

    var cadastro = true;

    console.group("Cadastro de Mensagens");
    console.info("Cadastro iniciado");
    if (cadastro === true){
        console.log("Cadastro Realizado");
    } else {
        console.warn("Error ao cadastrar");
    }
    console.groupEnd();
});
