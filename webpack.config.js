const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');

// const mode = 'production';
const mode = 'development';

module.exports = {
  mode,
  devtool: mode === 'development' ? 'source-map' : false,
  entry: ['./src/js/main.js', './src/scss/main.scss'],
  output: {
    filename: 'main.js',
    path: path.resolve(__dirname, 'dist'),
  },
  module: {
    rules: [
      {
        test: /\.scss$/i,
        use: [
          {
            loader: MiniCssExtractPlugin.loader,
            options: {
              publicPath: './',
            },
          },
          {
            loader: 'css-loader',
            options: {
              url: { filter: url => !url.includes('.php') },
            },
          },
          {
            loader: 'postcss-loader',
            options: {
              postcssOptions: {
                plugins: [
                  [
                    'postcss-preset-env',
                    {
                      browsers:
                        mode === 'development'
                          ? '> 5%, last 2 versions, not dead'
                          : '> 0.1%, last 3 versions, not dead',
                    },
                  ],
                ],
              },
            },
          },
          'sass-loader',
        ],
      },
      {
        test: /\.js$/,
        exclude: /(node_modules)/,
        use: {
          loader: 'babel-loader',
          options: {
            plugins: [
              '@babel/plugin-syntax-dynamic-import',
              [
                'transform-react-jsx',
                {
                  pragma: 'wp.element.createElement',
                },
              ],
            ],
            presets: ['@babel/preset-env'],
          },
        },
      },
    ],
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: 'main.css',
    }),
  ],
  externals: {
    url: 'media/scratch-1.php',
  },
};
