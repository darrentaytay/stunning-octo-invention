var gulp       = require('gulp'),
    gutil      = require('gulp-util'),
    sass       = require('gulp-sass'),
    coffee     = require('gulp-coffee'),
    coffeelint = require('gulp-coffeelint'),
    plumber    = require('gulp-plumber'),
    livereload = require('gulp-livereload'),
    sourcemaps = require('gulp-sourcemaps'),
    lr         = require('tiny-lr'),
    server     = lr();

var config = {
 
    paths: {
        sass: {
            source: 'assets/sass/**/*.scss',
            dest: 'public/css'
        },
        coffeescript: {
            source: 'assets/coffeescript/**/*.coffee',
            dest: 'public/js'
        },
    },
 
    liveReloadPort: 35729
};

gulp.task('sass:compile', function() {
    gulp.src(config.paths.sass.source)
        .pipe(plumber())
        .pipe(sass({
            outputStyle: 'compressed'
        }))
        .on("error", function (err) {
            console.log("SASS Compilation Error: ", err);
        })
        .pipe(gulp.dest(config.paths.sass.dest))
        .pipe(livereload(server));
});

gulp.task('coffeescript:compile', function () {
    gulp.src(config.paths.coffeescript.source)
        .pipe(sourcemaps.init())
        .pipe(coffee({ bare: true }))
        .pipe(sourcemaps.write())
        .on("error", function (err) {
            console.log("Coffeescript Compilation Error: ", err);
        })
        .pipe(gulp.dest(config.paths.coffeescript.dest))
        .pipe(livereload(server));
});

gulp.task('coffeescript:lint', function () {
    gulp.src(config.paths.coffeescript.source)
        .pipe(coffeelint())
        .pipe(coffeelint.reporter());
});

gulp.task('watch', function () {
    livereload.listen( {
        port: config.liveReloadPort,
        host: '192.168.33.19',
    });
 
    gulp.watch(config.paths.coffeescript.source, ['coffeescript:compile', 'coffeescript:lint'] );
    gulp.watch(config.paths.sass.source, ['sass:compile']);
});

gulp.task('default', ['coffeescript:compile', 'sass:compile']);