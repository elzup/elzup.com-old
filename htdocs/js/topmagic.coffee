# coffeescript
$ ->

    # init variables
    STOP_TIME = 180
    $('.front').show()
    $('.back').hide()
    $(".cell").hover ->
        $(@).children('div').removeClass("off")
        $front = $(@).children('.front')
        $back = $(@).children('.back')
        $front.addClass("on")
        id = $(@).attr('data-id')
        $('.message-' + id).show()
        for i in [0..(STOP_TIME / 2)]
            setTimeout((i) ->
                $front.css('transform', "rotate(" + (i * 180 / (STOP_TIME)) + "deg)")
            (i), i)
        setTimeout(->
            $front.hide()
            $back.show().addClass("on")
            for i in [0..(STOP_TIME / 2)]
                setTimeout((i) ->
                    $back.css('transform', "rotate(" + (i * 180 / (STOP_TIME) - 90) + "deg)")
                (i), i)
        ,STOP_TIME / 2)

#        flip_on($front, $back, STOP_TIME)
#        setTimeout( ->
#            $front.hide()
#            $back.show().addClass("on")
#        , STOP_TIME)
    , ->
        $(@).children('div').removeClass("on")
        $front = $(@).children('.front')
        $back = $(@).children('.back')
        $back.addClass("off")
        id = $(@).attr('data-id')
        $('.message-' + id).hide()
        for i in [0..(STOP_TIME / 2)]
            setTimeout((i) ->
                $back.css('transform', "rotate(" + (-i * 180 / (STOP_TIME)) + "deg)")
            (i), i)
        setTimeout(->
            $back.hide()
            $front.show().addClass("on")
            for i in [0..(STOP_TIME / 2)]
                setTimeout((i) ->
                    $front.css('transform', "rotate(" + (90 - i * 180 / (STOP_TIME)) + "deg)")
                (i), i)
        ,STOP_TIME / 2)

#    $('.cell').hover ->
#        $(@).addClass('pulse')
#    , ->
#        $(@).removeClass('pulse')
#
#    setStartAnime(".cell-1", "fadeIn", 1)
#    setStartAnime(".cell-10", "fadeIn", 2)
#    setStartAnime(".cell-13", "fadeIn", 90)
#    setStartAnime(".cell-21", "fadeIn", 120)
#    setStartAnime(".cell-33", "fadeIn", 150)


    setStartAnime = (selector, addClass, starttime) ->
        setTimeout(->
            $(selector).addClass(addClass)
        , starttime)

flip_on = ($front, $back, time) ->
    $front.css('transform', "rotate(" + time + "deg)")
    if time == 0
        $front.hide()
        $back.show().addClass("on")
        return
    setTimeout("flip_on($front, $back, " + (time - 1) + ")", 1)

wait = (time) ->
    $.Deferred (defer) ->
        setTimeout ->
            defer.resolve()
        , time
