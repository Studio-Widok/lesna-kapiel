const $ = require('cash-dom');

$('.apartment-tag-icon').on('click', event => {
  const tag = $(event.currentTarget).data('tag');
  console.log(tag);
  const target = $('#apart-tag-title-' + tag);
  if (target.length === 0) return;
  const offset = target.offset().top - 68;
  window.scrollTo({ top: offset, behavior: 'smooth' });
});