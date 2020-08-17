var gulp = require('gulp');
var sass = require('gulp-sass');
var terser = require('gulp-terser');
var sourcemaps = require('gulp-sourcemaps');
var browserify = require('browserify');
var source = require('vinyl-source-stream');
var buffer = require('vinyl-buffer');

const mode = 'development';

gulp.task('default', function () {
  gulp.watch('src/sass/*.scss', gulp.series('sass'));
  gulp.watch('src/js/*.js').on('change', gulp.series('uglify'));
});

gulp.task('sass', function () {
  if (mode === 'development') {
    return gulp
      .src('./src/sass/base.scss')
      .pipe(sourcemaps.init())
      .pipe(sass({ outputStyle: 'compressed' }).on('error', sass.logError))
      .pipe(
        sourcemaps.write('./', {
          includeContent: false,
          sourceRoot: '../../src/sass',
        })
      )
      .pipe(gulp.dest('./dist/css'));
  } else {
    return gulp
      .src('./src/sass/base.scss')
      .pipe(sass({ outputStyle: 'compressed' }).on('error', sass.logError))
      .pipe(gulp.dest('./dist/css'));
  }
});

gulp.task('uglify', function () {
  var b = browserify({
    entries: './src/js/main.js',
    debug: true,
  });

  if (mode === 'development') {
    return b
      .bundle()
      .pipe(source('bundle.js'))
      .pipe(buffer())
      .pipe(sourcemaps.init({ loadMaps: true }))
      .pipe(
        sourcemaps.write('./', {
          includeContent: false,
          sourceRoot: '../../',
        })
      )
      .pipe(gulp.dest('./dist/js/'));
  } else {
    return b
      .bundle()
      .pipe(source('bundle.js'))
      .pipe(buffer())
      .pipe(terser())
      .pipe(gulp.dest('./dist/js/'));
  }
});
