const gulp = require('gulp');
const uglify = require('gulp-uglify');
const stylus = require('gulp-stylus');
const plumber = require('gulp-plumber');
const $ = require('gulp-load-plugins')();

const concat = require('gulp-concat'); // 合并css
const minifyCss = require('gulp-minify-css'); // 压缩css

gulp.task('es6', function() {
	return gulp.src(['es6/**/*', 'es6/*'])
		//.pipe(plumber({
		//	errorHandler: function() {
		//		this.emit('end');
		//	}
		//}))
		.pipe($.babel({
			presets: ['es2015'],
			//plugins: ['transform-runtime']
		}))	// 转化
		//.pipe(uglify())	// 压缩js
		.pipe(gulp.dest('js/'));
});

gulp.task('stylus', function() {
	return gulp.src(['stylus/*.styl', 'stylus/**/*.styl'])
	//.pipe(plumber({
	//	errorHandler: function() {
	//		this.emit('end');
	//	}
	//}))
	.pipe(stylus())
	.pipe(concat('master.min.css'))
	.pipe(minifyCss())
	.pipe(gulp.dest('css'));
});


gulp.task('watch', function() {
	gulp.watch(['es6/**/*', 'es6/*'], ['es6']);
	gulp.watch(['stylus/*'], ['stylus']);
});
