
!function ($) {
    $(function() {
        $('#switch-tweet-log').click(function() {
            if ($('.svg-panel').css('display') == 'none') {
                $('.svg-line').hide();
                $('.svg-panel').show();
            } else {
                $('.svg-line').show();
                $('.svg-panel').hide();
            }
        });
    });
}(window.jQuery)

