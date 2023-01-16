'use strict';

const { src, dest, watch, series } = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const sourcemaps = require('gulp-sourcemaps');
const browserSync = require('browser-sync');
const concat = require('gulp-concat');
const uglify = require('gulp-uglify');
const minifyCss = require('gulp-clean-css');
const concatCss = require('gulp-concat-css');
const rename = require("gulp-rename");

const pathRoot = './';

// server
function server() {
    browserSync.init({
        proxy: "localhost/basictheme/",
        open: 'local',
        cors: true,
        ghostMode: false
    })
}

// Task buildStyleBootstrap
function buildStylesBootstrap() {
    return src(`${pathRoot}assets/scss/bootstrap.scss`)
        .pipe(sourcemaps.init())
        .pipe(sass({outputStyle: 'expanded'}).on('error', sass.logError))
        .pipe(minifyCss({
            compatibility: 'ie8',
            level: {1: {specialComments: 0}}
        }))
        .pipe(rename( {suffix: '.min'} ))
        .pipe(sourcemaps.write())
        .pipe(dest(`${pathRoot}assets/libs/bootstrap/`))
        .pipe(browserSync.stream());
}

exports.buildStylesBootstrap = buildStylesBootstrap;

// Task build styles
function buildStyles() {
    return src(`${pathRoot}assets/scss/style.scss`)
        .pipe(sourcemaps.init())
        .pipe(sass({outputStyle: 'expanded'}).on('error', sass.logError))
        .pipe(sourcemaps.write())
        .pipe(dest('./'))
        .pipe(browserSync.stream());
}
exports.buildStyles = buildStyles;

// Task build styles elementor
function buildStylesElementor() {
    return src(`${pathRoot}assets/scss/elementor-addon/elementor-addon.scss`)
        .pipe(sass().on('error', sass.logError))
        .pipe(minifyCss({
            compatibility: 'ie8',
            level: {1: {specialComments: 0}}
        }))
        .pipe(rename( {suffix: '.min'} ))
        .pipe(dest(`${pathRoot}extension/elementor-addon/css/`))
        .pipe(browserSync.stream());
}
exports.buildStylesElementor = buildStylesElementor;

// buildJSTheme
function buildJSTheme() {
    return src([
        `${pathRoot}assets/js/*.js`,
        `!${pathRoot}assets/js/*.min.js`
    ], {allowEmpty: true})
        .pipe(uglify())
        .pipe(rename( {suffix: '.min'} ))
        .pipe(dest(`${pathRoot}assets/js/`))
        .pipe(browserSync.stream());
}
exports.buildJSTheme = buildJSTheme

// Task compress mini library css theme
function compressLibraryCssMin() {
    return src([
        './node_modules/bootstrap/dist/css/bootstrap.css',
        './node_modules/owl.carousel/dist/assets/owl.carousel.css',
    ]).pipe(concatCss("library.min.css"))
        .pipe(minifyCss({
            compatibility: 'ie8',
            level: {1: {specialComments: 0}}
        }))
        .pipe(dest(`${pathRoot}assets/css/`))
        .pipe(browserSync.stream());
}
exports.compressLibraryCssMin = compressLibraryCssMin

// Task compress mini fontawesome css
function compressFontAwesomeCssMin() {
    return src([
        `${pathRoot}assets/libs/fontawesome/css/*.css`,
        `!${pathRoot}assets/libs/fontawesome/css/*.min.css`
    ]).pipe(concatCss("fontawesome-brands-solid.min.css"))
        .pipe(minifyCss({
            compatibility: 'ie8',
            level: {1: {specialComments: 0}}
        }))
        .pipe(dest(`${pathRoot}assets/fonts/fontawesome/css/`))
        .pipe(browserSync.stream());
}
exports.compressFontAwesomeCssMin = compressFontAwesomeCssMin

// Task compress lib js & mini file
function compressLibraryJsMin() {
    return src([
        './node_modules/bootstrap/dist/js/bootstrap.bundle.js',
        './node_modules/owl.carousel/dist/owl.carousel.js',
    ], {allowEmpty: true})
        .pipe(concat('library.min.js'))
        .pipe(uglify())
        .pipe(dest(`${pathRoot}assets/js/`))
        .pipe(browserSync.stream());
}
exports.compressLibraryJsMin = compressLibraryJsMin

// Task watch
function watchTask() {
    server()
    watch(`${pathRoot}assets/scss/bootstrap.scss`, buildStylesBootstrap)
    watch([
        `${pathRoot}assets/scss/**/*.scss`,
        `!${pathRoot}assets/scss/bootstrap.scss`,
        `!${pathRoot}assets/scss/elementor-addon/*.scss`
    ], buildStyles)
    watch(`${pathRoot}assets/scss/elementor-addon/*.scss`, buildStylesElementor)
    watch([`${pathRoot}assets/js/*.js`, `!${pathRoot}assets/js/*.min.js`], buildJSTheme)
}
exports.watchTask = watchTask