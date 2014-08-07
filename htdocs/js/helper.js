!function ($) {
    $(function() {
        $('img').bind('error',function(){
            $(this).attr({src: '/images/not_found.png'});
		});
	});
}(window.jQuery)
