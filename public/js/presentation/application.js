// Some general UI pack related JS

$(document).ready(function() {
    $(".todo li").click(function() {
        $(this).toggleClass("todo-done");
    });

    // JS input/textarea placeholder
    $("input, textarea").placeholder();

    $(".btn-group a").click(function() {
       // $(this).siblings().removeClass("active");
        //$(this).addClass("active");
    });

    // Disable link click not scroll top
    $("a[href='#']").click(function() {
        return false
    });

});

