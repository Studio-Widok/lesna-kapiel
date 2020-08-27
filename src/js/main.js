const $ = require('cash-dom');
require('./nav');
require('./widok');
require('./footer');
require('./sliders');

if ($('.fixed-link').length > 0) require('./fixed-link');
if ($('#top').length > 0) require('./top');
