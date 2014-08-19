
!function ($) {
    $(function() {
        // Tweetlog 表示切り替えボタン
        // どうぶつしょうぎログ非同期
        $.ajax({
            type: "GET",
            url: "./log/dsyogiplain", //PHPを呼び出す
            data: "", //記入されたデータを渡す
            success: function(plain){
                console.log(plain);
                $('#async-dsyogi').html(plain);
            },
            error:function(){
                $('#async-dsyogi').html('読み込みに失敗しました');
            }
        });

        // Tweetlog非同期
        $.ajax({
            type: "GET",
            url: "./log/tweetlogplain", //PHPを呼び出す
            data: "", //記入されたデータを渡す
            success: function(plain){
                console.log(plain);
                $('#async-tweetlog').html(plain);

                $('#switch-tweet-log').removeClass('hidden');
                $('#switch-tweet-log').click(function() {
                    if ($('.svg-panel').css('display') == 'none') {
                        $('.svg-line').hide();
                        $('.svg-panel').show();
                    } else {
                        $('.svg-line').show();
                        $('.svg-panel').hide();
                    }
                });
            },
            error:function(){
                $('#async-tweetlog').html('読み込みに失敗しました');
            }
        });
    });
}(window.jQuery)

