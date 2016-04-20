var gulp = require('gulp'),
	browserify = require('browserify'),
	babelify = require('babelify'),
	source = require('vinyl-source-stream');
  
gulp.task('build', function () {
  browserify({
    entries: [ './react/app.jsx' ],
    extensions: [ '.js', '.jsx' ],
    debug: true
  })
  .transform(babelify.configure({
    presets: ["es2015", "react"]
  }))
  .bundle()
  .pipe(source('bundle.js'))
  .pipe(gulp.dest('./web/js'));
});

gulp.task('watch', function(){
	gulp.watch(['./react/*.jsx', './react/components/*.jsx', './react/layout/*.jsx'], ['default']);
});

gulp.task('default', ['build', 'watch']);