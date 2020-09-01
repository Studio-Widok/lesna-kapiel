const $ = require('cash-dom');
require('./widok');
require('./nav');
require('./footer');
require('./sliders');
require('./cake-frame');

if ($('.fixed-link').length > 0) require('./fixed-link');
if ($('#top').length > 0) require('./top');
if ($('.slider-gallery').length > 0) require('./slider-gallery');
