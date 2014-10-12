var gulp = require('gulp');
var path = require('path');
var concat = require('gulp-concat');
//var elixir = require('./vendor/laravel/elixir/Elixir');

/*
 |----------------------------------------------------------------
 | Have a Drink!
 |----------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic
 | Gulp tasks for your Laravel application. Elixir supports
 | several common CSS, JavaScript and even testing tools!
 |
 */

//elixir(function(mix) {
//    mix.sass("bootstrap.scss")
//       .routes()
//       .events()
//       .phpUnit();
//});



var js = {
    head: [
        'resources/assets/bower_components/modernizr/modernizr.js*'
    ],
    body: [
        'resources/assets/bower_components/jquery/dist/jquery.js',
        'resources/assets/bower_components/foundation/js/foundation.min.js',
        'resources/assets/js/**/*.js'
    ]
};

gulp.task('scripts_head_dev', function () {
    return gulp.src(js.head)
        .pipe(gulp.dest('./public/js'));
});

gulp.task('scripts_body_dev', function () {
    return gulp.src(js.body)
        .pipe(gulp.dest('./public/js'));
});


gulp.task('css_dev', function () {
    return gulp.src('./resources/assets/css/*.css')
        .pipe(gulp.dest('./public/css'));
});

gulp.task('default', ['scripts_head_dev', 'scripts_body_dev', 'css_dev']);