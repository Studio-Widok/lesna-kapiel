const $ = require('cash-dom');

$('#burger').on('click', () => {
  $('#nav').toggleClass('opened');
  $('body').toggleClass('nav-opened');
});
