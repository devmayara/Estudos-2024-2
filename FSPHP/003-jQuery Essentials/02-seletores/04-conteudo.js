$(function () {
    $("p:parent").css("background", "red");

    $("p:empty").html("<b>Este esta vazio!</b>");

    $("p:contains('Essentials')").css("color", "#fff");

    $("p:has('b')").text("tem a teg b");
});
