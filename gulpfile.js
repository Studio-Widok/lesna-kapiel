var gulp = require('gulp');
var sass = require('gulp-sass');
var terser = require('gulp-terser');
var sourcemaps = require('gulp-sourcemaps');

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
  return gulp.src('./src/js/*.js')
    .pipe(sourcemaps.init())
    .pipe(terser())
    .pipe(sourcemaps.write('./', {
      includeContent: false,
      sourceRoot: '../../src/js'
    }))
    .pipe(gulp.dest('./dist/js'));
});
