const $ = require('cash-dom');
const widok = require('./widok');

// const moreButton = $('#attraction-more');
// const verticalImageTextMore768 = $(
//   '.vertical-image-text.vertical-image-more-768'
// );
// let isMore = false;
// let isMobile = true;

// moreButton.on('click', function () {
//   verticalImageTextMore768.toggleClass('show-more');
//   if (!isMore) {
//     moreButton.html(moreButton.data('less'));
//     verticalImageTextMore768.each((index, element) => {
//       $(element).css({ height: element.scrollHeight });
//     });
//     isMore = true;
//   } else {
//     moreButton.html(moreButton.data('more'));
//     verticalImageTextMore768.css({ height: 0 });
//     isMore = false;
//   }
// });

// window.addEventListener('afterLayoutChange', function () {
//   if (widok.w > 768 && isMobile) {
//     isMobile = false;
//     verticalImageTextMore768.each((index, element) => {
//       $(element).css('height', 'auto');
//     });
//     isMore = false;
//     moreButton.html(moreButton.data('more'));
//     verticalImageTextMore768.removeClass('show-more');
//   } else {
//     isMobile = true;
//     if (isMore) {
//       verticalImageTextMore768.each((index, element) => {
//         $(element).css({ height: element.scrollHeight });
//       });
//     } else {
//       verticalImageTextMore768.css({ height: 0 });
//     }
//   }
// });





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
