const $ = require('cash-dom');
require('./nav');
require('./widok');

const bodyElement = $('body');
if (bodyElement.hasClass('page-template-t-atrakcje')) require('./atrakcje');
if ($('.fixed-link').length > 0) require('./fixed-link');
if ($('#top').length > 0) require('./top');
if ($('.slider-gallery').length > 0) require('./slider-gallery');
