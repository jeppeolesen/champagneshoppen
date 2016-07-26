gulp = require 'gulp'
stylus = require 'gulp-stylus'
coffee = require 'gulp-coffee'
coffeelint = require 'gulp-coffeelint'
nano = require 'gulp-cssnano'
uglify = require 'gulp-uglify'
del = require 'del'
gutil = require 'gulp-util'
plumber = require 'gulp-plumber'
livereload = require 'gulp-livereload'
sftp = require 'gulp-sftp'
koutoSwiss = require 'kouto-swiss'

project =
	name: 'champagne'
	scripts: 'src/scripts/**/*.coffee'
	styles: 'src/styles/**/*.styl'
	templates: 'src/**/*.php'
	images: 'src/images/**/*'
	acf: 'src/acf-json/*.json'
	dist: ['build/**/*', '!build/acf-json/*.json']

gulp.task 'clean', (cb) ->
	del 'build', cb

gulp.task 'styles', ->
	gulp.src project.styles
		.pipe plumber()
		.pipe stylus
			'use': koutoSwiss()
		.pipe nano
			autoprefixer: 
				browsers: 'last 2 versions'
				add: true
		.pipe gulp.dest 'build'

gulp.task 'scripts', ->
	gulp.src project.scripts
		.pipe plumber()
		.pipe coffeelint
			max_line_length: 
				level: 'ignore'
			no_tabs:
				level: 'ignore'
			indentation:
				value: 1
		.pipe coffeelint.reporter()
		.pipe coffee()
		.pipe uglify
			mangle: false
			beautify: false
		.pipe gulp.dest 'build/scripts'

gulp.task 'templates', ->
	gulp.src project.templates
		.pipe gulp.dest 'build'

gulp.task 'acf', ->
	gulp.src project.acf
		.pipe gulp.dest 'build/acf-json'

gulp.task 'getACF', ->
	settings = require('./settings.json')
	gulp.src "#{ settings.localPath }/#{ project.name}/acf-json/*.json"
		.pipe gulp.dest 'src/acf-json'

gulp.task 'images', ->
	gulp.src project.images
		.pipe gulp.dest 'build/images'

gulp.task 'build', ->
	gulp.start 'styles', 'scripts', 'images', 'templates', 'acf'

gulp.task 'dev', ->
	settings = require('./settings.json')
	livereload.listen()
	gulp.watch [project.styles, project.scripts, project.templates], ['preview']
	gulp.watch ["#{ settings.localPath }/#{ project.name}/acf-json/*.json"], ['getACF']

gulp.task 'preview', ['styles', 'scripts', 'images', 'templates'], ->
	settings = require('./settings.json')

	gulp.src project.dist
		.pipe gulp.dest settings.localPath + '/' + project.name
		.pipe livereload
			quiet: true

gulp.task 'deploy', ['build'], ->
	settings = require('./settings.json')
	
	gulp.src project.dist
		.pipe sftp
			host: settings.remoteHost
			user: settings.remoteUser
			pass: settings.remotePassword
			remotePath: settings.remotePath + '/' + project.name

gulp.task 'deployACF', ->
	settings = require('./settings.json')
	
	gulp.src project.acf
		.pipe sftp
			host: settings.remoteHost
			user: settings.remoteUser
			pass: settings.remotePassword
			remotePath: settings.remotePath + '/' + project.name + '/acf-json'


gulp.task 'default', ->
	gutil.log "#{ gutil.colors.cyan '------------------------------------------------------------' }"
	gutil.log "No default task, use #{ gutil.colors.green 'gulp <task>' } instead"
	gutil.log "#{ gutil.colors.cyan '------------------------------------------------------------' }"
	gutil.log "#{ gutil.colors.bgGreen 'Development Tasks available:' }"
	gutil.log "#{ gutil.colors.green 'gulp clean' } to remove previously built files"
	gutil.log "#{ gutil.colors.green 'gulp styles' } to only build styles"
	gutil.log "#{ gutil.colors.green 'gulp scripts' } to only build scripts"
	gutil.log "#{ gutil.colors.green 'gulp images' } to only process images"
	gutil.log "#{ gutil.colors.green 'gulp build' } to execute a complete build"
	gutil.log "#{ gutil.colors.green 'gulp dev' } to initiate the watchers for local development and live reload"
	gutil.log "#{ gutil.colors.cyan '------------------------------------------------------------' }"
	gutil.log "#{ gutil.colors.bgGreen 'Deployment Tasks available:' }"
	gutil.log "#{ gutil.colors.green 'gulp preview' } to build and deploy to local Wordpress install"
	gutil.log "#{ gutil.colors.green 'gulp deploy' } to build and deploy to remote Wordpress install"
	gutil.log "#{ gutil.colors.cyan '------------------------------------------------------------' }"


gulp.task 'zoidberg', ->
	gutil.log "                              ,oooooo888888888oooooo."
	gutil.log "                         .oo88^^^^^^            ^^^^^Y8o."
	gutil.log "                      .dP'                              `Yb."
	gutil.log "                    dP'                                   `Yb"
	gutil.log "                  .dP'                                     `Yb."
	gutil.log "                 dP'                                         `Yb"
	gutil.log "                d8                                             8b"
	gutil.log "               ,8P                                             `8b"
	gutil.log "               88'                                              88"
	gutil.log "               88                                               88"
	gutil.log "               dP                                               88"
	gutil.log "              d8'                                               88"
	gutil.log "              8P                                               ,dY"
	gutil.log "            ,dP                                                88'"
	gutil.log "           CP   ,,.....                ,,.....                 88"
	gutil.log "           `b,d8P'^^^'Y8b           ,d8P'^^^'Y8b.             ,dY"
	gutil.log "            dP'         `Yb        dP'         `Yb            88'"
	gutil.log "           dP             Yb      dP             Yb           88"
	gutil.log "          dP     db        Yb    dP     db        Yb         ,dY"
	gutil.log "          88     YP        88    88     YP        88         88'"
	gutil.log "          Yb               dP    Yb               dP         88"
	gutil.log "           Yb             dP      Yb             dP         ,dY"
	gutil.log "          dP`Yb.       ,dP'        `Yb.       ,dP'          88'"
	gutil.log "         CCo_ `YbooooodP'            `YbooooodP'            88"
	gutil.log "          dP\"oo_    ,dP            Ybo__                    88"
	gutil.log "         88    \"ooodP'                \"\"88oooooP'           88"
	gutil.log "          Yb .ood\"\"                                        ,dY"
	gutil.log "          ,dP\"                                             88'"
	gutil.log "        ,dP'                                               88"
	gutil.log "       dP'    ,dP'     ,dP       ,dP'      .bmw.           88"
	gutil.log "      d8     dP       dP        dP        o88888b          88"
	gutil.log "      88    dP       dP       ,dP       o8888888P          88"
	gutil.log "      Y8.   88      88       d8P       o8888888P          ,dY"
	gutil.log "      `8b   Yb      88       88       ,8888888P           88'"
	gutil.log "       88    Yb     Y8.      88       888888P'            88"
	gutil.log "       88    `8b    `8b      88       88                 ,dY"
	gutil.log "       88     88     88      Yb.      Yb                 88'"
	gutil.log "       Y8.   ,Y8    ,Y8      ,88      ,8b                88"
	gutil.log "        `\"ooo\"`\"oooo\" `\"ooooo\" `8boooooP                ,8Y"
	gutil.log "            88boo__      \"\"\"       \"\"\"  ____oooooooo888888"
	gutil.log "           dP  ^^\"\"ooooooooo..oooooo\"\"\"^^^^^             88"
	gutil.log "           88               88                           88"
	gutil.log "           88               88                           88"
	gutil.log "           Yboooo__         88          ____oooooooo88888P"
	gutil.log "             ^^^\"\"\"ooooooooo''oooooo\"\"\"^^^^^"
