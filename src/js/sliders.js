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

createSlider({
  wrap: `.collections-slider .slider`,
  useKeys: true,
  touchDrag: true,
  bulletContainer: '.collections-slider .bullets-container',
  bulletSelector: '.collections-slider .bullets-container .slider-bullet',
  arrowPrev: `.collections-slider .arrow-left`,
  arrowNext: `.collections-slider .arrow-right`,
  onActivate: (slide, slider) => {
    const color = slide.element.data('color');
    slider.wrap.parent('.collections-slider').addClass(`slide-color-${color}`);
  },
  onDeactivate: (slide, slider) => {
    const color = slide.element.data('color');
    slider.wrap.parent('.collections-slider').removeClass(`slide-color-${color}`);
  },
});
