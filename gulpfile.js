var gulp = require('gulp'),
	sass = require('gulp-sass'),
	browserify = require('browserify'),
	babelify = require('babelify'),
	source = require('vinyl-source-stream');
  
gulp.task('sass', function () {
  gulp.src('./src/sass/*.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(gulp.dest('./src/css/'));
});

gulp.task('browserify', function () {
  browserify({
    entries: [ './react/app.jsx' ],
    extensions: [ '.js', '.jsx' ],
    debug: true
  })
  .transform(babelify.configure({
    presets: ["es2015", "react"]
  }))
  .bundle()
  .pipe(source('build.js'))
  .pipe(gulp.dest('./web/js'));
});

gulp.task('watch', function(){
	gulp.watch(['./react/*.jsx', './react/components/*.jsx', './src/sass/styles.scss'], ['default']);
});

gulp.task('default', ['sass', 'browserify', 'watch']);