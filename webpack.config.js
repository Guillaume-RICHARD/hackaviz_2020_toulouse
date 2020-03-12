const webpack = require("webpack");
const WebPackConcatPlugin = require('webpack-concat');
const path = require("path");

let config = {
    entry: "./src/public/bundle.js",
    output: {
        path: path.resolve(__dirname, "./dist"),
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
            buildPath: ['src'],
            output: 'public/bundle.js',
            files: ['index.js', 'leaflet.js']
        }),
    ]
}

module.exports = config;