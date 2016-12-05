$(document).ready(function() {

    $('#FrontPage').height($(window).height());

    });


$("div:first-child").removeClass("container")



$(".btn_first.yellow").mouseover = function() {

  var block = $(".btn_first.yellow:before ")

  animate({
    duration: 1000,
    timing: function(timeFraction) {
      console.log(timeFraction);
      return (timeFraction);
    },
    draw: function(progress) {
      block.style.top = progress  + 'px';
    }
  });
};
