$ ->
    $async_tweetlog = $('#async-tweetlog')
    $async_dsyogi = $('#async-dsyogi')
    $async_birthday = $('#async-birthday')
    # Tweetlog非同期
    $.ajax({
        type: "GET"
        url: "./log/tweetlogplain" #PHPを呼び出す
        success: (plain) ->
            $async_tweetlog.html(plain)

            # Tweetlog 表示切り替えボタン
            $async_tweetlog.removeClass('hidden')
            $async_tweetlog.click ->
                if ($('.svg-panel').css('display') == 'none')
                    $('.svg-line').hide()
                    $('.svg-panel').show()
                else
                    $('.svg-line').show()
                    $('.svg-panel').hide()
        error: ->
            $async_tweetlog.html('読み込みに失敗しました')
    })

        # どうぶつしょうぎログ非同期
    $.ajax({
        type: "GET"
        url: "./log/dsyogiplain" #PHPを呼び出す
        data: "" #記入されたデータを渡す
        success: (plain) ->
            $async_dsyogi.html(plain)
        error: ->
            $async_dsyogi.html('読み込みに失敗しました')
    })

    # birthdayAPI処理の呼び出し
    $.ajax({
        type: "GET"
        url: "./log/birthdayplain" #PHPを呼び出す
        success: (plain) ->
            $async_birthday.html(plain)
        error: ->
            $async_birthday.html('読み込みに失敗しました')
    })

