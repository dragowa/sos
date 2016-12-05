$(function(){
    $(".navigation").click(function(){
         $(".navigation").children().children("ul").stop(false,true).slideUp("slow");
          $(this).children().children("ul").stop(false,true).slideToggle("slow");
    })
});

// $(function($){
// 	$(document).mouseup(function (e){
// 		var div = $(".go");
// 		if (!div.is(e.target)
// 		    && div.has(e.target).length === 0) {
// 			div.slideUp("slow");
// 		}
// 	});
// });
