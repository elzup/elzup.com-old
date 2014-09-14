# coffeescript
$ ->

    # init variables
    STOP_TIME = 0
    $('.front').show()
    $('.back').hide()
    $(".cell").hover ->
        $(@).children('div').removeClass("off")
        front = $(@).children('.front')
        back = $(@).children('.back')
        front.addClass("on")
        id = $(@).attr('data-id')
        $('.message-' + id).show()
        setTimeout( ->
            front.hide()
            back.show().addClass("on")
        , STOP_TIME)
    , ->
        $(@).children('div').removeClass("on")
        front = $(@).children('.front')
        back = $(@).children('.back')
        back.addClass("off")
        id = $(@).attr('data-id')
        $('.message-' + id).hide()
        setTimeout( ->
            back.hide()
            front.show().addClass("off")
        , STOP_TIME)

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
