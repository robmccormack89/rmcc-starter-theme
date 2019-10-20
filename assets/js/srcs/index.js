// require jquery, jquery is made available globally in webpack.config using expose-loader under jQuery. jQuery is useful for some plugins like lg

// require('jquery');

// import uikit
import UIkit from 'uikit';
import Icons from 'uikit/dist/js/uikit-icons';

// loads the Icon plugin
UIkit.use(Icons);

// The following line makes it finally work (i use this when i want to be able load uikit in the head rather than body)
window.UIkit = UIkit;

// You might require or import some other file of yours
// require ('./ajax-search.js');