gulp = require 'gulp'
gutil = require 'gulp-util'

$ = require('gulp-load-plugins')()

# config
# src_dir = './src'
# public_dir = './public'

config =
  templates:
    source: './src/jade'
    watch: './src/jade/**/*.jade'
    destination: './public/templates'
    config:
      pretty: true
  scripts:
    source: './src/coffee'
    watch: './src/coffee/*.coffee'
    destination: './public/scripts'
    option:
      bare: true
  styles:
    source: './src/stylus'
    watch: './src/stylus/*.styl'
    destination: './public/styles/'

# error handle
handleError = (err) ->
  gutil.log err
  gutil.beep()
  this.emit 'end'

# tasks
gulp.task 'template', ->
#   console.log config.src.jade_files
#   console.log config.src.jade_dir
  gulp
    .src config.templates.watch
    .pipe $.jade(
      config.templates.option
    )
    .on 'error', handleError
    .pipe gulp.dest config.templates.destination

gulp.task 'script', ->
  gulp
    .src config.scripts.watch
    .pipe $.coffee()
    .on 'error', handleError
    .pipe gulp.dest config.scripts.destination

gulp.task "style", ->
  gulp
    .src config.styles.watch
    .pipe $.stylus()
    .on 'error', handleError
    .pipe gulp.dest config.styles.destination

# watch
gulp.task 'watch', ->
  gulp.watch config.scripts.source, ['script']
  gulp.watch config.styles.source, ['style']

#load
gulp.task 'default', ["script", "style"]
