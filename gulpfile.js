var gulp = require('gulp');
var sass = require('gulp-sass');
var terser = require('gulp-terser');
var sourcemaps = require('gulp-sourcemaps');
var browserify = require('browserify');
var source = require('vinyl-source-stream');
var buffer = require('vinyl-buffer');

gulp.task('default', function () {
  gulp.watch('src/sass/*.scss', gulp.series('sass'));
  gulp.watch('src/js/*.js').on('change', gulp.series('uglify'));
});

gulp.task('sass', function () {
  return gulp.src('./src/sass/base.scss')
    .pipe(sourcemaps.init())
    .pipe(sass({ outputStyle: 'compressed' }).on('error', sass.logError))
    .pipe(sourcemaps.write('./', {
      includeContent: false,
      sourceRoot: '../../src/sass'
    }))
    .pipe(gulp.dest('./dist/css'));
});

gulp.task('uglify', function () {
  var b = browserify({
    entries: './src/js/main.js',
    debug: true,
  });

  return b.bundle()
    .pipe(source('bundle.js'))
    .pipe(buffer())
    .pipe(sourcemaps.init({ loadMaps: true }))
    .pipe(terser())
    .pipe(sourcemaps.write('./', {
      includeContent: false,
      sourceRoot: '../../src/js'
    }))
    .pipe(gulp.dest('./dist/js/'));
});
