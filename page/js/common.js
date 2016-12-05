$(window).scroll(function(){
    if ($(this).scrollTop() > $(window).height()) {
        $(".btn_up").fadeIn();
    } else {
        $(".btn_up").fadeOut();
    }
});


$(".btn_up").click(function(){
    $("html,body").animate({scrollTop: 0}, 600);
    return false;
});


$(".btn_up").mouseover(function(){
    $(".btn_up_inside")
    .css('border-top', '2px solid rgb(33, 58, 102)')
    .css('border-left', '2px solid rgb(33, 58, 102)');
});

$(".btn_up").mouseout(function(){
    $(".btn_up_inside")
    .css('border-top', '2px solid rgb(251, 165, 52)')
    .css('border-left', '2px solid rgb(251, 165, 52)');
});





)
