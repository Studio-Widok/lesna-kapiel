const $ = require('cash-dom');
require('./nav');
require('./widok');
require('./sliders');

if ($('.fixed-link').length > 0) require('./fixed-link');
