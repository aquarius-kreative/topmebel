const path = require('path');
const CleanWebpackPlugin = require('clean-webpack-plugin');
const ExtractTextPlugin = require('extract-text-webpack-plugin');
const ReplaceInFileWebpackPlugin = require('replace-in-file-webpack-plugin');
const webpack = require('webpack');

const extractSass = new ExtractTextPlugin({
    filename: '../css/theme.css'
});

const extractCss = new ExtractTextPlugin({
    filename: '../css/theme.css'
});

module.exports = {
    entry: {
        vendor: ['uikit'],
        app: './src/js/index.js'
    },
    output: {
        filename: '[name].topmebel.js',
        chunkFilename: '[name].topmebel.js',
        path: path.resolve(__dirname, 'assets/js')
    },
    optimization: {
        splitChunks: {
            cacheGroups: {
                vendor: {
                    chunks: 'initial',
                    name: 'vendor',
                    test: 'vendor',
                    enforce: true
                },
            }
        }
    },
    module: {
        rules: [
            {
                test: /\.js$/,
                exclude: /node_modules/,
                loader: "babel-loader"
            },
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
            {
                test: /\.(png|jpg|gif|svg)$/,
                use: [
                    {
                        loader: 'file-loader',
                        options: {
                            context: 'public',
                            name: '../images/[name].[ext]?v=[hash]',
                            publicPath: './',
                        },
                    },
                ]
            }
        ]
    },
    plugins: [
        new CleanWebpackPlugin(['assets']),
        extractCss,
        extractSass,
        new ReplaceInFileWebpackPlugin([{
            dir: path.resolve(__dirname, 'inc'),
            files: ['enqueue.php'],
            rules: [{
                search: new RegExp('\'_bld_(.*?)\'', 'ig'),
                replace: function () {
                    return `'_bld_${Number(new Date())}'`
                }
            }]
        }]),
        new webpack.ProvidePlugin({
            $: 'jquery',
            jQuery: 'jquery',
            'window.jQuery': 'jquery'
        })
    ]
};