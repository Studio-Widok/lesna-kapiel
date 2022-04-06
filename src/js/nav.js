const $ = require('cash-dom');

$('#burger').on('click', () => {
  $('#nav').toggleClass('opened');
  $('body').toggleClass('nav-opened');
});

$('.nav-link-scroll').on('click', event => {
  event.preventDefault();
  const href = $(event.currentTarget).attr('href');
  const target = $(href).offset().top - 100;
  window.scrollTo({ top: target, behavior: 'smooth' });
});