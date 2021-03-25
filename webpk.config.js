/* eslint-disable no-undef */
const path = require("path");
const { CleanWebpackPlugin } = require("clean-webpack-plugin");
const CopyWebpackPlugin = require("copy-webpack-plugin");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");

const CssMinimizerWebpackPlugin = require("css-minimizer-webpack-plugin");
const TerserWebpackPlugin = require("terser-webpack-plugin");
const ImageMinimizerPlugin = require("image-minimizer-webpack-plugin");

module.exports = (env) => {
  env.production
    ? console.log("PRODUCTION MODE")
    : console.log("DEVELOPMENT MODE");

  const filename = (ext) => {
    return env.production ? `[name][contenthash].${ext}` : `[name].${ext}`;
  };

  const cssLoaders = (extraLoader) => {
    let loaders = [
      {
        loader: MiniCssExtractPlugin.loader,
        options: {
          publicPath: (resourcePath, context) => {
            return path.relative(path.dirname(resourcePath), context) + "/";
          },
        },
      },
      "css-loader",
    ];
    if (env.production) loaders.push("postcss-loader");
    if (extraLoader) loaders.push(extraLoader);
    return loaders;
  };

  const jsLoaders = () => {
    let loaders = [
      {
        loader: "babel-loader",
        options: {
          presets: ["@babel/preset-env"],
        },
      },
    ];
    if (!env.production) loaders.push("eslint-loader");
    return loaders;
  };

  const optimization = () => {
    let optimizationObj = {
      splitChunks: {
        chunks: "all",
      },
    };

    if (env.production) {
      optimizationObj.minimize = true;
      optimizationObj.minimizer = [
        new CssMinimizerWebpackPlugin({
          minimizerOptions: {
            preset: [
              "default",
              {
                discardComments: { removeAll: true },
              },
            ],
          },
        }),
        new TerserWebpackPlugin(),
      ];
    } else {
      optimizationObj.runtimeChunk = "single";
    }

    return optimizationObj;
  };

  const plugins = () => {
    let plugins = [
      new HTMLWebpackPlugin({
        template: path.resolve(__dirname, "src/index.html"),
        filename: "index.html",
        minify: {
          collapseWhitespace: env.production,
        },
      }),
      new CleanWebpackPlugin(),
      // new CopyWebpackPlugin({
      //   patterns: [
      //     {},
      //   ],
      // }),
      new MiniCssExtractPlugin({
        filename: `./css/${filename("css")}`,
      }),
    ];

    if (env.production) {
      plugins.push(
        new ImageMinimizerPlugin({
          minimizerOptions: {
            plugins: [
              ["gifsicle", { interlaced: true }],
              ["jpegtran", { progressive: true }],
              ["optipng", { optimizationLevel: 5 }],
              [
                "svgo",
                {
                  plugins: [
                    {
                      removeViewBox: false,
                    },
                  ],
                },
              ],
            ],
          },
        })
      );
    }
    return plugins;
  };
  // =====================================================================

  return {
    target: "web",
    context: path.resolve(__dirname, "src"),
    entry: {
      main: "./index.js",
    },
    output: {
      filename: filename("js"),
      path: path.resolve(__dirname, "dist"),
    },

    optimization: optimization(),

    devServer: {
      historyApiFallback: true,
      contentBase: path.resolve(__dirname, "dist"),
      compress: true,
      hot: true,
      host: "0.0.0.0",
      port: 3000,
      clientLogLevel: "warn"
    },
    plugins: plugins(),
    devtool: env.production ? false : "source-map",
    module: {
      rules: [
        {
          test: /\.html$/i,
          loader: "html-loader",
        },
        {
          test: /\.css$/,
          use: cssLoaders(),
        },
        {
          test: /\.s[ac]ss$/i,
          use: cssLoaders("sass-loader"),
        },
        {
          test: /\.(png|jpg|jpeg|svg|gif)$/i,
          // use: ["file-loader"],
          type: "asset/resource",
          generator: {
            filename: "img/[hash][ext][query]",
          },
        },
        {
          test: /\.(ttf|woff|woff2|eot)$/i,
          type: "asset/resource",
          generator: {
            filename: "fonts/[hash][ext][query]",
          },
        },
        {
          test: /\.js$/i,
          exclude: /node_modules/,
          use: jsLoaders(),
        },
      ],
    },
  };
};
