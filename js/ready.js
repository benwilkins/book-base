$(document).ready(function(){
	BOOKS.loader.trigger(BOOKS.loader.notifications.pageInit, [window.location.pathname.split("/")]);
});