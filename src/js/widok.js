const $ = require('cash-dom');
const throttle = require('./widok-throttle');

const widok = {
  h: 0,
  w: 0,
  s: 0,
  sizeCheck: () => {
    widok.h = $(window).height();
    widok.w = $(window).width();
    window.dispatchEvent(new CustomEvent('layoutChange'));
    widok.scrollCheck();
    window.dispatchEvent(new CustomEvent('afterLayoutChange'));
  },
  scrollCheck: () => {
    widok.s = window.scrollY;
  },
};

$(window).on({
  resize: throttle(100, widok.sizeCheck),
  load: widok.sizeCheck,
  scroll: widok.scrollCheck,
});

$(document).on('ready', widok.sizeCheck);

if (typeof module !== 'undefined') module.exports = widok;
