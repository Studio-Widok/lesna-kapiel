const $ = require('cash-dom');
require('./nav');
require('./widok');

const bodyElement = $('body');
if (bodyElement.hasClass('page-template-t-atrakcje')) require('./atrakcje');
