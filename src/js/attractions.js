const widok = require('./widok');

window.addEventListener('load', () => {
  const grabbingContainer = document.getElementById('attractions-plan-wrap');
  grabbingContainer.scrollTop = 0;
  grabbingContainer.scrollLeft = document.getElementById('attractions-plan-scroll').scrollWidth / 2 - widok.w / 2;

  let pos = { top: 0, left: 0, x: 0, y: 0 };

  const mouseDownHandler = function (e) {
    grabbingContainer.classList.add('grabbing');

    pos = {
      left: grabbingContainer.scrollLeft,
      top: grabbingContainer.scrollTop,
      x: e.clientX,
      y: e.clientY,
    };

    document.addEventListener('mousemove', mouseMoveHandler);
    document.addEventListener('mouseup', mouseUpHandler);
  };

  const mouseMoveHandler = function (e) {
    // How far the mouse has been moved
    const dx = e.clientX - pos.x;
    const dy = e.clientY - pos.y;

    // Scroll the element
    grabbingContainer.scrollTop = pos.top - dy;
    grabbingContainer.scrollLeft = pos.left - dx;
  };

  const mouseUpHandler = function () {
    document.removeEventListener('mousemove', mouseMoveHandler);
    document.removeEventListener('mouseup', mouseUpHandler);

    grabbingContainer.classList.remove('grabbing');
  };

  grabbingContainer.addEventListener('mousedown', mouseDownHandler);
});
