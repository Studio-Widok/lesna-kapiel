const $ = require('cash-dom');
const smoothscroll = require('smoothscroll-polyfill');

smoothscroll.polyfill();

$('#top .arrow, .archive-top .arrow').on('click', () => {
  const topHeight = $('#top, .archive-top').height();
  console.log($('#top, .archive-top'));
  console.log($('#top, .archive-top').height());
  window.scrollTo({ top: topHeight, behavior: 'smooth' });
});
