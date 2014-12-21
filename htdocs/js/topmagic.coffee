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
                $front.css('transform', "rotate(" + (- i * 180 / (STOP_TIME)) + "deg)")
            (i), i)
        setTimeout(->
            $front.hide()
            $back.show().addClass("on")
            for i in [0..(STOP_TIME / 2)]
                setTimeout((i) ->
                    $back.css('transform', "rotate(" + (90 - i * 180 / (STOP_TIME)) + "deg)")
                (i), i)
        ,STOP_TIME / 2)

    , ->
        $(@).children('div').removeClass("on")
        $front = $(@).children('.front')
        $back = $(@).children('.back')
        $back.addClass("off")
        id = $(@).attr('data-id')
        $('.message-' + id).hide()
        for i in [0..(STOP_TIME / 2)]
            setTimeout((i) ->
                $back.css('transform', "rotate(" + (i * 180 / (STOP_TIME)) + "deg)")
            (i), i)
        setTimeout(->
            $back.hide()
            $front.show().addClass("off")
            for i in [0..(STOP_TIME / 2)]
                setTimeout((i) ->
                    $front.css('transform', "rotate(" + (i * 180 / (STOP_TIME) - 90) + "deg)")
                (i), i)
        ,STOP_TIME / 2)

    # icon magic
    $('.cell-11').children('div').click ->
        num = ("0" + (Math.floor(Math.random() * 66) + 1)).slice(-2)
        console.log(num)
        url = '//elzup.com/i/co' + num + '.png'
        $img = $('<img/>').attr('src', url).addClass('drop-img')
        pos = $('.top-icon').offset()
        offset_y = 12
        offset_x = 7
        $img.css
            'position': 'absolute'
            'top': (pos.top + offset_y - 140) + 'px'
            'left': (pos.left + offset_x) + 'px'
        $('body').append($img)
        $img.animate
            'top': (pos.top + offset_y) + 'px'
            'left': (pos.left + offset_x) + 'px'
        $('.drop-img')[0].remove() if $('.drop-img').size() > 3
        if num == "53"
            $img.animate
                'top': (pos.top + offset_y) + 'px'
                'left': (pos.left + offset_x + 305) + 'px'
            $img.removeClass('drop-img')
            $img.addClass('drop-img2')

    # icon magic
    $('.cell-11').children('div').click ->
        num = ("0" + (Math.floor(Math.random() * 66) + 1)).slice(-2)
        console.log(num)
        url = '//elzup.com/i/co' + num + '.png'
        $img = $('<img/>').attr('src', url).addClass('drop-img')
        pos = $('.top-icon').offset()
        offset_y = 12
        offset_x = 7
        $img.css
            'position': 'absolute'
            'top': (pos.top + offset_y - 140) + 'px'
            'left': (pos.left + offset_x) + 'px'
        $('body').append($img)
        $img.animate
            'top': (pos.top + offset_y) + 'px'
            'left': (pos.left + offset_x) + 'px'
        $('.drop-img')[0].remove() if $('.drop-img').size() > 3
        if num == "53"
            $img.animate
                'top': (pos.top + offset_y) + 'px'
                'left': (pos.left + offset_x + 305) + 'px'
            $img.removeClass('drop-img')
            $img.addClass('drop-img2')


#    setStartAnime(".cell-1", "fadeIn", 1)
#    setStartAnime(".cell-10", "fadeIn", 2)
#    setStartAnime(".cell-13", "fadeIn", 90)
#    setStartAnime(".cell-21", "fadeIn", 120)
#    setStartAnime(".cell-33", "fadeIn", 150)


    setStartAnime = (selector, addClass, starttime) ->
        setTimeout(->
            $(selector).addClass(addClass)
        , starttime)

wait = (time) ->
    $.Deferred (defer) ->
        setTimeout ->
            defer.resolve()
        , time
