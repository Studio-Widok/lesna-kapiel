import $ from 'cash-dom';
import fadeQueueStart from 'widok-fade-queue';

require('./widok');
require('./nav');
require('./footer');
require('./sliders');
require('./cake-frame');

const bodyElement = $('body');

if ($('.fixed-link').length > 0) require('./fixed-link');

if ($('#top').length > 0) require('./top');

if ($('.slider-gallery').length > 0) require('./slider-gallery');

if (bodyElement.hasClass('page-template-t-atrakcje')) require('./attractions');

if ($('.fade').length > 0) {
  fadeQueueStart({ delay: 0 });
}

if ($('#gmap').length > 0) {
  const map = require('./map');
  setTimeout(() => {
    map(50.051943855643344, 19.944472284656335);
  }, 1000);
}
