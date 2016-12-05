$(function(){
	if($('#mainPage').hasClass('site/index')){
	    $(".guest").fadeIn(1000);
	}
	
	$("#slidesearch").click(function(){
        $("#showsearch").slideToggle("slow");
    });
	
});
