!function ($) {
    $(function() {
        $('img').bind('error',function(){
            $(this).attr({src: './images/no_found.png'});
        });

        $('.img-box-absolute').click(function() {
            $('.elzup-icon').attr('src', '//elzup.com/i/co' + ("0" + (Math.floor(Math.random() * 66) + 1)).slice(-2) + '.png');
        });

        // scroll jump
        $(".btn-jump").click(function () {
            var id = $(this).attr('for');
            console.log(id);
            var p = $(id).offset().top;
            console.log(p);
            $('html,body').animate({ scrollTop: p }, 'fast');
            return false;
        return false;
        });

    });

}(window.jQuery)
