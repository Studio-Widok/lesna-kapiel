const $ = require('cash-dom');
require('./nav');
require('./widok');
require('./footer');


const bodyElement = $('body');
if (bodyElement.hasClass('page-template-t-atrakcje')) require('./atrakcje');
if ($('.fixed-link').length > 0) require('./fixed-link');
// if($('#footer-video-overlay').length > 0) require('./footer')
