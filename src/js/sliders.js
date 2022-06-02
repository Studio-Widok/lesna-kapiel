const $ = require('cash-dom');
const createSlider = require('./widok-slider');

$('.slider-with-bullets').each((index, element) => {
  createSlider({
    wrap: `#slider-with-bullets-${index} .slider`,
    bulletContainer: `#slider-with-bullets-${index} .bullets-container`,
    bulletSelector: `#slider-with-bullets-${index} .bullet`,
    useKeys: true,
    touchDrag: true,
    arrowPrev: `#slider-with-bullets-${index} .arrow-left`,
    arrowNext: `#slider-with-bullets-${index} .arrow-right`,
  });
});
