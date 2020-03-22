const webpack = require("webpack");
const WebPackConcatPlugin = require('webpack-concat');
const path = require("path");

let config = {
    entry: "./dist/public/bundle.js",
    output: {
        path: path.resolve(__dirname, "./public/js"),
        filename: "./main.js"
    },
    module: {
        rules: [
            {
                test: /\.m?js$/,
                exclude: /(node_modules|bower_components)/,
                use: {
                    loader: 'babel-loader',
                    options: {
                        presets: ['@babel/preset-env']
                    }
                }
            }
        ]
    },
    plugins: [
        new WebPackConcatPlugin({
            buildPath: ['dist'],
            output: 'public/bundle.js',
            files: ['jquery.scrollex.min.js', 'breakpoints.min.js', 'browser.min.js', 'main.js','util.js']
        }),
    ]
}

module.exports = config;