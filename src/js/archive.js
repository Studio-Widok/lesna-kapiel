import $ from 'cash-dom';
import createLightbox from 'widok-lightbox';
import createFadeSlider from 'widok-fade-slider';

$('.apartment-tag-icon').on('click', event => {
  const tag = $(event.currentTarget).data('tag');
  console.log(tag);
  const target = $('#apart-tag-title-' + tag);
  if (target.length === 0) return;
  const offset = target.offset().top - 68;
  window.scrollTo({ top: offset, behavior: 'smooth' });
});

$('.lightbox').each((index, element) => {
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
  wrap: '.archive-top-bg.slider',
  slideSelector: '.single-slide',
  interval: 3000,
});