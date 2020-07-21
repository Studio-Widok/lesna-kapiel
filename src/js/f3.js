const $ = jQuery;
// ver 1.7
if (typeof f3 == "undefined") {
  f3 = {
    s: 0,
    h: 0,
    w: 0,
    scrollCheck: function () {
      f3.s = window.scrollY;
    },
    sizeCheck: function () {
      f3.h = $(window).height();
      f3.w = $(window).width();
      f3.scrollCheck();
      window.dispatchEvent(new CustomEvent("layoutChange"));
      window.dispatchEvent(new CustomEvent("afterLayoutChange"));
    }
  };
  $(window).scroll(throttle(16, f3.scrollCheck));
  $(window).resize(throttle(100, f3.sizeCheck));
  $(window).load(f3.sizeCheck);
  $(document).ready(f3.sizeCheck);

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
