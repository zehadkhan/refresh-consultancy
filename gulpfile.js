// eslint-disable-next-line no-undef
const gulp = require( 'gulp' );
// eslint-disable-next-line no-undef
const autoprefixer = require( 'gulp-autoprefixer' );
// eslint-disable-next-line no-undef
const sass = require( 'gulp-sass' );
// eslint-disable-next-line no-undef
const concat = require( 'gulp-concat' );
// eslint-disable-next-line no-undef
const uglify = require( 'gulp-uglify' );
// eslint-disable-next-line no-undef
const minifyCSS = require( 'gulp-minify-css' );
// eslint-disable-next-line no-undef
const bs = require( 'browser-sync' );
gulp.task( 'sass', function() {
	return gulp.src( 'sass/style.scss' )
		.pipe( sass( { outputStyle: 'compressed' } ).on( 'error', sass.logError ) )
		.pipe( minifyCSS() )
		.pipe( autoprefixer() )
		.pipe( gulp.dest( 'assets/css' ) );
} );
gulp.task( 'scripts-bundle-header', function() {
	gulp.src( [
		'assets/js/bootstrap.js',
		'assets/js/featherIcon.js',
		// 'assets/js/jquery.meanmenu.js',
		// 'assets/js/jquery.bxslider.js',
		// 'assets/js/owl.js',
		// 'assets/js/jquery.video.min.js',
		// 'assets/js/chosen.js',
		// 'assets/js/fancybox.js',
		// 'assets/js/sidr.js',
		// 'assets/js/slick.js',
		// 'assets/js/sweetalert.js',
		// 'assets/js/backgroundVideo.js',
		'assets/js/custom.js',
	] )
		.pipe( concat( 'all.js' ) )
		// .pipe(uglify().on('error', gulpUtil.log))
		// .pipe( bs.stream() )
		.pipe( gulp.dest( 'assets/js' ) );
} );
gulp.task( 'watch', function() {
	gulp.watch( './sass/**/*.scss', [ 'sass' ] );
	gulp.watch( './assets/js/**/*.js', [ 'scripts-bundle-header' ] );
} );
gulp.task( 'default', [ 'sass:watch', 'scripts-bundle-header' ] );
