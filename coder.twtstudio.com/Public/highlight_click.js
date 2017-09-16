$(document).ready(function(){
	var pages = window.location.href.split("/");
	$('.nav_' + pages[pages.length -2]).addClass('link-active');
})