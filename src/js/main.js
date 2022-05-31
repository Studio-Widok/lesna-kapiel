import $ from 'cash-dom';
import fadeQueueStart from 'widok-fade-queue';

require('./widok');
require('./nav');
require('./footer');
require('./sliders');
require('./cake-frame');

const bodyElement = $('body');

if (bodyElement.hasClass('page-template-apartments')) require('./archive');

if ($('.fixed-link').length > 0) require('./fixed-link');

if ($('#top').length > 0) require('./top');

if ($('.slider-gallery').length > 0) require('./slider-gallery');

if (bodyElement.hasClass('page-template-atrakcje')) require('./attractions');

if ($('.fade').length > 0) {
  fadeQueueStart({ delay: 0 });
}

if ($('#gmap').length > 0) {
  const map = require('./map');
  setTimeout(() => {
    map(50.051943855643344, 19.944472284656335);
  }, 1000);
}

// hotres custom
$(window).on('load', () => {
  $('.calendar-label-wrap').each((_index, DOMElement) => {
    const element = $(DOMElement);
    const label = element.data('label');
    element.prepend(`<div class="calendar-label">${label}</div>`);
  });
});

// iFrameResize({}, '#hotres_iframe');

// $('#hotresChooser').on('submit', event => {
//   event.preventDefault();

//   const formData = new FormData(event.currentTarget);
//   const data = [];
//   for (const [name, value] of formData) {
//     data[name] = value;
//   }

//   $('#hotres_iframe').attr({ src: `https://panel.hotres.pl/v4_step1?oid=2447&lang=&arrival=${data['arrival']}&departure=${data['departure']}&adults=${data['adults']}` });
// });