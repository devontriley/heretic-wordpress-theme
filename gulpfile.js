const { src, dest, watch, series, parallel } = require( 'gulp' )
const sass = require('gulp-sass')(require('sass'));
const uglify = require('gulp-uglify')
const cleanCSS = require('gulp-clean-css');
const rename = require('gulp-rename')
const log = require('fancy-log')
const browsersync = require("browser-sync").create();
const concat = require('gulp-concat');

// BrowserSync
function browserSync(done) {
    browsersync.init({
        proxy: 'vinfen-gateway-multisite.local',
        open: false,
        notify: false,
        ghostMode: false,
        ui: {
            port: 8001
        }
    });
    done();
}

// BrowserSync Reload
function browserSyncReload(done) {
    browsersync.reload();
    done();
}

function js() {
    return src([
        'node_modules/reframe.js/dist/reframe.min.js',
        'node_modules/@glidejs/glide/dist/glide.js',
        'node_modules/simplelightbox/dist/simple-lightbox.js',
        './js/main.js',
        'layouts/grid/script.js',
        'layouts/hero/script.js',
        'layouts/image-gallery/script.js',
        'layouts/tab-changer/script.js',
        'layouts/testimonials/script.js'
    ])
        .pipe(concat('bundle.js'))
        .pipe(dest('./js'))
        .pipe(uglify())
        .pipe(rename({ suffix: '.min' }))
        .pipe(dest('./js'));
}

function scss() {
    return src('./scss/style.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(cleanCSS({compatibility: 'ie8'}))
        .pipe(dest('.'))
        .pipe(browsersync.stream());
}

function watchFiles () {
    watch( [ './layouts/**/*.scss', './scss/*.scss' ], series( scss, browserSyncReload ) )
    watch( [ './layouts/**/*.js', './js/main.js' ], series( js, browserSyncReload ) )
}

exports.default = parallel( browserSync, watchFiles )
exports.build = js