
!function ($) {
    $(function() {
        // Tweetlog非同期
        $.ajax({
            type: "GET",
            url: "./log/tweetlogplain", //PHPを呼び出す
            success: function(plain){
                console.log(plain);
                $('#async-tweetlog').html(plain);

                // Tweetlog 表示切り替えボタン
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

        // どうぶつしょうぎログ非同期
        $.ajax({
            type: "GET",
            url: "./log/dsyogiplain", //PHPを呼び出す
            data: "", //記入されたデータを渡す
            success: function(plain){
                $('#async-dsyogi').html(plain);
            },
            error:function(){
                $('#async-dsyogi').html('読み込みに失敗しました');
            }
        });

        // birthdayAPI処理の呼び出し
        $.ajax({
            type: "GET",
            url: "./log/birthdayplain", //PHPを呼び出す
            success: function(plain){
                $('#async-birthday').html(plain);
            },
            error:function(){
                $('#async-birthday').html('読み込みに失敗しました');
            }
        });

    });
}(window.jQuery)

