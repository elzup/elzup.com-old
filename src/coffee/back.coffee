looper = null
SCREEN_WIDTH = 0
SCREEN_HEIGHT = 0
canvas = document.getElementById('c')
ctx = canvas.getContext('2d')
NUM_NODES = 20
words = 'C,C++,C#,PHP,Python,Java,Ruby,JavaScript,processing,jQuery,Jade,LESS,SASS,Stylus,CoffeeScript,processing.js,Thymeleaf,CodeIgniter,Slim,Bootstrap,Pure,Materialize,Foundation,Django,AndroidSDK,Spring,Rails,DxLib,Java servlet,Mecab,Paris/idiorm,TwitterFabric,Twitter4J,Selenium,BeautifulSoup,TwitterAPI,TwitterWebAPI,UstreamAPI,MetroAPI,GoogleMapAPI,GoogleScript,Windows,linux,OSX,mysql,PostgreSQL,redis,VisualStudio,Eclipse,NetBeans,IntelliJ IDEA,PhpStorm,WebStorm,PyCharm,AndroidStudio,Vim,Unity,Blender,MonoDevelop,git,grunt,composer,npm,gem,bower,gulp,gradle,maven,Trello'.split ','
minDist = 150
nodes = []
springAmount = 0.001
mouse_move_x = Array(0, 0)
mouse_move_y = Array(0, 0)
mouse_move_a = 0
node_v_update_count = 0
node_v_update_interval = 1
col_s = 0

$ ->
    resize_bg_action = ->
        w = parseInt($('body').width())
        h = parseInt($('#container').height() + parseInt($('#container').css('margin-top')) + parseInt($('#container').css('padding-bottom')))
        SCREEN_WIDTH = w
        SCREEN_HEIGHT = h
        $(canvas).css('top', parseInt($('#container').offset().top) - parseInt($('#container').css('margin-top')))
        $(canvas).height(SCREEN_HEIGHT + 'px')
        $(canvas).width(SCREEN_WIDTH + 'px')
        canvas.width = SCREEN_WIDTH
        canvas.height = SCREEN_HEIGHT
    timer = false
    timer = setTimeout ->
        resize_bg_action()
        nodes_init()
    , 100
    $(window).resize ->
        if timer != false
            clearTimeout timer
        timer = setTimeout ->
            resize_bg_action()
        , 200

    mouse_move_timer = false
    reset_mouse_move = ->
        mouse_move_x[1] = 0
        mouse_move_x[0] = 0
        mouse_move_y[1] = 0
        mouse_move_y[0] = 0
        mouse_move_a = 0

    $('#c,#mainvisual').mousemove (e) ->
        if looper != null
            mouse_move_x[1] = mouse_move_x[0]
            mouse_move_x[0] = e.pageX
            mouse_move_y[1] = mouse_move_y[0]
            mouse_move_y[0] = e.pageY
            if mouse_move_x[1] == 0 && mouse_move_y[1] == 0
                return
            dx = mouse_move_x[1] - mouse_move_x[0]
            dy = mouse_move_y[1] - mouse_move_y[0]
            col_s += Math.abs(dx + dy) / 10
            col_s %= 360
            mouse_move_a = Math.sqrt(dx * dx + dy * dy)
            if timer != false
                clearTimeout(timer)
            timer = setTimeout ->
                reset_mouse_move()
            , 200

    $('#c,#mainvisual').hover ->
        reset_mouse_move()
    , ->
        reset_mouse_move()

nodes_init = ->
  createNodes()
  ctx.lineWidth = 1.5
  ctx.fillStyle="gray"
  looper = setInterval(nodes_loop, 1000 / 15)

createNodes = ->
    nodes = []
    for i in [0..NUM_NODES]
        ri = Math.floor(Math.random() * words.length)
        word = words[ri]
        words.splice(ri, 1)
        node =
            radius: 3
            x: Math.random() * SCREEN_WIDTH
            y: Math.random() * SCREEN_HEIGHT
            vx: Math.random() * 8 - 4
            vy: Math.random() * 8 - 4
            word: word
            mass: 1
            update: ->
                  this.x += this.vx
                  this.y += this.vy
                  if node_v_update_interval < node_v_update_count
                      this.x += (this.vx * mouse_move_a * 0.1)
                      this.y += (this.vy * mouse_move_a * 0.1)
                      node_v_update_count = 0
                  node_v_update_count++
                  if this.x > SCREEN_WIDTH
                      this.vx *= -1
                      this.vy *= 1
                      this.x = SCREEN_WIDTH
                  else if this.x < 0
                      this.vx *= -1
                      this.vy *= 1
                      this.x = 0
                  if this.y > SCREEN_HEIGHT
                      this.vx *= 1
                      this.vy *= -1
                      this.y = SCREEN_HEIGHT
                  else if this.y < 0
                      this.vx *= 1
                      this.vy *= -1
                      this.y = 0
            draw: ->
              ctx.font="16px Raleway"
#              ctx.shadowColor = "rgba(0, 0, 0, 0.5)";
              ctx.fillText(this.word, this.x - this.word.length * 5, this.y + 8);
              ctx.fillText(this.word, this.x - this.word.length * 5, this.y + 8);

        while SCREEN_HEIGHT * 3 / 4 < node.y
            node.y = Math.random() * SCREEN_HEIGHT
        nodes.push(node)

nodes_loop = ->
    ctx.clearRect(0, 0, canvas.width, canvas.height)
    for i in [0..NUM_NODES]
        nodes[i].update()
        nodes[i].draw()
    for i in [0..NUM_NODES]
        node1 = nodes[i]
        for j in [(i + 1)..NUM_NODES]
            node2 = nodes[j]
            spring(node1, node2)

spring = (na, nb) ->
    if !na? || !nb?
        return
    dx = nb.x - na.x
    dy = nb.y - na.y
    dist = Math.sqrt(dx * dx + dy * dy)
    if dist < minDist
        ctx.beginPath()
        ctx.strokeStyle = "hsla(" + col_s + 50 + ",80%,50%," + (1 - dist / minDist / 2) + ")"
        ctx.moveTo(na.x, na.y)
        ctx.lineTo(nb.x, nb.y)
        ctx.stroke()
        ctx.closePath()
        ax = dx * springAmount
        ay = dy * springAmount
        na.vx += ax
        na.vy += ay
        nb.vx -= ax
        nb.vy -= ay
    else if dist < minDist * 2
        ctx.beginPath()
        ctx.strokeStyle = "hsla(" + col_s + ",80%,80%," + (1 - dist / minDist / 2) + ")"
        ctx.moveTo(na.x, na.y)
        ctx.lineTo(nb.x, nb.y)
        ctx.stroke()
        ctx.closePath()
