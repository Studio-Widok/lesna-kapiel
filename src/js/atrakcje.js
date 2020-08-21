const $ = require('cash-dom');
const createSlider = require('./widok-slider');

$('.slider-with-bullets').each((index, element) => {
  window.slider = createSlider({
    wrap: `#slider-with-bullets-${index} .slider`,
    bulletContainer: `#slider-with-bullets-${index} .bullets-container`,
    bulletSelector: `#slider-with-bullets-${index} .bullet`,
    useKeys: true,
    mouseDrag: true,
    arrowPrev: '.slider-with-bullets .arrow-left',
    arrowNext: '.slider-with-bullets .arrow-right',
  });
});
