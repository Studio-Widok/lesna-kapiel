const $ = require('cash-dom');
const nav = require('./nav.js');

nav();

// ver 1.8
if (typeof f3 == 'undefined') {
  f3 = {
    h: 0,
    w: 0,
    sizeCheck: function () {
      f3.h = $(window).height();
      f3.w = $(window).width();
      window.dispatchEvent(new CustomEvent('layoutChange'));
      window.dispatchEvent(new CustomEvent('afterLayoutChange'));
    },
  };
  $(window).on('resize', throttle(100, f3.sizeCheck));
  $(window).on('load', f3.sizeCheck);
  $(document).on('ready', f3.sizeCheck);

  // throttle
  function throttle(ms, callback) {
    let lastCall = 0;
    let timeout;
    return function (a) {
      const now = new Date().getTime(),
        diff = now - lastCall;
      if (diff >= ms) {
        lastCall = now;
        callback(a);
      } else {
        clearTimeout(timeout);
        timeout = setTimeout(
          (function (a) {
            return function () {
              callback(a);
            };
          })(a),
          ms
        );
      }
    };
  }
}
