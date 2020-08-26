const $ = require('cash-dom');
const smoothscroll = require('smoothscroll-polyfill');

smoothscroll.polyfill();

$('#top .arrow').on('click', () => {
  var topHeight = $('#top').height();
  window.scrollTo({ top: topHeight, behavior: 'smooth' });
});
