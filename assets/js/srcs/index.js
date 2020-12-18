// import uikit
import UIkit from 'uikit';
import Icons from 'uikit/dist/js/uikit-icons';

// loads the Icon plugin
UIkit.use(Icons);

// Make uikit available in the window; for certain cases
window.UIkit = UIkit;

// load infinite scroll
window.InfiniteScroll = require('infinite-scroll');