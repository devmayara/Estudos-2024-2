$(function () {
    $("div p").css("color", "red");

    $("article > p").css("color", "blue");

    $("article + div").css("backgroud", "yellow");

    $("div ~ p").text("Irmaos")
});