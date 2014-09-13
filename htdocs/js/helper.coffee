$ ->

    $('img').bind('error', ->
        $(this).attr({src: './images/no_found.png'})
    )

    $('.img-box-absolute').click ->
        $('.elzup-icon').attr('src', '//elzup.com/i/co' + ("0" + (Math.floor(Math.random() * 66) + 1)).slice(-2) + '.png')

    # scroll jump
    $(".btn-jump").click ->
        id = $(this).attr('for')
        p = $(id).offset().top
        $('html,body').animate({ scrollTop: p }, 'fast')
        return false

    $('[data-toggle=jumpopen]').click ->
        window.open $(@).attr("data-url")
    $('[data-toggle=jump]').click ->
        window.location.href = $(@).attr("data-url")
