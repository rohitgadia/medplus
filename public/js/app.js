var width;
$(window).resize(function(){
	width = $('.boxes').width();
	$('.shadow').css('width',width+1);
});
$(window).ready(function(){
	width = $('.boxes').width();
	$('.shadow').css('width',width+1);
});
