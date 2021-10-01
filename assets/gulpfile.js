const gulp = require('gulp');
var sass = require('gulp-sass')(require('sass'));

// Task 1 : Coverting SASS to CSS
gulp.task('sass', async function() {
    return gulp.src('css/main.scss')
    .pipe(sass())
    .pipe(gulp.dest('css'));
});

// Task 2 : Watch Task
gulp.task('watch', async function() {
    gulp.watch('./css/*.scss', gulp.series('sass'));
})
