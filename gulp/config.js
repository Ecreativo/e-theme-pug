var name 				= 'wiwuxboilerplate.com/www.dev';
var remplaceX 			= 'x';
var remplaceY 			= 'y';
var src 				= '../' + name + '/app';
var build				= '../' + name + '/build';
var development			= '../' + name + '/build/development';
var production 			= '../' + name + '/build/production';
var srcAssets 			= '../' + name + '/app/_assets';
var rutapublic			= '../' + name + '/public_html';
var rutabuil 			= '../' + name + '/build';
var rutacontent 		= '../' + name + '/content';
var developmentAssets	= rutabuil + '/assets';
var productionAssets 	= rutabuil + '/production/assets';

module.exports = {
    //Init Task
    init: {
        src: [
            development + '/**/*.{html,php}',
            development + '/.htaccess'
        ],
        dest: production + '/',
        remplace: {
            x: remplaceX,
            y: remplaceY
        }
    },
    //Server BrowserSync Task
    browsersync: {
        development: {
            options: {
                proxy: 'http://localhost/' + name + '/build/development',
                port: 9999,
                files: [
                    developmentAssets + '/css/*.css',
                    developmentAssets + '/js/*.js',
                    developmentAssets + '/img/**',
                    developmentAssets + '/fonts/*'
                ]
            },
        },
        production: {
            server: {
                baseDir: [production]
            },
            port: 9998
        }
    },
    delete: {
        src: [developmentAssets]
    },
    jekyll: {
        development: {
            src: [
                src + '/**/*',
                '!' + src + '/{*.txt,*.xml}',
                '!' + src + '/_assets{,/**}',
                '!' + src + '/_bower_components{,/**}'
            ],
            dest: development,
            config: '_config.yml'
        },
        production: {
            src: [
                src + '/**/*',
                '!' + src + '/_assets{,/**}',
                '!' + src + '/_bower_components{,/**}'
            ],
            dest: production,
            config: '_config.yml,_config.build.yml'
        }
    },
    sass: {
        src: srcAssets + '/scss/*.{sass,scss}',
        dest: developmentAssets + '/css',
        options: [{
            noCache: true,
            compass: false,
            bundleExec: true,
            sourcemap: true
        }],
        sourcemaps: [{
            includeContent: false,
            sourceRoot: srcAssets + '/scss'
        }]
    },
    autoprefixer: {
        browsers: [
            'last 2 versions',
            'safari 5',
            'ie 8',
            'ie 9',
            'opera 12.1',
            'ios 6',
            'android 4'
        ],
        cascade: true
    },
    browserify: {
        // Enable source maps
        debug: true,
        // Additional file extensions to make optional
        extensions: ['.coffee', '.hbs'],
        // A separate bundle will be generated for each
        // bundle config in the list below
        bundleConfigs: [{
            entries: srcAssets + '/javascripts/application.js',
            dest: developmentAssets + '/js',
            outputName: 'application.js'
        }, {
            entries: srcAssets + '/javascripts/head.js',
            dest: developmentAssets + '/js',
            outputName: 'head.js'
        }]
    },
    images: {
        src: srcAssets + '/images/**/*',
        dest: developmentAssets + '/images'
    },
    webp: {
        src: productionAssets + '/images/**/*.{jpg,jpeg,png}',
        dest: productionAssets + '/images/',
        options: {}
    },
    gzip: {
        src: production + '/**/*.{html,xml,json,css,js}',
        dest: production,
        options: {}
    },
    copyfonts: {
        development: {
            src: srcAssets + '/fonts/*',
            dest: developmentAssets + '/fonts'
        },
        production: {
            src: developmentAssets + '/fonts/*',
            dest: productionAssets + '/fonts'
        }
    },
    base64: {
        src: developmentAssets + '/css/*.css',
        dest: developmentAssets + '/css',
        options: {
            baseDir: build,
            extensions: ['png'],
            maxImageSize: 20 * 1024, // bytes
            debug: false
        }
    },
    watch: {
        //jekyll: [
        //  '_config.yml',
        //  '_config.build.yml',
        //  'stopwords.txt',
        //  src + '/_data/**/*.{json,yml,csv}',
        //  src + '/_includes/**/*.{html,xml}',
        //  src + '/_layouts/*.html',
        //  src + '/_locales/*.yml',
        //  src + '/_plugins/*.rb',
        //  src + '/_posts/*.{markdown,md}',
        //  src + '/**/*.{html,markdown,md,yml,json,txt,xml}',
        //  src + '/*'
        //],
        sass: srcAssets + '/scss/**/*.{sass,scss}',
        scripts: srcAssets + '/javascripts/**/*.js',
        images: srcAssets + '/images/**/*',
        sprites: srcAssets + '/images/**/*.png',
        svg: 'vectors/*.svg'
    },
    scsslint: {
        src: [
            srcAssets + '/scss/**/*.{sass,scss}',
            '!' + srcAssets + '/scss/base/_sprites.scss',
            '!' + srcAssets + '/scss/helpers/_meyer-reset.scss'
        ],
        options: {
            bundleExec: true
        }
    },
    jshint: {
        src: srcAssets + '/js/*.js'
    },
    sprites: {
        src: srcAssets + '/images/sprites/icon/*.png',
        dest: {
            css: srcAssets + '/scss/base/',
            image: srcAssets + '/images/sprites/'
        },
        options: {
            cssName: '_sprites.scss',
            cssFormat: 'css',
            cssOpts: {
                cssClass: function(item) {
                    // If this is a hover sprite, name it as a hover one (e.g. 'home-hover' -> 'home:hover')
                    if (item.name.indexOf('-hover') !== -1) {
                        return '.icon-' + item.name.replace('-hover', ':hover');
                        // Otherwise, use the name as the selector (e.g. 'home' -> 'home')
                    } else {
                        return '.icon-' + item.name;
                    }
                }
            },
            imgName: 'icon-sprite.png',
            imgPath: '/assets/images/sprites/icon-sprite.png'
        }
    },
    optimize: {
        css: {
            src: [
                developmentAssets + '/css/**/*.css',
                '!' + developmentAssets + '/css/**/*.min.css'
            ],
            dest: productionAssets + '/css/',
            options: {
                html: [src + '/*.html'],
                ignore: [
                    // Bootstrap selectors added via JS
                    ".fade",
                    ".fade.in",
                    ".collapse",
                    /(#|\.)btn(\-[a-zA-Z]+)?/,
                    ".collapsing",
                    ".collapse.in",
                    ".collapsing",
                    /(#|\.)alert(\-[a-zA-Z]+)?/,
                    ".alert-danger",
                    ".open",
                    /\.right/,
                    ".modal-open",
                    /\.modal-open/,
                    "/open+/",
                    ".modal-backdrop",
                    /\w\.in/,
                    /\.open/,
                    /(#|\.)navbar(\-[a-zA-Z]+)?/,
                    /(#|\.)dropdown(\-[a-zA-Z]+)?/,
                    /(#|\.)(open)/,
                    // currently only in a IE conditional, so uncss doesn't see it
                    ".close",
                    ".alert-dismissible"
                ]
            }
        },
        js: {
            src: [
                developmentAssets + '/js/vendor/bootstrap.js',
                developmentAssets + '/js/*.js'
            ],
            dest: productionAssets + '/js/',
            options: {}
        },
        images: {
            src: developmentAssets + '/images/**/*.{jpg,jpeg,png,gif}',
            dest: productionAssets + '/images/',
            options: {
                optimizationLevel: 3,
                progessive: true,
                interlaced: true
            }
        },
        html: {
            src: production + '/**/*.{html,php}',
            dest: production,
            options: {
                collapseWhitespace: true
            },
            remplace: {
                js: {
                    x: '.js',
                    y: '.min.js'
                },
                css: {
                    x: '.css',
                    y: '.min.css'
                },
            }
        }
    },
    revision: {
        src: {
            assets: [
                productionAssets + '/css/*.css',
                productionAssets + '/js/**/*.js',
                productionAssets + '/images/**/*'
            ],
            base: production
        },
        dest: {
            assets: production,
            manifest: {
                name: 'manifest.json',
                path: productionAssets
            }
        }
    },
    collect: {
        src: [
            productionAssets + '/manifest.json',
            production + '/**/*.{html,xml,txt,json,css,js}',
            '!' + production + '/feed.xml'
        ],
        dest: production
    },
    rsync: {
        src: production + '/**',
        options: {
            destination: '~/path/to/my/website/root/',
            root: production,
            hostname: 'mydomain.com',
            username: 'user',
            incremental: true,
            progress: true,
            relative: true,
            emptyDirectories: true,
            recursive: true,
            clean: true,
            exclude: ['.DS_Store'],
            include: []
        }
    }
};