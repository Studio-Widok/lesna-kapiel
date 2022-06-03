import $ from 'cash-dom';
import createSlider from 'widok-slider';

if ($('#routes-wrap').length > 0) {
  createSlider({
    wrap: '.route-slider',
    slideSelector: '.slide',
    bulletContainer: '.routes-list',
    bulletSelector: '.route-link-title',
    arrowPrev: '#routes-wrap .arrow-left',
    arrowNext: '#routes-wrap .arrow-right',
    mouseDrag: true,
    touchDrag: true,
    useKeys: true,
  });
}
