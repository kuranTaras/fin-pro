let preprocessor = 'sass', // Preprocessor (sass, less, styl); 'sass' also work with the Scss syntax in blocks/ folder.
    fileswatch = 'html,htm,txt,json,md,woff2' // List of files extensions for watching & hard reload

import pkg from 'gulp'
const { gulp, src, dest, parallel, series, watch } = pkg

import browserSync from 'browser-sync'
import bssi from 'browsersync-ssi'
import ssi from 'ssi'
import webpackStream from 'webpack-stream'
import webpack from 'webpack'
import TerserPlugin from 'terser-webpack-plugin'
import gulpSass from 'gulp-sass'
import dartSass from 'sass'
import sassglob from 'gulp-sass-glob'
const sass = gulpSass(dartSass)
import less from 'gulp-less'
import lessglob from 'gulp-less-glob'
import styl from 'gulp-stylus'
import stylglob from 'gulp-noop'
import postCss from 'gulp-postcss'
import cssnano from 'cssnano'
import autoprefixer from 'autoprefixer'
import imagemin from 'gulp-imagemin'
import changed from 'gulp-changed'
import concat from 'gulp-concat'
import rsync from 'gulp-rsync'
import del from 'del'


function browsersync() {
    browserSync.init({
        proxy: 'localhost:10154',
        ghostMode: { clicks: false },
        notify: false,
        online: true,
        open: false
            // tunnel: 'yousutename', // Attempt to use the URL https://yousutename.loca.lt
    })
}


function scripts() {
    return src(['assets/js/*.js', '!assets/js/*.min.js'])
        .pipe(webpackStream({
            mode: 'production',
            performance: { hints: false },
            plugins: [
                new webpack.ProvidePlugin({ $: 'jquery', jQuery: 'jquery', 'window.jQuery': 'jquery' }), // jQuery (npm i jquery)
            ],
            module: {
                rules: [{
                        test: /\.m?js$/,
                        exclude: /(node_modules)/,
                        use: {
                            loader: 'babel-loader',
                            options: {
                                presets: ['@babel/preset-env'],
                                plugins: ['babel-plugin-root-import']
                            }
                        }
                    },
                    {
                        test: /\.s[ac]ss$/i,
                        use: [
                            // Creates `style` nodes from JS strings
                            "style-loader",
                            // Translates CSS into CommonJS
                            "css-loader",
                            // Compiles Sass to CSS
                            "sass-loader",
                        ],
                    },
                    {
                        test: /\.css$/,
                        use: ['style-loader', 'css-loader']
                    }

                ],

            },
            optimization: {
                minimize: true,
                minimizer: [
                    new TerserPlugin({
                        terserOptions: { format: { comments: false } },
                        extractComments: false
                    })
                ]
            },
        }, webpack)).on('error', function handleError() {
            this.emit('end')
        })
        .pipe(concat('app.min.js'))
        .pipe(dest('assets/js'))
        .pipe(browserSync.stream())
}

function styles() {
    return src([`assets/${preprocessor}/*.*`, `!assets/${preprocessor}/_*.*`])

    .pipe(eval(`${preprocessor}glob`)())
        // .pipe(sass().on('error', sass.logError))
        .pipe(eval(preprocessor)({ 'include css': true }))
        .pipe(postCss([
            autoprefixer({ grid: 'autoplace' }),
            cssnano({ preset: ['default', { discardComments: { removeAll: true } }] })
        ]))
        // .pipe(concat('app.min.css'))
        .pipe(dest('assets/css'))
        .pipe(browserSync.stream())
}



function images() {
    return src(['assets/images/src/**/*'])
        .pipe(changed('assets/images/dist'))
        .pipe(imagemin())
        .pipe(dest('assets/images/dist'))
        .pipe(browserSync.stream())
}

function buildcopy() {
    return src([
            '{assets/js,assets/css}/*.min.*',
            'assets/images/**/*.*',
            '!assets/images/src/**/*',
            'assets/fonts/**/*'
        ], { base: 'assets/' })
        .pipe(dest('dist'))
}

async function buildhtml() {
    let includes = new ssi('assets/', 'dist/', '/**/*.html')
    includes.compile()
    del('dist/parts', { force: true })
}

async function cleandist() {
    del('dist/**/*', { force: true })
}

function deploy() {
    return src('dist/')
        .pipe(rsync({
            root: 'dist/',
            hostname: 'username@yousite.com',
            destination: 'yousite/public_html/',
            // clean: true, // Mirror copy with file deletion
            include: [ /* '*.htaccess' */ ], // Included files to deploy,
            exclude: ['**/Thumbs.db', '**/*.DS_Store'],
            recursive: true,
            archive: true,
            silent: false,
            compress: true
        }))
}

function startwatch() {
    watch(`assets/${preprocessor}/**/*`, { usePolling: true }, styles)
    watch(['assets/js/**/*.js', '!assets/js/**/*.min.js'], { usePolling: true }, scripts)
        // watch('assets/images/src/**/*', { usePolling: true }, images)
    watch('**/**/*.php').on("change", browserSync.reload);
    watch(`assets/**/*.{${fileswatch}}`, { usePolling: true }).on('change', browserSync.reload)
}

export { scripts, styles, images, deploy }
export let assets = series(scripts, styles, images)
export let build = series(cleandist, images, scripts, styles, buildcopy, buildhtml)
export default series(scripts, styles, parallel(browsersync, startwatch))