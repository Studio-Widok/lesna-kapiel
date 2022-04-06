import $ from 'cash-dom';
import createLightbox from 'widok-lightbox';
import createFadeSlider from 'widok-fade-slider';
import createSlider from 'widok-slider';

$('.apartment-tag-icon').on('click', event => {
  const tag = $(event.currentTarget).data('tag');
  console.log(tag);
  const target = $('#apart-tag-title-' + tag);
  if (target.length === 0) return;
  const offset = target.offset().top - 68;
  window.scrollTo({ top: offset, behavior: 'smooth' });
});

$('.lightbox').each((index) => {
  createLightbox({
    wrap: `#lightbox-${index}`,
    close: `#lightbox-${index} .lightbox-close`,
    prev: `#lightbox-${index} .lightbox-prev`,
    next: `#lightbox-${index} .lightbox-next`,
    source: `.source-${index}`,
    transition: 300,
  });
});

createFadeSlider({
  wrap: '#archive-top-bg',
  slideSelector: '.single-slide',
  interval: 3000,
});

createSlider({
  wrap: '#opinion-slider',
  slideSelector: '.slide',
  mouseDrag: true,
  touchDrag: true,
  arrowPrev: '#opinion-prev',
  arrowNext: '#opinion-next',
});