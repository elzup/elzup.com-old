!function ($) {
    $(function() {
        $('img').bind('error',function(){
            $(this).attr({src: './images/no_found.png'});
		});
	});
    $('.img-box-absolute').click(function() {
        $('.elzup-icon').attr('src', '//elzup.com/i/co' + ("0" + (Math.floor(Math.random() * 66) + 1)).slice(-2) + '.png');
    });
}(window.jQuery)
