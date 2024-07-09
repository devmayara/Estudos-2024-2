$(function () {
    // SELETOR DE ELEMENTO
    $("b").text("jQuery Essentials");
    // console.warn($("b")[0].offsetTop);
    // console.log($("b"));

    // $(".jquery").css("color", "red");
    //
    // $("#jquery").text("Id = jquery");
    //
    // $("div *").css("border", "1px solid #ccc");

    $(".jquery, b").css({
        background: "blue",
        color: "red",
        'border-radius': "4px",
    });
});