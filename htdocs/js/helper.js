!function ($) {
    $(function() {
        $('img').bind('error',function(){
            $(this).attr({src: './images/no_found.png'});
		});
	});
}(window.jQuery)
