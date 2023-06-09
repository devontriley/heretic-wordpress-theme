const { src, dest, watch, series, parallel } = require( 'gulp' )
const sass = require('gulp-sass')(require('sass'));
const uglify = require('gulp-uglify')
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
        './js/main.js'
    ])
        .pipe(concat('bundle.js'))
        .pipe(dest('./js'))
        .pipe(uglify())
        .pipe(rename({ suffix: '.min' }))
        .pipe(dest('./js'));
}

function scss() {
    return src([
        './layouts/**/*.scss',
        './scss/style.scss'
    ])
        .pipe(sass().on('error', sass.logError))
        .pipe(dest(function(file) {
            if (file.dirname.includes('layouts')) {
                return 'layouts';
            }
            return '.';
        }))
        .pipe(browsersync.stream());
}

function watchFiles () {
    watch( [ './layouts/**/*.scss', './scss/*.scss' ], series( scss, browserSyncReload ) )
    // watch( [ './layouts/**/*.js' ], series( layoutJS, browserSyncReload ) )
}

exports.default = parallel( browserSync, watchFiles )
exports.build = js