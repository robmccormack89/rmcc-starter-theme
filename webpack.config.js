var path = require('path');

module.exports = {
  
    // remove file size warnings from webpack, sets new limit
    performance: {
        hints: false,
        maxEntrypointSize: 512000,
        maxAssetSize: 512000
    },
    
    // sets mode to miniied production output, the entry file and the path & filename to output file
    mode: "production",
    entry: {
      bundle: './assets/js/srcs/index.js',
      bundle_lg: './assets/js/srcs/index-lg.js',
    },
    output: {
      filename: '[name].js',
      path: __dirname + '/assets/js/bundles',
    },

    // mode: "production",
    // entry: './assets/js/index-loader.js',
    // output: {
    //     filename: 'bundle-loader.js',
    //     path: path.resolve(__dirname, 'assets/js')
    // },
    // 
    // mode: "production",
    // entry: './assets/js/index-lg.js',
    // output: {
    //     filename: 'bundle-lg.js',
    //     path: path.resolve(__dirname, 'assets/js')
    // },
    
    // we use expose-loader to set jquery globally, this is for use with anime effects in index.js
    module: {
      rules: [{
              test: require.resolve('jquery'),
              use: [{
                  loader: 'expose-loader',
                  options: 'jQuery'
              }]
          }]
    },
    
    // adding extra modules globally via expose-loader. anime didnt work 
    // module: {
    //   rules: [{
    //           test: require.resolve('animejs'),
    //           use: [{
    //               loader: 'expose-loader',
    //               options: 'anime'
    //           }]
    //       }]
    // },
    
    // telling webpack what directories to look for modules, anime didnt work
    // resolve: {
    //     modules: [
    //       "node_modules",
    //       path.resolve(__dirname, "assets/js")
    //     ],
    //   },
    
};