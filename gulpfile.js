const { src, dest, watch, series, parallel } = require( 'gulp' )
const sass = require('gulp-sass')(require('sass'));
const uglify = require('gulp-uglify')
const rename = require('gulp-rename')
const log = require('fancy-log')

function js() {
    return src([
        '**/*.js',
        '!**/*.min.js',
        '!gulpfile.js',
        '!node_modules/**'
    ])
        .pipe(uglify())
        .pipe(rename({ extname: '.min.js' }))
        .pipe(dest('.'))
}

function layoutSCSS() {
    return src([
        './layouts/**/*.scss'
    ])
        .pipe(sass().on('error', sass.logError))
        .pipe(dest('layouts'))
}

function serviceLayoutSCSS() {
    return src([
        './service-layouts/**/*.scss'
    ])
        .pipe(sass().on('error', sass.logError))
        .pipe(dest('service-layouts'))
}

function mainSCSS() {
    return src([
        './scss/style.scss'
    ])
        .pipe(sass().on('error', sass.logError))
        .pipe(dest('.'))
}

exports.build = parallel( layoutSCSS, mainSCSS, js )
exports.default = () => {
    watch( [ './layouts/**/*.scss' ], layoutSCSS )
    watch( [ './service-layouts/**/*.scss' ], serviceLayoutSCSS )
    watch( [ './scss/*.scss' ], mainSCSS )
    watch( [ '**/*.js', '!**/*.min.js', '!gulpfile.js', '!mode_modules/**' ], js )
}