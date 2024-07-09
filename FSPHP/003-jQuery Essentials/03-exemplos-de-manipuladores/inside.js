$(function () {
    var text = $(".j").text();
    var html = $(".j").html();

    // $(".e").text(html);
    // $(".e").html(html);
    $(".e").append("<p>"+text+"</p>");
    $(".e").append("<p>"+html+"</p>");
    $(".a").appendTo($(".e"));
    $("<p><b>#BoraProgramar!</b></p>").appendTo($(".e"));

    $("<p>Exemplos: </p>").prependTo($(".e"));
    $(".e").prepend($("<h2>Resultados: </h2>"));
});
