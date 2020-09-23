const $ = require('cash-dom');
const widok = require('./widok');

const moreButton = $('#atrraction-more');
const verticalImageTextMore768 = $(
  '.vertical-image-text.vertical-image-more-768'
);
let isMore = false;

moreButton.on('click', function () {
  verticalImageTextMore768.toggleClass('show-more');
  if (!isMore) {
    moreButton.html(moreButton.data('less'));
    verticalImageTextMore768.each((index, element) => {
      $(element).css({ height: element.scrollHeight });
    });
    isMore = true;
  } else {
    moreButton.html(moreButton.data('more'));
    verticalImageTextMore768.css({ height: 0 });
    isMore = false;
  }
});

window.addEventListener('afterLayoutChange', function () {
  if (widok.w < 768) {
    if (isMore) {
      verticalImageTextMore768.each((index, element) => {
        $(element).css({ height: element.scrollHeight });
      });
    } else {
      verticalImageTextMore768.css({ height: 0 });
    }
  }
});
