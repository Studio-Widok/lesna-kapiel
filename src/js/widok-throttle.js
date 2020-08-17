function throttle(ms, callback) {
  let lastCall = 0;
  let timeout;
  return a => {
    const now = new Date().getTime();
    if (now - lastCall >= ms) {
      lastCall = now;
      callback(a);
    } else {
      clearTimeout(timeout);
      timeout = setTimeout((a => callback.bind(this, a))(a), ms);
    }
  };
}

if (typeof module !== 'undefined') module.exports = throttle;
