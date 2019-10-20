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
      main: './assets/js/srcs/index.js',
      // some other file or files
    },
    output: {
      filename: '[name].js',
      path: __dirname + '/assets/js/main',
    },
    
    // we use expose-loader to set jquery globally, this is for use with anime effects or lg or some other plugins
    // module: {
    //   rules: [{
    //           test: require.resolve('jquery'),
    //           use: [{
    //               loader: 'expose-loader',
    //               options: 'jQuery'
    //           }]
    //       }]
    // },
    
    // adding extra modules globally via expose-loader.
    // module: {
    //   rules: [{
    //           test: require.resolve('animejs'),
    //           use: [{
    //               loader: 'expose-loader',
    //               options: 'anime'
    //           }]
    //       }]
    // },
    
    // telling webpack what directories to look for modules,
    // resolve: {
    //     modules: [
    //       "node_modules",
    //       path.resolve(__dirname, "assets/js")
    //     ],
    //   },
    
};