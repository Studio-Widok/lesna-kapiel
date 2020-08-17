const createSlider = require('./widok-slider');

window.slider = createSlider({
  wrap: '.slider-with-bullets .slider',
  useKeys: true,
  mouseDrag: true,
  arrowPrev: '.slider-with-bullets .arrow-left',
  arrowNext: '.slider-with-bullets .arrow-right',
});
