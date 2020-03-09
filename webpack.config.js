const path = require('path');
const ExtractTextPlugin = require('extract-text-webpack-plugin');
const ReplaceInFileWebpackPlugin = require('replace-in-file-webpack-plugin');
const webpack = require('webpack');

// Укажите название вашей темы
const THEME_NAME = 'blog1207';

// Директория с темами
const appPath = path.join(__dirname, `wp-content/themes/${THEME_NAME}`);
// Основной JS файл в который мы будем подключать все, что нам необходимо
const jsPath = path.join(appPath, '/assets/js/index.js');
// Директория куда будет происходить билд проекта
const outPath = path.join(appPath, '/assets/js/');

// Разделяем Sass файлы и CSS в отдельный фаил
const extractSass = new ExtractTextPlugin({
    filename: '../../style.css'
});

const extractCss = new ExtractTextPlugin({
    filename: '../../style.css'
});

const rules = [
    // Обработка всех JS файлов с помощью Babel. Можем использовать все новые фишки ES
    {
        test: /\.js$/,
        exclude: /(node_modules|bower_components)/,
        use: {
            loader: 'babel-loader',
            options: {
                presets: ['env'],
                "plugins": [
                    ["babel-plugin-transform-builtin-extend", {
                        globals: ["Error"]
                    }]
                ]
            }
        }
    },
    // Подгрузка обычных файлов css. Делал так вначале. Потом все перевел на sass
    {
        test: /\.css$/,
        use: extractCss.extract([
            {
                loader: 'css-loader',
                options: {
                    minimize: true
                }
            },
            'postcss-loader'
        ])
    },
    // Обработка Sass файлов. Минифицирум, делаем постобработку
    {
        rules: [{
            test: /\.scss$/,
            use: extractSass.extract({
                use: [{
                    loader: "css-loader",
                    options: {
                        minimize: true
                    }
                }, {
                    loader: "sass-loader"
                }, {
                    loader: 'postcss-loader'
                }],
                fallback: "style-loader"
            })
        }]
    },
    /* Вместо обычного копирования файлов с новом хэшем в имени
       добавляем хэш как query атрибут. Использую это в стилях для картинок.
     */
    {
        test: /\.(png|jpg|gif)$/,
        use: [
            {
                loader: 'file-loader',
                options: {
                    context: 'public',
                    name: 'assets/images/[name].[ext]?v=[hash]',
                    publicPath: './',
                },
            },
        ]
    }
];

const plugins = [
    extractCss,
    extractSass,
    /*
      Следующий плагин делает основную магию, которая
      версионирует каждый раз фаил со стилями и JS.
      Подробнее описано ниже.
    */
    new ReplaceInFileWebpackPlugin([{
        dir: appPath,
        files: ['functions.php'],
        rules: [{
            search: new RegExp('\'_bld_(.*?)\'','ig'),
            replace: function() {
                return `'_bld_${Number(new Date())}'`
            }
        }]
    }]),
    /*
     Для использования jQuery вебпаку нужно указать, что она будет глобальна
     */
    new webpack.ProvidePlugin({
        $: 'jquery',
        jQuery: 'jquery',
        'window.jQuery': 'jquery'
    })
];

module.exports = {
    context: appPath,
    entry: [
        'babel-polyfill',
        jsPath
    ],
    resolve: {
        modules: [path.resolve(__dirname), 'node_modules']
    },
    output: {
        path: outPath,
        publicPath: '/',
        filename: 'build.js'
    },
    module: {
        rules: rules
    },
    plugins: plugins,
    watch: true,
    externals: {
        'jquery': 'jQuery'
    }
};