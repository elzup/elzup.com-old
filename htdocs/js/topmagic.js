
!function ($) {
    $(function() {
        console.log("load topmagic");
        $('.front').show();
        $('.back').hide();

        $(".cell").hover( function() {
            $(this).children('div').removeClass("off");
            var front = $(this).children('.front');
            var back = $(this).children('.back');
            front.addClass("on");
            setTimeout(function() { 
                front.hide();
                back.show().addClass("on");
            }, 100);
        }, function() {
            $(this).children('div').removeClass("on");
            var front = $(this).children('.front');
            var back = $(this).children('.back');
            back.addClass("off");
            setTimeout(function() { 
                back.hide();
                front.show().addClass("off");
            }, 100);
        });

//        $('.cell').hover(function() {
//            $(this).addClass('pulse');
//        }, function () {
//            $(this).removeClass('pulse');
//        });

//        setStartAnime(".cell-1", "fadeIn", 1);
//        setStartAnime(".cell-10", "fadeIn", 2);
//        setStartAnime(".cell-13", "fadeIn", 90);
//        setStartAnime(".cell-21", "fadeIn", 120);
//        setStartAnime(".cell-33", "fadeIn", 150);

//        $(".cell-1").flip({
//            direction: 'lr'
//        });


        function setStartAnime(selector, addClass, starttime) {
            setTimeout(function() {
                $(selector).addClass(addClass);
            }, starttime);
        }
    });

}(window.jQuery)

