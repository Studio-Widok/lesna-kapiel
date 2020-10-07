const $ = require('cash-dom');
const widok = require('./widok');

const moreButton = $('#atrraction-more');
const verticalImageTextMore768 = $(
  '.vertical-image-text.vertical-image-more-768'
);
let isMore = false;
let isMobile = true;

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
  if (widok.w > 768 && isMobile) {
    isMobile = false;
    verticalImageTextMore768.each((index, element) => {
      $(element).css('height', 'auto');
    });
    isMore = false;
    moreButton.html(moreButton.data('more'));
    verticalImageTextMore768.removeClass('show-more');
  } else {
    isMobile = true;
    if (isMore) {
      verticalImageTextMore768.each((index, element) => {
        $(element).css({ height: element.scrollHeight });
      });
    } else {
      verticalImageTextMore768.css({ height: 0 });
    }
  }
});
