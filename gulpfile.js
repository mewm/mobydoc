var gulp = require('gulp');
var path = require('path');
var jshint = require('gulp-jshint');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');
var compass = require('gulp-compass');

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

/**
 * Javascript linting
 */
gulp.task('lint', function () {
	return gulp.src('./resources/assets/js/**/*.js')
		.pipe(jshint())
		.pipe(jshint.reporter('default'));
});


gulp.task('scripts_head_dev', function () {
	return gulp.src(js.head)
		//.pipe(concat('app.js'))
		//.pipe(rename('app.min.js'))
		//.pipe(uglify())
		.pipe(gulp.dest('./public/js'));
});

gulp.task('scripts_body_dev', function () {
	return gulp.src(js.body)
		//.pipe(concat('app.js'))
		//.pipe(rename('app.min.js'))
		//.pipe(uglify())
		.pipe(gulp.dest('./public/js'));
});


gulp.task('css_dev', function () {
	return gulp.src('./resources/assets/css/*.css')
		//.pipe(concat('app.css'))
		//.pipe(rename('app.min.css'))
		.pipe(gulp.dest('./public/css'));
});

/**
 * Watchers
 */
gulp.task('watch', function () {
	gulp.watch('./resources/assets/js/**/*.js', ['lint', 'scripts']);
});

//gulp.task('default', ['lint', 'css', 'scripts']);
gulp.task('default', ['lint', 'scripts_head_dev', 'scripts_body_dev', 'css_dev']);