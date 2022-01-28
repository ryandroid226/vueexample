const { VueLoaderPlugin } = require('vue-loader')

const path = require('path');
const isDev = (process.env.NODE_ENV = 'development')

const stylesHandler = 'style-loader';

module.exports = {
    entry: {
        public: [
            path.resolve(__dirname, './public/js/vueexample-public.js'),
            path.resolve(__dirname, './public/js/somevuepage/somevuepage.js') //Example of extra vue js being added in
        ],
        admin: path.resolve(__dirname, './admin/js/vueexample-admin.js')
    },
    devtool: isDev ? 'inline-source-map' : false,
    mode: process.env.NODE_ENV,
    module: {
        rules: [
            {
                test: /\.vue$/,
                loader: 'vue-loader'
            },
            {
                test: /\.css$/i,
                use: [stylesHandler, 'css-loader', 'postcss-loader'],
            }
        ]
    },
    output: {
        filename: '[name]/js/vueexample_[name].bundle.js',
        path: path.resolve(__dirname, 'dist'),
        clean: true
    },
    optimization: {
        minimize: true,
    },
    plugins: [
        new VueLoaderPlugin()
    ]
};